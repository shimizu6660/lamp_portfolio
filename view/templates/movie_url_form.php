<div class="form_box">
    <p>はじめに動画内キャラクターを選択し、WPを選択し、URLを貼り付けてください<br>
    連戦の場合、連戦中に使用されているWPを一つ選んでください</p>
    <form method="get">
        <div class="box">
            <select name="character_select" onchange="submit(this.form)">
                <option value="">キャラクターを選択</option>
                <?php foreach($get_all_character as $value){ ?>
                <option value="<?php print(h($value['character_id'])); ?>"><?php print(h($value['character_name'])); ?></option>
                <?php } ?>
                <!--<input type="submit" value="キャラクター決定">-->
            </select>
        </div>
    </form>
    
    <?php $character_select = get_get('character_select'); ?><!--上で選んだキャラクターのidを受け取る-->
    <?php $get_select_wp = get_all_wp($db, $character_select); ?>

    <form action="index_insert.php" method="post" enctype="multipart/form-data">
        <div class="box">
            <select name="wp_id_select">
                <option value="">WPを選択　　　　　　　　　　　　　　</option>
                <?php foreach($get_select_wp as $value){ ?>
                <option value="<?php print(h($value['wp_id'])); ?>"><?php print(h($value['wp_name'])); ?></option>
                <?php } ?>
            <select>
        </div>
            <br>
            <label>URL <input type="text" name="url" id="url" size="60" placeholder="リストへ追加したいYouTubeのURLを入力"></label>
            <button type="submit" name='btn' value="url_btn" class="btn btn-Secondary btn-sm ">登録</button>
    </form>
</div>