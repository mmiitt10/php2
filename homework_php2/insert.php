<?php

/**
 * 1. index.phpのフォームの部分がおかしいので、ここを書き換えて、
 * insert.phpにPOSTでデータが飛ぶようにしてください。
 * 2. insert.phpで値を受け取ってください。
 * 3. 受け取ったデータをバインド変数に与えてください。
 * 4. index.phpフォームに書き込み、送信を行ってみて、実際にPhpMyAdminを確認してみてください！
 */

//1. POSTデータ取得
// index.phpから送信される情報を取得・格納
$title=$_POST["title"];
$category=$_POST["category"];
$url=$_POST["url"];
$memo=$_POST["memo"];


//2. DB接続します
try {
  //ID:'root', Password: xamppは 空白 ''
  $pdo = new PDO('mysql:dbname=gs_php2;charset=utf8;host=localhost','root',"");
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成

// フォームに入力された文字をそのままSQLに突っ込むと、問題がある場合がある。それを防ぐため、情報を仮の箱に一度入れたうえで（バインド関数）、それをSQLとする

// 1. SQL文を用意
$stmt = $pdo->prepare("
  INSERT INTO 
    gs_hw2_table2(id,title,category,memo,url,registertime)
  VALUES
    (NULL,:title,:category,:memo,:url,sysdate())
    ");

//  2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR

$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':category', $category, PDO::PARAM_STR);
$stmt->bindValue(':memo', $memo, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status === false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location:index.php");
}

?>
