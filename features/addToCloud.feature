Feature: Add new Artist to Song Cloud
	In order to Display New Cloud With Multiple Artists' lyrics
	As a user
	I want to add artist to existing cloud

Scenario: Add to Cloud
	Given I am on LyricFloat/submit.php
	When I click add to cloud with artist in input field
	Then I should see a new cloud with Multiple Artists' lyrics
	And a reloaded submit.php with extended cloud