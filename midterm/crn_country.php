
<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'CORONA19');

    if(mysqli_connect_errno()){
        echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요.";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }

    $query = "
        SELECT CountryRegion
        FROM corona19_data
        GROUP BY CountryRegion
        ORDER BY CountryRegion;
    ";
    $result = mysqli_query($link, $query);
    $article = '';
    //echo mysqli_error($link);

    while($row = mysqli_fetch_array($result)){
        $article .= '<tr><td>';
        $article .= $row['CountryRegion'];
        $article .= '</td></tr>';
    }

    mysqli_free_result($result);
    mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>국가별 코로나 정보 검색</title>
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
        <h2><a href="index.php">CORONA19 데이터 분석 서비스</a> | 국가별 검색 </h2>
        아래 리스트에 있는 나라의 코로나 데이터를 검색할 수 있습니다.
        <form action="crn_country_search.php" method="GET">
        나라 이름:
        <input type = "text" name = "country" placeholder="영어로 입력">
        <input type = "submit" value="Search">

        <table>
            <tr>
                <th>나라 이름</th>
            </tr>
            <?=$article?>
        </table>
</body>
</html>