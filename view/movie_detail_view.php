<?php
header('X-FRAME-OPTIONS: DENY');
?>
<DOCTYPE html>
<html lang="ja">
<head>
    <?php include VIEW_PATH . 'templates/head.php'; ?>
    <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'main.css'); ?>">
    <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'movie_detail.css'); ?>">
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
        <div class="movie_wrap">
            <iframe width="854" height="450" 
                src="https://www.youtube.com/embed/<?php print(h($movie_id)); ?>" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
                </iframe>
        </div>
        <?php include VIEW_PATH . 'templates/detail_api_movie.php'; ?> <!--動画詳細読み込み-->
            
        <?php include VIEW_PATH . 'templates/pagination.php'; ?> <!--ページネーションを読み込み-->
    </article>
    </div>

</main>
</body>
</html>