<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'employees');

    if(mysqli_connect_errno()){
        echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요.";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }

    $query = "
        SELECT dept_name, count(*)
        FROM dept_emp
        left join departments on departments.dept_no = dept_emp.dept_no
        where to_date='9999-01-01'
        group by dept_name
        order by dept_name
    ";
    $result = mysqli_query($link, $query);
    $article = '';
    //echo mysqli_error($link);

    while($row = mysqli_fetch_array($result)){
        $article .= '<tr><td>';
        $article .= $row['dept_name'];
        $article .= '</td><td>';
        $article .= $row['count(*)'];
        $article .= '</td></tr>';
    }

    mysqli_free_result($result);
    mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?=$filtered_year?>부서 별 직원 수</title>
    <style>
        body{
            font-family: Consolas, monospace;
            font-family: 12px;
        }
        table{
            /* width: 100%; */
        }
        th, td{
            padding: 10px;
            border-bottom: 1px solid #dadada;
        }
    </style>
</head>
<body>
        <h2><a href="index.php">직원 관리 시스템</a> | 부서별 직원 수 </h2>
        <table>
            <tr>
                <th>dept_name(부서 명)</th>
                <th>count</th>
            </tr>
            <?=$article?>
        </table>
</body>
</html>