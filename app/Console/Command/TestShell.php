<?php

class TestShell extends AppShell {
    public $uses = array('Track');
	
	public function main() {
		
		//App::import('Component','Auth'); 
		//$this->Track->create(); 
		$this->out(strtotime('02:35'));
		/*
		  if ($this->Track->save(array(
			'path' => 'D:\dev-workspace\www\musiclib\app\webroot\files\music\test\01 As I Please.mp3',
			'title' => 'As I Please',
			'artist' => 'Beatsteaks',
			'album' => 'Limbo Messiah',
			'year' => '2007',
			'tracknumber' => 1,
			'genre'=>'Rock',
			'length'=>'00:02:35'))) { 
				$this->out('Admin User created successfully!'); 
		  } else { 
			  $this->out('ERROR while creating the Admin User!!!'); 
		  } */
        
    }
 /*   [path] => D:\dev-workspace\www\musiclib\app\webroot\files\music\test\01 As I
 Please.mp3
    [length] => 2:35
    [album] => 
    [title] => 
    [artist] => 
    [genre] => Rock
    [year] => 2007
    [tracknumber] => 1*/
}