<?php
header('X-FRAME-OPTIONS: DENY');
?>
<DOCTYPE html>
<html lang="ja">
<head>
    <?php include VIEW_PATH . 'templates/head.php'; ?>
    <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'main.css'); ?>">
    <title>Gunslinger Strats プレイ動画集</title>
</head>
<body>
    <?php include VIEW_PATH . 'templates/header.php'; ?>
<main>
<div class="main_float">
    <?php include HTML_PATH . 'navi.php'; ?>
</div>
<div class="main_float">
    <article>
        <div class="">
        <form method="post" action="#" enctype="multipart/form-data">
            <label>URL <input type="text" name="url" id="url" size="80" placeholder="リストへ追加したいYouTubeのURLを入力"></label>
            <br>
            <select name=”index_characters_select”>キャラクター
                <option value="" selected>キャラクターを選択</option>
                <option value=”1”>風澄　徹</option>
                <option value=”2”>片桐　鏡磨</option>
            </select>
            <select id="1" class="subbox">
                <option value="" selected>WPを選択</option>
                <option value="hn">標準型「レンジャー」</option>
                <option value="hg">標準型「アサルト」</option>
            </select>
        </form>
        </div>
    </article>
    </div>

</main>
</body>
</html>