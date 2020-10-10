<?php
$link= mysqli_connect('localhost', 'root', 'kanjani8', 'dbp1');
$query = "SELECT * FROM language";
$result = mysqli_query($link, $query);
$list = '';
while ($row = mysqli_fetch_array($result)) {
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
}

$article = array(
  'title' => 'Welcome',
  'description' => 'This site is about languages.'
);

if (isset($_GET['id'])) {
    $query = "SELECT * FROM language WHERE id = {$_GET['id']}";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $article = array(
  'title' => $row['title'],
  'description' => $row['description']
);
}
$query = "SELECT * FROM country";
$result = mysqli_query($link, $query);
$select_form = '<select name="country_id">';
while ($row = mysqli_fetch_array($result)) {
    $select_form .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
}
$select_form .= '</select>'; // select_form에 모든 나라 이름들을 넣어준다.

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Language </title>
</head>
<body>
  <h1><a href="index.php"> Language </a></h1>
  <ol> <?= $list ?></ol>
    <form action="process_create.php" method="post">
      <p><input type="text" name="title" placeholder="title"></p>
      <p><textarea name="description" placeholder="description"></textarea></p>
      <?=$select_form?><!--제출버튼 위에서 나라 선택지가 있다.-->
      <p><input type="submit"> </p>
    </form>
</body>
</html>
