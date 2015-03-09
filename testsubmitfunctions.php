<?php 
class testfunctions extends PHPUnit_Framework_TestCase
{
	public function test_filter_stopwords()
	{
		$words= array("a", "bannana", "man", "the", "it", "went", "to", "the", "market");
		$stopwords= array("the", "it", "to", "a", "you");

		$fitered_words=array();
		$newClass= new functions();
		$filtered_words= $newClass->filter_stopwords($words, $stopwords);
		$result=array("bannana", "man", "went", "market");
		$this->assertEquals($result, $filtered_words);
	}

	public function test_mergelist()
	{
		$array1=array("Hello"=>1,"bye"=>2);
		$array2=array("yo"=>6,"WHatsup"=>7);
		//$result=array();
		$newClass1= new functions();
		$result=$newClass1->merge($array1,$array2);
		$array4=array("Hello"=>1,"bye"=>2,"yo"=>6,"WHatsup"=>7);
		$this->assertEquals($result, $array4);
	}
	
}

