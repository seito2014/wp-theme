<?php
/**
 *	投稿タイプ：投稿で使用する処理を記載します。
 *
 *
 *   @author  danda hayato
 *   @create  2013/09/12
 *   @version    1.0
 */

//管理画面の「見出し１」等を削除する
function custom_editor_settings( $initArray ){
    $initArray['block_formats'] = "段落=p; 見出し2=h2; 見出し3=h3;";
    return $initArray;
}
add_filter( 'tiny_mce_before_init', 'custom_editor_settings' );
