<?php foreach($get_newup_movie as $value){ ?>
    <div class="movie_link">
        <form name='up_<?php print(h($value['movie_id'])); ?>' method="get" action="movie_detail.php" class="movie_datail_form">
            <a href="javascript:document.up_<?php print(h($value['movie_id'])); ?>.submit()">
                <div class="box">
                    <img src="https://img.youtube.com/vi/<?php print(h($value['movie_id'])); ?>/mqdefault.jpg" />
                </div>      
                <div class="box detail">
                    <?php print(h($value['title'])); ?>
                    <br>
                    <?php print("投稿者：".h($value['channelTitle'])." さん"); ?>
                    <br>
                    <?php print("投稿日：".h($value['uploaded_date'])); ?>
                </div>
                <input type="hidden" name="movie_id" value="<?php print(h($value['movie_id'])); ?>">
            </a>
        </form>
        <form method="post" action="delete_movie.php">
                <input type="submit" value="リストから削除" class="btn btn-danger delete">
                <input type="hidden" name="movie_id" value="<?php print(h($value['movie_id'])); ?>">
        </form>
    </div>
<? } ?>