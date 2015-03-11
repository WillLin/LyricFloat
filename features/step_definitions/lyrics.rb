require "watir-webdriver"
#require 'colorize'

browser = Watir::Browser.new

Before do
	browser = Watir::Browser.new
end

Given(/^I am on song select page$/) do
  browser.goto "http://10.0.2.15/LyricFloat/page2.php?artist=radiohead&word=back"
end

When(/^I click on the song title link$/) do
	browser.goto "http://10.0.2.15/LyricFloat/songlyrics.php?artist=Radiohead&word=back&song=Knives+Out"
end

Then (/^I should see artist title$/) do
	   browser.text.include? 'Radiohead'
end

And (/^song title$/) do
	browser.text.include? 'Knives Out'
end

And(/^lyrics$/) do
	browser.text.include? "[Verse 1]
 I want you to know
 He's not coming back
 Look into my mouth
 I'm not coming back
 
 [Hook]
 So knives out
 Cut him up
 Don't look down
 Shove it in your mouth
 
 [Verse 2]
 If you'd been a dog
 They would have drowned you at birth
 Look into my mouth
 It's the only way you'll know I'm telling the truth
 
 [Hook]
 So knives out
 Cut him up
 Squash his head
 Put him in the pot
 
 [Verse 3]
 I want you to know
 He's not coming back
 His blood is frozen
 Still there is no point letting it go to waste
 
 [Hook]
 So knives out
 Catch the mouse
 Squash his head
 Put him in the pot"

end

And(/^highlighted words$/) do
	browser.text.include? 'back'
 	browser.close
end

