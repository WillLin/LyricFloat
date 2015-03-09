Given(/^a word cloud for Eminem has displayed$/) do
  visit 'http://10.0.2.15/LyricFloat/submit.php?artist=Eminem'
end

When(/^I click on a word, back, in the word cloud$/) do
  click_link('back')
end

Then(/^I should get a list of songs with the word back$/) do
  assert_text('back')
end

Then(/^the list should include the song Without Me$/) do
  assert_text('Without Me')
end

Then(/^the list should include the song Mockingbird$/) do
  assert_text('Mockingbird')
end
