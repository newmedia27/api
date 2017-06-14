<?php
	
	
	namespace api\controller;
	
	use api\components\Translate;
	use api\model\Api;
	
	class ApiController
	{
		public function actionSayHello()
		{
			$api = new Api($_POST);
			$api->validation();
			
			if ($api->validation()) {
				if (isset($_POST['language'])) {
					$trans = new Translate('СЮДА КЛЮЧ');
					$name = $trans->translate($api->getName(),$api->getLanguage());
					return "HELLO  $name";
				}else{
					return "HELLO  {$api->getName()}";
				}
				
			} else {
				return $api->msg;
			}
			
		}
		
		public function actionGetBase64()
		{
			$api = new Api($_POST);
			
			return base64_encode($api->getFile());
		}
		
	}