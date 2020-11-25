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
        <p>不具合や追加機能の要望などの連絡には以下のフォームからお問い合わせいただくか<br>
        TwitterでのDMでのお問い合わせは<a href="https://twitter.com/messages/compose?recipient_id=704761399940022272">こちらまで(@panao666)</a></p>
        <form action="contact_check.php" method="post">
            <div class="form-group">
                <label for="twitter_id">おTwitterユーザ名:</label>
                <input type="text" id="twitter_id" name="twitter_id" class="form-control">
            </div>
            <div class="form-group">
                <label for="contact_name">お名前:</label>
                <input type="text" id="contact_name" name="contact_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="contact_content">お問い合わせ内容:<span class="span_contact">*必須</span></label>
                <textarea id="contact_content" name="contact_content" class="form-control"></textarea>
            </div>
            <input type="submit" name='contact' value="確認画面へ" class="btn btn-Secondary btn-sm ">
        </form>
    </article>
    </div>

</main>
</body>
</html>