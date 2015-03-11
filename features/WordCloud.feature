Feature: Get a word cloud for an artist
	A valid artist will generate a word cloud

Scenario: Enter a valid artist
	Given the LyricFloat home page has loaded
	And I have entered a valid artist, Eminem, in the input box
	When I press the 'Submit' button
	Then I should get a word cloud, with the word back
	And the word man