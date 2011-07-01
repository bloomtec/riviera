<?php
class Property extends AppModel {
	var $name = 'Property';
	var $displayField = 'name';
	var $validate = array(
		'type_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'community_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'You must create a community before trying to add a property',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'place_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'You must reate a place before trying to add a property',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field is required.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Type' => array(
			'className' => 'Type',
			'foreignKey' => 'type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Community' => array(
			'className' => 'Community',
			'foreignKey' => 'community_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Place' => array(
			'className' => 'Place',
			'foreignKey' => 'place_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Picture' => array(
			'className' => 'Picture',
			'foreignKey' => 'property_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


	var $hasAndBelongsToMany = array(
		'Category' => array(
			'className' => 'Category',
			'joinTable' => 'categories_properties',
			'foreignKey' => 'property_id',
			'associationForeignKey' => 'category_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Feature' => array(
			'className' => 'Feature',
			'joinTable' => 'features_properties',
			'foreignKey' => 'property_id',
			'associationForeignKey' => 'feature_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Special' => array(
			'className' => 'Special',
			'joinTable' => 'properties_specials',
			'foreignKey' => 'property_id',
			'associationForeignKey' => 'special_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);
		
	function beforeSave() {
		parent::beforeSave();
		if (!$this->checkIfShowInHome()) {
			return false;
		} else {
			if (is_numeric($this->data['Property']['id'])) {
				// Doing an edit on a property
				//
				$this->editing();
			} else {
				// Creating a property
				//
				$this->creating();
			}
			return true;	
		}
	}
	
	function editing() {
		if($this->isPictureEmpty()) {
			// Property is empty, leave as is
			//
		} else {
			// Property is assigned, validate
			//
			$result = $this->find('first', array('conditions' => array('Property.id' => $this->data['Property']['id'])));
			if(empty($result['Property']['picture'])) {
				// Property being updated is empty, continue.
				//
				$this->checkIfPicureExists();
			} else {
				// Property is not empty, validate if it is equal
				//
				if($result['Property']['picture'] !== $this->data['Property']['picture']) {
					// Values are different, validate
					//
					$this->checkIfPicureExists();
				} else {
					// Values are the same, do nothing
					//
				}
			}
		}
	}
	
	function creating() {
		if($this->isPictureEmpty()) {
			// Property is empty, leave as is
			//
		} else {
			// Property is assigned, validate
			//
			$this->checkIfPicureExists();
		}
	}

	function isPictureEmpty() {
		if(!empty($this->data['Property']['picture'])) {
			return false;
		} else {
			return true;
		}
	}
	
	function checkIfShowInHome() {
		if($this->data['Property']['show_in_home'] == 0) {
			return true;
		} else {
			if (!empty($this->data['Property']['picture'])) {
				return true;
			} else {
				return false;
			}
		}
	}
	
	function checkIfPicureExists() {
		// Validar que el nombre que se esta usando para guardar el documento
		// no esta actualmente siendo usado.
		//
		$result = $this->find('first', array('conditions' => array('Property.picture' => $this->data['Property']['picture'])));
		if ($result) {
			// Existe un archivo con el nombre que se esta tratando de usar
			//
			
			// Partir el nombre en partes
			//
			$doc_name_parts = explode('.', $this->data['Property']['picture']);
			
			// Sacar la extension del documento
			//
			$doc_ext = strtolower($doc_name_parts[sizeof($doc_name_parts) - 1]);
			
			// Quitar la extension del nombre del documento
			//
			unset($doc_name_parts[sizeof($doc_name_parts) - 1]);
			
			// Dejar el nombre del documento completo de nuevo
			//
			$doc_name = implode('.', $doc_name_parts);
			
			// Crear un nombre que no exista ya entre los documentos
			//
			for ($i = 1; true; $i++) {
				$tmp_name = $doc_name . ' (' . $i . ').' . $doc_ext;
				$result = $this->find('first', array('conditions' => array('Property.picture' => $tmp_name)));
				if ($result) {
					// Existe un documento con el nombre nuevo, seguir creando.
					//
				} else {
					// No existe un documento con el nuevo nombre, crearlo.
					//
					$this->data['Property']['picture'] = $tmp_name;
					break;
				}
			}
		} else {
			// No existe un archivo con el nombre que se esta tratando de usar
			//
		}
	}
	
}
