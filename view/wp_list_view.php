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
        <?php include VIEW_PATH . 'templates/movie_url_form.php'; ?> <!--URLのフォームを読み込み-->
            <p class="wp_title"><?php print(h($get_wp_id['wp_name'])); ?></p>
            <?php if(($table_col) === 0){ ?>
                <p>まだ登録がありません</p>
            <?php } else { ?>
                <?php include VIEW_PATH . 'templates/wp_list_api_movie.php'; ?>
            <?php } ?>

        
            
        <?php include VIEW_PATH . 'templates/pagination.php'; ?> <!--ページネーションを読み込み-->
    </article>
    </div>

</main>
</body>
</html>