<?php
//定数ファイルの読み込み
require_once '../conf/const.php';
//汎用関数ファイルの読み込み
require_once MODEL_PATH . 'functions.php';

//$db = get_db_connect();

$twitter_id = get_post('twitter_id');
//dd($twitter_id);
$contact_name = get_post('contact_name');
//dd($contact_name);
$contact_content = get_post('contact_content');
//dd($contact_content);

include_once VIEW_PATH . 'contact_check_view.php';