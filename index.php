<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Friend book</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<header>

    Friend book
</header>
<form action="index.php" method="post">
    Name: <input type="text" name="name">
    <input type="submit" value="Add a friend">
</form>


<?php
$filename = 'friends.txt';
$nameFilter = null;
if (isset($_POST["name"])){
    $name = $_POST["name"]."\n";
}
$file = fopen( $filename, "a" );
fwrite( $file, $name );
fclose($file);
?>
<h1>


    My best friends
</h1>
<p>
    <?php
    $file = fopen( $filename,"r" );
    $line = fgets($file);
    echo "<ul>";
    while (!feof($file)){
        if ($_POST['nameFilter'] and $_POST['nameFilter'] != ''){
            $line = strstr($line, $_POST['nameFilter']);
        }
        if ($line != '')
        {
            echo "<li>$line</li>";
        }
        $line = fgets($file);
    }
    echo "</ul>";
    fclose($file);
    ?>


</p>
<form action="index.php" method="post">
    Filter:<input type="text" name="nameFilter" value="<?=$nameFilter?>">
    <input type="submit" value="Filter list">

    
</form>
</body>
<footer>
     footer
</footer>
</html>