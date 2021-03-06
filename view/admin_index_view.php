<?php
header('X-FRAME-OPTIONS: DENY');
?>
<DOCTYPE html>
<html lang="ja">
<head>
    <?php include VIEW_PATH . 'templates/head.php'; ?>
    <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'main.css'); ?>">
    <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'wp_list.css'); ?>">
    <title>Gunslinger Strats 動画まとめ</title>
</head>
<body>
    <?php include VIEW_PATH . 'templates/header.php'; ?>
<main class="">
<div class="col-sm-2">
    <?php include HTML_PATH . 'navi.php'; ?>
</div>
<div class="col-sm-10">
    <article>
        <?php include VIEW_PATH . 'templates/messages.php'; ?>
        <div class="form_display">
            <?php include VIEW_PATH . 'templates/movie_url_form.php'; ?> <!--URLのフォームを読み込み-->
        </div>

        <p class="list_title">管理リスト</p>
        <?php include VIEW_PATH . 'templates/admin_movie.php'; ?> <!--動画詳細読み込み-->

    </article>
    </div>

</main>
</body>
</html>