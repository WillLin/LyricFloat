<?php

	/**
	* 
	*/

	class songListTest extends PHPUnit_Framework_TestCase
	{
		
		function test_constructor()
		{
			$songList=new Songlist("AWord");
			$this->assertEquals("AWord",$songList->getWord());
			return $songList;
		}
		/**
		*@depends test_constructor
		**/
		function test_lists(Songlist $songList)
		{
			$songs=array();
			$filtered_songMap=array();
			$filtered_artistMap=array();
			for($i=0;$i<100;$i++){
				$songName=$this->StringGenerator();
				$artistName=$this->StringGenerator();
				$num=rand(0,10);
				$flag=0;
				if($num<=2){
					$flag=1;
				}
				$lyrics=$this->lyricsGenrator("AWord",$flag);
				$song=new Song($songName,$artistName);
				$song->parseLyrics($lyrics);
				if($flag==1){
					$filtered_songMap[$songName]=substr_count($lyrics, "AWord");
					$filtered_artistMap[$songName]=$artistName;
				}
				array_push($songs,$song);
			}
			$songList->setList($songs);
			$this->assertEquals($filtered_songMap,$songList->getFrequencyList());
			$this->assertEquals($filtered_artistMap,$songList->getArtistMap());
			return $songList;

		}
		/**
		*@depends test_lists
		**/
		function test_resetAndSetword(Songlist $songList){
			$songList->setWord("AnotherWord");
			$songList->reset();
			$this->assertEquals("AnotherWord",$songList->getWord());
			$this->assertEmpty($songList->getFrequencyList());
			$this->assertEmpty($songList->getArtistMap());
		}
		function StringGenerator(){
			$characters="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVXYZ";
			$cl=strlen($characters);
			$length=rand(5,10);
			$randomString='';
			for($i=0;$i<$length;$i++){
				$randomString.=$characters[rand(0,$cl-1)];
			}
			return $randomString;
		}
		function lyricsGenrator($wordName,$flag){
			$connector=" .,!:?;";
			$cx=strlen($connector);
			$lyrics='';
			$n1=rand(3,6);
			for($i=0;$i<$n1;$i++){
				$nline=rand(1,10);
				$line='';
				for($j=0;$j<$nline;$j++){
					$word=$this->StringGenerator();
					$line.=$word;
					$line.=$connector[rand(0,$cx-1)];
				}
				$lyrics.=$line;
				$lyrics.="\n";
			}
			if($flag==1){
				$lyrics.=$wordName;
				$lyrics.="\n";
				//print($lyrics);
				//print("\n");
			}
			return $lyrics;
		}
	}
?>