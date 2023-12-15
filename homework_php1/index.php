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
        <h2>顧客情報を登録してください</h2>
        <div class="form-container">
            <form action="sent.php" method="post">
                <!-- 会社名 -->
                <div class="form-item">会社名</div>
                <input type="text" name="clName">
                <!-- 代表者名 -->
                <div class="form-item">代表者名</div>
                <input type="text" name="clPresidentName">
                <!-- 住所 -->
                <div class="form-item">住所</div>
                <input type="text" name="clAddress">
                <!-- 住所フリガナ -->
                <div class="form-item">住所（フリガナ）</div>
                <input type="text" name="clAddressKana">
                <!-- 業種 -->
                <?php
                $works=array("製造業","小売業","卸売業");
                ?>
                <div class="form-item">業種</div>
                <select name="clWork">
                    <option value="未選択">選択してください</option>
                    <?php
                    foreach($works as $work){
                        echo "<option value='{$work}'>{$work}</option>";
                    };
                    ?>
                </select>
                <!-- 加入中の保険商品 -->
                <?php
                $policys=array("火災","地震","総合賠","施設賠","PL");
                ?>           
                <div class="form-item">加入中の保険商品</div>
                <select name="clPolicy[]" multiple>
                    <option value="未選択">選択してください</option>
                    <?php
                    foreach($policys as $policy){
                        echo "<option value='{$policy}'>{$policy}</option>";
                    };
                    ?>
                </select> 
                <input type="submit" value="送信">
            </div>
    </main>
</body>
</html>