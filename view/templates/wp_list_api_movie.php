<?php
require_once MODEL_PATH . 'api_movie.php';
foreach($get_page_movie as $value){
    $api_key = "AIzaSyCUcYgwKFn5xRg77sHjsOmid-QvCbvpyks";
    //$api_ref = 設定したリファラ;
    $youtube_id = $value['movie_id'];

    $response = get_youtube_movie('https://www.googleapis.com/youtube/v3/videos', array(
        'key' => $api_key,
        'id' => $youtube_id, // ID
        'part' => 'snippet', // 取得するデータの種類 (タイトルや画像を含める場合はsnippet)
        'type' => 'video', // 結果の種類 (channel,playlist,video)
    ), $api_ref);
    
    //サムネイルのURLを出力する
    $img = $response->items[0]->snippet->thumbnails->medium->url; //default < medium < high
    //タイトルの出力
    $title = $response->items[0]->snippet->title;
    //チャンネルタイトルの出力
    $channelTitle = $response->items[0]->snippet->channelTitle;
    //再生回数
    //$viewCount = $response->items[0]->snippet->viewCount;
    //アップ日時
    $t = new DateTime($response->items[0]->snippet->publishedAt);
    $t -> setTimeZone(new DateTimeZone('Asia/Tokyo'));
    $uploaded_date = $t -> format('Y年m月d日 H:i');
    //var_dump($img);
    ?>

    <div class="movie_link">
        <form name='<?php print(h($value['movie_id'])); ?>' method="get" action="movie_detail.php" class="movie_datail_form">
            <a href="javascript:document.<?php print(h($value['movie_id'])); ?>.submit()">
                <div class="box">
                <img src="https://img.youtube.com/vi/<?php print(h($value['movie_id'])); ?>/mqdefault.jpg" />
                </div>      
                <div class="box detail">
                    <?php print($title); ?>
                    <br>
                    <?php print("投稿者：".$channelTitle." さん"); ?>
                    <br>
                    <?php print("投稿日：".$uploaded_date); ?>
                </div>
                <input type="hidden" name="movie_id" value="<?php print(h($value['movie_id'])); ?>">
            </a>
        </form>
    </div>
    
<?php } ?>