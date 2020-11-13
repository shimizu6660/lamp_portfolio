<?php
//定数ファイルの読み込み
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

function get_youtube_movie($url, $query = array() , $api_ref){
   if ($query) $url .= ('?' . http_build_query($query, '', '&', PHP_QUERY_RFC3986));

   // curl init
   $ch = curl_init();

   // curl set url and option
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // https の場合、証明書検証をしない
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_REFERER, $api_ref);

   $res = curl_exec($ch);

   // curl end
   curl_close($ch);

   return json_decode($res);
 }
