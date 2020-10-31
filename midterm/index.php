<?php
    $link = mysqli_connect("localhost", "admin", "admin", "CORONA19");
    $query1 = "SELECT * FROM corona19_data  ORDER BY SNo LIMIT 1"; // 첫번째 확진자 데이터 SELECT
    $query2 = "SELECT * FROM corona19_data ORDER BY SNo DESC LIMIT 1"; // 마지막 확진자데이터 SELECT
    $result = mysqli_query($link, $query1);
    $row1 = mysqli_fetch_array($result);

    $result = mysqli_query($link, $query2);
    $row2 = mysqli_fetch_array($result);

    $range = array( // 데이터 관찰일의 시작과 끝이 나타난다. (2020.1.22 ~2020.9.23)
        'start' => $row1['ObservationDate'],
        'end' => $row2['ObservationDate']
      );

    $query = "
      SELECT ObservationDate, CountryRegion, ProvinceState, Confirmed, Deaths, Recovered  
      FROM corona19_data
      WHERE ObservationDate='2020-09-23'
      ORDER BY Confirmed DESC LIMIT 10";
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

  $query = "
  SELECT ObservationDate, CountryRegion, ProvinceState, Confirmed, Deaths
  FROM corona19_data
  WHERE ObservationDate='2020-09-23'
  ORDER BY Deaths DESC LIMIT 10";
$article2 = '';

$result = mysqli_query($link, $query);

while($row = mysqli_fetch_array($result)){
  $article2 .= '<tr><td>';
  $article2 .= $row['CountryRegion'];
  $article2 .= '</td><td>';
  $article2 .= $row['ProvinceState'];
  $article2 .= '</td><td>';
  $article2 .= $row['Confirmed'];
  $article2 .= '</td><td>';
  $article2 .= $row['Deaths'];
  $article2 .= '</td></tr>';
}

mysqli_free_result($result);

  mysqli_close($link);
?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CORONA19 데이터 분석 서비스</title>
    <style>
        body{
            font-family: Consolas, monospace;
            font-family: 12px;
        }
        table{
            width: 40%;
            
        }
        th, td{
            padding: 10px;
            border-bottom: 1px solid #dadada;
        }
    </style>
</head>
<body>
    <h1>CORONA19 데이터 분석 서비스</h1>
    <br/>
    확진 많은 지역 TOP 10
    <br/>
        <table>
            <tr>
                <th>나라 이름</th>
                <th>지역 이름</th>
                <th>확진자 수</th>
                <th>사망 수</th>
                <th>회복 수</th>
                
            </tr>
            <?=$article?>
    </table>

    <br/><br/><br/>
    사망자 많은 나라 TOP 10
    <table>
            <tr>
                <th>나라 이름</th>
                <th>지역 이름</th>
                <th>확진자 수</th>
                <th>사망 수</th>
            </tr>
            <?=$article2?>
    </table>
    <br/>
    <br/>
    <a href = "crn_confirmed.php">(1)최신 확진자 정보(전 지역)</a><br><br/>
    <form action="crn_date.php" method="POST"> 
        (2) 날짜별 각국 확진 정보:
        <input type='date' name='date'/>
        <input type = "submit" value="Search">
        <h6>주의: 입력 가능 범위는 <?= $range['start'] ?> ~ <?= $range['end']?>이다.</h6>
    </form><br/>
    <a href = "crn_country.php"> (3) 나라 이름으로 정보 검색하기</a><br><br/>

    <br><h5>※이 데이터는  <?= $range['start'] ?> 부터 <?= $range['end']?>사이의 기록입니다.</h5>
    <br><h5>※US의 회복 수는 지역별로 집계되지 않아 0으로 나타나고, US의 'Recovered' 지역에 통합되어 나타납니다.</h5>
</body>
</html>
