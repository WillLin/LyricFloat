<?php
	/**
	* 
	*/
	class songTest extends PHPUnit_Framework_TestCase
	{

		public function test_constructor(){
			$song=new Song("songName","artistName");
			$this->assertEquals("songName",$song->getName());
			$this->assertEquals("artistName",$song->getArtist());
			return $song;
		}

		/**
		* @depends test_constructor
		**/
		public function test_lyricsParser(Song $song) 
		{
			$lyrics= 
			"Hello world! I am aaa\nI am abc.\nHello Hello";
			$words=array("Hello" => 3, "world"=>1, "I"=>2, 
				"am"=>2, "aaa"=>1, "abc"=>1);
			$song->parseLyrics($lyrics);
			$this->assertEquals($words,$song->getWordList());
			return $song;
		}
		/**
		* @depends test_lyricsParser
		**/
		public function test_hasWord(Song $song){
			$this->assertTrue($song->hasWord("aaa"));
			$this->assertFalse($song->hasWord("ccc"));
		}
	}
?>