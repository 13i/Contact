<?php

App::uses('ContactAppController', 'Contact.Controller');

class ContactController extends ContactAppController {
	public function index() {
		if (!empty($this->request->data)) {
			
			if ($this->Contact->send($this->request->data))
			{
				$this->Session->setFlash(__d('Contact', 'Message sent.'));
				$this->request->data = array();
			} else {
				$this->Session->setFlash(__d('Contact', 'Error. Please try again.'));
			}
		}
	}
	
}
