#!/usr/bin/env python

import cgi

# Retrieve entered form values
form = cgi.FieldStorage()
img = form.getvalue('cityImage', '')
country = form.getvalue('country', '').upper()
city = form.getvalue('city', '').upper()

# Check if a province was entered
if 'province' in form:
    province = form.getvalue('province', '').upper()
else:
    province = "" # No province entered


# Display actual HTML webpage with entered data
print "Content-type: text/html\n\n"

print """
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CGI PYTHON LAB 10</title>
  <style>
    body {{

        font-family: Times New Roman, sans-serif;
        padding: 0;
        margin: 0;

        }}
        .titulo {{

        text-align: center;
        font-size: 69px;
        background-color: #CD5C5C; 
        color: #6495ED;

        }}
        .img-contenedor {{

        width: 80%;
        border: 10px solid #CCCCFF;
        margin: 20px auto;

        }}
        img {{
        
        height: auto;
        display: block;
        width: 100%;

        }}
  </style>
</head>
<body>
    <div class="titulo">
    {0}, {1}
    </div>
    <div class="img-contenedor">
        <img src='{2}' alt="image of city entered">
    </div>
</body>
</html>
""".format(city, province, country, img)