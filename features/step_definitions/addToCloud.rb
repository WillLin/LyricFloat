require "watir-webdriver"

browser = Watir::Browser.new

Given(/^I am on LyricFloat\/submit\.php$/) do
  browser.goto "http://localhost:8888/lyricFloat/index.php"
  browser.text_field(:name => "artist").set("Lady Gaga")
  browser.input(:id =>"submitbutton").click
end

When(/^I click add to cloud with artist in input field$/) do
  browser.text_field(:id => "artist").set("Eminem")
  sleep(1)
  browser.button(:id =>"addToCloud").click
end

Then(/^I should see a new cloud with Multiple Artists' lyrics$/) do
  browser.refresh
end

Then(/^a reloaded submit\.php with extended cloud$/) do
  browser.close
end
