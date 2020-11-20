<?php
header('X-FRAME-OPTIONS: DENY');
?>
<DOCTYPE html>
<html lang="ja">
<head>
    <?php include VIEW_PATH . 'templates/head.php'; ?>
    <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'main.css'); ?>">
    <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'movie_detail.css'); ?>">
    <title>Gunslinger Strats 動画まとめ</title>
</head>
<body>
    <?php include VIEW_PATH . 'templates/header.php'; ?>
<main>
<div class="main_float">
    <?php include HTML_PATH . 'navi.php'; ?>
</div>
<div class="main_float">
    <article>
        <div class="movie_wrap">
            <iframe width="854" height="450" 
                src="https://www.youtube.com/embed/<?php print(h($movie_id)); ?>?autoplay=1" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
                </iframe>
        </div>

        <div class=>
                <h3><?php print(h($get_detail_movie['title'])); ?></h3>
                <br>
                <?php print("投稿者：".$get_detail_movie['channelTitle']." さん"); ?>
                <br>
                <?php print("投稿日：".$get_detail_movie['uploaded_date']); ?>
        </div>
    </article>
    </div>

</main>
</body>
</html>