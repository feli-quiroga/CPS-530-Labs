<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lab9.css">
    <title>Lab 9 Part B</title>
</head>
<body>
    <h1>Image Table:</h1>
    <?php
        $hostname = "localhost";
        $username = "mquiroga";
        $password = "8ws5h51B";
        $database = "mquiroga";

        $connect = mysqli_connect($hostname, $username, $password, $database) or die(mysqli_error());
        if($connect){
            $tableName = "imageTable";
            echo "<div id='connectedTag'>Connected to MySQL Database <b>$database</b></div>";

            // Retrieve and display the sorted data
            $query = "SELECT * FROM $tableName ORDER BY date_taken DESC"; // Change DESC to ASC for ascending order
            $result = mysqli_query($connect, $query);

            if ($result) {
                echo "<table border='1'>
                        <tr>
                            <th>Pic Number</th>
                            <th>Subject</th>
                            <th>Location</th>
                            <th>Date Taken</th>
                            <th>Pic URL</th>
                        </tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['picNum']}</td>
                            <td>{$row['subject']}</td>
                            <td>{$row['location']}</td>
                            <td>{$row['date_taken']}</td>
                            <td>{$row['pic_URL']}</td>
                        </tr>";
                }

                echo "</table>";
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
    <a href="https://webdev.cs.torontomu.ca/~mquiroga/lab09c.php">Link to lab09c.php</a>
    <a href="https://webdev.cs.torontomu.ca/~mquiroga/lab09a.php">Back to Part A</a>
</body>
</html>