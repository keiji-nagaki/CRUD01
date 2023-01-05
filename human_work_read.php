<?php
$dbn ='mysql:dbname=gsf_d12_14;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';
// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}


// SQL作成&実行
$sql = "SELECT * FROM メンテナンス工数";
$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// var_dump($result);
// echo "</pre>";
// exit();

$str = "";
foreach ($result as $record) {
  $str .= "
    <tr>
      <td>{$record["弁種"]}</td>
      <td>{$record["圧力級"]}</td>
      <td>{$record["口径"]}</td>
      <td>{$record["工数"]}</td>
      <td>{$record["複数台工数"]}</td>
      <td>{$record["電動弁工数"]}</td>
      <td>{$record["電動弁複数台工数"]}</td>
    </tr>
  ";
}


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型todoリスト（一覧画面）</title>
</head>

<body>
  <fieldset>
    <legend>DB連携型todoリスト（一覧画面）</legend>
    <a href="human_work_input.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>deadline</th>
          <th>todo</th>
        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
          <?=$str?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>