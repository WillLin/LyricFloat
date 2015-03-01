<?php
	/**
	* 
	*/
	require 'song.php';
	class Songlist
	{
		private var $word;
		private var $song_map;
		function __construct($wordname)
		{
			$this->word=$wordname
			$this->song_map=array();
		}
		function reset(){
			$this->song_map=array();
		}
		function setWord($wordname){
			$this->word=$wordname;
		}
		function setList($songlist){
			foreach ($songlist as $song) {
				if($song->hasWord($this->word)){
					$list=$song->getWordList();
					$this->song_map[$song->getName()]=$list[$this->word];
				}
			}
			arsort($this->song_map);
			return;
		}
		function getList(){
			return $this->song_map;
		}
		function getWord(){
			return $this->word;
		}
	}
?>