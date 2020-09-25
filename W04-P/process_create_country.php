<?php
$link = mysqli_connect("localhost", "root", "kanjani8", "dbp1");

$filtered = array(
  'title' => mysqli_real_escape_string($link, $_POST['name']),
  'description' => mysqli_real_escape_string($link, $_POST['description'])
); //입력되는 것을 string으로 바꿔서 php문을 조작할 수 없게한다.

$query="
  INSERT INTO country
  (name, description)
  VALUES (
    '{$filtered['name']}',
    '{$filtered['description']}'
    )
 ";

$result = mysqli_multi_query($link, $query); // 멀티쿼리로 넣을 경우 인젝션이 발생할 수 있다
if ($result == false) {
    echo '저장하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
    error_log(mysqli_error($link));
} else {
    header('Location: country.php');
}
