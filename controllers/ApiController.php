<?php
	
	
	namespace api\controller;
	
	use api\model\Api;
	
	class ApiController
	{
		public function actionSayHello()
		{
			$api = new Api($_POST);

			if ($api->validation()){
				return "Hello {$api->validation()}";
			}else{
				return $api->validation();
			}
			
		}
			public function actionGetBase64()
			{
				$api = new Api($_POST);
				
				return base64_encode($api->getFile());
			}
			
	}