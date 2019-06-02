<?php
/*Template Name: Home*/
get_header();
?>
<main class="template-home">
    <?php
        $bg_banner=get_field('background_image_banner');
        $title_banner=get_field('title_banner');
        $description=get_field('description_banner');
        $button=get_field('button');
        if($bg_banner||$title_banner||$description||$button):
    ?>
    <section class="banner-top" style="background-image: url('<?php echo $bg_banner['url'];?>'); background-size: cover">
        <div class="container">
            <div class="content-banner">
                <?php echo acf_render('<h1>','</h1>',$title_banner);?>
                <?php echo acf_render('<h4>','</h4>',$description);?>
                <?php if($button):?><a href="<?php echo $button['url']; ?>" target="<?php echo $button['target'];?>" class="button-style"><?php echo $button['title']; ?></a><?php endif;?>
            </div>
        </div>
    </section>
    <?php endif;?>

    <?php
        $title_our_website=get_field('title_our_website');
        $list_itembox_our_website=get_field('list_itembox_our_website');
        if($title_our_website||$list_itembox_our_website):
    ?>
    <section id="nt-itembox" class="nt-itembox">
        <div class="container">
            <?php echo acf_render('<div class="title"><h3>','</h3></div>',$title_our_website);?>
            <?php if($list_itembox_our_website):?>
            <div class="row">
                <?php foreach ($list_itembox_our_website as $list_itembox): ?>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="box-service">
                        <img src="<?php echo $list_itembox['icon']['url']; ?>" alt="<?php echo $list_itembox['icon']['alt']; ?>">
                        <?php echo acf_render('<h6>','</h6>',$list_itembox['title']);?>

                        <?php if(!empty($list_itembox['list_service'])): ?>
                        <ul>
                            <?php foreach ($list_itembox['list_service'] as $list_service): ?>
                                <?php echo acf_render('<li>','</li>',$list_service['service_item']);?>
                            <?php endforeach;?>
                        </ul>
                        <?php endif;?>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
            <?php endif;?>
        </div>
    </section>
    <?php endif;?>

    <?php
        $title_implementation_process=get_field('title_implementation_process');
        $description_implementation_process=get_field('description_implementation_process');
        $list_iconbox=get_field('list_icon_box_implementation_process');
        if($title_implementation_process||$description_implementation_process||$list_iconbox):
    ?>
    <section id="nt-work-rule" class="nt-work-rule">
        <div class="container">
            <?php if($title_implementation_process||$description_implementation_process): ?>
            <div class="title">
                <?php echo acf_render('<h3>','</h3>',$title_implementation_process);?>
                <?php echo acf_render('<h4>','</h4>',$description_implementation_process);?>
            </div>
            <?php endif;?>

            <?php if($list_iconbox): ?>
            <div class="row">
                <?php foreach ($list_iconbox as $iconbox): ?>
                    <div class="col">
                        <div class="step-work">
                            <img src="<?php echo $iconbox['icon']['url']; ?>" alt="<?php echo $iconbox['icon']['alt']; ?>">
                            <?php echo acf_render('<p>','</p>',$iconbox['description']);?>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
            <?php endif;?>
        </div>
    </section>
    <?php endif;?>

    <?php
        $bg_contact=get_field('background_contact');
        $title_contact=get_field('title_contact');
        $mall_title_contact=get_field('mall_title_contact');
        $phone_number_contact=get_field('phone_number_contact');
        $hotline_contact=get_field('hotline_contact');
        $email_contact=get_field('email_contact');
        $form_shortcode_contact=get_field('form_shortcode_contact');
        $find=array(' ','(',')','.','-');
        if($bg_contact||$title_contact||$mall_title_contact||$phone_number_contact||$hotline||$email||$form_shortcode_contact):
    ?>
    <section class="form-advisory" style="background-image: url('<?php echo $bg_contact['url']; ?>');">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 content">
                    <?php echo acf_render('<h3 class="title-left">','</h3>',$title_contact);?>
                    <div class="information">
                        <?php echo acf_render('<h3>','</h3>',$mall_title_contact);?>
                        <div class="infor-left">
                            <?php if($phone_number_contact): ?>
                                <div class="phone">
                                    <h4><b class="text-red">PHONE:</b> <a href="tel:<?php echo str_replace($find,'',$phone_number_contact); ?>"><?php echo $phone_number_contact; ?></a></h4>
                                </div>
                            <?php endif;?>

                            <?php if($hotline_contact): ?>
                                <div class="hotline">
                                    <h4><b class="text-red">HOTLINE:</b><a href="tel:<?php echo str_replace($find,'',$hotline_contact); ?>"> <?php echo $hotline_contact; ?></a></h4>
                                </div>
                            <?php endif;?>
                        </div>
                        <?php if($email_contact): ?>
                            <div class="infor-right">
                                <div class="email">
                                    <h4><b class="text-red">EMAIL:</b><a href="mailto:<?php echo $email_contact;?>"> <?php echo $email_contact; ?> </a></h4>
                                </div>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 form-right">
                    <?php echo do_shortcode($form_shortcode_contact);?>
                </div>
            </div>
        </div>
    </section>
    <?php endif;?>

    <?php
        $title_customer=get_field('title_customers');
        $description_customer=get_field('description_customers');
        $list_customers=get_field('list_customers');
        if($title_customer||$description_customer||$list_customers):
    ?>
    <section id="nt-customer-img" class="nt-customer-img">
        <div class="container">
            <div class="title">
                <?php echo acf_render('<h3>','</h3>',$title_customer);?>
                <?php echo acf_render('<h4>','</h4>',$description_customer);?>
            </div>
            <?php if($list_customers):?>
            <div class="row">
                <?php foreach ($list_customers as $customer):?>
                    <div class="col-12 col-img">
                        <div class="customer-img">
                            <img src="<?php echo $customer['logo_company']['url']; ?>" alt="customer">
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
            <?php endif;?>
        </div>
    </section>
    <?php endif; ?>

    <?php
        $title_price_website=get_field('title_price_website');
        echo acf_render('<div class="title-price text-center">','</div>',$title_price_website);
    ?>

    <?php
        $list_price=get_field('list_price');
        $count_list_price_item=0;
        foreach ($list_price as $list_price_item):$count_list_price_item++;
        if($count_list_price_item%2!=0):
    ?>
    <section class="price-list">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 content-left">
                    <?php echo acf_render('<h2>','</h2>',$list_price_item['title_content']);?>
                    <?php echo acf_render('<h4>','</h4>',$list_price_item['price_website']);?>
                    <?php echo acf_render('<p>','</p>',$list_price_item['description_price_website']);?>
                    <div class="button">
                        <a  class="btn-n" href="<?php echo $list_price_item['button_view_price_website']['url']; ?>"><?php echo $list_price_item['button_view_price_website']['title']; ?></a>
                        <a  class="btn-m" href="<?php echo $list_price_item['button_contact_price_website']['url']; ?>"><?php echo $list_price_item['button_contact_price_website']['title']; ?></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 text-center content-right">
                    <?php if($list_price_item['image_right_price_website']): ?>
                        <img src="<?php echo $list_price_item['image_right_price_website']['url']?>" alt="img-right">
                    <?php endif;?>
                </div>
            </div>
        </div>
    </section>
    <?php else:?>
        <section class="price-list request">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 text-center content-left">
                        <?php if($list_price_item['image_right_price_website']): ?>
                            <img src="<?php echo $list_price_item['image_right_price_website']['url']?>" alt="img-right">
                        <?php endif;?>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 content-right">
                        <?php echo acf_render('<h2>','</h2>',$list_price_item['title_content']);?>
                        <?php echo acf_render('<h4>','</h4>',$list_price_item['price_website']);?>
                        <?php echo acf_render('<p>','</p>',$list_price_item['description_price_website']);?>
                        <div class="button">
                            <a  class="btn-n" href="<?php echo $list_price_item['button_view_price_website']['url']; ?>"><?php echo $list_price_item['button_view_price_website']['title']; ?></a>
                            <a  class="btn-m" href="<?php echo $list_price_item['button_contact_price_website']['url']; ?>"><?php echo $list_price_item['button_contact_price_website']['title']; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; endforeach;?>
</main>
<?php get_footer();?>
