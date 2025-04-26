<?php
include '../includes/db.php';
// Обработка отправки формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $title = pg_escape_string($_POST['title']);
   $content = pg_escape_string($_POST['content']);
  
   $result = pg_query_params(
       $conn,
       "INSERT INTO articles (title, content) VALUES ($1, $2)",
       [$title, $content]
   );
  
   if ($result) {
       header("Location: /articles.php");
       exit;
   } else {
       echo "Ошибка: " . pg_last_error($conn);
   }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Добавить статью</title>
</head>
<body>
    <h1>Добавить статью</h1>
    <form method="post" action="/pages/add_article.php">
        <label for="title">Заголовок:</label><br>
        <input type="text" id="title" name="title"><br><br>

        <label for="content">Содержание:</label><br>
        <textarea id="content" name="content" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="Сохранить">
    </form>
</body>
</html>
