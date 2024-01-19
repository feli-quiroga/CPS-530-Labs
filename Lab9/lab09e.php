<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 9 Part E</title>
    <link rel="stylesheet" href="lab9.css">
</head>
<body>
    <h1>Random Image Generator:</h1>
    <?php
        $hostname = "localhost";
        $username = "mquiroga";
        $password = "8ws5h51B";
        $database = "mquiroga";

        $connect = mysqli_connect($hostname, $username, $password, $database) or die(mysqli_error());
        if($connect){
            echo "<div id='connectedTag'>Connected to MySQL Database <b>$database</b></div>";
            //Declare Table Name
            $tableName = "imageTable";

            //Get the number of entries the table has
            $result = mysqli_query($connect, "SELECT COUNT(*) as count FROM $tableName");
            $row = mysqli_fetch_assoc($result);
            $rowCount = $row['count'];
            //Get entries of the table
            $query = "SELECT * FROM $tableName";
            $resultb = mysqli_query($connect, $query);

            //Generate a random number within the range of entries of the table
            $randomNum = rand(1, $rowCount);
            //Declare a counter that will match the random number generated
            $counter=1;

            //Display total number of images in database
            echo "<div class='fixed-box'>";
            echo "Number of Imagesin Database: $rowCount";
            echo "</div>";

            //Now loop over the table entries and display the randomly selected image
            while ($row = mysqli_fetch_assoc($resultb)) {
                if ($randomNum == $counter){
                    $imagePath=$row['pic_URL'];
                    echo "<figure>";
                    echo "<img src=\"$imagePath\" alt='Image should go here'>";
                    echo "<figcaption>{$row['subject']}  {$row['location']}</figcaption>";
                    echo "</figure>";
                }
                $counter = $counter+1;
            }
        }
        else{
            echo "<div>Connection failed</div>";
        }
    ?>
    <a href="https://webdev.cs.torontomu.ca/~mquiroga/lab09a.php">Back to Part A</a>
</body>
</html>