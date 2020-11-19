<?php
//定数ファイルの読み込み
require_once '../conf/const.php';
//汎用関数ファイルの読み込み
require_once MODEL_PATH . 'functions.php';
//movieデータに関する関数ファイルを読み込み
require_once MODEL_PATH . 'movie.php';
//DBファイルの読み込み
require_once MODEL_PATH . 'db.php';


$db = get_db_connect();

//トップ新着アップロード動画リスト取得
$get_newup_movie = get_newup_movie($db);
//トップ新着リスト登録動画リスト
$get_newregist_movie = get_newregist_movie($db);
//$get_all_character = get_all_character($db);

include_once VIEW_PATH . 'index_view.php';