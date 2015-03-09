<?php
	/**
	* 
	*/
	class Word
	{
		private $wordName;
		private $frequency;
		
		function __construct($name)
		{
			$this->wordName=$name;
			$this->frequency=0;
		}

		function parseLyrics($lyrics)
		{
			$this->frequency=substr_count($lyrics, $this->wordName);
		}

		function getName()
		{
			return $this->wordName;
		}
		function getFrequency()
		{
			return $this->frequency;
		}
	}
?>