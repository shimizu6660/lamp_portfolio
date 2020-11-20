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
function regist_contact_transaction($db, $twitter_id, $contact_name, $contact_content){
    $db->beginTransaction();
    if(insert_contact($db, $twitter_id, $contact_name, $contact_content)){
      $db->commit();
      return true;
    }
    $db->rollback();
    //set_error('Error：Transaction');
    return false;
    
}

//挿入SQL
function insert_contact($db, $twitter_id, $contact_name, $contact_content){
    $sql = "
      INSERT INTO
        contacts(
          twitter_id,
          contact_name,
          contact_content
        )
      VALUES(:twitter_id, :contact_name, :contact_content);
    ";
    $array=array(':twitter_id'=>$twitter_id, ':contact_name'=>$contact_name, ':contact_content'=>$contact_content);
    return execute_query($db, $sql, $array);
}

//バリデーション
function validate_contact($db, $twitter_id, $contact_name, $contact_content){
    $is_valid_contact_content = is_valid_contact_content($contact_content);

    return  $is_valid_contact_content;
}

//内容が書かれているか確認
function is_valid_contact_content($contact_content){
    $is_valid = true;
    if($contact_content === ''){
        set_error('お問い合わせ内容を入力してください');
        $is_valid = false;
    }
    return $is_valid;
}