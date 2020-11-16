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
$movie_id = get_get('movie_id');
//DB接続
$db = get_db_connect();
//dd($movie_id);


include_once VIEW_PATH . 'movie_detail_view.php';