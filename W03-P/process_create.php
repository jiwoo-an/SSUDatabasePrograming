<?php
$link = mysqli_connect("localhost", "root", "kanjani8", "dbp1");

$filtered = array(
  'title' => mysqli_real_escape_string($link, $_POST['title']),
  'description' => mysqli_real_escape_string($link, $_POST['description'])
); //입력되는 것을 string으로 바꿔서 php문을 조작할 수 없게한다.

$query="
  INSERT INTO language
  (title, description, created)
  VALUES (
    '{$filtered['title']}',
    '{$filtered['description']}',
    now()
    )
 ";

$result = mysqli_multi_query($link, $query); // 멀티쿼리로 넣을 경우 인젝션이 발생할 수 있다
if ($result == false) {
    echo '저장하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
    error_log(mysqli_error($link));
} else {
    echo '성공했습니다. <a href="index.php">돌아가기</a>';
}
