<div class="">
    <form method="post" action="#" enctype="multipart/form-data">
            <label>URL <input type="text" name="url" id="url" size="80" placeholder="リストへ追加したいYouTubeのURLを入力"></label>
            <br>
            
            <select name="character">
                <option value="">キャラクターを選択</option>
                <?php foreach($get_all_character as $value){ ?>
                <option value="<?php print(h($value['character_id'])); ?>"><?php print(h($value['character_name'])); ?></option>
                <?php } ?>
            <select>
            
        <select name="wp_select">
        </select>

        <script>
        let versionArray = new Array();
        versionArray[''] = new Array('バージョン情報');
        versionArray[''] = new Array('XP', 'Vista', '7', '8', '8.1', '10');
        versionArray['2'] = new Array('7 (Nougat)', '8 (Oreo)', '9 (Pie)', '10');
        versionArray['3'] = new Array('10以下', '11', '12', '13');

        document.getElementsByName('character')[0].onchange = function () {
            let os = this.value;
            let elm = document.getElementsByName('wp_select')[0];
            elm.options.length = 0;
            for (let i = 0; i < versionArray[os].length; i++) {
                let op = document.createElement('option');
                op.value = versionArray[os][i];
                op.textContent = versionArray[os][i];
                elm.appendChild(op);
            }
        };
        window.onload = function () {
            document.getElementsByName('character')[0].onchange();
        };
        </script>
    </form>
</div>