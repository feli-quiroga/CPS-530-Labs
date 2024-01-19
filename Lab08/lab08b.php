<?php
function getTable() {
    $rows = '';
    $columns = '';

    if (isset($_POST['rows']) && isset($_POST['columns'])) {
        $rows = $_POST['rows'];
        $columns = $_POST['columns'];
    } 

    $table = '<center><div>';
    $table .= '<table id="multi">';
    
    for ($i = 1; $i <= $rows; $i++) {
        $table .= '<tr>';
        for ($j = 1; $j <= $columns; $j++) {
            $table .= '<td>' . ($i * $j) . '</td>';
        }
        $table .= '</tr>';
    }
    
    $table .= '</table>';
    $table .= '</div></center>';

    return $table;
}

$output = getTable();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab08 Table</title>
    
    <link rel="stylesheet" href="lab8style.css">
</head>
<body>
    <section>
        <h2>Problem 2</h2> 
        <?php

        if (!is_array($output)) {
            echo $output;
        }
        ?>
    </section>
    <br>
    <h2>Go back to Previous Page:</h2>
    <a href="https://www.cs.ryerson.ca/~mquiroga/Lab08/lab08.php">Lab 8</a>
</body>
</html>