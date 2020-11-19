<?php
//キャラデータに関する関数ファイルを読み込み
require_once MODEL_PATH . 'character_wp.php';
//汎用関数ファイルの読み込み
require_once MODEL_PATH . 'functions.php';
//DBファイルの読み込み
require_once MODEL_PATH . 'db.php';

$db = get_db_connect();

$get_all_character_wp = get_all_character_wp($db);

$get_all_character = get_all_character($db);

$get_all_wp = get_all_wp($db, $character_id);


//dd($get_all_wp);


include VIEW_PATH . 'templates/navi.php';