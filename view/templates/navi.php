<head>
    <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'navi.css'); ?>">
</head>
<nav>
    <div class="menu">
        <? foreach($get_all_character as $value){ ?>
        <label class="nav_label" for="menu_bar0<?php print(h($value['character_id'])); ?>"><?php print(h($value['character_name'])); ?></label>
            <input type="checkbox" id="menu_bar0<?php print(h($value['character_id'])); ?>" class="accordion" />
            <ul id="links0<?php print(h($value['character_id'])); ?>">
                <!-- アコーディオン・キャラ下層WP一覧取得 -->
                <?php $character_id = ($value['character_id']); ?>
                <?php $get_all_wp = get_all_wp($db, $character_id); ?>
                <? foreach($get_all_wp as $value){ ?>
                    <li><a href=""><?php print(h($value['wp_name'])); ?></a></li>
                <? } ?>
            </ul>
        <?php } ?>
    </div>
</nav>