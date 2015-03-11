Feature: Artist Search Box AutoComplete
	After entering 3 or more characters, an autocomplete box will appear with possible matches

Scenario: Enter a few characters into the artist search field
	Given LyricFloat has loaded
	And I have entered Emi into the artist input field
	Then Eminem should appear in the autocomplete box