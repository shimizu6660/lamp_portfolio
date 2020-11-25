<?php
header('X-FRAME-OPTIONS: DENY');
?>
<DOCTYPE html>
<html lang="ja">
<head>
    <?php include VIEW_PATH . 'templates/head.php'; ?>
    <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'main.css'); ?>">
    <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'wp_list.css'); ?>">
    <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'contact.css'); ?>">
    <title>お問い合わせ-Gunslinger Strats 動画まとめ</title>
</head>
<body>
    <?php include VIEW_PATH . 'templates/header.php'; ?>
<main class="row">
<div class="col-sm-2">
    <?php include HTML_PATH . 'navi.php'; ?>
</div>
<div class="col-sm-10">
    <article>
        <p>送信内容の確認をしてください</p>
        <?php if($twitter_id !== ''){ ?>
            <p>おTwitterユーザ名：<?php print(h($twitter_id)); ?></p>
        <?php } ?>
        <?php if($contact_name !== ''){ ?>
            <p>お名前：<?php print(h($contact_name)); ?></p>
        <?php } ?>
        <p>お問い合わせ内容：<span class="span_contact">*必須</span><br><?php print(h($contact_content)); ?></p>
        <form action="contact_finish.php" method="post">
            <input type="hidden" name="twitter_id" value="<?php print(h($twitter_id)); ?>">
            <input type="hidden" name="contact_name" value="<?php print(h($contact_name)); ?>">
            <input type="hidden" name="contact_content" value="<?php print(h($contact_content)); ?>">
            <input type="submit" name='contact' value="送信" class="btn btn-Secondary btn-sm ">
        </form>
    </article>
    </div>

</main>
</body>
</html>