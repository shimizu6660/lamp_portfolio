<?php
//定数ファイルの読み込み
require_once '../conf/const.php';
//汎用関数ファイルの読み込み
require_once MODEL_PATH . 'functions.php';
//wpデータに関する関数ファイルを読み込み
require_once MODEL_PATH . 'character_wp.php';
//movieデータに関する関数ファイルを読み込み
require_once MODEL_PATH . 'movie.php';

//navからWPのIDをgetで取得
$wp_id = get_get('wp');
//DB接続
$db = get_db_connect();
//dd($get_wp);
//wpIDからWP名取得
$get_wp_id = get_wp_id($db, $wp_id);
//dd($get_wp_id);
//wp別動画一覧取得
$get_wp_movie = get_wp_movie($db, $wp_id);
//movieテーブルのレコード取得
$table_col = table_col($db);
//dd($table_col);

//ページネーション用変数初期化
$page_all = '';
$page_num = '';
$page = '';
//moviesテーブル全体のレコード数の取得
$get_page_all_movie = get_page_all_movie($db, $wp_id);
//dd($get_page_all_movie);

//総ページ数
//総ページ数 = 全ての動画 / 1ページあたりの動画数
$page_all = ceil($get_page_all_movie['movie_num'] / 10);
//dd($page_all);

//現在のページ数の取得
//$_GET[]で取得
$page = get_page('page');

include_once VIEW_PATH . 'wp_list_view.php';