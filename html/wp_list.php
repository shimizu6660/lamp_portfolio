<?php
//定数ファイルの読み込み
require_once '../conf/const.php';
//汎用関数ファイルの読み込み
require_once MODEL_PATH . 'functions.php';
//wpデータに関する関数ファイルを読み込み
require_once MODEL_PATH . 'character_wp.php';

//navからWPのIDをgetで取得
$wp_id = get_get('wp');
//DB接続
$db = get_db_connect();
//dd($get_wp);
//wpIDからWP名取得
$get_wp_id = get_wp_id($db, $wp_id);

//dd($get_wp_id);

include_once VIEW_PATH . 'wp_list_view.php';