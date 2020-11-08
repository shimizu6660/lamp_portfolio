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
            
        <select name="wp">
        </select>

        <script>
        let versionArray = new Array();
        versionArray[''] = new Array('バージョン情報');
        versionArray['1'] = new Array('XP', 'Vista', '7', '8', '8.1', '10');
        versionArray['2'] = new Array('7 (Nougat)', '8 (Oreo)', '9 (Pie)', '10');
        versionArray['3'] = new Array('10以下', '11', '12', '13');

        document.getElementsByName('character')[0].onchange = function () {
            let character = this.value;
            let elm = document.getElementsByName('wp')[0];
            elm.options.length = 0;
            for (let i = 0; i < versionArray[character].length; i++) {
                let op = document.createElement('option');
                op.value = versionArray[character][i];
                op.textContent = versionArray[character][i];
                elm.appendChild(character);
            }
        };
        window.onload = function () {
            document.getElementsByName('character')[0].onchange();
        };
        </script>
    </form>
</div>