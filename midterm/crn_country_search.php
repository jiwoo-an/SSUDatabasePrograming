<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'CORONA19');

    if(mysqli_connect_errno()){
        echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요.";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }
    $filtered_string = mysqli_real_escape_string($link, $_GET['country']);
    
    $query = "
        SELECT CountryRegion, ProvinceState, Confirmed, Deaths, Recovered
        FROM corona19_data
        WHERE ObservationDate='2020-09-23' and CountryRegion='".$filtered_string."'
        ORDER BY Confirmed DESC
        "
    ;
    $article = '';

    $result = mysqli_query($link, $query);

    while($row = mysqli_fetch_array($result)){
        $article .= '<tr><td>';
  $article .= $row['CountryRegion'];
  $article .= '</td><td>';
  $article .= $row['ProvinceState'];
  $article .= '</td><td>';
  $article .= $row['Confirmed'];
  $article .= '</td><td>';
  $article .= $row['Deaths'];
  $article .= '</td><td>';
  $article .= $row['Recovered'];
  $article .= '</td></tr>';
    }

    mysqli_free_result($result);
    mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>코로나 데이터_<?=$filtered_string?></title>
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
        <h2><a href="index.php">CORONA19 데이터 분석 서비스</a> | <?=$filtered_string?>의 결과</h2>
        <table>
            <tr>
                <th>나라</th>
                <th>지역</th>
                <th>확진자 수</th>
                <th>사망 수</th>
                <th>회복 수</th>
            </tr>
            <?=$article?>
        </table>
</body>
</html>