<?php
/**
 * TOPページ
 *
 * @package WordPress
 */
?>
<?php get_header(); ?>
<?php importTemplate('layout/_l-header'); ?>

<!--start main-->
<main>

    <?php importTemplate('svg/svg'); ?>

    <div class="l-grid l-grid-col3">
        <ul class="l-grid-inner">
            <?php if (have_posts()) : while (have_posts()): the_post(); ?>
                <li class="l-grid-item">
                    <?php importTemplate('module/_card', $argument = array(
                        'modifier' => ''
                    )); ?>
                </li>
            <?php endwhile; endif; ?>
        </ul>
    </div>

    <?php importTemplate('module/_button', $argument = array(
        'type' => '', // '' or 'submit'
        'modifier' => '', // '' or your modifier class
        'href' => '#',
        'blank' => '', // ''(false) or true
        'text' => 'Button'
    )); ?>

</main>
<!--end main-->

<?php importTemplate('layout/_l-footer'); ?>
<?php get_footer(); ?>
