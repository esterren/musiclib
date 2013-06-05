<?php

App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

/*
* The CrawlerShell is a cake AppShell, which crawls through a specified directory (/app/webroot/files/music), 
* searches recursively for mp3 files, gets the ID3 tags with the getID3-library and saves the records to the 
* database.
*/

class CrawlerShell extends AppShell {
    public $uses = array('Track');
	public $getid3;
	var $result = array();

	//public $path = WWW_ROOT . 'files' . DS . 'music';
	
	public function main() {
		
		App::import('Vendor', 'getID3', array('file'=>'getid3' . DS .'getid3.php'));
		$getid3 = new getID3;
		//$getid3->encoding = 'ISO-8859-1';
		$getid3->encoding = 'UTF-8';

		// Recursive Search of mp3 files in the WWW_ROOT/files/music folder
		$dir = new Folder(WWW_ROOT . 'files' . DS . 'music');
		$files = $dir->findRecursive('.*\.mp3');
		
		$this->out(print('The following files were found:'));
		$this->out(print_r($files));

		foreach ($files as $file) {

			//$this->out(print_r($this->Track->findByPath($file)));
			if(!$this->Track->findByPath($file)){

				try {
					
					// Analyce the MP3 File with the getID3 Library
					$info = $getid3->analyze($file);//die;
					
					// Fill-in data into resultset
					$this->result['path'] = $file;
					$this->result['length'] = @$getid3->info['playtime_string'];
					$this->result['artist'] = $this->result['title'] = $this->result['album'] = $this->result['genre'] = $this->result['year'] = $this->result['tracknumber'] = '';
					
					if (@$getid3->info['tags']) {
						foreach ($getid3->info['tags'] as $tag => $tag_info) {
							$this->result['artist'] = isset($getid3->info['tags'][$tag]['artist']) ? @implode('', @$getid3->info['tags'][$tag]['artist']) :null ;
							$this->result['title']  = isset($getid3->info['tags'][$tag]['title']) ? @implode('', @$getid3->info['tags'][$tag]['title']) : null ;
							$this->result['album']  = isset($getid3->info['tags'][$tag]['album']) ? @implode('', @$getid3->info['tags'][$tag]['album']) : null ;
							$this->result['genre']  = isset($getid3->info['tags'][$tag]['genre']) ? @implode('', @$getid3->info['tags'][$tag]['genre']) : null;
							$this->result['year']  = isset($getid3->info['tags'][$tag]['year']) ? @implode('', @$getid3->info['tags'][$tag]['year']) : null  ;
							//$this->result['track']  = isset($getid3->info['tags'][$tag]['track']) ? @implode('', @$getid3->info['tags'][$tag]['track']) : null ;
			
							if (isset($getid3->info['tags'][$tag]['track'])){
								$this->result['tracknumber'] = (int)@implode('', @$getid3->info['tags'][$tag]['track']);
							}

						}
					}
					
					/****
					 * Extract Cover from MP3
					 * 
					 ****/
					 
					$this->result['cover'] = null;
					$id3v2 = @$getid3->info['id3v2'];
					
					if ($id3v2) {
						foreach ($id3v2 as $key1 => $value1) {
							if($key1 == 'APIC'){
								if(isset($value1[0])){
									//$this->out(print_r($value1[0]));
									$record = $value1[0];
									
									if(isset($record['image_height']) && isset($record['image_width'])&& 
										isset($record['image_mime'])&& isset($record['data'])){																		
										$this->result['cover'] = '<img src="data:'.$record['image_mime'].';base64,'.base64_encode($record['data']).'" width="'.$record['image_width'].'" height="'.$record['image_height'].'">';										
									}
								}

							}
							
						}
					}
					
					// Create a new Track
					$this->Track->create();
					
					// Save new Track witch new data
					if($this->Track->save($this->result)){
						$this->out('Successfully added track to database! Artist: ' . $this->result['artist'] . '; Title: ' . $this->result['title']);
					} else { 
						$this->out('ERROR while adding new track!!! Filepath: ' . $file); 
					}
					
				}
				
				catch (Exception $e) {
					$this->out(print ('ERROR: ' . $e->message));
				}
			} else {
				$this->out(print ('Track is allready in the database! Filepath: ' . $file));
			}
		}
        
    }



}