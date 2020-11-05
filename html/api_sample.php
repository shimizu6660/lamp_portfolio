<?php
//定数ファイルの読み込み
require_once '../conf/const.php';
function get_video($url, $query = array() , $api_ref){
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

 $api_key = "AIzaSyCUcYgwKFn5xRg77sHjsOmid-QvCbvpyks";
 //$api_ref = 設定したリファラ;
 $youtube_id = "3TpZ6pSh2EQ";

 $response = get_video('https://www.googleapis.com/youtube/v3/videos', array(
    'key' => $api_key,
    'id' => $youtube_id, // ID
    'part' => 'snippet', // 取得するデータの種類 (タイトルや画像を含める場合はsnippet)
    'type' => 'video', // 結果の種類 (channel,playlist,video)
 ), $api_ref);
 
 //サムネイルのURLを出力する
 $img = $response->items[0]->snippet->thumbnails->medium->url; //default < medium < high
 //タイトルの出力
 $title = $response->items[0]->snippet->title;
 //アップ日時
 $t = new DateTime($response->items[0]->snippet->publishedAt);
 $t -> setTimeZone(new DateTimeZone('Asia/Tokyo'));
 $upload_date = $t -> format('Y年m月d日 H:i');
 //var_dump($img);
?>

<DOCTYPE html>
<html lang="ja">
<head>
    <title>APIサンプル</title>
</head>
<body>
<img src="<?php print($img); ?>">
<br>
<?php print($title); ?>
<br>
<?php print("投稿日：".$upload_date); ?>
</body>
</html>
