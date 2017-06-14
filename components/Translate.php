<?php
	/**
	 * Created by PhpStorm.
	 * User: jart
	 * Date: 14.06.2017
	 * Time: 21:43
	 */
	
	namespace api\components;
	
	
	class Translate
	{
		const TRANSLATE_API = "https://www.googleapis.com/language/translate/v2";
		
		private $apiKey;
		
		public function __construct($key)
		{
			$this->apiKey = $key;
		}
		
		/**
		 * @param $data
		 * @param $target
		 * @return mixed
		 */
		public function translate($data, $target)
		{
			$values = [
				'key' => $this->apiKey,
				'target' => $target,
				'q' => $data
			];
			$formData = http_build_query($values);
			$ch = curl_init(self::TRANSLATE_API);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $formData);
			curl_setopt($ch, CURLOPT_HTTPHEADER,
				array('X-HTTP-Method-Override: GET'));
			$json = curl_exec($ch);
			curl_close($ch);
			$data = json_decode($json, true);
			foreach ($data['data']['translations'] as $translation) {
				return $translation['translatedText'];
			}
		}
	}