<?php
//定数ファイルの読み込み
require_once '../conf/const.php';
//汎用関数ファイルの読み込み
require_once MODEL_PATH . 'functions.php';
//movieデータに関する関数ファイルを読み込み
require_once MODEL_PATH . 'movie.php';

require_once MODEL_PATH . 'contact.php';


$db = get_db_connect();

$twitter_id = get_post('twitter_id');
//dd($twitter_id);
$contact_name = get_post('contact_name');
//dd($contact_name);
$contact_content = get_post('contact_content');
//dd($contact_content);

if(regist_contact($db, $twitter_id, $contact_name, $contact_content)){
    set_message('お問い合わせを受け付けました');
}else {
    set_error('失敗しました。もう一度やり直してください。');
}

//トップ新着アップロード動画リスト取得
$get_newup_movie = get_newup_movie($db);
//トップ新着リスト登録動画リスト
$get_newregist_movie = get_newregist_movie($db);
//$get_all_character = get_all_character($db);
//dd($movie_url);
//dd($movie_id);

include_once VIEW_PATH . 'index_view.php';