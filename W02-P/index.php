<?php
$link= mysqli_connect('localhost','root','kanjani8','dbp1');
$query = "SELECT * FROM language";
$result = mysqli_query($link, $query);
$list = '';
while ($row = mysqli_fetch_array($result)){
  $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
}

$article = array(
  'title' => 'Welcome',
  'description' => 'This site is about languages.'
);

if(isset($_GET['id'])){
$query = "SELECT * FROM language WHERE id = {$_GET['id']}";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
$article = array(
  'title' => $row['title'],
  'description' => $row['description']
);
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Language</title>
</head>
<body>
    <img src="https://img.freepik.com/free-vector/illustration-language-concept_53876-20610.jpg?size=626&ext=jpg" alt="languages" width="250" />
  <h1><a href="index.php">Language</a> </h1>

  <ol> <?= $list ?></ol>
    <a href="create.php">추가하기</a>

  <h2><?= $article['title'] ?></h2>
<?= $article['description'] ?>
</body>
</html>
