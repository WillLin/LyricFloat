Given(/^the LyricFloat home page has loaded$/) do
  visit 'http://10.0.2.15/LyricFloat/'
end

Given(/^I have entered a valid artist, Eminem, in the input box$/) do
  fill_in 'artist', :with => 'Eminem'
end

When(/^I press the 'Submit' button$/) do
  click_button('Submit')
end

Then(/^I should get a word cloud, with the word back$/) do
  assert_text('back')
end

Then(/^the word man$/) do
  assert_text('man')
end
