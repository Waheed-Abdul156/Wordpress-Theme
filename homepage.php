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

                <?php echo do_shortcode('[contact-form-7 id="55705e3" title="Contact Form"]'); ?>

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

                    <p class="info-company">
                        <?php echo esc_html(get_option('blogname', 'Coalition Skills Test')); ?>
                    </p>

                    <div class="info-address">

                        <p>
                            <?php 
                            $address = get_option('address_information');
                            if (empty($address)) {
                                $address = get_option('address_info');
                            }
                            if (empty($address)) {
                                $address = "535 La Plata Street\n4200 Argentina";
                            }
                            echo nl2br(esc_html($address)); 
                            ?>
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

                    <a
                        href="<?php echo esc_url(get_option('facebook_link', '#')); ?>"
                        class="fb"
                        target="_blank"
                        aria-label="Facebook"
                    >
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <a
                        href="<?php echo esc_url(get_option('twitter_link', '#')); ?>"
                        class="tw"
                        target="_blank"
                        aria-label="Twitter"
                    >
                        <i class="fab fa-twitter"></i>
                    </a>

                    <a
                        href="<?php echo esc_url(get_option('linkedin_link', '#')); ?>"
                        class="in"
                        target="_blank"
                        aria-label="LinkedIn"
                    >
                        <i class="fab fa-linkedin-in"></i>
                    </a>

                    <a
                        href="<?php echo esc_url(get_option('pinterest_link', '#')); ?>"
                        class="pin"
                        target="_blank"
                        aria-label="Pinterest"
                    >
                        <i class="fab fa-pinterest-p"></i>
                    </a>

                </div>

            </div>

        </div>

    </section>

</main>

<?php get_footer(); ?>