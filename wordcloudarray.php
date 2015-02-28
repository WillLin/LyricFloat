<?php
	/**
	* 
	*/
	require 'song.php';
	require 'mergelist.php';
	class WordcloudArray
	{
		private var $size;
		private var $wordcloudArray;
		private var $mixer;
		function __construct($n){
			$this->size=$n;
			$this->mixer=new Mergelist();
			$this->wordcloudArray=array();
		}
		function setSize($n){
			$this->size=$n;
		}
		function reset(){
			$this->wordcloudArray=array();
		}
		function execute($songlist){
			foreach ($songlist as $song) {
				$wordlist=$song->getWordList();
				$this->wordcloudArray=$this->mixer->merge($wordcloudArray,$wordlist);
			}
			arsort($this->wordcloudArray);
			array_slice($this->wordcloudArray, 0,$size,true);
		}
		function getWordcloudArray(){
			return $this->wordcloudArray
		}

	}
?>