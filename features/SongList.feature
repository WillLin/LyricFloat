Feature: Get a song list after clicking word
	From the word cloud, clicking a word will display a list of songs with the chosen word
	Sorted from most occurrences to least occurrences

Scenario: Click a word in the word cloud
	Given a word cloud for Eminem has displayed
	When I click on a word, back, in the word cloud
	Then I should get a list of songs with the word back
	And the list should include the song Without Me
	And the list should include the song Mockingbird