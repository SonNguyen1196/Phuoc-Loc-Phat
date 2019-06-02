<?php
    /** Template Name: Trang chủ */
    get_header();
?>
<div class="container">
    <div class="row">
        <div class="col-md-9 banner-slider-home">
            <!-- Banner start -->
            <div class="banner">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item banner-max-height active">
                            <img src="<?php echo get_template_directory_uri() ?>/asset/img/banner/banner-slider-1.jpg" alt="banner-slider-1">
                            <div class="carousel-caption banner-slider-inner">
                                <div class="banner-content">
                                    <div class ="big-title-slider" data-animation="animated fadeInDown delay-05s">Find your  Dream House</div>
                                    <p data-animation="animated fadeInUp delay-1s">Lorem ipsum dolor sit amet, conconsectetuer adipiscing elit Lorem ipsum dolor sit amet, conconsectetuer</p>
                                    <a href="#" class="btn button-md button-theme btn-slider-honme" data-animation="animated fadeInUp delay-15s">Get Started Now</a>
                                    <a href="#" class="btn button-md border-button-theme-slider btn-slider-honme" data-animation="animated fadeInUp delay-15s">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div class="item banner-max-height">
                            <img src="<?php echo get_template_directory_uri() ?>/asset/img/banner/banner-slider-2.jpg" alt="banner-slider-2">
                            <div class="carousel-caption banner-slider-inner">
                                <div class="banner-content">
                                    <div class ="big-title-slider" data-animation="animated fadeInDown delay-1s">Sweet Home For Small Family</div>
                                    <p data-animation="animated fadeInUp delay-05s">Lorem ipsum dolor sit amet, conconsectetuer adipiscing elit Lorem ipsum dolor sit amet, conconsectetuer</p>
                                    <a href="#" class="btn button-md button-theme btn-slider-honme" data-animation="animated fadeInUp delay-15s">Get Started Now</a>
                                    <a href="#" class="btn button-md border-button-theme-slider btn-slider-honme" data-animation="animated fadeInUp delay-15s">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="slider-mover-left" aria-hidden="true">
                            <i class="fa fa-angle-left"></i>
                        </span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="slider-mover-right" aria-hidden="true">
                            <i class="fa fa-angle-right"></i>
                        </span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <!-- Banner end -->
            <!-- Search area start -->
            <div class="banner-ads-home">
                <a href="#">
                    <img class="img-responsive" src="<?php echo get_template_directory_uri() ?>/asset/img/banner/ads-banner.jpg" alt="">
                </a>
            </div>
            <!-- Search area start -->

            <!-- Featured properties start -->
            <div class="featured-properties block-left-content">
                <div class="row wow fadeIn delay-04s">
                    <div class="col-md-12 title-block-product ">
                        <div class="col-md-9 nopadding">
                            <h2 class="h2-title text-left">DỰ ÁN ĐANG MỞ BÁN</h2>
                        </div>
                        <div class="col-md-3 nopadding text-right">
                            <a class="view-all-link" href="#">Xem Tất Cả >></a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="line-bottom"></div>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 wow fadeInLeft delay-04s content-post-home" style="visibility: visible; animation-name: fadeInLeft;">
                        <div class="property">
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 col-pad">
                                <!-- Property img -->
                                <div class="property-img">
                                    <img src="<?php echo get_template_directory_uri() ?>/asset/img/properties/properties-list-4.jpg" alt="fp-list" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 property-content">
                                <!-- title -->
                                <h3 class="title">
                                    <a href="properties-details.html">
                                        Bán căn hộ Summer Square Quận 6, 2PN, DT: 65m2, Giá: 1.95 </a>
                                </h1>

                                <ul class="facilities-list fl-2 clearfix">
                                    <li>
                                        <span class="key-content">Giá:</span>
                                        <span>300tr</span>
                                    </li>
                                    <li>
                                        <span class="key-content">Địa Chỉ:</span>
                                        <span>Biên Hòa, Đồng Nai</span>
                                    </li>
                                    <li>
                                        <span class="key-content">Diện Tích:</span>
                                        <span>100m2</span>
                                    </li>
                                    <li>
                                        <span>
                                            <i class="fa fa-calendar"></i> 16/05/2019
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 wow fadeInLeft delay-04s content-post-home" style="visibility: visible; animation-name: fadeInLeft;">
                        <div class="property">
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 col-pad">
                                <!-- Property img -->
                                <div class="property-img">
                                    <img src="<?php echo get_template_directory_uri() ?>/asset/img/properties/properties-list-5.jpg" alt="fp-list" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 property-content">
                                <!-- title -->
                                <h3 class="title">
                                    <a href="properties-details.html">
                                        Bán căn hộ Summer Square Quận 6, 2PN, DT: 65m2, Giá: 1.95 </a>
                                </h1>

                                <ul class="facilities-list fl-2 clearfix">
                                    <li>
                                        <span class="key-content">Giá:</span>
                                        <span>300tr</span>
                                    </li>
                                    <li>
                                        <span class="key-content">Địa Chỉ:</span>
                                        <span>Biên Hòa, Đồng Nai</span>
                                    </li>
                                    <li>
                                        <span class="key-content">Diện Tích:</span>
                                        <span>100m2</span>
                                    </li>
                                    <li>
                                        <span>
                                            <i class="fa fa-calendar"></i> 16/05/2019
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 wow fadeInLeft delay-04s content-post-home" style="visibility: visible; animation-name: fadeInLeft;">
                        <div class="property">
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 col-pad">
                                <!-- Property img -->
                                <div class="property-img">
                                    <img src="<?php echo get_template_directory_uri() ?>/asset/img/properties/properties-list-6.jpg" alt="fp-list" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 property-content">
                                <!-- title -->
                                <h3 class="title">
                                    <a href="properties-details.html">
                                        Bán căn hộ Summer Square Quận 6, 2PN, DT: 65m2, Giá: 1.95 </a>
                                </h1>

                                <ul class="facilities-list fl-2 clearfix">
                                    <li>
                                        <span class="key-content">Giá:</span>
                                        <span>300tr</span>
                                    </li>
                                    <li>
                                        <span class="key-content">Địa Chỉ:</span>
                                        <span>Biên Hòa, Đồng Nai</span>
                                    </li>
                                    <li>
                                        <span class="key-content">Diện Tích:</span>
                                        <span>100m2</span>
                                    </li>
                                    <li>
                                        <span>
                                            <i class="fa fa-calendar"></i> 16/05/2019
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 wow fadeInLeft delay-04s content-post-home" style="visibility: visible; animation-name: fadeInLeft;">
                        <div class="property">
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 col-pad">
                                <!-- Property img -->
                                <div class="property-img">
                                    <img src="<?php echo get_template_directory_uri() ?>/asset/img/properties/properties-list-4.jpg" alt="fp-list" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 property-content">
                                <!-- title -->
                                <h3 class="title">
                                    <a href="properties-details.html">
                                        Bán căn hộ Summer Square Quận 6, 2PN, DT: 65m2, Giá: 1.95 </a>
                                </h1>

                                <ul class="facilities-list fl-2 clearfix">
                                    <li>
                                        <span class="key-content">Giá:</span>
                                        <span>300tr</span>
                                    </li>
                                    <li>
                                        <span class="key-content">Địa Chỉ:</span>
                                        <span>Biên Hòa, Đồng Nai</span>
                                    </li>
                                    <li>
                                        <span class="key-content">Diện Tích:</span>
                                        <span>100m2</span>
                                    </li>
                                    <li>
                                        <span>
                                            <i class="fa fa-calendar"></i> 16/05/2019
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 wow fadeInLeft delay-04s content-post-home" style="visibility: visible; animation-name: fadeInLeft;">
                        <div class="property">
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 col-pad">
                                <!-- Property img -->
                                <div class="property-img">
                                    <img src="<?php echo get_template_directory_uri() ?>/asset/img/properties/properties-list-5.jpg" alt="fp-list" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 property-content">
                                <!-- title -->
                                <h3 class="title">
                                    <a href="properties-details.html">
                                        Bán căn hộ Summer Square Quận 6, 2PN, DT: 65m2, Giá: 1.95 </a>
                                </h1>

                                <ul class="facilities-list fl-2 clearfix">
                                    <li>
                                        <span class="key-content">Giá:</span>
                                        <span>300tr</span>
                                    </li>
                                    <li>
                                        <span class="key-content">Địa Chỉ:</span>
                                        <span>Biên Hòa, Đồng Nai</span>
                                    </li>
                                    <li>
                                        <span class="key-content">Diện Tích:</span>
                                        <span>100m2</span>
                                    </li>
                                    <li>
                                        <span>
                                            <i class="fa fa-calendar"></i> 16/05/2019
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 wow fadeInLeft delay-04s content-post-home" style="visibility: visible; animation-name: fadeInLeft;">
                        <div class="property">
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 col-pad">
                                <!-- Property img -->
                                <div class="property-img">
                                    <img src="<?php echo get_template_directory_uri() ?>/asset/img/properties/properties-list-6.jpg" alt="fp-list" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 property-content">
                                <!-- title -->
                                <h3 class="title">
                                    <a href="properties-details.html">
                                        Bán căn hộ Summer Square Quận 6, 2PN, DT: 65m2, Giá: 1.95 </a>
                                </h1>

                                <ul class="facilities-list fl-2 clearfix">
                                    <li>
                                        <span class="key-content">Giá:</span>
                                        <span>300tr</span>
                                    </li>
                                    <li>
                                        <span class="key-content">Địa Chỉ:</span>
                                        <span>Biên Hòa, Đồng Nai</span>
                                    </li>
                                    <li>
                                        <span class="key-content">Diện Tích:</span>
                                        <span>100m2</span>
                                    </li>
                                    <li>
                                        <span>
                                            <i class="fa fa-calendar"></i> 16/05/2019
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Featured properties end -->


            <!-- Featured properties start -->
            <div class="featured-properties block-left-content">
                <div class="row wow fadeIn delay-04s">
                    <div class="col-md-12 title-block-product ">
                        <div class="col-md-9 nopadding">
                            <h2 class="h2-title text-left">TIN TỨC</h2>
                        </div>
                        <div class="col-md-3 nopadding text-right">
                            <a class="view-all-link" href="#">Xem Tất Cả >></a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="line-bottom"></div>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 wow fadeInLeft delay-04s content-post-home" style="visibility: visible; animation-name: fadeInLeft;">
                        <div class="property">
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 col-pad">
                                <!-- Property img -->
                                <div class="property-img">
                                    <img src="<?php echo get_template_directory_uri() ?>/asset/img/properties/properties-list-4.jpg" alt="fp-list" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 property-content">
                                <!-- title -->
                                <h3 class="title">
                                    <a href="properties-details.html">
                                        5 cách kích hoạt năng lượng tốt cho phòng làm việc đầu năm mớ </a>
                                </h1>

                                <div class="facilities-list fl-2 clearfix">
                                    <p> 
                                            Đầu năm là khoảng thời gian thích hợp nhất cho việc sắp xếp, bố trí lại văn phòng làm việc để 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 wow fadeInLeft delay-04s content-post-home" style="visibility: visible; animation-name: fadeInLeft;">
                        <div class="property">
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 col-pad">
                                <!-- Property img -->
                                <div class="property-img">
                                    <img src="<?php echo get_template_directory_uri() ?>/asset/img/properties/properties-list-5.jpg" alt="fp-list" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 property-content">
                                <!-- title -->
                                <h3 class="title">
                                    <a href="properties-details.html">
                                            Phòng làm việc hợp phong thủy giúp sự nghiệp bền vững </a>
                                </h1>

                                <div class="facilities-list fl-2 clearfix">
                                    <p>Bố trí văn phòng hợp phong thủy giúp tăng vượng khí</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 wow fadeInLeft delay-04s content-post-home" style="visibility: visible; animation-name: fadeInLeft;">
                        <div class="property">
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 col-pad">
                                <!-- Property img -->
                                <div class="property-img">
                                    <img src="<?php echo get_template_directory_uri() ?>/asset/img/properties/properties-list-6.jpg" alt="fp-list" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 property-content">
                                <!-- title -->
                                <h3 class="title">
                                    <a href="properties-details.html">
                                            Năm 2019, tuổi nào nên mua nhà, xây nhà?</a>
                                </h1>

                                <div class="facilities-list fl-2 clearfix">
                                    <p>Theo chuyên gia phong thủy, năm 2019 tuổi Hợi sẽ có dòng chảy tài chính rất mạnh mẽ, vì vậy nên đầu tư vào việc mua nhà đất để đem lại lợi </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 wow fadeInLeft delay-04s content-post-home" style="visibility: visible; animation-name: fadeInLeft;">
                        <div class="property">
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 col-pad">
                                <!-- Property img -->
                                <div class="property-img">
                                    <img src="<?php echo get_template_directory_uri() ?>/asset/img/properties/properties-list-4.jpg" alt="fp-list" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 property-content">
                                <!-- title -->
                                <h3 class="title">
                                    <a href="properties-details.html">
                                            Trang trí nhà đón Tết: Chọn hoa tươi theo mệnh gia chủ
                                            Xem tuổi xây nhà  </a>
                                </h1>

                                <div class="facilities-list fl-2 clearfix">
                                    <p>Trang trí nội thất phòng ngủ hợp phong thủy với người tuổi Mão, Trang trí nội thất phòng ngủ hợp phong thủy với người tuổi Mão</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 wow fadeInLeft delay-04s content-post-home" style="visibility: visible; animation-name: fadeInLeft;">
                        <div class="property">
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 col-pad">
                                <!-- Property img -->
                                <div class="property-img">
                                    <img src="<?php echo get_template_directory_uri() ?>/asset/img/properties/properties-list-5.jpg" alt="fp-list" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 property-content">
                                <!-- title -->
                                <h3 class="title">
                                    <a href="properties-details.html">
                                            Phong thủy nhà ở đón năm mới (P1): Cách tạo sinh khí cho nơi ở</a>
                                </h1>

                                <div class="facilities-list fl-2 clearfix">
                                    <p>Để có một môi trường sống an lành về vị trí - cấu trúc, an hòa về công năng - tương tác và an </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 wow fadeInLeft delay-04s content-post-home" style="visibility: visible; animation-name: fadeInLeft;">
                        <div class="property">
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 col-pad">
                                <!-- Property img -->
                                <div class="property-img">
                                    <img src="<?php echo get_template_directory_uri() ?>/asset/img/properties/properties-list-6.jpg" alt="fp-list" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 property-content">
                                <!-- title -->
                                <h3 class="title">
                                    <a href="properties-details.html">
                                            Những nguyên tắc trang trí nhà hợp phong thủy cho người trẻ</a>
                                </h1>

                                <div class="facilities-list fl-2 clearfix">
                                    <p>
                                            Phong thủy trong kiến trúc nhà lệch tầng và cách hóa giải
                                            Phong thủy bài trí tiểu cảnh sân vườn
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Featured properties end -->
        </div>
        <div class="col-md-3">
            <div class=" banner-right-cost">
                <img class="img-responsive" src = "<?php echo get_template_directory_uri() ?>/asset/img/banner/banner-right.jpg" >
                <div class="title">HỖ TRỢ VAY VỐN</div>
                <div class="action-link"><a href="#">XEM NGAY</a></div>
            </div>


            <div class="sidebar-widget popular-posts custom-sidebar-widget">
                <div class="main-title-2 ">
                    <h2 class="title-widget">DỰ ÁN NỔI BẬT</h2>
                </div>
                <div class="media">
                    <div class="media-left">
                        <img class="media-object" src="<?php echo get_template_directory_uri() ?>/asset/img/properties/small-properties-1.jpg" alt="small-properties-1">
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">
                            <a href="properties-details.html">Sweet Family Home</a>
                        </h3>
                        <p>February 27, 2018</p>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                        <img class="media-object" src="<?php echo get_template_directory_uri() ?>/asset/img/properties/small-properties-2.jpg" alt="small-properties-2">
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">
                            <a href="properties-details.html">Modern Family Home</a>
                        </h3>
                        <p>February 27, 2018</p>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                        <img class="media-object" src="<?php echo get_template_directory_uri() ?>/asset/img/properties/small-properties-3.jpg" alt="small-properties-3">
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">
                            <a href="properties-details.html">Beautiful Single Home</a>
                        </h3>
                        <p>February 27, 2018</p>
                    </div>
                </div>

                <div class="media">
                    <div class="media-left">
                        <img class="media-object" src="<?php echo get_template_directory_uri() ?>/asset/img/properties/small-properties-1.jpg" alt="small-properties-1">
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">
                            <a href="properties-details.html">Sweet Family Home</a>
                        </h3>
                        <p>February 27, 2018</p>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                        <img class="media-object" src="<?php echo get_template_directory_uri() ?>/asset/img/properties/small-properties-2.jpg" alt="small-properties-2">
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">
                            <a href="properties-details.html">Modern Family Home</a>
                        </h3>
                        <p>February 27, 2018</p>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                        <img class="media-object" src="<?php echo get_template_directory_uri() ?>/asset/img/properties/small-properties-3.jpg" alt="small-properties-3">
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">
                            <a href="properties-details.html">Beautiful Single Home</a>
                        </h3>
                        <p>February 27, 2018</p>
                    </div>
                </div>
            </div>

            <div class="facebook-iframe">
                <img class="img-responsive" src="<?php echo get_template_directory_uri() ?>/asset/img/banner/banner-right-centana-thu-thiem.jpg" alt="">
            </div>

        </div>
    </div>
</div>

<div class="intro-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <img src="<?php echo get_template_directory_uri() ?>/asset/img/logos/logo-2.png" alt="logo-2">
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <form action="#" method="post">
                    <div class="row">
                        <div class="col-md-8">
                                <div class="form-group get-email-subcrribe">
                                    <input class="nsu-field btn-block" id="nsu-email-0" type="text" name="email" placeholder="Enter your Email Address" required="">
                                </div>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="button-sm button-theme btn-block"> Subscribe</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- <?php get_footer(); ?> -->