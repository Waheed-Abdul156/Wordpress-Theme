<?php
/*
Template Name: Homepage
*/

get_header();
?>

<div class="breadcrumbs-container">

    <nav class="breadcrumbs" aria-label="Breadcrumb">

        <a href="<?php echo esc_url(home_url('/')); ?>">
            Home
        </a>

        <span class="divider">/</span>

        <a href="#">
            Who we are
        </a>

        <span class="divider">/</span>

        <span class="current-step">
            Contact
        </span>

    </nav>

</div>


<!-- INTRO SECTION -->
<section class="intro">

    <div class="container">

        <?php
        while (have_posts()) :
            the_post();
            the_content();
        endwhile;
        ?>

    </div>

</section>



<!-- MAIN CONTENT -->
<main class="main-content" id="main">

    <!-- CONTACT FORM -->
    <section class="contact-form-section" aria-labelledby="formHeading">

        <div class="container">

            <h2 class="form-title" id="formHeading">
                Contact Us
            </h2>

            <div class="line"></div>

            <div class="contact-form-wrapper">

                <?php echo do_shortcode('[contact-form-7 id="123" title="Contact form 1"]'); ?>

            </div>

        </div>

    </section>



    <!-- REACH US SECTION -->
    <section class="reach-us-section" aria-labelledby="reachHeading">

        <div class="container">

            <h2 class="info-title" id="reachHeading">
                Reach Us
            </h2>

            <div class="line"></div>

            <div class="info-body">

                <!-- COMPANY -->
                <div class="company-info">

                    <?php if(get_option('site_logo')) : ?>

                        <img
                            src="<?php echo get_option('site_logo'); ?>"
                            alt="Logo"
                        >

                    <?php endif; ?>

                    <div class="info-address">

                        <p>
                            <?php echo nl2br(esc_html(get_option('address_information'))); ?>
                        </p>

                    </div>

                </div>



                <!-- CONTACT DETAILS -->
                <div class="info-contact">

                    <p>
                        <strong>Phone:</strong>

                        <?php echo esc_html(
                            get_option('phone_number', '385.154.11.28.38')
                        ); ?>
                    </p>

                    <p>
                        <strong>Fax:</strong>

                        <?php echo esc_html(
                            get_option('fax_number', '385.154.35.66.78')
                        ); ?>
                    </p>

                </div>



                <!-- SOCIAL LINKS -->
                <div class="socials">

                    <?php if (get_option('facebook_link')) : ?>

                        <a
                            href="<?php echo esc_url(get_option('facebook_link')); ?>"
                            class="fb"
                            target="_blank"
                            aria-label="Facebook"
                        >
                            <i class="fab fa-facebook-f"></i>
                        </a>

                    <?php endif; ?>


                    <?php if (get_option('twitter_link')) : ?>

                        <a
                            href="<?php echo esc_url(get_option('twitter_link')); ?>"
                            class="tw"
                            target="_blank"
                            aria-label="Twitter"
                        >
                            <i class="fab fa-twitter"></i>
                        </a>

                    <?php endif; ?>


                    <?php if (get_option('linkedin_link')) : ?>

                        <a
                            href="<?php echo esc_url(get_option('linkedin_link')); ?>"
                            class="in"
                            target="_blank"
                            aria-label="LinkedIn"
                        >
                            <i class="fab fa-linkedin-in"></i>
                        </a>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </section>

</main>

<?php get_footer(); ?>
<?php echo do_shortcode('[contact-form-7 id="e6630c8" title="Contact Form"]'); ?>