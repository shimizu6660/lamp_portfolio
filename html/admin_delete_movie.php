<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'movie.php';

$db = get_db_connect();

$movie_id = get_post('movie_id');
//dd($movie_id);

if(destroy_movie($db, $movie_id) === true){
  set_message('リストから削除しました。');
} else {
  set_error('削除に失敗しました。');
}

//全動画リスト取得
$get_all_movie = get_all_movie($db);

include_once VIEW_PATH . 'admin_index_view.php';
//redirect_to('index.php');