<?php
	/**
	* 
	*/
	class Song
	{
		private var $name;
		private var $artist;
		private var $wordlist=array();
		function __construct($name,$artist)
		{
			$this->name=$name;
			$this->artist=$artist;
		}
		function parseLyrics($lyrics)
		{
			$lines=explode("\n",$lyrics);
			foreach($lines as $value){
				$words=explode(" ",$value);
				foreach($words as $word){
					$word=trim($word,"!.;:\",\r\0\x0B");
					/*$w=new Word($word);
					if(!in_array($w, $wordlist)){
						array_push($wordlist, $w);
					}*/
					if(array_key_exists($word, $wordlist){
						$wordlist[$word]++;
					}
					else{
						$wordlist[$word]=1;
					}
				}
				//arsort($wordlist);
			}
			/*foreach ($wordlist as $word) {
				$word->parseLyrics($lyrics);
			}*/
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
	}
?>