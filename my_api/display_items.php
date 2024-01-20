<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Items</title>
</head>
<body>
    <h1>Items:</h1>
    <ul>
<?php
    // Read items from the items.txt file
    $file = fopen("items.txt", "r");
    while (($line = fgets($file)) !== false) {
        echo "<li>" . htmlspecialchars($line) . "</li>";
    }
    fclose($file);
?>
    </ul>
</body>
</html>
