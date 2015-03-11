Feature: Share to Facebook
	In order to share the cloud with facebook
	As a user
	I want to share the lyricFloat Cloud

Scenario: Share Button Clicked
	Given I have a word cloud displayed
	When I click Share to Facebook
	Then I should see a Share With Facebook popover
	Then I should see ability to click share
	When I click Share in popover, cloud is shared on facebook