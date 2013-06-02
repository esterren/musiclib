<?php

class UserShell extends AppShell {
    public $uses = array('User');
	
	public function main() {
		
		//App::import('Component','Auth'); 
		$this->User->create(); 
		  if ($this->User->save(array('username' => 'test','firstname' => 'test','lastname' => 'test', 'password' => 'test','email' => 'test@test.com','role' => 'default'))) { 
			  $this->out('Admin User created successfully!'); 
		  } else { 
			  $this->out('ERROR while creating the Admin User!!!'); 
		  } 
        
    }



}