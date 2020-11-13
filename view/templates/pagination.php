<nav aria-label="Page navigation">
    <ul class="pagination pagination justify-content-center">
        <?php if($page>1){ ?>
            <li class="page-item"><a class="page-link" href="?page=<?php echo ($page-1) ?>"><?php echo '<'; ?></a></li>
            <?php } ?>
            <?php for ($x=1; $x <= $page_all ; $x++) { ?>
                <li class="page-item <?php if($page === $x){print "active";}
                //else{print "disabled";}  //disabledを適用させると現在ページ以外のリンクが外れてしまうため適用なし
                ?>"><a class="page-link" href="?page=<?php echo $x ?>"><?php echo $x; ?></a></li>
            <?php } ?>
            <?php if($page<$page_all){ ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo ($page+1) ?>"><?php echo '>'; ?></a></li>
            <?php } ?>
    </ul>
</nav>