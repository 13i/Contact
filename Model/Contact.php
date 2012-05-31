<?php

App::uses('ContactAppModel', 'Contact.Model');

class Contact extends ContactAppModel {
	var $useTable = false;
	
	var $validate = array(
		'name' => array(
			'empty' => array(
				'rule' => 'notempty',
				'message' => 'Nom obligatoire',
				'required' => true
			)
		),
		'email' => array(
			'email' => array(
				'rule' => 'email',
				'message' => 'Merci de fournir un email valide',
				'required' => true
			)
		),
		'subject' => array(
			'empty' => array(
				'rule' => 'notempty',
				'message' => 'Sujet obligatoire',
				'required' => true
			)
		),
		'message' => array(
			'empty' => array(
				'rule' => 'notempty',
				'message' => 'Message obligatoire',
				'required' => true
			)
		)
	);
	
	var $_schema = array(
		'name' => array(
			'type' => 'string', 
			'length' => 45
		),
		'email' => array(
			'type' => 'string', 
			'length' => 65
		),
		'subject' => array(
			'type' => 'string',
			'length' => 65
		),
		'message' => array(
			'type' => 'text'
		)	
	);
	
	public function send($data = array()){
		$this->set($data);
		
		if (!$this->validates()) {
			return false;
		}
			
		$email = new CakeEmail('contact');
		$email  ->from($this->request->data['Contact']['email'])
				->to($to)
				->subject($this->request->data['Contact']['subject']);
				
		try{
			$email->send($this->request->data['Contact']['message']);
		}
		catch(SocketException $e){
			$this->invalidate('message', __d('Contact', 'Unable to send message'));
			return false;
		}
		
		return true;
		
	}
}
