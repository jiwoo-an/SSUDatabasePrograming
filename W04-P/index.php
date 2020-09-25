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

$update_link = '';
$delete_link = '';
$country = '';

if (isset($_GET['id'])) {
    $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
    $query = "SELECT * FROM language LEFT JOIN country ON language.country_id = country.id WHERE language.id = {$filtered_id}";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $article['title'] = htmlspecialchars($row['title']);
    $article['description'] = htmlspecialchars($row['description']);
    $article['name'] = htmlspecialchars($row['name']); // 나라이름

    $update_link = '<a href="update.php?id='.$_GET['id'].'">수정하기</a>';
    $delete_link = '<a href="delete.php?id='.$_GET['id'].'">삭제하기</a>';
    // 정말 삭제하시겠습니까? 페이지로 이동

    $country = "<p>Widely spoken language in {$article['name']}</p>"; // 언어 설명페이지에서 어느나라에서 쓰이는지가 나타난다.
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
  <a href="country.php">Country</a>
  <ol> <?= $list ?></ol>
  <a href="create.php">추가하기</a>
  <?= $update_link ?>
  <?= $delete_link ?>
  <h2><?= $article['title'] ?></h2>
    <?= $article['description'] ?>
    <?= $country?>
</body>
</html>
