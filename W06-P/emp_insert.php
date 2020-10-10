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


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>직원 관리 시스템</title>
</head>
<body>
    <h2><a href="index.php">직원 관리 시스템</a> | 신규 직원 등록</h2>
    <form action="emp_insert_process.php" method="POST"> 
        <label>직원 번호: </label>
        <input type="text" name="emp_no" placeholder="except <?= $range['start'] ?>~<?= $range['end']?>"><br>
        <label>birth_date: </label>
        <input type="text" name="birth_date" placeholder="ex. 2000-04-09"><br>
        <label>first_name: </label>
        <input type="text" name="first_name" placeholder="first_name"><br>
        <label>last_name: </label>
        <input type="text" name="last_name" placeholder="last_name"><br>
        <label>gender:</label>
        <select name="gender">
            <option value="F">Female</option>
            <option value="M">Male</option>
        </select><br>
        <label>hire_date:</label>
        <input type="text" name="hire_date" placeholder="ex. 2020-10-01"><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>
