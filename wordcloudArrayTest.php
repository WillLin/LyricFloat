<?php
	/**
	* 
	*/
	class wordcloudArrayTest extends PHPUnit_Framework_TestCase
	{
		
		function test_constructor()
		{
			$wordcloud=new WordcloudArray(2147483647);
			$this->assertEmpty($wordcloud->getWordcloudArray());
			return $wordcloud;
		}
		/**
		*@depends test_constructor
		**/
		function test_execution(WordcloudArray $wordcloud){
			$songs=array();
			$finalResult=array();
			for($i=0;$i<100;$i++){
				$songName=$this->StringGenerator();
				$artistName=$this->StringGenerator();
				$lyrics=$this->lyricsGenrator("aaa",0);
				$song=new Song($songName,$artistName);
				$song->parseLyrics($lyrics);
				array_push($songs,$song);
				$list=$song->getWordList();
				foreach($list as $word => $freq){
					if(array_key_exists($word, $finalResult)){
						$finalResult[$word]+=$freq;
					}else{
						$finalResult[$word]=$freq;
					}
				}
			}
			$wordcloud->execute($songs);
			$wordcloud_array=$wordcloud->getWordcloudArray();
			asort($finalResult);
			$this->assertEquals($finalResult,$wordcloud_array);
			return $wordcloud;
		}
		/**
		*@depends test_execution
		**/
		function test_reset(WordCloudArray $wordcloud){
			$wordcloud->reset();
			$this->assertEmpty($wordcloud->getWordcloudArray());
			return $wordcloud;
		}
		/**
		*@depends test_reset
		**/
		function test_setSize(WordCloudArray $wordcloud){
			$wordcloud->setSize(10);
			$songs=array();
			$finalResult=array();
			for($i=0;$i<100;$i++){
				$songName=$this->StringGenerator();
				$artistName=$this->StringGenerator();
				$lyrics=$this->lyricsGenrator("aaa",0);
				$song=new Song($songName,$artistName);
				$song->parseLyrics($lyrics);
				array_push($songs,$song);
				$list=$song->getWordList();
				//$mixer=new Mergelist();
				//$finalResult=$mixer->merge($finalResult,$list);
				foreach($list as $word => $freq){
					if(array_key_exists($word, $finalResult)){
						$finalResult[$word]+=$freq;
					}else{
						$finalResult[$word]=$freq;
					}
				}
			}
			$wordcloud->execute($songs);
			$wordcloud_array=$wordcloud->getWordcloudArray();
			arsort($finalResult);
			$finalResult=array_slice($finalResult, 0,10,true);
			$this->assertEquals($finalResult,$wordcloud_array);
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