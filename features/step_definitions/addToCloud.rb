# require 'spec'
require "watir-webdriver"
#require 'colorize'

browser = Watir::Browser.new

Before do
	browser = Watir::Browser.new
end

# Given /I have entered (\d+) into the calculator/ do |n|
# 	@calc.push n.to_i
# end

# When /I press (\w+)/ do |op|
# 	@result = @calc.send op
# end

# Then /the result should be (.*) on the screen/ do |result|
# 	@result.should == result.to_f
# end


Given(/^I am on LyricFloat\.submit\.php$/) do
  browser.goto "http://localhost:8888/lyricFloat/submit.php?artist=Lady+Gaga"
end

When(/^I type artist in input field$/) do
  browser.text_field(:id => "artist").set("The Strokes")
  sleep(1)
  browser.button(:id =>"addToCloud").click
end

Then(/^I should see a new cloud with Multiple Artists' lyrics$/) do
  pending #puts "reptilia".red
end

Then(/^a reloaded submit\.php with extended cloud$/) do
  pending #browser.close
end
