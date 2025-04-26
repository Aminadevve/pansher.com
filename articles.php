<!DOCTYPE html>
<html>
<head>
    <title>Список статей</title>
    <style>
        .article {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Список статей</h1>
<?php
include 'includes/db.php';
$result = pg_query($conn, "SELECT * FROM articles ORDER BY created_at DESC");
while ($row = pg_fetch_assoc($result)) {
   echo "<div class='article'>
           <h2>{$row['title']}</h2>
           <p>{$row['content']}</p>
           <small>{$row['created_at']}</small>
         </div>";
}
?>
</body>
</html>

