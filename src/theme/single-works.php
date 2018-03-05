<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <?php wp_head(); ?>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/favicon.ico" type="image/x-icon">
</head>

<body class="project_page">
<header id="header" class="header">
        <?php $logoImage = get_field('logo_img', 'options'); ?>
        <div class="bg_top">
            <div class="header_box-shadow container-fluid">
                <div class="header_row-nav working_area container">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand d-flex flex-column flex-md-row" href="#">
                            <img src="<?php echo $logoImage['url']; ?>" class="d-inline-block align-top" alt="logo">
                            <p class="text-dark"><?php bloginfo(); ?><br><?php echo bloginfo('description'); ?> </p>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                                aria-controls="navbarNav" aria-expanded="false"   aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <?php wp_nav_menu(
                                array(
                                    'container' => false,
                                    'menu_class' => 'navbar-nav',
                                ));
                            ?>
                            <div class="navbar_icon-soc">
                                <div class="icon_soc-inst">
                                    <?php $insta = get_field('instagramm', 'options'); ?>
                                    <a href="<?php echo $insta['link']; ?>">
                                        <img src="<?php echo $insta['icon']['url']; ?>" alt="" class="img-rounded center-block">
                                    </a>
                                </div>
                                <div class="icon_soc-houzz">
                                    <?php $houzz = get_field('houzz', 'options'); ?>
                                    <a href="<?php echo $houzz['link']; ?>">
                                        <img src="<?php echo $houzz['icon']['url']; ?>" alt=""
                                             class="img-rounded center-block">
                                    </a>
                                </div>
                            </div>
                            <div class="navbar_phone text-center ml-md-5">
                                <a href="tel:+74993488871"><?php echo get_field('phone_main', 'options'); ?></a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- main -->
    <main>
        <!-- slider -->
        <div class="container-fluid position-relative project_slider pl-0 pr-0">
            <div class="container-fluid position-absolute box_name-project">
                <div class="working_area position-relative m-auto">
                    <div class="col-4 name-project d-flex justify-content-center align-items-center">
                        <h4 class="mb-0 d-inline-block text-light pl-2">
                            <?php the_title(); ?>
                        </h4>
                    </div>
                </div>
            </div>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php $slider = get_field('slider'); $active = true;
                    if (is_array($slider)) :
                        foreach ($slider as $img) : ?>
                            <div class="carousel-item <?php echo( $active ? 'active' : ''); ?>">
                                <img class="d-block w-100" src="<?php echo $img['img']['url']; ?>" alt="First slide">
                            </div>
                        <?php $active=false; endforeach;
                        endif; ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only"></span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only"></span>
                </a>
            </div>
        </div>
        <div class="container-fluid row_info mb-5 mt-5">
            <div class="working_area d-flex flex-row row_info-data m-auto">
                <?php $detailWork = get_field('description_work'); ?>
                <div class="col-2 info_data-year">
                    <div class="text-uppercase">год</div>
                    <div class="font-weight-bold"><?php echo $detailWork['year']; ?></div>
                </div>
                <div class="col-4 info_data-jobs">
                    <div class="text-uppercase">работы</div>
                    <div class="font-weight-bold"><?php echo $detailWork['works']; ?></div>
                </div>
                <div class="col-2 info_data-square">
                    <div class="text-uppercase">площадь</div>
                    <div class="font-weight-bold"><?php echo $detailWork['square']; ?></div>
                </div>
                <div class="col-4 info_data-point">
                    <div class="text-uppercase">цель проекта</div>
                    <div class="font-weight-bold"><?php echo $detailWork['point']; ?></div>
                </div>
            </div>
        </div>
        <div class="container-fluid row_box-text">
            <div class="working_area m-auto">
                <p >
                    <?php the_post(); the_content(); ?>
                </p>
            </div>
        </div>
        <div class="container-fluid row_other-project mt-5 mb-5">
            <div class="working_area m-auto">
                <div class="row-caption d-flex flex-row justify-content-between align-items-center mb-5">
                    <hr>
                    <h4>ДРУГИE ПРОЕКТЫ</h4>
                    <hr>
                </div>
                <div class="col-12 d-flex flex-md-row flex-column justify-content-between p-0">
                    <?php
                    $typeWorks = get_posts(array(
                        'post_type' => 'works',
                        'post_status' => 'publish',
                        'numberposts' => 3,
                    ));
                    foreach ($typeWorks as $post) : setup_postdata($post);
                    $detail = get_field('description_work');
                    ?>

                    <figure class="figure">
                        <img src="<?php echo $detail['img_dop']['url']; ?>"
                             class="figure-img img-fluid rounded">
                        <figcaption class="figure-caption text-dark">
                            <p class="font-weight-bold mb-0"><?php the_title(); ?></p>
                            <p class="text-uppercase"><?php echo $detail['square'];?></p>
                        </figcaption>
                    </figure>
                    <?php endforeach; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>

    </main>
<?php get_footer(); ?>