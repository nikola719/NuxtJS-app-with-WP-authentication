<?php
/**
 * Template Name: Check Page
 * Template part for Checking login info
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blueprint
 */

?>

<!-- begin section -->
<?php
get_header();
?>
<section style="margin-top:100px;">
    <div class="container">
    <?php // echo do_shortcode("[user_registration_form id='50']"); ?>
    <?php
        $cookie = $_COOKIE[LOGGED_IN_COOKIE];
        $user_id = wp_validate_auth_cookie($cookie, 'logged_in');
    ?>
    <?php $token = wp_get_session_token(); ?>
        <a href="http://localhost:3000/?<?php echo ($cookie) ? 'cookie='.$cookie : ''; ?>" target="_blank">Go to Nuxt Page</a>
    </div>
</section>
<!-- end section -->
<?php
get_footer();
?>
