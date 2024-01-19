<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lab9.css">
    <title>Lab 9 Part C</title>
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
            echo "<center><h1>Images Taken in Ontario:</h1></center>";
            echo "<br>";

            // Retrieve and display the sorted data
            $query = "SELECT * FROM $tableName ORDER BY date_taken DESC"; // Change DESC to ASC for ascending order
            $result = mysqli_query($connect, $query);

            if ($result) {
                $ontarioTrue = false;
                echo "<div id='flexdiv'>";
                while ($row = mysqli_fetch_assoc($result)) {
                    if (preg_match('/ON$/', $row['location'])){
                        $ontarioTrue = true;
                        $imagePath=$row['pic_URL'];
                        echo "<figure>";
                        echo "<img src=\"$imagePath\" alt='Image should go here'>";
                        echo "<figcaption>{$row['subject']}  {$row['location']}</figcaption>";
                        echo "</figure>";
                    }
                }
                echo "</div>";
                if ($ontarioTrue == false){
                    echo "<div>There are no pictures taken in Ontario</div>";
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
    <a href="https://webdev.cs.torontomu.ca/~mquiroga/lab09d.php">Link to lab09d.php</a>
    <a href="https://webdev.cs.torontomu.ca/~mquiroga/lab09a.php">Back to Part A</a>
</body>
</html>