<?php

class displaytests extends PHPUnit_Framework_TestCase
{
 public function testtesttest(){

     $testclass= new test();
     $var= $testclass->test1();
     $this->assertEquals(2, $var);
     $var= $testclass->test3();
     $this->assertEquals(1, $var);
 }
}


?>