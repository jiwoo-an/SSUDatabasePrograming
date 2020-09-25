<?php
$link= mysqli_connect('localhost', 'root', 'kanjani8', 'dbp1');
$query = "SELECT * FROM country";
$result = mysqli_query($link, $query);
$country_info = '';


while ($row = mysqli_fetch_array($result)) {
    $filtered = array(
  'id' => htmlspecialchars($row['id']),
  'name' => htmlspecialchars($row['name']),
  'description' => htmlspecialchars($row['description'])
);
    $country_info.='<tr>';
    $country_info .= '<td>'.$filtered['id'].'</td>';
    $country_info .= '<td>'.$filtered['name'].'</td>';
    $country_info .= '<td>'.$filtered['description'].'</td>';
    $country_info .= '<td><a href="country.php?id='.$filtered['id'].'" >update</a></td>';
    $country_info .= '
  <td>
    <form action="process_delete_country.php" method="post">
      <input type = "hidden" name="id" value="'.$filtered['id'].'">
      <input type = "submit" value="delete">
    </form>
  </td>';
    $country_info .='</tr>';
}
$escaped = array(
  'name' => '',
  'description' => ''
);

$form_action = 'process_create_country.php';
$label_submit = 'Create country';
$form_id = '';




if (isset($_GET['id'])) {
    $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
    settype($filtered_id, 'integer');
    $query = "SELECT * FROM country WHERE id = {$filtered_id}";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $escaped['name'] = htmlspecialchars($row['name']);
    $escaped['description'] = htmlspecialchars($row['description']);

    $form_action = 'process_update_country.php';
    $label_submit = 'Update country';
    $form_id =  '<input type = "hidden" name = "id" value = "'.$_GET['id'].'">';
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Language</title>
</head>
<body>
  <h1><a href="index.php">Language</a> </h1>

  <table border="1">
    <tr>
      <th>id</th>
      <th>name</th>
      <th>description</th>
      <th>update</th>
      <th>delete</th>
    </tr>
      <?= $country_info ?>
  </table>
  <br>
  <form action="<?=$form_action ?>" method="post">
    <?= $form_id ?>
    <label for="name">name:</label><br>
    <input type="text" id="name" name="name" placeholder="name" value="<?=$escaped['name']?>"><br>
    <label for="description">description:</label><br>
    <input type="text" id="description" name="description" placeholder="description" value="<?=$escaped['description']?>"><br><br>
    <input type="submit" value="<?= $label_submit ?>">
  </form>

</body>
</html>
