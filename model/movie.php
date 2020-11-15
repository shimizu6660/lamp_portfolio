<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

//DB利用
//WP別 動画情報取得SQL
function get_wp_movie($db, $wp_id){
    $sql = "
        SELECT
            movie_num,
            movie_url,
            movie_id,
            wp_id,
            createdate
        FROM
            movies
        WHERE
            wp_id = :wp_id
        ORDER BY
            createdate DESC
    ";
    $array = array(':wp_id'=>$wp_id);
    return fetch_all_query($db, $sql, $array);
}

//管理用 全動画情報取得SQL(登録日付降順)
function get_all_movie($db){
    $sql = "
        SELECT
            movie_num,
            movie_name,
            movie_url,
            movie_id,
            character_id,
            wp_id,
            createdate
        FROM
            movies
        ORDER BY
            created DESC
    ";
    return fetch_all_query($db, $aql);
}

//moviesのレコード数取得
function table_col($db, $wp_id) {
    $sql = "
        SELECT 
          COUNT(*)
        FROM
          movies
        WHERE
          wp_id = :wp_id
        ";
  $array = array(':wp_id'=>$wp_id);
  return fetch_Column($db, $sql, $array);
}

//入力されたURLのDB登録
function regist_movie($db, $movie_url, $movie_id, $wp_id){
    if(validate_movie($db, $movie_url, $movie_id, $wp_id) === false){
        //set_error('Error：Validation');
        return false;
    }
    return regist_movie_transaction($db, $movie_url, $movie_id, $wp_id);
}

//トランザクション処理
function regist_movie_transaction($db, $movie_url, $movie_id, $wp_id){
    $db->beginTransaction();
    if(insert_movie($db, $movie_url, $movie_id, $wp_id)){
      $db->commit();
      return true;
    }
    $db->rollback();
    //set_error('Error：Transaction');
    return false;
    
}

//挿入SQL
function insert_movie($db, $movie_url, $movie_id, $wp_id){
    $sql = "
      INSERT INTO
        movies(
          movie_url,
          movie_id,
          wp_id
        )
      VALUES(:movie_url, :movie_id, :wp_id);
    ";
    $array=array(':movie_url'=>$movie_url, ':movie_id'=>$movie_id, ':wp_id'=>$wp_id);
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
function validate_movie($db, $movie_url, $movie_id, $wp_id){
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

//ページ数の取得
function get_page($page){
    if(isset($_GET[$page])){
      //GETやPOSTは文字列として送られてくるため、数字に変換
      $page = (int)$_GET[$page];
      return $page;
    }else{
      $page = 1;
      return $page;
    }
}


//ページネーション用全商品件数取得
function get_page_all_movie($db, $wp_id){
    $sql = "
      SELECT COUNT(*)
        movie_num
      FROM
        movies
      WHERE
        wp_id = :wp_id
    ";
    $array=array('wp_id'=>$wp_id);
    return fetch_query($db, $sql, $array);
}
  
// スタートのポジションを計算する
function start_page_number($page){
    if ($page > 1) {
      //nページ目の場合は、『(n × 10) - 10 = y』
      $start = ($page * 10) - 10;
      return $start;
    } else {
      $start = 0;
      return $start;
    }
}
  
//ページネーション用10件ずつ取得
function get_page_movie($db, $wp_id, $start){
    $sql = "
      SELECT
        movie_num,
        movie_url,
        movieid,
        wp_id,
        createdate,
        uploadedte
      FROM
        wp_id = :wp_id
      WHERE
        status = 1
      ORDER BY
        created DESC
      LIMIT
        :start, 10
    ";
    $array=array('wp_id'=>$wp_id,':start'=>$start);
    return fetch_all_query($db, $sql, $array);
}