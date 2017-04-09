<?php
/**
 * single
 *
 * @package WordPress
 */
?>

<?php get_header(); ?>
<?php importTemplate('layout/_l-header'); ?>

    <!--start l-contents-->
    <div class="l-container">

        <?php while (have_posts()) : the_post(); ?>
            <main>

                <div>
                    <h1><?php the_title(); ?></h1>
                    <time datetime="<?php echo get_the_time('Y-m-d'); ?>">
                        <?php echo get_the_time('Y/m/d'); ?>
                    </time>
                    <?php if (has_post_thumbnail()){
                        the_post_thumbnail('single-eyecatch');
                    } else {
                        setNoimgae(SINGLE_EYE_CATCH_W, SINGLE_EYE_CATCH_H);
                    } ?>
                </div>

                <div>
                    <?php the_content() ?>
                </div>

                <aside>
                    <?php importTemplate('module/_sns'); ?>
                </aside>

            </main>
        <?php endwhile; ?>

    </div>
    <!--end l-contents-->

<?php importTemplate('layout/_l-footer'); ?>
<?php get_footer(); ?>