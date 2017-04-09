<?php
/**
 * フッター
 *
 * @package WordPress
 */
?>

<!--javascript ここから-->
<script src="<?php echo TEMPLATE_URL; ?>/assets/js/vendor.js"></script>
<script src="<?php echo TEMPLATE_URL; ?>/assets/js/app.js"></script>
<?php if (is_front_page()): ?>
    <script src="<?php echo TEMPLATE_URL; ?>/assets/js/index.js"></script>
<?php endif; ?>

<?php if (is_single()): ?>
    <script src="<?php echo TEMPLATE_URL; ?>/assets/js/blog.js"></script>
<?php endif; ?>

<?php if (is_post_type_archive()): ?>
    <script src="<?php echo TEMPLATE_URL; ?>/assets/js/blog.js"></script>
<?php endif; ?>

<?php if (is_page(PAGE_ABOUT)): ?>
<script src="<?php echo TEMPLATE_URL; ?>/assets/js/about.js"></script>
<?php endif; ?>

<?php if (is_page(PAGE_COMPANY)): ?>
<script src="<?php echo TEMPLATE_URL; ?>/assets/js/company.js"></script>
<?php endif; ?>
<!--javascript ここまで-->

<?php wp_footer(); ?>

</body>
</html>
