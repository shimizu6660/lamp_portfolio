<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

//DB利用
//WP別 動画情報取得SQL
function get_wp_movie($db, $wp_id){
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
        WHERE
            wp_id = :wp_id
        ORDER BY
            created DESC
    ";
    $array = array(':wp_id'=>$wp_id);
    return fetch_all_query($db, $wp_id, $array);
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
    return fetch_all_query($db, $wp_id);
}

function insert_movie($db, $movie_name, $movie_url, $movie_id, $character_id, $wp_id){
    $sql = "
      INSERT INTO
        items(
          movie_name,
          movie_url,
          movie_id,
          character_id,
          wp_id
        )
      VALUES(:movie_name, :movie_url, :movie_id, :character_id, :wp_id);
    ";
    
    $array=array(':movie_name'=>$movie_name, ':movie_url'=>$movie_url,
                 ':movie_id'=>$movie_id, ':character_id'=>$character_id, ':wp_id'=>$wp_id);
    return execute_query($db, $sql, $array);
  }