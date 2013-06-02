<?php
App::uses('AppModel', 'Model');
/**
 * Track Model
 *
 */
class Track extends AppModel {

	public $actsAs = array('Search.Searchable');
	public $filterArgs = array(
		'title' => array('title'=>'title','type' => 'query', 'method' => 'filterTitle'),
		'artist' => array('artist'=>'artist', 'type' => 'like'),
		'album' => array('album'=>'album','type' => 'like'),
		'genre' => array('genre'=>'genre','type' => 'like'),
		);
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
	public $primaryKey = 'id';
	
/**
 * Filter methods
 * 
 */
	public function filterTitle($data, $field = null) {
	if (empty($data['title'])) {
		return array();
	}
	$nameField = '%' . $data['title'] . '%';
	return array(
		'OR' => array(
			$this->alias . '.title LIKE' => $nameField,
			));
	}
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'path' => array(
			'notempty' => array(
				'rule' => 'isUnique',
				'message' => 'The file allready exists in the database!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'title' => array(
			/*'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Title must not be emtpy!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),*/
			'maxlength' => array(
				'rule' => array('maxlength',150),
				'message' => 'maximum length of title is 150 characters!',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'artist' => array(
			/*'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Artist must not be empty!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),*/
			'maxlength' => array(
				'rule' => array('maxlength',150),
				'message' => 'Maximum length of artist ist 150 characters!',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'album' => array(
			/*'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Album must not be empty!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),*/
			'maxlength' => array(
				'rule' => array('maxlength',150),
				'message' => 'Maximum length of Album is 150 characters!',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'year' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Has to be numeric!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'maxlength' => array(
				'rule' => array('maxlength',4),
				'message' => 'Maximum length of year is 4 characters!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tracknumber' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Has to be numeric!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'genre' => array(
			/*'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Genre must not be empty!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),*/
			'maxlength' => array(
				'rule' => array('maxlength',150),
				'message' => 'Maximum length of Genre is 150 characters!',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'length' => array(
			/*'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Length must not be empty!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),*/
			'maxlength' => array(
				'rule' => array('maxlength',50),
				'message' => 'Maximum length of Length is 50 characters!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
