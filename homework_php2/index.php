<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="post" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>おすすめの本を登録する</legend>
                <label>本のタイトル：<input type="text" name="title"></label><br>
                <label>カテゴリー
                    <select name="category">
                        <option value="" disabled selected>選択してください</option>
                        <option value="business_strategy">経営戦略</option>
                        <option value="business_skill">ビジネススキル全般</option>
                        <option value="marketing">マーケティング</option>
                        <option value="it">IT</option>
                    </select><br>
                    <!-- <input type="text" name="category"></label><br> -->
                <label>メモ<textArea name="memo" rows="4" cols="40"></textArea></label><br>
                <label>URL<input type="text" name="url"></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>
