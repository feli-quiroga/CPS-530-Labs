<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 9 Part A</title>
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
            echo "<div id='connectedTag'>Connected to MySQL Database <b>$database</b></div>";
            //Declare Table Name
            $tableName = "imageTable";
            
            //Check if a table with that name already exists by trying to grab an element from it
            $tableExists = mysqli_query($connect, "SELECT 1 FROM $tableName LIMIT 1");

            if(!$tableExists) {
                //Table does not exists, create one
                $createTable = "
                CREATE TABLE $tableName (
                    picNum INT AUTO_INCREMENT PRIMARY KEY,
                    subject VARCHAR(255),
                    location VARCHAR(255),
                    date_taken DATE,
                    pic_URL VARCHAR(255)
                )";
                $createTableRes = mysqli_query($connect, $createTable);
                
                //Test if table was created
                if($createTableRes){
                    echo "<div>Table Created Successfully</div>";
                }
                else{
                    echo "<div>Error creating Table $tableName</div>";
                }
            }
            else {
                echo "<div>Table Already Exists!</div>";
            }
            //Now that we're sure the Table exists it's time to add elements to it
            //But first check if the table is empty
            $result = mysqli_query($connect, "SELECT COUNT(*) as count FROM $tableName");
            $row = mysqli_fetch_assoc($result);
            $rowCount = $row['count'];

            if ($rowCount == 0) {
                echo "The table is empty. You can add elements to it.";
                $addItems = "
                INSERT INTO $tableName (subject, location, date_taken, pic_URL) 
                VALUES ('Wolf Lake', 'Alberta, BC', '2023-07-06', 'Images/wolflake.jpg');

                INSERT INTO $tableName (subject, location, date_taken, pic_URL) 
                VALUES ('Toronto Downtown', 'Toronto, ON', '2022-12-29', 'Images/torontodowntown.jpg');

                INSERT INTO $tableName (subject, location, date_taken, pic_URL) 
                VALUES ('Toronto Skyline', 'Toronto, ON', '2023-09-01', 'Images/toronto.jpg');

                INSERT INTO $tableName (subject, location, date_taken, pic_URL) 
                VALUES ('Cascada Tena', 'Napo, EC', '2023-05-24', 'Images/tenacascada.jpg');

                INSERT INTO $tableName (subject, location, date_taken, pic_URL) 
                VALUES ('Saint Joseph\'s Oratory', 'Montreal, QC', '2023-07-06', 'Images/oratorio.jpg');

                INSERT INTO $tableName (subject, location, date_taken, pic_URL) 
                VALUES ('Laguna del Quilotoa', 'Pichincha, EC', '2022-02-20', 'Images/lagunaquilotoa.jpg');

                INSERT INTO $tableName (subject, location, date_taken, pic_URL) 
                VALUES ('Laguna Azul', 'Napo, EC', '2023-07-06', 'Images/lagunaazul.jpg');

                INSERT INTO $tableName (subject, location, date_taken, pic_URL) 
                VALUES ('Athabasca Glacier', 'Alberta, BC', '2023-07-06', 'Images/glaciers.jpg');

                INSERT INTO $tableName (subject, location, date_taken, pic_URL) 
                VALUES ('Dundas Square', 'Toronto, ON', '2022-12-13', 'Images/dundassquare.jpg');

                INSERT INTO $tableName (subject, location, date_taken, pic_URL) 
                VALUES ('Athabasca Falls', 'Alberta, BC', '2023-07-08', 'Images/athabascafalls.jpg');
                ";

            if (mysqli_multi_query($connect, $addItems)) {
                echo "Multiple entries added.<br>";
            } else {
                echo "Error: " . $addItems . "<br>" . mysqli_error($connect);
            }
            } 
            else {
                echo "The table is not empty.";
            }
        }
        else{
            echo "<div>Connection failed</div>";
        }
    ?>
    <br>
    <a href="https://webdev.cs.torontomu.ca/~mquiroga/lab09b.php">Link to lab09b.php</a>
</body>
</html>