<?php
    /** Template Name: Home Page */
    get_header();
?>
<?php $posts_per_page = 6; ?>
<main id="main-home-page">
    <section class="porfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 title text-left">
                    <h1>DANH MỤC</h1>
                    <div class="list-category">
                        <ul>
                            <li class="active"><a href="javascript:void(0)">All</a></li>
                            <?php foreach (get_categories(array('orderby'=>'id')) as $category): ?>
                                <li><a href="javascript:void(0)" data-cat="<?php echo $category->term_id; ?>"><?php echo $category->name; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                        <input type="hidden" name="posts_number" id="posts_number" value="<?php echo $posts_per_page; ?>">
                    </div>
                </div>
                <?php
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                );
                $total = pp_posts_count($args);
                $args['posts_per_page'] = $posts_per_page;
                $the_query = new WP_Query($args);
                ?>
                <?php if($the_query->have_posts()): ?>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 list-item-blog">
                    <h2>MẪU WEBSITE</h2>
                    <div class="row">
                        <?php while($the_query->have_posts()): $the_query->the_post(); ?>
                            <?php $project = get_field('project_details')[0]; ?>
                            <div id="project-<?php the_ID(); ?>" class="project-item col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="item">
                                    <div class="feature-image">
                                        <a href="javascript:void()">
                                            <?php $image = get_post_thumbnail_id()?hr_cropt(get_post_thumbnail_id(),360,230):''; ?>
                                            <?php if(!empty($image)): ?>
                                                <img src="<?php echo $image; ?>" alt="<?php the_title(); ?>">
                                            <?php endif; ?>
                                            <div class="hover-image">
                                                <img src="<?php echo THEME_URI;?>/images/icon-hover-post.svg" alt="">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="content-item">
                                        <div class="entry-category"><?php echo pp_category_text(); ?></div>
                                        <div class="entry-title">
                                            <h3><a href="javascript:void()"><?php the_title(); ?></a></h3>
                                        </div>
                                        <?php if($project['short_description']): ?>
                                        <div class="entry-content">
                                            <?php echo $project['short_description']; ?>
                                        </div>
                                        <?php endif; ?>
                                        <div class="view-detail">
                                            <a href="javascript:void()">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>

                    <div id="project-lazyload" class="col-xs-12<?php if($total <= $posts_per_page) echo " disabled" ?>" data-time="1">
                        <div class="spinner">
                            <div class="rect1"></div>
                            <div class="rect2"></div>
                            <div class="rect3"></div>
                            <div class="rect4"></div>
                            <div class="rect5"></div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>
<div class="post">
</div>
<div class="bg-black-popup">
    <img class="iconclose" src="<?php echo THEME_URI;?>/images/icon-close.svg" alt="icon-close.svg">
</div>
<script id="post-item-template" type="text/template">
    <div id="project-<%= id %>" class="project-item col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="item">
            <div class="feature-image">
                <a href="javascript:void()">
                    <img src="<%= image.src %>" alt="<%= image.alt %>">
                    <div class="hover-image">
                        <img src="<?php echo THEME_URI;?>/images/icon-hover-post.svg" alt="">
                    </div>
                </a>
            </div>
            <div class="content-item">
                <div class="entry-category"><%= categories %></div>
                <div class="entry-title">
                    <h3><a href="javascript:void()"><%= title %></a></h3>
                </div>
                <div class="entry-content"><%= short_description %></div>
                <div class="view-detail">
                    <a href="javascript:void()">View Detail</a>
                </div>
            </div>
        </div>
    </div>
</script>
<script id="post-detail-template" type="text/template">
    <div class="container">
        <div class="title-post">
            <div class="row">
                <div class="col-xs-12 back-to-project">
                    <a href=""><i class="fa fa-angle-left"></i>Back</a>
                </div>
            </div>
        </div>
        <div class="content-post">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 content-project">
                    <div class="content">
                        <%= content %>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 content-project">
                    <div class="content">
                        <div class="entry-title">
                            <h3><%= title %></h3>
                        </div>
                        <div class="information-project">
                            <div class="scheme">
                                <h4>SCHEME<span>.</span></h4>
                                <% _.each(color_scheme, function(e){ %>
                                    <span style="background: <%= e.color %>"></span>
                                <% }) %>
                            </div>
                            <div class="website">
                                <h4>WEBSITE<span>.</span></h4>
                                <a href="<%= website %>" target="_blank"><%= website %></a>
                            </div>
                            <% if(overview){ %>
                            <div class="over-view">
                                <h4>OVERVIEW<span>.</span></h4>
                                <%= overview %>
                            </div>
                            <% } %>
                            <% if(challenge){ %>
                            <div class="our-chanllenge">
                                <h4>OUR CHALLENGE<span>.</span></h4>
                                <%= challenge %>
                            </div>
                            <% } %>
                        </div>
                        <div class="form-portfolio">
                            <div class="title-form">
                                <h3>TƯ VẤN THIẾT KẾ</h3>
                            </div>
                            <?php echo do_shortcode('[contact-form-7 id="603" title="Form tư vấn"]');?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="slider-web">
            <div class="button-portfolio"><a class="btn-m" href="">YÊU CẦU TƯ VẤN</a></div>
            <img src="<%= image_project %>" alt="">
		</div>
      
    </div>
</script>
<?php get_footer(); ?>