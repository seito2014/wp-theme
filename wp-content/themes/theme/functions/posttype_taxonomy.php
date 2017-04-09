<?php
/**
*	カスタム投稿タイプ利用設定
*   register_post_typeで利用できます。
*
*   @author  danda hayato
*   @create  2013/09/12
*   @version    1.0
*/


$args = array(
		'label' => 'ブログ',//投稿タイプの名前
		'labels' => array(
				'singular_name' => 'blog',//投稿タイプの名前
				'menu_name' => 'ブログ',//メニュー（画面の左）に表示するラベル
				'add_new_item' => '新規投稿を追加',//新規作成ページの左上に表示されるタイトル
				'add_new' => '新規追加',//メニュー（画面の左）の「新規」の位置に表示するラベル
				'new_item' => '新規投稿',//一覧ページの右上にある新規作成ボタンのラベル
				'edit_item'=>'投稿を編集',//編集ページの左上にあるタイトル
				'view_item' => '投稿を表示',//編集ページの「○○を表示」ボタンのラベル
				'not_found' => '投稿は見つかりませんでした',//カスタム投稿を追加していない状態で、カスタム投稿一覧ページを開いたときに表示されるメッセージ
				'not_found_in_trash' => 'ゴミ箱に投稿はありません。',//カスタム投稿をゴミ箱に入れていない状態で、カスタム投稿のゴミ箱ページを開いたときに表示されるメッセージ
				'search_items' => '投稿を検索',//一覧ページの検索ボタンのラベル
		),

		'public' => true,//ユーザーが管理画面で入力するか設定
		'publicly_queryable' => true,//カスタム投稿タイプの機能でページを生成するかどうかを指定
		'show_ui' => true,//管理画面にこのカスタム投稿タイプのページを表示するか設定
		'show_in_menu' => true,//管理画面にメニュー出すか設定
		'query_var' => false,//生成する個別ページのURLを指定。「true」とした場合、「http://サイトのURL/ ?投稿タイプ名=記事のスラッグ」、「false」とした場合、「http://サイトのURL/ ?post_type=投稿タイプ名&p=記事のID」となる。
		'has_archive' => true,//「true」に指定すると投稿した記事の一覧ページ（投稿タイプのトップページ）を作成することができる
		'hierarchical' => false,//カスタム投稿に固定ページのような親子関係（階層）を持たせるか設定
		'menu_position' => 5,//カスタム投稿のメニューを追加する位置を整数で指定
		//'map_meta_cap' => true,//カスタム投稿にオリジナルの権限設定
		//'menu_icon' => true,//カスタム投稿のメニューに表示するアイコンのURLを指定
		//'capability_type' => 'post', // 権限を区別するための投稿タイプ名を指定
		'rewrite' => true,//リライト設定
		/**
		 * 「true」の場合、（初期値： true ）
		* 「http://ブログのアドレス / カスタム投稿タイプ名 / 個々のカスタム投稿のスラッグ / 」でアクセスできる。
		* 「rewrite => array('slug' => 'スラッグ名')」と指定すると
		* 「http://ブログのアドレス / スラッグ名 / 個々のカスタム投稿のスラッグ / 」でアクセスできる。
		* また、「rewrite => array('slug' => 'スラッグ名', 'with_front' => false)」と指定すると管理画面のパーマリンク設定を無視する。
		* 「with_front」はパーマリンク設定で「投稿」に対して指定した設定をカスタム投稿でも引き継ぐか引き継がないかを指定する。
		*/
		'supports' => array( 'title', 'editor', 'author', 'thumbnail' )//投稿タイプの投稿画面でサポートする項目を設定する
		/**
		 * title：タイトル
		 * editor：本文（とその編集機能）
		 * authro：作成者
		 * thumbnail：アイキャッチ画像
		 * excerpt：抜粋
		 * comments：コメント一覧
		 * trackbacks：トラックバック送信
		 * custom-fields：カスタムフィールド
		 * revisions：リビジョン
		 * page-attributes ：属性（「hierarchical」を「true」に設定している場合のみ指定）
		 */
);
//利用する時はコメントアウト外して、第一引数にカスタム投稿タイプ名を設定すること。
register_post_type(NAV_2_ID, $args);