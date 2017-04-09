<?php
/**
 *    定数:定数はここに全部書いてください
 *  定数名は単語毎「_」区切りで全て大文字にすること
 *  使用方法のコメントを必ず残すこと
 *
 * @author  zuya@LIG.inc
 * @create  2013/09/12
 * @version    1.0
 */

//app-title
define('APP_TITLE', 'えふなな');

// テンプレートパス
define('TEMPLATE_URL', get_stylesheet_directory_uri());

// ルートパス
define('HOME_URL', get_home_url());

//Page id
define('PAGE_COMPANY', '1');
define('PAGE_ABOUT', '2');

//URL
define('NAV_0_ID', 'company');
define('NAV_0_TEXT', 'COMPANY');

define('NAV_1_ID', 'about');
define('NAV_1_TEXT', 'ABOUT');

define('NAV_2_ID', 'blog');
define('NAV_2_TEXT', 'BLOG');

//No image
define('NO_IMAGE', TEMPLATE_URL.'/assets/images/common/noimage.png');