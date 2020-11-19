<?php
//定数ファイルの読み込み
require_once '../conf/const.php';
//汎用関数ファイルの読み込み
require_once MODEL_PATH . 'functions.php';
//movieデータに関する関数ファイルを読み込み
require_once MODEL_PATH . 'movie.php';


$db = get_db_connect();

//全動画リスト取得
$get_all_movie = get_all_movie($db);

include_once VIEW_PATH . 'admin_index_view.php';