<footer>
    <div class="footer_box-shadow">
        <div class="working_area d-flex flex-colun flex-md-row justify-content-md-between m-auto">
            <div class="d-flex flex-column col-6 pt-5 pb-5 pl-0 footer_left">
                <h4><?php echo get_field('footer_description', 'options');  ?> </h4>
                <p><?php echo get_field('copyright', 'options'); ?> </p>
                <?php $link = get_field('footer_politics', 'options'); ?>
                <a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
            </div>
            <div class="d-flex flex-column col-6 pt-5 pb-5 pr-0 footer_right">
                <div class="footer_nav d-flex flex-row justify-content-end  flex-wrap">
                    <?php wp_nav_menu(
                        array(
                            'container' => false,
                            'menu_class' => 'navbar-nav d-flex flex-row justify-content-end col-12 pb-3',

                        ));
                    ?>
                    <div class="navbar_icon-soc">
                        <div class="navbar_phone text-center ml-md-5">
                            <a href="tel:+74993488871"><?php echo get_field('phone_main', 'options'); ?></a>
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
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>