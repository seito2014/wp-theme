<?php
/**
 * アイキャッチに対応させる場合に利用します。
 *
 * @author Kobayashi
 */
add_theme_support( 'post-thumbnails' );
add_image_size( 'single-eyecatch', 1310, 768, true );

//画像があればそのまま、なければNOIMAGEを出力
function setThumb($size){
    if ($size === 'single-eyecatch') {


        if (has_post_thumbnail()) {
            return the_post_thumbnail($size);
        } else {
            echo "<img src=".NO_IMAGE." alt=''>";
        }
    }
}
