<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital CRO for Client</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a href=""><img src="logo.png" alt="ロゴの名前"></a>
        <h1>Digital CRO for Agents</h1>
    </header>
    <main>
        <div class="thanks-message">お問い合わせいただきありがとうございます。</div>
        <div class="display-contact">
            <div class="form-title">入力内容</div>

            <div class="form-item">■ 会社名</div>
            <?php echo $_POST['clName']; ?>

            <div class="form-item">■ 代表者名</div>
            <?php echo $_POST['clPresidentName']; ?>

            <div class="form-item">■ 住所</div>
            <?php echo $_POST['clAddress']; ?>

            <div class="form-item">■ 住所（フリガナ）</div>
            <?php echo $_POST['clAddressKana']; ?>

            <div class="form-item">■ 業種</div>
            <?php echo $_POST['clWork']; ?>

            <div class="form-item">■ 加入中の保険商品</div>
            <?php 
            if(isset($_POST['clPolicy']) && is_array($_POST['clPolicy'])) {
                echo implode(", ", $_POST['clPolicy']);
            } else {
                echo "選択されていません";
            }
            ?>
        </div>
    </main>
</body>
</html>