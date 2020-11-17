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
//トップ新着アップロード動画リスト取得
$get_newup_movie = get_newup_movie($db);
//トップ新着リスト登録動画リスト
$get_newregist_movie = get_newregist_movie($db);

include_once VIEW_PATH . 'index_view.php';
//redirect_to('index.php');
?>