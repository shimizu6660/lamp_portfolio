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
    
<main class="">
<div class="col-sm-2">
    <?php include HTML_PATH . 'navi.php'; ?>
</div>
<div class="col-sm-10">
    <article>
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" width="854" height="450" 
                src="https://www.youtube.com/embed/<?php print(h($movie_id)); ?>?autoplay=1" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
                </iframe>
        </div>

        <div class="">
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