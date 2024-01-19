#!/usr/bin/ruby -w

require 'cgi'

cgi = CGI.new

# Retrieve CGI parameters
city = cgi.params['city']&.first&.capitalize 
province = cgi.params['province']&.first&.capitalize
country = cgi.params['country']&.first&.capitalize
cityImage = cgi.params['cityImage']&.first

# Show as actual HTML webpage
puts "Content-type: text/html\n\n"
puts "<html>"
puts "<head>"
puts "  <title>CGI RUBY Lab 10</title>"
puts "  <style>"
puts "    body { font-family: Times New Roman, sans-serif; padding: 0px; margin: 0px; text-align: center; font-size: 25px; }"
puts "    h1 { color: #6495ED; }"
puts "    img { max-width: 100%; height: auto; width: 100vw; }"
puts "    .title { display: flex; align-items: center; background-color: #CD5C5C; justify-content: center; }"
puts "  </style>"
puts "</head>"
puts "<body>"
puts "<div class='title'>"
puts "  <h1>#{city}, #{province}, #{country}</h1>"
puts "</div>"
puts "<img src='#{cityImage}' alt='City Image Entered'>"
puts "</body>"
puts "</html>"
