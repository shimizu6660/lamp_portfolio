<?php
//定数ファイルの読み込み
require_once '../conf/const.php';
//汎用関数ファイルの読み込み
require_once MODEL_PATH . 'functions.php';
//movieデータに関する関数ファイルを読み込み
require_once MODEL_PATH . 'movie.php';


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
        
        //urlの重複判定
        //$check_movie_url = check_movie_url($db, $movie_url);
        //dd($check_movie_url);

        //Youtubeの動画かどうか判別
        //$pattren = '/www.youtube.com/';
        //$match_num = preg_match($pattren, $url);
        //dd($match_num);
        //youtubeのURLであれば変数に代入。それ以外はエラー。
        parse_str( parse_url( $movie_url, PHP_URL_QUERY ), $my_array_of_vars );
        $movie_id = $my_array_of_vars['v'];
        
        //print($movie_url);
        //print($movie_id);
        //print($wp_id);
        //dd($wp_id);
        if(regist_movie($db, $movie_url, $movie_id, $wp_id)){
            set_message('動画URLを登録しました。');
        }else {
            set_error('動画URLの登録に失敗しました。');
        }
    }
}
//dd($movie_url)
//dd($movie_id);

include_once VIEW_PATH . 'index_view.php';