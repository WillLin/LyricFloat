require "watir-webdriver"

Before do
@browser = Watir::Browser.new
end

Given(/^I am on LyricFloat\/submit\.php$/) do
  @browser.goto "http://10.0.2.15/LyricFloat/index.php"
  @browser.text_field(:id => "artist").set("Lady Gaga")
  @browser.input(:id =>"submitbutton").click
end

When(/^I click add to cloud with artist in input field$/) do
  @browser.text_field(:id => "artist").set("Eminem")
  sleep(1)
  @browser.button(:id =>"addToCloud").click
end

Then(/^I should see a new cloud with Multiple Artists' lyrics$/) do
  @browser.refresh
end

Then(/^a reloaded submit\.php with extended cloud$/) do
  @browser.close
end
