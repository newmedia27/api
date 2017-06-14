<?php
	
	namespace api\model;
	
	
	class Api
	{
		private $name;
		private $language;
		private $file;
		
		
		public function __construct($_POST)
		{
			$this->name = isset($_POST['name']) ? $_POST['name'] : null;
			$this->language = isset($_POST['language']) ? $_POST['language'] : null;
			$this->file = isset($_POST['data']) ? json_decode($_POST['data']) : null;
		}
		
		
		public function validation()
		{
			$preg = "/^[a-zA-Z0-9]{2,15}$/";
			$msg='';
			if (preg_match($preg, $this->name)) {
				$k=0;
				for ($i=1; $i<strlen($this->name); $i++){
					if ($this->name[$k]===$this->name[$i]){
						$k=$i;
					}else{
						break;
					}
				}
				if ($k ==strlen($this->name) ){
					$msg = 'Please enter valid name';
				}
				
				if (strlen($this->name) < 2) {
					return 'You name is too short' . empty(isset($msg))? ',' . $msg : null;
				}
				if (strlen($this->name) > 15) {
					return 'Your name is too long' . empty(isset($msg))? ',' . $msg : null;
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
	}