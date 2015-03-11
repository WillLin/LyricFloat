Feature: Access through Web Browser
	In order for a user to access the product
	As a user
	I want to access the internet and get to the web application

Scenario: View LyricFloat/index.php
	Given I have access to a web browser with internet
	When I enter lyricfloat/index.php
	Then I should see the LyricFloat homepage 