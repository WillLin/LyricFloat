Feature: Search certain artist
	In order to generate a tag cloud we have to enter a valid artist
	Scenario: Input no artist
	Given I am on the main page
	When enter blank details for input field
	Then error shown
	Scenario: Input valid artist
	Given I am on the main page
	When enter valid artist
	Then word cloud created
	Scenario: Input invalid artist
	Given I am on the main page
	When enter invalid artist
	Then noartist error shown