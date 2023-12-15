
<?php
//1.  DB接続します

// 複数のページで関数を使用する場合に必要となるコード
require_once("funcs.php");

try {
  //ID:'root', Password: xamppは 空白 ''
  $pdo = new PDO('mysql:dbname=gs_php2;charset=utf8;host=localhost','root',"");
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}


//２．データ取得SQL作成
// フォームに登録された内容をDBに格納する場合はSQL対策が必要だが、DBから引っ張り出す際は不要
$stmt = $pdo->prepare("SELECT * From gs_hw2_table2");
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    // 変数の中に追記する場合は.が必要（ない場合は上書きされてしまう）
    $view.="<p>";
    // html~~~はセキュリティ対策のために記載する必要がある
    // $view.=htmlspecialchars($result["date"],ENT_QUOTES).htmlspecialchars($result["name"],ENT_QUOTES).htmlspecialchars($result["content"],ENT_QUOTES);
    $view.="No.".h($result["id"]).",".h($result["registertime"]).",".h($result["title"]).",".h($result["category"]).",".h($result["memo"]).",".h($result["url"]);
    $view.="</p>";
    // $view .= "**********";
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?= $view ?></div>
    <!-- 上はphp echoを省略して記載している -->
</div>
<!-- Main[End] -->

</body>
</html>
