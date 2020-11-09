<?php
//定数ファイルの読み込み
require_once '../conf/const.php';
//汎用関数ファイルの読み込み
require_once MODEL_PATH . 'functions.php';
//movieデータに関する関数ファイルを読み込み
require_once MODEL_PATH . 'movie.php';


//$db = get_db_connect();

//$get_all_character = get_all_character($db);
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['btn']) === TRUE){
        $btn = ($_POST['btn']);
    }

    if($btn === 'url_btn'){
        //postで入力されたURLを取得
        $url = get_post('url');
        $wp_id = get_post('wp_id');
        print($wp_id);
        //Youtubeの動画かどうか判別
        $pattren = '/www.youtube.com/';
        $match_num = preg_match($pattren, $url);
        //dd($match_num);
        //youtubeのURLであれば変数に代入。それ以外はエラー。
        if($match_num === 1){
            parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
            $movie_id = $my_array_of_vars['v'];
        }else{
            print "エラー";
        }
    }
}

include_once VIEW_PATH . 'index_view.php';