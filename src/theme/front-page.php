<?php get_header(); ?>

    <main>
        <div class="container-fluid p-0">
            <!-- about the company -->
            <div class="container row_oboutcompany working_area">
                <div class="row-caption d-flex flex-row justify-content-between align-items-center mb-5">
                    <?php $aboutCompany = get_field('about_company'); ?>
                    <hr>
                    <h4>О КОМПАНИИ</h4>
                    <hr>
                </div>
                <div class="row_oboutcompany-articl">
                    <figure class="figure d-flex flex-md-row justify-content-between">
                        <figcaption class="figure-caption d-flex flex-column col-md-8">
                            <?php echo $aboutCompany['header']; ?>
                            <figure class="figure d-flex flex-md-row">
                                <img src="<?php echo $aboutCompany['icon']['url']; ?>"
                                     class="figure-img img-fluid rounded col-md-2" alt="">
                                <figcaption class="figure-caption d-flex align-items-center">
                                    <?php echo $aboutCompany['description']; ?>
                                </figcaption>
                            </figure>
                            <figure class="figure d-flex flex-md-row">
                                <img src="<?php echo $aboutCompany['icon_second']['url']; ?>"
                                     class="figure-img img-fluid rounded col-md-2" alt="">
                                <figcaption class="figure-caption d-flex align-items-center">
                                    <?php echo $aboutCompany['description_second']; ?>
                                </figcaption>
                            </figure>
                        </figcaption>
                        <img src="<?php echo $aboutCompany['icon_photo']['url']; ?>"
                             class="figure-img img-fluid rounded col-md-3" alt="">
                    </figure>
                </div>
                <div class="row_oboutcompany-flowers">
                    <h4 class="text-center mt-5">Растения, которые мы используем</h4>
                    <?php
                    $postPlants = get_posts(array(
                        'post_type' => 'plants',
                        'post_status' => 'publish',
                        'numberposts' => -1,
                    ));
                    ?>
                    <div class="aboutcompany_flower-carusel responsive pl-3">
                        <?php foreach ($postPlants as $post) : setup_postdata($post); ?>
                            <div>
                                <figure class="figure">
                                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>"
                                         class="figure-img img-fluid rounded" alt="">
                                    <figcaption class="figure-caption text-center">
                                        <b><?php the_field('author'); ?></b>
                                        <br>
                                        <?php the_field('spec'); ?>
                                    </figcaption>
                                </figure>
                            </div>
                        <?php endforeach;
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
            <!-- PORTFOLIO -->
            <div class="container row_portfolio working_area">
                <div class="row-caption d-flex flex-row justify-content-between align-items-center mb-5">
                    <hr>
                    <h4>ПОРТФОЛИО</h4>
                    <hr>
                </div>
                <?php
                $postWorks = get_posts(array(
                    'post_type' => 'works',
                    'post_status' => 'publish',
                    'numberposts' => 4,
                ));
                ?>
                <div class="row_portfolio-img d-flex justify-content-between">
                    <div class="d-flex flex-column align-content-between justify-content-between col-6 pl-0">
                        <div class="portfolio_img-shadow portfolio_img-left p-0 mb-3">
                            <img src="<?php echo($postWorks[0]->ID ? wp_get_attachment_url(get_post_thumbnail_id($postWorks[0]->ID), array(556, 554)) : ''); ?>"
                                 alt="">
                            <h4 class="mb-0 d-inline-block"><?php echo $postWorks[0]->post_title; ?></h4>
                        </div>
                        <div class="portfolio_img-shadow portfolio_img-left p-0 mb-3">
                            <img src="<?php echo($postWorks[1]->ID ? wp_get_attachment_url(get_post_thumbnail_id($postWorks[1]->ID), array(556, 554)) : ''); ?>"
                                 alt="">
                            <h4 class="mb-0 d-inline-block"><?php echo $postWorks[1]->post_title; ?></h4>
                        </div>
                    </div>
                    <div class="d-flex flex-column col-6 pr-0">
                        <div class="portfolio_img-shadow portfolio_img-right p-0 mb-3">
                            <img src="<?php echo($postWorks[2]->ID ? wp_get_attachment_url(get_post_thumbnail_id($postWorks[2]->ID), array(556, 554)) : ''); ?>"
                                 alt="">
                            <h4 class="mb-0 d-inline-block"><?php echo $postWorks[2]->post_title; ?></h4>
                        </div>
                        <div class="portfolio_img-shadow portfolio_img-right p-0 mb-3">
                            <img src="<?php echo($postWorks[3]->ID ? wp_get_attachment_url(get_post_thumbnail_id($postWorks[3]->ID), array(556, 554)) : ''); ?>"
                                 alt="">
                            <h4 class="mb-0 d-inline-block"><?php echo $postWorks[3]->post_title; ?></h4>
                        </div>
                    </div>
                </div>
                <div class="row_portfolio-btn d-flex justify-content-center mt-4">
                    <a class="btn" href="/works">ПОСМОТРЕТЬ ДРУГИЕ РАБОТЫ</a>
                </div>
            </div>
            <?php wp_reset_postdata(); ?>
            <!-- indivifual -->
            <div class="container-fluid row_individual p-0">
                <div class="individual_box-shadow d-flex flex-column justify-content-center align-items-center">
                    <div class="individual_box-icon">
                        <img src="<?php echo get_template_directory_uri() . '/img/bg_3.png'; ?>" alt=""
                             class="img-rounded center-block">
                    </div>
                    <div class="text-center individual_box-text">Индивидуально подбираем растения <br> под каждого
                        заказчкика
                    </div>
                    <div class="individual_box-icon">
                        <img src="<?php echo get_template_directory_uri() . '/img/liniya.png'; ?>." alt=""
                             class="img-rounded center-block">
                    </div>
                </div>
            </div>
            <!-- complex landscape -->
            <div class="container row_complex working_area">
                <div class="row-caption d-flex flex-row justify-content-between align-items-center mb-5">
                    <hr>
                    <h4>Комплексный ландшафтный проект</h4>
                    <hr>
                </div>
                <div class="d-flex flex-row flex-wrap justify-content-between align-content-between">
                    <?php
                    $typeWorks = get_posts(array(
                        'post_type' => 'type_works',
                        'post_status' => 'publish',
                        'numberposts' => 3,
                    ));
                    foreach ($typeWorks as $post) : setup_postdata($post); ?>

                    <div class="card mb-2" style="width: 18rem;">
                        <img class="card-img-top"
                             src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(), array(364, 364)); ?>"
                             alt="Card image cap">
                        <div class="card-body p-2">
                            <p class="card-text text-center"><?php the_title(); ?></p>
                        </div>
                    </div>
                    <?php endforeach; wp_reset_postdata();?>
                </div>
                <div class="row_complex-btn d-flex justify-content-center mt-4">
                    <a class="btn pr-5 pl-5 rounded-0 font-weight-bold" href="#">ПОСМОТРЕТЬ ВСЕ ЦЕНЫ</a>
                </div>
            </div>
            <div id="description_slide" class="container-fluid row_complex-slide">
                <div class="container working_area">
                    <div class="single-item">
                        <?php foreach ($typeWorks as $post) : setup_postdata($post);
                        $typeDetails = get_field('details');
                        ?>
                        <div class="carusel-item">
                            <div class="d-flex flex-column flex-md-row flex-wrap justify-content-between pl-3 pr-3">
                                <figure class="figure d-flex flex-md-row">
                                    <img src="<?php echo $typeDetails['icon']['url']; ?>" class="figure-img img-fluid rounded" alt="">
                                    <figcaption class="figure-caption d-flex flex-column ml-3">
                                        <h4><?php echo $typeDetails['header']; ?></h4>
                                        <p><?php echo $typeDetails['description']; ?></p>
                                    </figcaption>
                                </figure>

                                <figure class="figure d-flex flex-md-row">
                                    <img src="<?php echo $typeDetails['icon_2']['url']; ?>" class="figure-img img-fluid rounded" alt="">
                                    <figcaption class="figure-caption d-flex flex-column ml-3">
                                        <h4><?php echo $typeDetails['header_2']; ?></h4>
                                        <p><?php echo $typeDetails['description_2']; ?></p>
                                    </figcaption>
                                </figure>

                                <figure class="figure d-flex flex-md-row-reverse">
                                    <img src="<?php echo $typeDetails['icon_3']['url']; ?>" class="figure-img img-fluid rounded" alt="">
                                    <figcaption class="figure-caption d-flex flex-column mr-3">
                                        <h4><?php echo $typeDetails['header_3']; ?></h4>
                                        <p><?php echo $typeDetails['description_3']; ?></p>
                                    </figcaption>
                                </figure>

                                <figure class="figure d-flex flex-md-row-reverse">
                                    <img src="<?php echo $typeDetails['icon_4']['url']; ?>" class="figure-img img-fluid rounded" alt="">
                                    <figcaption class="figure-caption d-flex flex-column mr-3">
                                        <h4><?php echo $typeDetails['header_4']; ?></h4>
                                        <p><?php echo $typeDetails['description_4']; ?></p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <?php endforeach; wp_reset_postdata();  ?>
                    </div>
                </div>
            </div>
            <!-- landscape project -->
            <div class="container-fluid row_landscape-project p-0">
                <div class="container working_area mb-5">
                    <div class="row-caption d-flex flex-row justify-content-between align-items-center m-auto">
                        <hr>
                        <h4>В ЛАНДШАФТНЫЙ ПРОЕКТ ВХОДИТ</h4>
                        <hr>
                    </div>
                </div>
                <div class="landscape_project-card">
                    <div class="landscape_box-shadow">
                        <div class="container working_area d-flex justify-content-center align-content-center">
                            <?php foreach ($typeWorks as $post) :
                                setup_postdata($post);
                                $typeDetails = get_field('details_enter');
                                $more = $typeDetails['description'];
                                ?>
                                <div class="card col-3 d-flex justify-content-center pr-1 ml-3 mr-3">
                                    <img class="card-img-top ml-auto mr-auto"
                                         src="<?php echo $typeDetails['icon']['url']; ?>">
                                    <div class="card-body">
                                        <h4><?php the_title(); ?></h4>
                                        <p class="card-text">
                                        <ul>
                                            <?php if (is_array($more)) : ?>
                                                <?php foreach ($more as $field) : ?>
                                                    <li><?php echo $field['field']; ?></li>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </ul>
                                        </p>
                                    </div>
                                </div>
                            <?php endforeach;
                            wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- our services -->
            <div class="container-fluid row_servises p-0 mb-5">
                <div class="container working_area mb-5 mt-5">
                    <div class="row-caption d-flex flex-row justify-content-between align-items-center m-auto">
                        <hr>
                        <h4>В НАШИ УСЛУГИ ВХОДИТ</h4>
                        <hr>
                    </div>
                </div>
                <div class="row_servises-box">
                    <div class="servises_box-shadow">
                        <div class="container working_area d-flex justify-content-center align-content-center flex-wrap pt-5 pb-5">
                            <div class="col-5">
                                <ul>
                                    <?php $services = get_field('services');
                                    $left = $services['left'];
                                    $right = $services['right'];
                                    ?>
                                    <?php if (is_array($left)) : ?>
                                        <?php foreach ($left as $field) : ?>
                                            <li><?php echo $field['field']; ?></li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                </ul>
                            </div>
                            <div class="col-5">
                                <ul>
                                    <?php if (is_array($right)) : ?>
                                        <?php foreach ($right as $field) : ?>
                                            <li><?php echo $field['field']; ?></li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <div class="row_complex-btn d-flex justify-content-center mt-4">
                                <a class="btn pr-5 pl-5 rounded-0 font-weight-bold" href="#">ЗАКАЗАТЬ ЗВОНОК</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- block of harmony -->
            <div class="container-fluid row_individual row_harmony p-0 mb-5">
                <div class="individual_box-shadow d-flex flex-column justify-content-center align-items-center">
                    <div class="individual_box-icon">
                        <img src="<?php echo get_template_directory_uri() . '/img/harmony_top.png'; ?>" alt="" class="img-rounded center-block">
                    </div>
                    <div class="text-center individual_box-text">
                        Изящная роскошь <br> в гармонии с природой
                    </div>
                    <div class="individual_box-icon">
                        <img src="<?php echo get_template_directory_uri() . '/img/liniya.png'; ?>" alt="" class="img-rounded center-block">
                    </div>
                </div>
            </div>
            <!-- contakt -->
            <div class="container row_contact working_area mb-5">
                <div class="row-caption d-flex flex-row justify-content-between align-items-center mb-5">
                    <hr>
                    <h4>КОНТАКТЫ</h4>
                    <hr>
                </div>
                <div class="row_cintact-block d-flex justify-content-between">
                    <div class="col-6 p-0">
                        <img src="<?php echo get_template_directory_uri() . '/img/karta.png'; ?>" alt="" class="img-rounded center-block">
                    </div>
                    <div class="col-5">
                        <p><b>Адрес:</b><br><span><?php echo get_field('address', 'options'); ?></span></p>
                        <div class="navbar_icon-soc d-flex flex-row justify-content-start">
                            <div class="navbar_phone">
                                <a href="tel:+74993488871" class="f-flex justify-content-start font-weight-bold">
                                    <?php echo get_field('phone_main', 'options'); ?>
                                </a>
                                <a href="mailto:<?php echo  get_option('admin_email'); ?>"><?php echo  get_option('admin_email'); ?></a>
                            </div>
                            <div class="icon_soc-inst">
                                <?php $insta = get_field('instagramm', 'options'); ?>
                                <a href="<?php echo $insta['link']; ?>">
                                    <img src="<?php echo $insta['icon']['url']; ?>" alt="" class="img-rounded center-block">
                                </a>
                            </div>
                            <div class="icon_soc-houzz">
                                <?php $houzz = get_field('houzz', 'options'); ?>
                                <a href="<?php echo $houzz['link']; ?>">
                                    <img src="<?php echo $houzz['icon']['url']; ?>" alt="" class="img-rounded center-block">
                                </a>
                            </div>
                        </div>
                        <h4 class="text-uppercase font-weight-bold mt-5 mb-3">ОСТАЛИСЬ ВОПРОСЫ?</h4>
                        <div class="row_portfolio-btn mt-4 mb-3">
                            <a class="btn" href="#">ЗАДАЙТЕ ИХ АРХИТЕКТОРУ</a>
                        </div>
                        <p>или позвоните нам по телефону</p>
                        <div class="navbar_phone last_phone">
                            <a href="tel:+74993488871" class="f-flex justify-content-start font-weight-bold">
                                <?php echo get_field('phone_main', 'options'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


<?php get_footer(); ?>