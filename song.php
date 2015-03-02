<?php
	/**
	* 
	*/
	class Song
	{
		//song name
		private $name;
		//artist name
		private $artist;

		private $lyrics;
		//word list, key is word's context, 
		//value is its frequency in this song
		private $wordlist;

		function __construct($name,$artist)
		{
			$this->name=$name;
			$this->artist=$artist;
			$this->wordlist=array();
		}
		function parseLyrics($lyrics)
		{
			$lines=explode("\n",$lyrics);
			foreach($lines as $value){
				$words=explode(" ",$value);
				foreach($words as $word){
					$word=trim($word,"!.()[]1234567890;:\",\r\0\x0B");
					/*$w=new Word($word);
					if(!in_array($w, $wordlist)){
						array_push($wordlist, $w);
					}*/
					if(array_key_exists($word, $this->wordlist)){
						$this->wordlist[$word]++;
						$this->wordList[] = $word;
					}
					 else{
					 	$this->wordlist[$word]=1;
					 }
				}
				//arsort($wordlist);
			}
			/*foreach ($wordlist as $word) {
				$word->parseLyrics($lyrics);
			}*/
		}

		function setLyrics($lyrics)
		{
			$this->lyrics = $lyrics;

		}
		function getName()
		{
			return $this->name;
		}
		function getArtist()
		{
			return $this->artist;
		}
		function getWordList(){
			return $this->wordlist;
		}
		function hasWord($word){
			return array_key_exists($word, $this->wordlist);
		}
	}
?>