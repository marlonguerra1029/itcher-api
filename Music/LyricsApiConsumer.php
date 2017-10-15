<?php

include_once "../Util/ApiConsumer.php";

/**
 * Api Consumer for lyrics
 */
class LyricsApiConsumer extends ApiConsumer
{
	private $_artist;
	private $_title;
	private $_lyrics;
	
        /**
         * 
         * @param type $artist
         * @param type $title
         */
	function __construct($artist, $title)
	{
		$this->_artist = $artist;
		$this->_title = $title;
		parent::__construct('https://api.lyrics.ovh/v1/'.urlencode($artist).'/'.urlencode($title));
		$this->_lyrics = parent::getContent();
	}
	
        /**
         * 
         * @return string
         */
	public function getArtist(){
		return $this->_artist;
	}
	
        /**
         * 
         * @return string
         */
	public function getTitle(){
		return $this->_title;
	}
	
        /**
         * 
         * @return string
         */
	public function getLyrics(){
		return $this->_lyrics;
	}
}

?>