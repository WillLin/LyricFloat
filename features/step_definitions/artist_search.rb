require "watir-webdriver"
require 'colorize'

browser = Watir::Browser.new

Before do
	browser = Watir::Browser.new
end

Given(/^I am on the main page$/)do
browser.goto "http://localhost/introducingphp/lyricfloat/index.php"
end

When(/^enter blank details for input field$/)do
browser.text_field(:id,"artist").set(" ")
browser.button(:id,"submitbutton").click
end

Then (/^error shown$/)do
	puts "Artist is required".red
browser.close
end

When (/^enter valid artist$/)do
	browser = Watir::Browser.new
	browser.goto "http://localhost/introducingphp/lyricfloat/index.php"
	browser.text_field(:id,"artist").set("Eminem")
	browser.button(:id,"submitbutton").click
end

Then (/^word cloud created$/)do
	puts "Word Cloud Created"
	browser.close
end
