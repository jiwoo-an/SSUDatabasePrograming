<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'employees');

    if(mysqli_connect_errno()){
        echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요.";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }
    $filtered_year = mysqli_real_escape_string($link, $_POST['year']);
    
    $query = "
        SELECT count(*)
        FROM employees
        where year(hire_date)=".$filtered_year."
    ";
    $result_count = mysqli_query($link, $query);
    $count = mysqli_fetch_array($result_count);


    
    $query = "
        SELECT employees.emp_no, first_name, last_name, hire_date, title
        FROM titles
        left join employees on employees.emp_no = titles.emp_no
        where year(hire_date)=".$filtered_year."
    ";

    $article = '';
    
    $result = mysqli_query($link, $query);
    
    while($row = mysqli_fetch_array($result)){
        $article .= '<tr><td>';
        $article .= $row['emp_no'];
        $article .= '</td><td>';
        $article .= $row['first_name'];
        $article .= '</td><td>';
        $article .= $row['last_name'];
        $article .= '</td><td>';
        $article .= $row['title'];
        $article .= '</td><td>';
        $article .= $row['hire_date'];
        $article .= '</td></tr>';
    }

    mysqli_free_result($result);
    mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?=$filtered_year?>년도 입사 직원 정보</title>
    <style>
        body{
            font-family: Consolas, monospace;
            font-family: 12px;
        }
        table{
            width: 100%;
        }
        th, td{
            padding: 10px;
            border-bottom: 1px solid #dadada;
        }
    </style>
</head>
<body>
        <h2><a href="index.php">직원 관리 시스템</a> | <?=$filtered_year?>년도 입사정보 </h2>
        총 <?=$count['count(*)']?> 명
        <table>
            <tr>
                <th>emp_no</th>
                <th>first_name</th>
                <th>last_name</th>
                <th>title</th>
                <th>hire_date</th>
            </tr>
            <?=$article?>
        </table>
</body>
</html>