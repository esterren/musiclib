<?php

App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

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

	
		$dir = new Folder(WWW_ROOT . 'files' . DS . 'music' );
		$files = $dir->findRecursive('.*\.mp3');
		
		$this->out(print('The following files were found:'));
		$this->out(print_r($files));

		foreach ($files as $file) {

			//$this->out(print_r($this->Track->findByPath($file)));
			if(!$this->Track->findByPath($file)){

				try {
				
					$info = $getid3->analyze($file);//die;
					$this->result['path'] = $file;

					//$this->result['encoding'] = @$getid3->info['encoding'];
					//$this->result['filename'] = basename($getid3->filename);
					//$this->result['filesize'] = @$getid3->info['filesize'];
					//$this->result['fileformat'] = @$getid3->info['fileformat'];
					
					/*if (@$getid3->info['audio']['dataformat'] && $getid3->info['audio']['dataformat'] != $getid3->info['fileformat']) {
						$this->result['audio']['dataformat'] = @$getid3->info['fileformat'];
					}*/
					
					/*if (@$getid3->info['video']['dataformat'] && $getid3->info['video']['dataformat'] != $getid3->info['fileformat'] && $getid3->info['video']['dataformat'] != @$getid3->info['audio']['dataformat']) {
						$this->result['video']['dataformat'] = @$getid3->info['fileformat'];
					}*/
					
					$this->result['length'] = @$getid3->info['playtime_string'];
			
					//$this->result['bitrate'] = (@$getid3->info['bitrate'] ? number_format($getid3->info['bitrate']/1000) . 'k' : '');
					
					//$this->result['audio']['sample_rate'] = @$getid3->info['audio']['sample_rate'] ? number_format($getid3->info['audio']['sample_rate']) . '/' .  (@$getid3->info['audio']['bits_per_sample'] ? $getid3->info['audio']['bits_per_sample'] . '/' : '') .  @$getid3->info['audio']['channels'] : '';
				
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
						
							/*if (@$getid3->info['tags'][$tag]['artist'] || @$getid3->info['tags'][$tag]['title'] || @$getid3->info['tags'][$tag]['album'] || @$getid3->info['tags'][$tag]['genre']|| @$getid3->info['tags'][$tag]['year']|| @$getid3->info['tags'][$tag]['track']) {
								//$this->result['artist'] = @implode('', @$getid3->info['tags'][$tag]['artist']);
								$this->result['title']  = @implode('', @$getid3->info['tags'][$tag]['title']);
								$this->result['album']  = @implode('', @$getid3->info['tags'][$tag]['album']);
								$this->result['genre']  = @implode('', @$getid3->info['tags'][$tag]['genre']);
								$this->result['year']  = @implode('', @$getid3->info['tags'][$tag]['year']);
								$this->result['track']  = @implode('', @$getid3->info['tags'][$tag]['track']);
								
							}*/
						}
					}
					
					/*if (@$getid3->info['id3v1']) {
						$this->out(print_r($getid3->info['id3v1']));
					}

					if (@$getid3->info['tags']) {
						$this->out(print_r($getid3->info['tags']));
					}*/

				
					//$this->result['tags'] = @implode(", ", @array_keys(@$getid3->info['tags']));

					//$this->result['cover'] = '<img src="data:'.$variable['image_mime'].';base64,'.base64_encode($value).'" width="'.$imagechunkcheck[0].'" height="'.$imagechunkcheck[1].'">';
					
					//$this->out(print_r($this->result));
					$this->Track->create();
					
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