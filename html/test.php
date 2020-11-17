<?
$api_key = "AIzaSyCUcYgwKFn5xRg77sHjsOmid-QvCbvpyks";
$video_id = "MAK8pjzcuz4";
$get_api_url = "https://www.googleapis.com/youtube/v3/videos?id=$video_id&key=$api_key&part=snippet,contentDetails,statistics,status";
$json = file_get_contents($get_api_url);
$getData = json_decode( $json , true);
foreach((array)$getData['items'] as $key => $gDat){
	$video_title = $gDat['snippet']['title'];
	$description = $gDat['snippet']['description'];
	$thumnail_url = $gDat['snippet']['thumbnails']['medium']['url'];
	$ch_id = $gDat['snippet']['channelId'];
	$ch_title = $gDat['snippet']['channelTitle'];
}
?>