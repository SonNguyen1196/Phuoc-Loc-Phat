<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ven_Creative
 */

?>


<div id="login-register-password">

    <?php global $user_ID, $user_identity;
    if (!$user_ID) : ?>
        <div class="tab_container_login active-popup-login">
            <div class="form-wrapper">
                <div class="close-poup">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </div>
                <div class="all_tab_log">
                    <!--					<div id="tab1_login" class="default_login tab_content_login">-->
                    <!--						<h3>Sign in</h3>-->
                    <!--						<p>Start your purchase now!</p>-->
                    <!--						<a href="javascript:void(0)" class="btn icon-btn btn-block btn-large row-space-1 btn-facebook" onclick="_login();">-->
                    <!--							<span class="text-container">Login facebook</span>-->
                    <!--						</a>-->
                    <!--						<div id="result"></div>-->
                    <!--						<form method="post" onsubmit="return false" class="form_submit_login">-->
                    <!--							<div class="username">-->
                    <!--								<label>--><?php //_e('Email'); ?><!--: </label>-->
                    <!--								<input type="text" placeholder="Email" name="user_mail_login" value="" size="20"-->
                    <!--									   id="user_mail_login" tabindex="11"/>-->
                    <!--								<span class="user_mail_login error_mes">Email error</span>-->
                    <!--							</div>-->
                    <!--							<div class="password">-->
                    <!--								<label>--><?php //_e('Password'); ?><!--: </label>-->
                    <!--								<input placeholder="Password" type="password" name="user_pass_login" value="" size="20"-->
                    <!--									   id="user_pass_login" tabindex="12"/>-->
                    <!--								<span class="user_pass_login error_mes">Password error</span>-->
                    <!--							</div>-->
                    <!--							<div class="login_fields">-->
                    <!--								<div class="rememberme">-->
                    <!--									<label for="rememberme">-->
                    <!--										<input type="checkbox" name="user_rememberme_login" value="" checked="checked"-->
                    <!--											   id="rememberme" tabindex="13"/> Remember me-->
                    <!--										<span class="check-mark"></span>-->
                    <!--									</label>-->
                    <!--								</div>-->
                    <!--								<div id="err_loading_login"></div>-->
                    <!--								<div class="bt_sign_in_tab1">-->
                    <!--									<button class="btn_user-submit">Sign in</button>-->
                    <!--								</div>-->
                    <!--							</div>-->
                    <!--							<div class="forgot_pass">-->
                    <!--								<p>Don’t have an account? <a class="sign_up_link" href="">Sign up here</a></p>-->
                    <!--								<span class="forgot_pass_link"><a href="">Forgot password?</a></span>-->
                    <!--							</div>-->
                    <!--						</form>-->
                    <!--					</div>-->
                    <div id="tab2_login" class="default_login tab_content_registy visiable-hidden">
                        <h3>Sign up</h3>
                        <p>Sign up now for more advantage!</p>
                        <form method="post" onsubmit="return false" class="form_submit_registy">
                            <div class="tab-one">
                                <ul>
                                    <li class="sign_up_field width50">
                                        <label for="first_name_registy"><?php _e('First Name'); ?>: </label>
                                        <input placeholder="First Name" type="text" name="first_name_registy" value=""
                                               id="first_name_registy" tabindex="101"/>
                                        <span class="first_name_registy error_mes">First name error</span>
                                    </li>
                                    <li class="sign_up_field width50 fr">
                                        <label for="last_name_registy"><?php _e('Last Name'); ?>: </label>
                                        <input placeholder="Last Name" type="text" name="last_name_registy" value=""
                                               id="last_name_registy" tabindex="101"/>
                                        <span class="last_name_registy error_mes">Last name error</span>
                                    </li>
                                    <li class="sign_up_field width100">
                                        <label for="user_email_registy"><?php _e('Email'); ?>: </label>
                                        <input placeholder="Email" type="text" name="user_email_registy" value=""
                                               id="user_email_registy" tabindex="101"/>
                                        <span class="user_email_registy error_mes">Email error</span>
                                    </li>
                                </ul>
                            </div>


                            <div class="tab-two">
                                <ul>
                                    <li class="sign_up_field width50">
                                        <label for="user_pass_registy"><?php _e('Password'); ?>: </label>
                                        <input placeholder="Password" type="password" name="user_pass_registy" value=""
                                               id="user_pass_registy" tabindex="101"/>
                                        <span class="user_pass_registy error_mes">Password error</span>
                                    </li>
                                    <li class="sign_up_field width50 fr">
                                        <label for="user_pass_confirm_registy"><?php _e('Confirm'); ?>: </label>
                                        <input placeholder="Confirm" type="password" name="user_pass_confirm_registy"
                                               value="" id="user_pass_confirm_registy" tabindex="101"/>
                                        <span class="user_pass_confirm_registy error_mes">Password confirm error</span>
                                    </li>

                                    <li class="sign_up_field check-privacy">
                                        <label for="user_agree_registy"><?php _e('Website Terms'); ?>: </label>
                                        <?php
                                        $link_privacy = get_field('link_privacy_policy', 'option');
                                        ?>
                                        <input type="checkbox" checked="checked" id="user_agree_registy"
                                               onclick=""><span>I agree to <a
                                                href="#">Website Terms of Use</a> </span>
                                        <span class="check-mark"></span>
                                        <span class="user_agree_registy error_mes">Not checked</span>
                                    </li>
                                </ul>
                                <?php
                                unset($_SESSION['login_nonce']);
                                $_SESSION['login_nonce'] = rand(11111, 99999);
                                ?>
                                <input type="hidden" value="<?php echo wp_create_nonce($_SESSION['login_nonce']); ?>"
                                       id="login_nonce"/>
                                <div id="err_loading"></div>
                                <div class="bt_sign_up_tab2">
                                    <!-- <input type="submit" name="user-registy-submit" value="Sign Up" tabindex="14" class="registy" />-->
                                    <button class="btn_registy">sign up</button>
                                </div>
                                <span class="already">
                            Already have an account? <a class="bt_sign_in_tab2" href="">Sign in</a>
                        </span>
                            </div>
                            <div class="back-next">
                                <div class="pre-tab"><span><i class="fa fa-arrow-left"
                                                              aria-hidden="true"></i> Back</span></div>

                                <div class="next-tab">Next <span><i class="fa fa-arrow-right"
                                                                    aria-hidden="true"></i></span></div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg_popup_login"></div>
    <?php endif; ?>
</div>
<div id="hide_me" style="display: none"></div>
<footer class="footer-page">
    <div class="container">
        <div class="contact">Call Emma on <span>0423 230 376</span> for bookings  </div>
        <div class="list-menu">
            <div class="col-menu"><span>Discover</span>
                <ul>
                    <li class="active"> <a href="about.html">About</a></li>
                    <li> <a href="services.html">Services</a></li>
                    <li> <a href="products.html">Products</a></li>
                    <li> <a href="information.html">Information</a></li>
                    <li> <a href="blog.html">Blog</a></li>
                </ul>
            </div>
            <div class="col-menu"><span>Customer care</span>
                <ul>
                    <li> <a href="contact.html">Contact</a></li>
                    <li class="form-custom">
                        <p>Subscribe to our newsletter</p>
                        <div class="wrap-letter">
                            <form action="">
                                <input class="input-text" type="text"/>
                                <input class="btn-submit" type="submit" value=""/>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="address">Waterman Business Centre, Level 2, 1341 Dandenong Rd, Chadstone VIC 3148</div>
        <div class="logo-footer parallax-ele" data-speed="-0.1"><a class="img-drop" href="index.html"><img src="<?php echo THEME_URI ?>/html/upload/logo-home.svg" alt=""/></a></div>
        <ul class="copyright">
            <li>&copy; 2018 Pure Cosmetic </li>
            <li><a href="https://vencreative.com.au/" target="_blank">Website by VEN</a></li>
        </ul>
    </div><a class="page-top" href="#" id="page-top"> <i class="icon top">Top</i></a>
</footer>

<script data-src="https://maps.google.com/maps/api/js?libraries=places&amp;key=AIzaSyApEpQ5tDwzlRfH1vuo4351Bwdar8OzyUI" id="google-map"></script>
<?php wp_footer(); ?>
<script>
    (function(thisdocument, scriptelement, id) {
        var js, fjs = thisdocument.getElementsByTagName(scriptelement)[0];
        if (thisdocument.getElementById(id)) return;
        js = thisdocument.createElement(scriptelement); js.id = id;
        js.src = "http://connect.facebook.net/vi_VN/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '922714947803940',
            cookie :false,
            xfbml      : true,
            version    : 'v2.7'
        });

    };


    function _login() {
        FB.login(function(response) {
            if(response.status==='connected') {
                _i();
            }
        }, {scope: 'public_profile,email',});
    }
    function _i(){
        FB.api('/me', { locale: 'en_US', fields: 'id,name,first_name,last_name, email' }, function(response) {
            jQuery.ajax({
                url: "<?php echo admin_url('admin-ajax.php') ?>?action=login_face",
                type: "POST",
                data: {
                    "id": response.id,
                    "fname": response.first_name,
                    "lname": response.last_name,
                    "email": response.email
                },
                success: function(result){
                    jQuery("#hide_me").html(result);
                }});

        });
    }
</script>
</body>
</html>
