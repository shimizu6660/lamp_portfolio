<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';


//入力されたURLのDB登録
function regist_contact($db, $twitter_id, $contact_name, $contact_content){
    if(validate_contact($db, $twitter_id, $contact_name, $contact_content) === false){
        //set_error('Error：Validation');
        return false;
    }
    return regist_contact_transaction($db, $twitter_id, $contact_name, $contact_content);
}

//トランザクション処理
function regist_contact_transaction($db, $movie_url, $movie_id, $wp_id, $title, $channelTitle, $uploaded_date){
    $db->beginTransaction();
    if(insert_movie($db, $movie_url, $movie_id, $wp_id, $title, $channelTitle, $uploaded_date)){
      $db->commit();
      return true;
    }
    $db->rollback();
    //set_error('Error：Transaction');
    return false;
    
}

//挿入SQL
function insert_movie($db, $movie_url, $movie_id, $wp_id, $title, $channelTitle, $uploaded_date){
    $sql = "
      INSERT INTO
        movies(
          movie_url,
          movie_id,
          wp_id,
          title,
          channelTitle,
          uploaded_date
        )
      VALUES(:movie_url, :movie_id, :wp_id, :title, :channelTitle, :uploaded_date);
    ";
    $array=array(':movie_url'=>$movie_url, ':movie_id'=>$movie_id, ':wp_id'=>$wp_id, ':title'=>$title, ':channelTitle'=>$channelTitle, ':uploaded_date'=>$uploaded_date);
    return execute_query($db, $sql, $array);
}

//URL重複チェック用SQL
function check_movie_url($db, $movie_url){
    $sql = "
        SELECT 
            COUNT(movie_url)
        FROM
            movies
        WHERE
            movie_url = :movie_url
    ";
    $array = array(':movie_url'=>$movie_url);
    return fetch_Column($db, $sql, $array);
    //return fetch_all_query($db, $sql, $array);
}

//バリデーション
function validate_movie($db, $movie_url, $movie_id, $wp_id, $title, $channelTitle, $uploaded_date){
    $is_valid_movie_url = is_valid_movie_url($movie_url);
    $is_valid_movie_id = is_valid_movie_id($movie_id);
    $is_valid_movie_wp_id = is_valid_movie_wp_id($wp_id);
    $is_valid_movie_check_url = is_valid_movie_check_url($db, $movie_url);

    return  $is_valid_movie_url
      && $is_valid_movie_id
      && $is_valid_movie_wp_id
      && $is_valid_movie_check_url;
}

//YoutubeのURLかどうか判別
function is_valid_movie_url($movie_url){
    $is_valid = true;
    $pattren = '/www.youtube.com/';
    if(preg_match($pattren, $movie_url) === 0){
        set_error('YouTubeの動画のURLを入力してください。');
        $is_valid = false;
    }
    return $is_valid;
}

function is_valid_movie_check_url($db, $movie_url){
    $is_valid = true;
    $check_movie_url = check_movie_url($db, $movie_url);
    if($check_movie_url !== 0){
        set_error('URLがすでに登録されています。');
        $is_valid = false;
    }
    return $is_valid;
}

//youtubeのURLであれば変数に代入。それ以外はエラー。
//function is_valid_movie_url_id($movie_url){
//    parse_str( parse_url( $movie_url, PHP_URL_QUERY ), $my_array_of_vars );
//    $movie_id = $my_array_of_vars['v'];
//    return $movie_id;
//}

//URLに動画IDが入力されているか確認
function is_valid_movie_id($movie_id){
    $is_valid = true;
    if($movie_id === ''){
      set_error('URLにIDが含まれていません。');
      $is_valid = false;
    }
    return $is_valid;
}

//wpが選択されているか確認
function is_valid_movie_wp_id($wp_id){
    $is_valid = true;
    if($wp_id === ''){
        set_error('WPが選択されていません。');
        $is_valid = false;
    }
    return $is_valid;
}