<head>
    <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'header.css'); ?>">
    <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'header_navi.css'); ?>">
    <link rel="shortcut icon" href="favicon.ico">

    <meta name="twitter:card" content="summary_large_image" /> <!--①-->
    <!--<meta name="twitter:site" content="@panao666" /> --><!--②-->
    <meta property="og:url" content="http://gunst-movie.com" /> <!--③-->
    <meta property="og:title" content="ガンスト投稿動画まとめ" /> <!--④-->
    <meta property="og:description" content="YouTubeに投稿されているガンスト動画のURLを入力してWP別に仕分けできるサイトです。" /> <!--⑤-->
    <meta property="og:image" content="https://uploda1.ysklog.net/67630a821a3c785e960e55c78323f33e.png" /> <!--⑥-->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KJJLB8N9FV"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-KJJLB8N9FV');
    </script>
</head>
<header>
    <div class="header_box">
        <a href="index.php"><img class='title_logo' src="image/title_logo.png" width="200"></a>
    </div>
    <div class="header_box">
        <div class="contact">
            <a href="how_to_use.php" class='sub_logo'><img src="image/how_to_use_logo.png" width="50"></a>
            <a href="contact.php" class='sub_logo'><img src="image/contact_logo.png" width="50"></a>
        </div>
    </div>

    <div class="header_navi">
        <div id="nav-drawer">
            <input id="nav-input" type="checkbox" class="nav-unshown">
            <label id="nav-open" for="nav-input"><span></span></label>
            <label class="nav-unshown" id="nav-close" for="nav-input"></label>
            <div id="nav-content">
                <?php include HTML_PATH . 'header_navi.php'; ?>
            </div>
        </div>
    </div>
</header>