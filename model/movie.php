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

  //moviesのレコード数取得
  function table_col($db) {
    $sql = "
            SELECT 
                COUNT(*)
            FROM
                movies
            ";
	
    $statment = $db->query($sql);
    return $statment->fetchColumn();
}

function regist_item($db, $name, $price, $stock, $status, $image){
    $filename = get_upload_filename($image);
    if(validate_item($name, $price, $stock, $filename, $status) === false){
      return false;
    }
    return regist_item_transaction($db, $name, $price, $stock, $status, $image, $filename);
  }
  
  function regist_item_transaction($db, $name, $price, $stock, $status, $image, $filename){
    $db->beginTransaction();
    if(insert_item($db, $name, $price, $stock, $filename, $status) 
      && save_image($image, $filename)){
      $db->commit();
      return true;
    }
    $db->rollback();
    return false;
    
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

  function validate_item($name, $price, $stock, $filename, $status){
    $is_valid_item_name = is_valid_item_name($name);
    $is_valid_item_price = is_valid_item_price($price);
    $is_valid_item_stock = is_valid_item_stock($stock);
    $is_valid_item_filename = is_valid_item_filename($filename);
    $is_valid_item_status = is_valid_item_status($status);
  
    return $is_valid_item_name
      && $is_valid_item_price
      && $is_valid_item_stock
      && $is_valid_item_filename
      && $is_valid_item_status;
  }
  
  function is_valid_item_name($name){
    $is_valid = true;
    if(is_valid_length($name, ITEM_NAME_LENGTH_MIN, ITEM_NAME_LENGTH_MAX) === false){
      set_error('商品名は'. ITEM_NAME_LENGTH_MIN . '文字以上、' . ITEM_NAME_LENGTH_MAX . '文字以内にしてください。');
      $is_valid = false;
    }
    return $is_valid;
  }
  
  function is_valid_item_price($price){
    $is_valid = true;
    if(is_positive_integer($price) === false){
      set_error('価格は0以上の整数で入力してください。');
      $is_valid = false;
    }
    return $is_valid;
  }
  
  function is_valid_item_stock($stock){
    $is_valid = true;
    if(is_positive_integer($stock) === false){
      set_error('在庫数は0以上の整数で入力してください。');
      $is_valid = false;
    }
    return $is_valid;
  }
  
  function is_valid_item_filename($filename){
    $is_valid = true;
    if($filename === ''){
      $is_valid = false;
    }
    return $is_valid;
  }
  
  function is_valid_item_status($status){
    $is_valid = true;
    if(isset(PERMITTED_ITEM_STATUSES[$status]) === false){
      $is_valid = false;
    }
    return $is_valid;
  }
  