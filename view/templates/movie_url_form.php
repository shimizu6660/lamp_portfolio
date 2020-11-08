<div class="">
    <form method="post" action="#" enctype="multipart/form-data">
            <label>URL <input type="text" name="url" id="url" size="80" placeholder="リストへ追加したいYouTubeのURLを入力"></label>
            <br>
        <select name="OS">
            <option value="">OSを選択</option>
            <option value="Windows">Windows</option>
            <option value="Android">Android</option>
            <option value="iOS">iOS</option>
        <select>
        <select name="version">
        </select>

        <script>
        let versionArray = new Array();
        versionArray[''] = new Array('バージョン情報');
        versionArray['Windows'] = new Array('XP', 'Vista', '7', '8', '8.1', '10');
        versionArray['Android'] = new Array('7 (Nougat)', '8 (Oreo)', '9 (Pie)', '10');
        versionArray['iOS'] = new Array('10以下', '11', '12', '13');

        document.getElementsByName('OS')[0].onchange = function () {
            let os = this.value;
            let elm = document.getElementsByName('version')[0];
            elm.options.length = 0;
            for (let i = 0; i < versionArray[os].length; i++) {
                let op = document.createElement('option');
                op.value = versionArray[os][i];
                op.textContent = versionArray[os][i];
                elm.appendChild(op);
            }
        };
        window.onload = function () {
            document.getElementsByName('OS')[0].onchange();
        };
        </script>
    </form>
</div>