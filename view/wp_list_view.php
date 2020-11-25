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
<main class="row">
<div class="col-sm-2">
    <?php include HTML_PATH . 'navi.php'; ?>
</div>
<div class="col-sm-10">
    <article>
        <?php include VIEW_PATH . 'templates/movie_url_form.php'; ?> <!--URLのフォームを読み込み-->
            <p class="wp_title"><?php print(h($get_wp_id['wp_name'])); ?></p>
            <?php if(($table_col) === 0){ ?>
                <p>まだ登録がありません</p>
            <?php } else { ?>
                <?php include VIEW_PATH . 'templates/wp_list_movie.php'; ?> <!--動画詳細読み込み-->
            <?php } ?>
            
    </article>
    <?php include VIEW_PATH . 'templates/pagination.php'; ?> <!--ページネーションを読み込み-->
    </div>
    
</main>
</body>
</html>