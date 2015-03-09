require "watir-webdriver"

Before do
  @browser = Watir::Browser.new
end

Given(/^I have access to a web browser with internet$/) do
   @browser.goto "http://10.0.2.15/google.com"
end

When(/^I enter lyricfloat\/index\.php$/) do
  @browser.goto "http://10.0.2.15/LyricFloat/index.php"
end

Then(/^I should see the LyricFloat homepage$/) do
  @browser.refresh
end


