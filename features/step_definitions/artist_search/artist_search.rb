require "watir-webdriver"
require 'colorize'

Before do	
@browser = Watir::Browser.new
end

Before do
	@browser = Watir::Browser.new
end

Given(/^I am on the main page$/)do
@browser.goto "http://10.0.2.15/LyricFloat/index.php"
end

When(/^enter blank details for input field$/)do
@browser.text_field(:id,"artist").set(" ")
@browser.button(:id,"submitbutton").click
end

Then (/^error shown$/)do
	puts "Artist is required".red
browser.close
end

When (/^enter valid artist$/)do
	@browser = Watir::Browser.new
	@browser.goto "http://10.0.2.15/LyricFloat/index.php"
	@browser.text_field(:id,"artist").set("Eminem")
	@browser.button(:id,"submitbutton").click
end

Then (/^word cloud created$/)do
	puts "Word Cloud Created"
	@browser.close
end

When (/^enter invalid artist$/)do
	@browser = Watir::Browser.new
	@browser.goto "http://10.0.2.15/LyricFloat/index.php"
	@browser.text_field(:id,"artist").set("ajajaja")
	@browser.button(:id,"submitbutton").click
end

Then (/^noartist error shown$/)do
	puts "Invalid artist!".red
	browser.close
end

