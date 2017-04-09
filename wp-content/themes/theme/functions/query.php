<?php
/**
 *	メインクエリーとかクエリー系処理を記載します。
 *
 *
 *   @author  danda hayato
 *   @create  2013/09/12
 *   @version    1.0
 */

function change_posts_per_page($query) {
	//管理画面のメインクエリーとメインクエリーじゃないときは処理しない
	if ( is_admin() || ! $query->is_main_query() )
		return;

	//ホーム画面のメインクエリー処理
	if ( $query->is_home() ) {
		$query->set( 'posts_per_page', '7' ); //件数変更
		//$query->set( 'category_name', 'topics' );//カテゴリ指定
		$query->set( 'orderby', 'post_date' ); //ソート指定
		$query->set( 'order', 'DESC' ); //ソート順番
        $query->set('post_type' , 'blog');
	}
}
 add_action( 'pre_get_posts', 'change_posts_per_page' );
