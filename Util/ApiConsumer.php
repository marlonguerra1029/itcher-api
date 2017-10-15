<?php
/**
 * Generic Api Consumer
 */
class ApiConsumer
{
	private $_url;
	private $_content;
	
	/**
         * 
         * @param string $url
         */
	function __construct($url){
		$this->_url = $url;
		$this->_content = $this->getUrlContent($this->_url);
	}
	
        /**
         * 
         * @return string
         */
	public function getUrl(){
		return $this->_url;
	}
	
        /**
         * 
         * @return string
         */
	public function getContent(){
		return $this->_content;
	}
	
        /**
         * 
         * @param string $url
         * @return string
         */
	private function getUrlContent($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		$data = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		http_response_code($httpcode);
		curl_close($ch);
		return ($httpcode>=200 && $httpcode<300) ? $data : 
			json_encode(array("error"=>$httpcode));
	}
}

?>