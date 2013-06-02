<?php
App::uses('AppController', 'Controller');
/**
 * Tracks Controller
 *
 * @property Track $Track
 */
class TracksController extends AppController {
public $components = array('Search.Prg');
public $presetVars = true; // using the model configuration

/*public $presetVars = array(
    array('field' => 'title', 'type' => 'value'),
	array('field' => 'artist', 'type' => 'like'),
	array('field' => 'album', 'type' => 'like'),
	array('field' => 'genre', 'type' => 'like'),
);*/

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Prg->commonProcess();
		$this->paginate = array('conditions' => $this->Track->parseCriteria($this->passedArgs));
		//$this->Track->recursive = 0;
		$this->set('tracks', $this->paginate());
	}

	
	function search() {
	// the page we will redirect to
	$url['action'] = 'index';
	 
	// build a URL will all the search elements in it
	// the resulting URL will be 
	// example.com/cake/posts/index/Search.keywords:mykeyword/Search.tag_id:3
	foreach ($this->data as $k=>$v){ 
		foreach ($v as $kk=>$vv){ 
			$url[$k.'.'.$kk]=$vv; 
		} 
	}

	// redirect the user to the url
	$this->redirect($url, null, true);
    }
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Track->exists($id)) {
			throw new NotFoundException(__('Invalid track'));
		}
		$options = array('conditions' => array('Track.' . $this->Track->primaryKey => $id));
		$this->set('track', $this->Track->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
/*	public function add() {
		if ($this->request->is('post')) {
			$this->Track->create();
			if ($this->Track->save($this->request->data)) {
				$this->Session->setFlash(__('The track has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The track could not be saved. Please, try again.'));
			}
		}
	}*/

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Track->exists($id)) {
			throw new NotFoundException(__('Invalid track'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Track->save($this->request->data)) {
				$this->Session->setFlash(__('The track has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The track could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Track.' . $this->Track->primaryKey => $id));
			$this->request->data = $this->Track->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
/*	public function delete($id = null) {
		$this->Track->id = $id;
		if (!$this->Track->exists()) {
			throw new NotFoundException(__('Invalid track'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Track->delete()) {
			$this->Session->setFlash(__('Track deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Track was not deleted'));
		$this->redirect(array('action' => 'index'));
	}*/
}
