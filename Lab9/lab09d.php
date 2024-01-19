<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 9 Part D</title>
    <link rel="stylesheet" href="lab9.css">
</head>
<body>
<?php
        $hostname = "localhost";
        $username = "mquiroga";
        $password = "8ws5h51B";
        $database = "mquiroga";

        $connect = mysqli_connect($hostname, $username, $password, $database) or die(mysqli_error());
        if($connect){
            $tableName = "imageTable";
            echo "<div id='connectedTag'>Connected to MySQL Database <b>$database</b></div>";
            echo "<center><h1>Select Options from the Form Bellow:</h1></center>";

            // Retrieve and display the sorted data
            $query = "SELECT * FROM $tableName ORDER BY date_taken DESC"; // Change DESC to ASC for ascending order
            $result = mysqli_query($connect, $query);
            $resultb = mysqli_query($connect, $query);
            $resultc = mysqli_query($connect, $query);


            if ($result) {

                //Arrays that will store the locations and years the pictures were taken
                $locations = array();
                $years = array();

                echo '<center><form action="" method="post">';

                // Dropdown select box for locations
                echo '<label for="location">Select a Location:</label>';
                echo '<select name="location" id="location">';
                
                // Loop through the result set and populate the select box options
                while ($row = mysqli_fetch_assoc($result)) {
                    if(in_array($row['location'], $locations)){
                        continue;
                    }
                    else{
                        $locations[] = $row['location'];
                        echo '<option value="' . $row['location'] . '">' . $row['location'] . '</option>';
                    }
                }
                echo '</select>';

                //Dropdown select box for years
                echo "<br>";
                echo '<label for="years">Select a year:</label>';
                echo '<select name="years" id="years">';
                
                // Loop through the result set and populate the select box options
                while ($row = mysqli_fetch_assoc($resultb)) {
                    $yearTaken= substr($row['date_taken'], 0, 4);
                    if(in_array($yearTaken, $years)){
                        continue;
                    }
                    else{
                        $years[] = $yearTaken;
                        echo '<option value="' . $yearTaken . '">' . $yearTaken . '</option>';
                    }
                }
                echo '</select>';


                // Submit button
                echo "<br>";
                echo '<input type="submit" value="Submit">';
                
                // Close form
                echo '</form></center>';

                // Check if the form is submitted
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Process the form data
                    echo "<div id='flexdiv'>";
                    if (isset($_POST['location']) && isset($_POST['years'])) {
                        $selectedLocation = $_POST['location'];
                        $selectedYear = $_POST['years'];
                        while ($row = mysqli_fetch_assoc($resultc)) {
                            if (($selectedYear == substr($row['date_taken'], 0, 4)) && ($selectedLocation ==  $row['location'])){
                                $imagePath=$row['pic_URL'];
                                echo "<figure>";
                                echo "<img src=\"$imagePath\" alt='Image should go here'>";
                                echo "<figcaption>{$row['subject']}  {$row['location']}</figcaption>";
                                echo "</figure>";
                            }
                        }
                        echo "</div>";
                    } else {
                        echo "<p>No option selected.</p>";
                    }
                }

            } 
            else {
                echo "Error retrieving data: " . mysqli_error($connect);
            }
        }
        else{
            echo "<div>Error Connecting to $database</div>";
        }
    ?>
    <br>
    <br>
    <br>
    <a href="https://webdev.cs.torontomu.ca/~mquiroga/lab09e.php">Link to lab09e.php</a>
    <a href="https://webdev.cs.torontomu.ca/~mquiroga/lab09a.php">Back to Part A</a>
</body>
</html>