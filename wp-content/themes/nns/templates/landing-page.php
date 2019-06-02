<?php
/** Template Name: Landing Page */
get_header();
?>
<section class="form-advisory" style="background-image: url('<?php echo THEME_URI ?>/images/img-form.png')">
    <div class="container">
    <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 content">
            <h3 class="title-left">Khởi Động Thành Công Của Bạn
                <b class="text-red">NGAY HÔM NAY!</b>
            </h3>
            <div class="information">
                <h3>TƯ VẤN THIẾT KẾ WEBSITE</h3>
                <div class="infor-left">
                    <div class="phone">
                        <h4><b class="text-red">PHONE:</b> <a href="tel:+(028).6287.6262">(028).6287.6262</a></h4>
                    </div>
                    <div class="hotline">
                        <h4><b class="text-red">HOTLINE:</b><a href="tel:+"> 0989.238.648</a></h4>
                    </div>
                </div>
                <div class="infor-right">
                    <div class="email">
                        <h4><b class="text-red">EMAIL:</b><a href="mailto:john@namtech.com.au">  john@namtech.com.au</a></h4>
                    </div>
                    <div class="email">
                        <h4><b class="text-red">EMAIL:</b><a href="mailto:tony@namtech.com.au"> tony@namtech.com.au</a> </h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 form-right">
                <?php echo do_shortcode('[contact-form-7 id="603" title="Form tư vấn"]');?>
        </div>
    </div>
    </div>
</section>


<div class="title-price text-center">
    Bảng giá thiết kế website tham khảo
</div>
<section class="price-list">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 content-left">
                 <h3>Gói theo mẫu</h3>
                 <h4>7.000.000 vnđ</h4>
                 <p>Đáp ứng các yêu cầu cơ bản cho
                    doanh nghiệp vừa và nhỏ
                 </p>
                <div class="button">
                        <a  class="btn-n" href="">XEM TÍNH NĂNG</a>
                        <a  class="btn-m" href="">YÊU CẦU TƯ VẤN</a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 text-center content-right">
                <img src="<?php echo THEME_URI ?>/images/img-right.png" alt="img-right">
            </div>
        </div>
    </div>
</section>

<section class="price-list request">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 content-left">
                <img src="<?php echo THEME_URI ?>/images/img-left.png" alt="img-left">
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 content-right">
                <h3>Gói yêu cầu</h3>
                <h4>Đáp ứng các yêu cầu
                    đặc thù riêng cho Website
                    của Quý khách</h4>
                <div class="button">
                    <a  class="btn-n" href="">XEM TÍNH NĂNG</a>
                    <a  class="btn-m" href="">YÊU CẦU TƯ VẤN</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer();?>
