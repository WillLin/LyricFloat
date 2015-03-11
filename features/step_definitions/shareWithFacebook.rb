require "watir-webdriver"

browser = Watir::Browser.new

Given(/^I have a word cloud displayed$/) do
   browser.goto "http://localhost:8888/lyricFloat/index.php"
   browser.text_field(:name => "artist").set("Lady Gaga")
   browser.input(:id =>"submitbutton").click
end

When(/^I click Share to Facebook$/) do
  browser.button(:value =>"Share").click
end

Then(/^I should see a Share With Facebook popover$/) do
  pending # express the regexp above with the code you wish you had
end

Then(/^I should see ability to click share$/) do
  pending # express the regexp above with the code you wish you had
end

When(/^I click Share in popover, cloud is shared on facebook$/) do
  pending # express the regexp above with the code you wish you had
end
