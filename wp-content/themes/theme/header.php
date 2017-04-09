<!DOCTYPE html>
<!--[if lt IE 9]>
<html lang="ja" class="no-js lt-ie9" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if gt IE 9]><!-->
<html lang="ja" class="no-js" prefix="og: http://ogp.me/ns#"><!--<![endif]-->

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php wp_title(); ?></title>

    <meta name="viewport" content="width=1040,minimum-scale=0,maximum-scale=10">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <?php set_single_description(); ?>

    <meta name="apple-mobile-web-app-title" content="<?php echo APP_TITLE; ?>">

    <link rel="shortcut icon" href="<?php echo TEMPLATE_URL; ?>/assets/images/common/favicon.ico">
    <link rel="apple-touch-icon-precomposed" href="<?php echo TEMPLATE_URL; ?>/assets/images/common/apple-touch-icon-precomposed.png">
    <link rel="stylesheet" href="<?php echo TEMPLATE_URL; ?>/assets/css/style.css">

    <?php wp_head(); ?>
</head>
<body id="js-body">
<div id="fb-root"></div>

<noscript class="for-no-js">Javascriptを有効にしてください。</noscript>
<div class="for-old">お使いのOS・ブラウザでは、本サイトを適切に閲覧できない可能性があります。最新のブラウザをご利用ください。</div>

<input type="hidden" value="<?php echo TEMPLATE_URL; ?>" id="js-base-url">