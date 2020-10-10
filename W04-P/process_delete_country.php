<?php
  $link = mysqli_connect("localhost", "root", "kanjani8", "dbp1");
  settype($_POST['id'], 'integer');
  $filtered = array(
    'id' => mysqli_real_escape_string($link, $_POST['id'])
    );

  $query = "
    DELETE
      FROM country
      WHERE id = '{$filtered['id']}'
  ";
  $query_delete_language = "
    DELETE FROM language WHERE country_id = '{$filtered['id']}'
  ";


  $result = mysqli_query($link, $query); // 나라 삭제
  $result2 = mysqli_query($link, $query_delete_language); // 연결된 언어 삭제
  if ($result == false) {
      echo '삭제하는 과정에서 문제가 발생했습니다. 관라자에게 문의하세요.';
      error_log(mysqli_error($link));
  } else {
      header('Location: country.php');
  }
