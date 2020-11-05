<?php
//キャラデータに関する関数ファイルを読み込み
require_once MODEL_PATH . 'character_wp.php';

$db = get_db_connect();

$get_all_character_wp = get_all_character_wp($db);

$get_all_character = get_all_character($db);

$get_all_wp = get_all_wp($db, $character_id);


//dd($character_id);


include VIEW_PATH . 'templates/navi.php';