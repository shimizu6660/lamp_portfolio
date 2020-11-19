<?php foreach($get_all_movie as $value){ ?>
    <div class="movie_link">
            <a href="movie_detail.php?movie_id=<?php print(h($value['movie_id'])); ?>">
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
            </a>
        <form method="post" action="admin_delete_movie.php">
                <input type="submit" value="リストから削除" class="btn btn-danger delete">
                <input type="hidden" name="movie_id" value="<?php print(h($value['movie_id'])); ?>">
        </form>
    </div>
<?php } ?>