<?php

/**
* 
*/
class testWord extends PHPUnit_Framework_TestCase
{
	
	function test_constructor()
	{
		$word=new Word("myName");
		$this->assertEquals("myName",$word->getName());
		$this->assertEquals(0,$word->getFrequency());
		return $word;
	}
	/**
	*@depends test_constructor
	**/
	function test_parser(Word $word){
		$lyrics=$this->lyricsGenrator($word->getName(),1);
		$ans=substr_count($lyrics, $word->getName());
		$word->parseLyrics($lyrics);
		$this->assertEquals($ans,$word->getFrequency());
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
		$connector=" ";
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
				$num=rand(0,10);
				if($num<2){
					$line.=$wordName;
					$line.=" ";
				}
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