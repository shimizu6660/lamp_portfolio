<head>
    <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'navi.css'); ?>">
</head>
<nav>
    <div class="menu">
        <? foreach($get_all_character as $value){ ?>
        <label class="nav_label" for="menu_bar0<?php print(h($value['character_id'])); ?>"><?php print(h($value['character_name'])); ?></label>
            <input type="checkbox" id="menu_bar0<?php print(h($value['character_id'])); ?>" class="accordion" />
            <ul id="links0<?php print(h($value['character_id'])); ?>">
                <!-- navアコーディオン・キャラ下層WP一覧取得 -->
                <?php $character_id = ($value['character_id']); ?>
                <?php $get_all_wp = get_all_wp($db, $character_id); ?>
                <? foreach($get_all_wp as $value){ ?>
                <form name='nav<?php print(h($value['wp_id'])); ?>' 
                    method="get" action='wp_list.php' class="wp_nav_form">
                    <li><a href="javascript:document.nav<?php print(h($value['wp_id'])); ?>.submit()"><?php print(h($value['wp_name'])); ?></a></li>
                    <input type="hidden" name="wp" value="<?php print(h($value['wp_id'])); ?>">
                </form>
                <? } ?>
            </ul>
        <?php } ?>
    </div>
</nav>