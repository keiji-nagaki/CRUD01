<?php
// POSTデータ確認
// var_dump($_POST);
// exit();

if(
    !isset($_POST["kinds"])||$_POST["kinds"]===""||
    !isset($_POST["power"])||$_POST["power"]===""||
    !isset($_POST["size"])||$_POST["size"]===""||
    !isset($_POST["human_work"])||$_POST["human_work"]===""||
    !isset($_POST["human_work_discount"])||$_POST["human_work_discount"]===""||
    !isset($_POST["human_Ework"])||$_POST["human_Ework"]===""||
    !isset($_POST["human_Ework_discount"])||$_POST["human_Ework_discount"]===""
    ){
        exit("ParamError");
    }
$kinds = $_POST["kinds"];
$power = $_POST["power"];
$size = $_POST["size"];
$human_work = $_POST["human_work"];
$human_work_discount = $_POST["human_work_discount"];
$human_Ework = $_POST["human_Ework"];
$human_Ework_discount = $_POST["human_Ework_discount"];

// 圧力級の確認
// var_dump($power);
// exit();




// 各種項目設定
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

// 「dbError:...」が表示されたらdb接続でエラーが発生していることがわかる．


// SQL作成&実行
$sql = 'INSERT INTO メンテナンス工数 (id, 弁種, 圧力級, 口径, 工数, 複数台工数, 電動弁工数, 電動弁複数台工数, created_at, updated_at)
 VALUES (NULL, :kinds, :power, :size, :human_work, :human_work_discount, :human_Ework, :human_Ework_discount, now(), now())';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':kinds', $kinds, PDO::PARAM_STR);
$stmt->bindValue(':power', $power, PDO::PARAM_STR);
$stmt->bindValue(':size', $size, PDO::PARAM_STR);
$stmt->bindValue(':human_work', $human_work, PDO::PARAM_STR);
$stmt->bindValue(':human_work_discount', $human_work_discount, PDO::PARAM_STR);
$stmt->bindValue(':human_Ework', $human_Ework, PDO::PARAM_STR);
$stmt->bindValue(':human_Ework_discount', $human_Ework_discount, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:human_work_input.php");
exit();
