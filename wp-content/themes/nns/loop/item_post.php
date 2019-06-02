<div class="col-sm-4 <?php echo $arg->class; ?>">
    <div class="item">
        <div class="feature-image">
            <a href="<?php echo $arg->link ;?>">
                <img src="<?php echo $arg->image ;?>" alt="<?php echo $arg->title; ?>">
                <div class="hover-image">
                    <img src="<?php echo THEME_URI ?>/images/eye-3.svg" alt="eye-3">
                </div>
            </a>
        </div>
        <div class="content-item">
            <div class="entry-title"><h3><a href="<?php echo $arg->link ;?>" style="display: inline; transition: transform 0.1s; transform: translateX(-155.703px);"><?php echo $arg->title;?></a></h3></div>
            <div class="wrapper">
                <?php echo $arg->html_cat; ?>
                <div class="author"><h4><?php _e('Đăng bởi :'); ?><span><?php echo $arg->author; ?></span></h4></div>
            </div>

            <div class="entry-content">
                <?php echo $arg->content; ?>
            </div>

            <div class="read-more">
                <a href="<?php echo $arg->link ;?>" class="link-read-more"><?php _e('đọc thêm');?></a>
            </div>
        </div>
    </div>
</div>