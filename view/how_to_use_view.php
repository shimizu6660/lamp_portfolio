<?php
header('X-FRAME-OPTIONS: DENY');
?>
<DOCTYPE html>
<html lang="ja">
<head>
    <?php include VIEW_PATH . 'templates/head.php'; ?>
    <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'main.css'); ?>">
    <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'wp_list.css'); ?>">
    <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'how_to_use.css'); ?>">
    <title>使用方法-Gunslinger Strats 動画まとめ</title>
</head>
<body>
    <?php include VIEW_PATH . 'templates/header.php'; ?>
<main class="">
<div class="col-sm-2">
    <?php include HTML_PATH . 'navi.php'; ?>
</div>
<div class="col-sm-10">
    <article>
        <h3>動画URL登録方法</h3>
        <a href="#pc" class="btn btn-dark">PCの場合</a>
        <br>
        <a href="#phone" class="btn btn-dark">iOS/Androidの場合</a>
        <div class="pc">
            <a name="pc"><h4>PCの場合</h4></a>
            <p>1.キャラクターを選ぶ</p>
            <img src="image/pc_1.png">
            <p>2.WPを選ぶ</p>
            <img src="image/pc_2.png">
            <p>3.URLを貼り付け、登録をクリック</p>
            <img src="image/pc_3.png">
            <p>4.登録完了</p>
            <img src="image/pc_4.png">
        </div>
        <div class="phone">
            <a name="phone"><h4>iOS/Androidの場合</h4></a>
            <p>1.YouTubeの動画ページの「共有」をタップ</p>
            <img src="image/phone_1.jpg">
            <p>2.左下の「コピー」をタップ</p>
            <img src="image/phone_2.png">
            <p>3.キャラクターを選ぶ</p>
            <img src="image/phone_3.png">
            <p>4.WPを選ぶ</p>
            <img src="image/phone_4.png">
            <p>5.URLを貼り付け、登録をタップ</p>
            <img src="image/phone_5.png">
            <p>6.登録完了</p>
            <img src="image/phone_6.png">
        </div>
    </article>
    </div>

</main>
</body>
</html>