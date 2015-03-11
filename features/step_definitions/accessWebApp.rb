require "watir-webdriver"

browser = Watir::Browser.new

Given(/^I have access to a web browser with internet$/) do
   browser.goto "http://localhost:8888/google.com"
end

When(/^I enter lyricfloat\/index\.php$/) do
  browser.goto "http://localhost:8888/lyricFloat/index.php"
end

Then(/^I should see the LyricFloat homepage$/) do
  browser.refresh
end
