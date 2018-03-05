<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <?php wp_head(); ?>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/favicon.ico" type="image/x-icon">
</head>

<body <?php body_class(); ?>>
<header id="header" class="header">

    <div class="bg_top">
        <?php $logoImage = get_field('logo_img', 'options'); ?>

        <div class="header_box-shadow container-fluid">
            <div class="header_row-nav working_area container">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand d-flex flex-column flex-md-row" href="#">
                        <img src="<?php echo $logoImage['url']; ?>" class="d-inline-block align-top" alt="logo">
                        <p><?php bloginfo(); ?><br><?php echo bloginfo('description'); ?> </p>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="navbarNav"
                            aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
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
                <h1 class="text-center"><?php echo get_field('description_main', 'options'); ?>
                    <hr>
                </h1>
                <h4 class="text-center"><?php echo get_field('description_second', 'options'); ?></h4>
                <div class="container-fluid row_nav-button d-flex flex-column align-items-center justify-content-center">
                    <form class="mb-3 d-flex flex-column flex-md-row align-items-center">
                        <input type="text" name="name" placeholder="Введите Ваше имя" class="mr-md-5 mb-2 mb-md-0">
                        <input type="submit" value="ПОЛУЧИТЬ КОНСУЛЬТАЦИЮ">
                    </form>
                    <a href="#">Узнать подробности</a>
                </div>
            </div>
        </div>

    </div>
    <div id="top_menu" class="container-fluid menu_sticky d-flex justify-content-center" >
        <div class="working_area d-flex flex-md-row justify-content-between align-items-center m-auto">
            <div class="menu_sticky-button"><span class="navbar-toggler-icon"></span></div>
            <div class="navbar_phone text-center ml-md-5">
                <a href="tel:+74993488871"><?php echo get_field('phone_main'); ?></a>
            </div>
        </div>
    </div>

</header>
