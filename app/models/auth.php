<?php namespace models;

	class Auth extends \core\model {
	
		public function getHash($username) {
			$data = $this->_db->select("SELECT password FROM ".PREFIX."user WHERE user.username = :username", 
				array(':username' => $username));
			return $data[0]->password;
		}
		
		public function getID($username) {
			$data = $this->_db->select("SELECT id FROM ".PREFIX."user WHERE user.username = :username", 
				array(':username' => $username));
			return $data[0]->id;
		}		
		
		public function update($data, $where) {
			$this->_db->update(PREFIX."user",$data,$where);
		}
	
	}