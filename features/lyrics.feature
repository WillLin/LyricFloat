Feature: Display Lyrics from a Specified Word 
	In order to Display Lyrics for a Word in a Cloud
	As a user
	I want to Display Lyrics for a specific word

Scenario: Display Lyrics
	Given I am on song select page
	When I click on the song title link
	Then I should see artist title
	And song title
	And lyrics
	And highlighted words