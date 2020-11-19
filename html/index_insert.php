<?php
//定数ファイルの読み込み
require_once '../conf/const.php';
//汎用関数ファイルの読み込み
require_once MODEL_PATH . 'functions.php';
//movieデータに関する関数ファイルを読み込み
require_once MODEL_PATH . 'movie.php';

require_once MODEL_PATH . 'api_movie.php';


$db = get_db_connect();

//$get_all_character = get_all_character($db);
//indexでボタン判別
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['btn']) === TRUE){
        $btn = ($_POST['btn']);
    }
    if($btn === 'url_btn'){
        //postで入力されたURLを取得
        $movie_url = get_post('url');
        $wp_id = get_post('wp_id_select');

        //youtubeのURLであれば変数に代入。それ以外はエラー。
        parse_str( parse_url( $movie_url, PHP_URL_QUERY ), $my_array_of_vars );
        $movie_id = $my_array_of_vars['v'];

        //APIでアップロード時間を取得し、挿入
            $api_key = youtubeAPI;
            //$api_ref = 設定したリファラ;
            $youtube_id = $movie_id;

            $response = get_youtube_movie('https://www.googleapis.com/youtube/v3/videos', array(
                'key' => $api_key,
                'id' => $youtube_id, // ID
                'part' => 'snippet', // 取得するデータの種類 (タイトルや画像を含める場合はsnippet)
                'type' => 'video', // 結果の種類 (channel,playlist,video)
            ), $api_ref);
            //サムネイルのURLを出力する
            //$img = $response->items[0]->snippet->thumbnails->medium->url; //default < medium < high
            //タイトルの出力
            $title = $response->items[0]->snippet->title;
            //チャンネルタイトルの出力
            $channelTitle = $response->items[0]->snippet->channelTitle;
            //再生回数
            //$viewCount = $response->items[0]->snippet->viewCount;
            //アップ日時
            $t = new DateTime($response->items[0]->snippet->publishedAt);
            $t -> setTimeZone(new DateTimeZone('Asia/Tokyo'));
            $uploaded_date = $t ->format('Y-m-d H:i:s');
        //dd($uploaded_date);

        //print($movie_url);
        //print($movie_id);
        //print($wp_id);
        //dd($wp_id);
        if(regist_movie($db, $movie_url, $movie_id, $wp_id, $title, $channelTitle, $uploaded_date)){
            set_message('動画URLを登録しました。');
        }else {
            set_error('動画URLの登録に失敗しました。');
        }
    }
}
//トップ新着アップロード動画リスト取得
$get_newup_movie = get_newup_movie($db);
//トップ新着リスト登録動画リスト
$get_newregist_movie = get_newregist_movie($db);
//$get_all_character = get_all_character($db);
//dd($movie_url);
//dd($movie_id);

include_once VIEW_PATH . 'index_view.php';