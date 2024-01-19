<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lab8style.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600;700&amp;family=Poppins:ital,wght@0,400;1,900&amp;family=Raleway&amp;family=Roboto+Condensed:wght@100&amp;display=swap" rel="stylesheet">
    <title>Lab 8</title>
    <link rel="stylesheet" href="lab9.css">
    <style>
        <?php
        $current_time = date("H");

        if ($current_time >= 21){
            $imageback = "pictures/sanfran.jpg";
        }
        else if ($current_time >= 17){
            $imageback = "pictures/panecillo.jpg";
        }
        else if ($current_time >= 12){
            $imageback = "pictures/coto.jpg";
        }
        else{
            $imageback = "pictures/playa.jpg";
        }
        echo ".full-screen-div { background-image: url('$imageback');}";
        ?>
    </style>
</head>
<body>
    <div class="full-screen-div">
        <?php
        $current_time = date("H");

        if ($current_time >= 21){
            echo "<h1 class='message'>Good Night!</h1>";
        }
        else if ($current_time >= 17){
            echo "<h1 class='message'>Good Evening!</h1>";
        }
        else if ($current_time >= 12){
            echo "<h1 class='message'>Good Afternoon!</h1>";
        }
        else{
            echo "<h1 class='message'>Good Morning!</h1>";
        }
        ?>
    </div>
    <br>
    <center><h1 class='other-message'>Enter Two Numbers Between 3 and 12 to Generate a Table</h1></center>

    <center><form class='other-message' action="lab08b.php" target="_blank" method="post">
        <label for="rows">Rows:</label>
        <input type="number" id="rows" name="rows" min='3' max='12' required >

        <br>

        <label for="columns">Columns:</label>
        <input type="number" id="columns" name="columns" min='3' max='12' required>

        <br>

        <input type="submit" value="Generate Table">
    </form></center>

    <div id="hit-counter">
        <?php
        if(isset($_COOKIE['visit-counter'])){
            $views = $_COOKIE['visit-counter'];
            setcookie('visit-counter', $views+1, $inTwoMonths);
            echo "Views by you: ". $views;
            
        }
        else{
            $inTwoMonths = 60 * 60 * 24 * 60 + time(); 
            setcookie('visit-counter', 1, $inTwoMonths);
            $views = $_COOKIE['visit-counter'];
            echo "Views by you: 1". $views;

        }
        ?>
    </div>
    <div>
    <a href="?image=jack01.gif"> jack01.gif</a>
    <a href="?image=ghost3.gif"> ghost3.gif</a>
    <a href="?image=cauldron1.gif"> cauldron1.gif</a> 
    </div>
    <?php
    $image = ''; 
    $imageName = '';
    
    if (isset($_GET['image'])) {
        $imageName = $_GET['image'];
        #echo "$imageName";
        if($imageName=='jack01.gif'){
            $image='jack01.gif';
            $imageName = 'Halloween image is jack01.gif';
        }
        else if($imageName=='ghost3.gif'){
            $image='ghost3.gif';
            $imageName = 'Halloween image is ghost3.gif';
        }
        else if ($imageName=='cauldron1.gif'){
            $image='cauldron1.gif';
            $imageName = 'Halloween image is cauldron1.gif';
        }
    echo "<br>";
    echo "$imageName";
    }
    ?>
    <img src="<?php echo $image; ?>" alt="<?php echo $imageName; ?> "class="halloween-pic">
    <br>
</body>
</html>