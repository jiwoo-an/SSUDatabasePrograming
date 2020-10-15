<?php
    $link = mysqli_connect("localhost", "admin", "admin", "employees");
    $query1 = "SELECT * FROM employees  LIMIT 1"; // 첫번째 직원 SELECT
    $query2 = "SELECT * FROM employees ORDER BY emp_no DESC LIMIT 1"; // 마지막직원 SELECT
    $result = mysqli_query($link, $query1);
    $row1 = mysqli_fetch_array($result);

    $result = mysqli_query($link, $query2);
    $row2 = mysqli_fetch_array($result);

    $range = array( // 직원의 범위를 나타내는 숫자가 담겨있다.
        'start' => $row1['emp_no'],
        'end' => $row2['emp_no']
      );


?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>직원 관리 시스템</title>
</head>
<body>
    <h1>직원 관리 시스템</h1>
    <form action="emp_select.php" method="POST">
       (1) 직원 정보 조회
        <input type = "int" name = "number" placeholder="조회할 인원수 선택">
        <input type = "submit" value="Select">
    </form>
    <a href = "emp_insert.php">(2) 신규 직원 등록</a><br>
    <form action="emp_update.php" method="POST">
        (3) 직원 정보 수정:
        <input type = "text" name = "emp_no" placeholder="emp_no">
        <input type = "submit" value="Search">
    </form>
    <form action="emp_delete.php" method="POST">
        (4) 직원 정보 삭제:
        <input type = "text" name = "emp_no" placeholder="emp_no">
        <input type = "submit" value="Delete">
    </form>
    <form action="salary_info.php" method="GET">
        (5) 연봉 정보
        <input type = "text" name = "numb" placeholder="number">
        <input type = "submit" value="Search">
    </form>

    <br><h5>※직원은 <?= $range['start'] ?>번 부터<?= $range['end']?>번까지 등록되어있다.</h5>
</body>
</html>
