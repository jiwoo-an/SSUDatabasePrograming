<?php
  $link = mysqli_connect("localhost", "root", "kanjani8", "dbp1");

  $filtered = array(
    'id' => mysqli_real_escape_string($link, $_POST['id']),
    'name' => mysqli_real_escape_string($link, $_POST['name']),
    'description' => mysqli_real_escape_string($link, $_POST['description'])
    );

  $query = "
    UPDATE country
      SET
        name = '{$filtered['name']}',
        description = '{$filtered['description']}'
      WHERE
        id = '{$filtered['id']}'
  ";


  $result = mysqli_query($link, $query);
  if ($result == false) {
      echo '수정하는 과정에서 문제가 발생했습니다. 관라자에게 문의하세요.';
      error_log(mysqli_error($link));
  } else {
      header('Location: country.php');
  }
