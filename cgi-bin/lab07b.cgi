#!/usr/bin/perl -wT
use strict;
use warnings;
use CGI ':standard';
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);

print "Content-type: text/html\n\n";

# Retrieve the information passed to the form:
my $name = param('name');
my $address = param('address');
my $city = param('city');
my $postalcode = param('postalcode');
my $province = param('province');
my $phone = param('phone');
my $email = param('email');
my $upload_filehandle = upload('picture');

print "<html>\n";
print "<head><title>Lab 7b</title><link rel='stylesheet' href='https://www.cs.ryerson.ca/~mquiroga/lab07b.css'></head>\n";
print "<body>\n";
print "<h1> Form Processed Result:</h1>\n";
print "<p>Name: ", escapeHTML($name), "</p>\n";
print "<p>Address: ", escapeHTML($address), "</p>\n";
print "<p>City: ", escapeHTML($city), "</p>\n";
# Check if Postal Code entered has correct format
if ($postalcode =~ /^[A-Za-z]\d[A-Za-z] \d[A-Za-z]\d$/) {
    print "<p>Postal Code: ", escapeHTML($postalcode), "</p>\n";
} else {
    warningsToBrowser(1);  # Enable sending warnings to the browser
    warn "Warning: Postal Code has incorrect format.\n";
    print "<p>Postal Code: ", escapeHTML($postalcode), "<span style='color: red;'> Invalid Postal Code: Postal Code has incorrect format (Ex: L5L 5L5).</span></p>\n";
}

print "<p>Province: ", escapeHTML($province), "</p>\n";
# Check if Phone Number entered is in correct format
if ($phone =~ /^\d{10}$/) {
    print "<p>Phone: ", escapeHTML($phone), "</p>\n";
} else {
    warningsToBrowser(1);  # Enable sending warnings to the browser
    warn "Warning: Phone number must consist of exactly 10 digits.\n";
    print "<p>Phone: ", escapeHTML($phone), "<span style='color: red;'> Invalid Phone Number: Only 10 digits allowed, no spaces.</span></p>\n";
}
# Check if Email entered is in correct format
if ($email =~ /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/) {
    print "<p>Email: ", escapeHTML($email), "</p>\n";
} else {
    warningsToBrowser(1);  # Enable sending warnings to the browser
    warn "Email has incorrect format.\n";
    print "<p>Email: ", escapeHTML($email), "<span style='color: red;'> Invalid Email: Email is in incorrect format.</span></p>\n";
}

# Retrieve the uploaded file handle
my $upload_filehandle = upload('picture');

# Check if a file was uploaded
if ($upload_filehandle) {
    # Set the path to the directory where you want to save the uploaded images
    my $upload_dir = "/class-years/y2022/mquiroga/public_html/Images-perl/";

    # Get the original filename
    my $filename = param('picture');

    # Set the complete path for the uploaded file
    my $filepath = $upload_dir . $filename;

    # Save the uploaded file
    open my $file, '>', $filepath or die "Could not open file: $!";
    while (my $chunk = <$upload_filehandle>) {
        print $file $chunk;
    }
    close $file;

    # Display the uploaded image
    print "<h2>Image Uploaded Successfully</h2>";
    print "<img src='../Images-perl/$filename' alt='Uploaded Image'>";
} else {
    print "<h2>No image uploaded</h2>";
}




print "</body>\n";
print "</html>\n";