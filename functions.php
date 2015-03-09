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

}