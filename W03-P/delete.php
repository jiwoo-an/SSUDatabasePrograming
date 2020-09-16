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
    $filtered_id = mysqli_real_escape_string($link, $_GET['id']); // 보안을 위해 받는 id도 스트링으로 바꿔준다.
    $query = "SELECT * FROM language WHERE id = {$filtered_id}";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $article = array(
  'title' => $row['title'],
  'description' => $row['description']
);
    $delete_link = '
  <form action = "process_delete.php" method = "POST">
  <input type="hidden" name="id" value="'.$_GET['id'].'">
  <input type="submit" value="delete">
  </form>
';
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Language </title>
</head>
<body>
  <h1><a href="index.php"> Language </a></h1>
    <?= $article['title']?>를  정말 삭제하시겠습니까?
    <?= $delete_link ?>
  </form>

</body>
</html>
