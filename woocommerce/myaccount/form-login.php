<?php
    /**
     * Login Form
     *
     * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
     *
     * HOWEVER, on occasion WooCommerce will need to update template files and you
     * (the theme developer) will need to copy the new files to your theme to
     * maintain compatibility. We try to do this as little as possible, but it does
     * happen. When this occurs the version of the template file will be bumped and
     * the readme will list any important changes.
     *
     * @see     https://docs.woocommerce.com/document/template-structure/
     * @package WooCommerce/Templates
     * @version 4.1.0
     */
    
    if ( ! defined( 'ABSPATH' ) ) {
      exit; // Exit if accessed directly
    }
    
    $login_actived = true;
    if ( ! empty( $_POST ) && isset( $_POST['woocommerce-register-nonce'] ) && ! empty( $_POST['woocommerce-register-nonce'] ) ) {
      $login_actived = false;
    }
    
    ?>


    <?php do_action( 'woocommerce_before_customer_login_form' ); ?>

    <?php
    $login_class     = $login_actived ? 'active' : '';
    $register_class  = ! $login_actived ? 'active' : '';
    $col_login_class = 'col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3';

  
    ?>

<div class="customer-login">
    <div class="row justify-content-center">
        <div class="<?php echo esc_attr( $col_login_class ); ?> col-login">
            <div class="urbanfashion-login-form-content">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="active" role="presentation"><a href="#home" id="home-tab" class="<?php echo esc_attr( $login_class ); ?>" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><?php esc_html_e( 'Log in', 'urbanfashion' ); ?></a></li>
                  <li role="presentation"><a id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" class="<?php echo esc_attr( $register_class ); ?>"><?php esc_html_e( 'Register', 'urbanfashion' ); ?></a></li>
                </ul>

                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active <?php echo esc_attr( $login_class ); ?>" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h2><?php esc_html_e( 'Log In Your Account', 'urbanfashion' ); ?></h2>
                        <form class="woocommerce-form woocommerce-form-login login" method="post">
                            <?php do_action( 'woocommerce_login_form_start' ); ?>
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" required placeholder="<?php esc_html_e( 'Username or email address', 'urbanfashion' ); ?>" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>"/>
                            </p>
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-row-password">
                                <input class="woocommerce-Input woocommerce-Input--text input-text" required placeholder="<?php esc_html_e( 'Password', 'urbanfashion' ); ?>" type="password" autocomplete="current-password" name="password" id="password"/>
                            </p>
                            <?php do_action( 'woocommerce_login_form' ); ?>
                            <p class="form-row">
                                <div class="woocommerce-form-row__remember">
                                  <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                                    <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever"/>
                                    <span><?php esc_html_e( 'Remember me', 'urbanfashion' ); ?></span>
                                  </label>
                                  <a class="lost-password" href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Forgot your password?', 'urbanfashion' ); ?></a>
                                </div>
                                <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                                <button type="submit" class="woocommerce-Button button" name="login" value="<?php esc_attr_e( 'Log in', 'urbanfashion' ); ?>"><?php esc_html_e( 'Log in', 'urbanfashion' ); ?></button>
                            </p>
                            <?php do_action( 'woocommerce_login_form_end' ); ?>
                        </form>
                    </div>

                    <div class="tab-pane <?php echo esc_attr( $register_class ); ?>" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h2><?php esc_html_e( 'Register An Account', 'urbanfashion' ); ?></h2>
                        <form method="post" class="register woocommerce-form woocommerce-form-register">
                            <?php do_action( 'woocommerce_register_form_start' ); ?>
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <input type="text" required class="woocommerce-Input woocommerce-Input--text input-text" placeholder="<?php esc_html_e( 'Username', 'urbanfashion' ); ?>" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>"/>
                            </p>
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <input type="email" required class="woocommerce-Input woocommerce-Input--text input-text" placeholder="<?php esc_html_e( 'Email address', 'urbanfashion' ); ?>" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( $_POST['email'] ) : ''; ?>"/>
                            </p>
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <input type="password" required placeholder="<?php esc_html_e( 'Password', 'urbanfashion' ); ?>" class="woocommerce-Input woocommerce-Input--text input-text" autocomplete="new-password" name="password" id="reg_password"/>
                            </p>
                            <p><?php esc_html_e( 'A password will be sent to your email address.', 'urbanfashion' ); ?></p>
                            <?php do_action( 'woocommerce_register_form' ); ?>
                            <p class="woocommerce-form-row form-row">
                                <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                                <button type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e( 'Register', 'urbanfashion' ); ?>"><?php esc_html_e( 'Register', 'urbanfashion' ); ?></button>
                            </p>
                            <?php do_action( 'woocommerce_register_form_end' ); ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php do_action( 'urbanfashion_after_login_form' ); ?>
    </div>
</div>
<?php do_action( 'woocommerce_after_customer_login_form' ); ?>