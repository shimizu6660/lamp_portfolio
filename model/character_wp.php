<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

//DB利用
//キャラクター情報取得SQL
function get_all_character($db){
    $sql = "
        SELECT
            character_id,
            character_name
        FROM
            characters
    ";
    return fetch_all_query($db,$sql);
}

//キャラ別WP情報取得SQL
function get_all_wp($db, $character_id){
    $sql = "
        SELECT
            wp_id,
            wp_name,
            character_id
        FROM
            weapon_pack
        WHERE
            character_id = :character_id
    ";
    $array = array(':character_id'=>$character_id);
    return fetch_all_query($db,$sql, $array);
}

//WP情報取得SQL
function get_wp_id($db, $wp_id){
  $sql = "
      SELECT
          wp_id,
          wp_name,
          character_id
      FROM
          weapon_pack
      WHERE
          wp_id = :wp_id
  ";
  $array = array(':wp_id'=>$wp_id);
  return fetch_query($db,$sql, $array);
}


//nav用
function get_all_character_wp($db){
    $sql = "
      SELECT
        characters.character_id,
        characters.character_name,
        weapon_pack.wp_id,
        weapon_pack.wp_name,
        weapon_pack.character_id
      FROM
        characters
      JOIN
        weapon_pack
      ON
        characters.character_id=weapon_pack.character_id
    ";
    return fetch_all_query($db, $sql);
  }