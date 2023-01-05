<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>人工入力画面</title>
</head>

<body>
  <form action="human_work_create.php" method="POST">
    <fieldset>
      <legend>メンテナンス人工（入力画面）</legend>
      <a href="human_work_read.php">一覧画面</a>
      <div>
        弁種:<input type="text" name ="kinds">
      </div>
      <div>
        圧力級:<input type="text" name ="power">
      </div>
      <div>
        口径: <input type="text" name ="size">     
      </div>
      <div>
        工数: <input type="text" name ="human_work">
      </div>
      <div>
        複数割り: <input type="text" name ="human_work_discount">
      </div>
      <div>
        電動弁: <input type="text" name ="human_Ework">
      </div>
      <div>
        電動弁複数割り: <input type="text" name ="human_Ework_discount">
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>