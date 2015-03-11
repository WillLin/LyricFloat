Given(/^LyricFloat has loaded$/) do
  visit 'http://10.0.2.15/LyricFloat/'
end

Given(/^I have entered Emi into the artist input field$/) do
  fill_in 'artist', :with => 'Emi'
  sleep 2
end

Then(/^Eminem should appear in the autocomplete box$/) do
  assert_text('Eminem')
end
