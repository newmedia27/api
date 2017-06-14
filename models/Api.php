<?php
	
	namespace api\model;
	
	
	class Api
	{
		private $name;
		private $language;
		private $file;
		public $msg;
		
		
		public function __construct($_POST)
		{
			$this->name = isset($_POST['name']) ? $_POST['name'] : null;
			$this->language = isset($_POST['language']) ? $_POST['language'] : null;
			$this->file = isset($_POST['data']) ? json_decode($_POST['data']) : null;
		}
		
		
		public function validation()
		{
			$preg = "/^[a-zA-Z0-9]{2,15}$/";
			$msg = '';
			if (preg_match($preg, $this->name)) {
				$k = 0;
				for ($i = 1; $i < strlen($this->name); $i++) {
					if ($this->name[$k] === $this->name[$i]) {
						$k = $i;
					} else {
						break;
					}
				}
				if ($k == strlen($this->name)) {
					$msg = 'Please enter valid name';
				}
				
				if (strlen($this->name) < 2) {
					$this->msg = 'You name is too short' . empty(isset($msg)) ? ',' . $msg : null;
					
					return false;
				}
				if (strlen($this->name) > 15) {
					$this->msg = 'Your name is too long' . empty(isset($msg)) ? ',' . $msg : null;
					
					return false;
				}
			} else {
				return true;
			}
		}
		
		/**
		 * @return mixed|null
		 */
		public function getFile()
		{
			return $this->file;
		}
		
		/**
		 * @return null
		 */
		public function getName()
		{
			return $this->name;
		}
		
		/**
		 * @return null
		 */
		public function getLanguage()
		{
			return $this->language;
		}
		
	}
	