<?php
/**
 * card
 *
 * @package WordPress
 */
?>

<div class="card">
    <a class="card-link" href="<?php the_permalink(); ?>">
        <div class="card-image">
            <?php the_post_thumbnail('single-eyecatch'); ?>
        </div>
        <div class="card-content">
            <time class="card-meta" datetime="<?php esc_html(get_the_time('Y-m-d')); ?>"><?php the_time('Y\.m\.d'); ?></time>
            <p class="card-desc"><?php echo esc_html(get_the_title()); ?></p>
        </div>
    </a>
</div>
