<?php 

class functions
{
	public function filter_stopwords($words, $stopwords) {
					for($i = 0; $i < count($words); $i++) {
						if (!in_array(strtolower($words[$i]), $stopwords, TRUE)) {
							$filtered_words [] = $words[$i];
						}
					}

					return $filtered_words;
				}


		public function merge($array1, $array2)
		{
			//get the part whose keys exists in both array1 and array2
			$intersection=array_intersect_key($array1, $array2);
			//merge the arrays, array_merge will cover the value that has same key
			$merged=array_merge($array1,$array2);

			//now reset the intersection part's value into the addition
			foreach ($intersection as $key => $value) {
				if(array_key_exists($key, $merged)){
					$merged[$key]=$array1[$key]+$array2[$key];
				}else{
					echo "error in merge! key disappeared";
				}
			}
			return $merged;
		}

}