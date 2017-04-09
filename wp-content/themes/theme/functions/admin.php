<?php
//■■■■■■■■■■■■■■■投稿画面カスタマイズ START■■■■■■■■■■■■■■■
/**
 * アイキャッチの説明を追加する場合に利用します。
 *
 * @param  string $content
 * @return string
 * @author Kobayashi
 */
function lig_wp_add_featured_image_instruction( $content ) {
	global $post_type; // 投稿タイプで変更可能。
	$content.= '<p>';
	$content.= 'アイキャッチ画像として画像を追加するとサムネイルが表示されるようになります。<br />';
	$content.= 'サイズは横300px、縦200pxになるようにしてください。';
	$content.= '</p>';
	return $content;
}
//add_filter( 'admin_post_thumbnail_html', 'lig_wp_add_featured_image_instruction');

/**
 * タイトルのプレースホルダーを変更する場合に利用します。
 *
 * @param  string $title
 * @return string
 * @author Kobayashi
 */
function lig_wp_title_text_input( $title ){
	global $post_type; // 投稿タイプで変更可能。
	return $title = 'ここに記事の題名を書きます';
}
//add_filter( 'enter_title_here', 'lig_wp_title_text_input' );

/**
 * 投稿フォームで不要な項目を除外する場合に利用します。
 *
 * @author Kobayashi
 */
function lig_wp_remove_default_post_screen_metaboxes() {
	remove_meta_box( 'postcustom',      'post','normal' ); // カスタムフィールド
	remove_meta_box( 'postexcerpt',     'post','normal' ); // 抜粋
	remove_meta_box( 'commentstatusdiv','post','normal' ); // コメント
	remove_meta_box( 'trackbacksdiv',   'post','normal' ); // トラックバック
	remove_meta_box( 'slugdiv',         'post','normal' ); // スラッグ
	remove_meta_box( 'authordiv',       'post','normal' ); // 著者
}
//add_action( 'admin_menu','lig_wp_remove_default_post_screen_metaboxes' );

/**
 * 固定ページフォームで不要な項目を除外する場合に利用します。
 *
 * @author Kobayashi
 */
function lig_wp_remove_default_page_screen_metaboxes() {
	remove_meta_box( 'postcustom',      'page','normal' ); // カスタムフィールド
	remove_meta_box( 'commentstatusdiv','page','normal' ); // コメント
	remove_meta_box( 'trackbacksdiv',	'page','normal' ); // トラックバック
	remove_meta_box( 'slugdiv',			'page','normal' ); // スラッグ
	remove_meta_box( 'authordiv',		'page','normal' ); // 著者
}
//add_action( 'admin_menu','lig_wp_remove_default_page_screen_metaboxes' );


/**
 * iframeとiframeで使える属性を指定する
 * @global array $allowedposttags
 * @param type $content
 * @return type
 */
function add_editor_iframe($content){
	global $allowedposttags;

	// iframeとiframeで使える属性を指定する
	$allowedposttags['iframe'] = array('class' => array () , 'src'=>array() , 'width'=>array(),
			'height'=>array() , 'frameborder' => array() , 'scrolling'=>array(),'marginheight'=>array(),
			'marginwidth'=>array());

	return $content;
}
//add_filter('content_save_pre','add_editor_iframe');

/**
 * 投稿画面のプレビューボタンを非表示にする
 * @global type $post_type
 */
function remove_previewbutton_css_custom() {
	global $post_type; // 投稿タイプで変更可能。
	echo '<style>#preview-action {display: none;}</style>';
}
//add_action('admin_print_styles', 'remove_previewbutton_css_custom');

/**
 * 投稿画面のパーマリンクを非表示にする
 * @global type $post_type
 */
function remove_permlink_css_custom() {
	global $post_type; // 投稿タイプで変更可能。
	echo '<style>#edit-slug-box,#view-post-btn {display: none;}</style>';
}
//add_action('admin_print_styles', 'remove_permlink_css_custom');


//■■■■■■■■■■■■■■■投稿画面カスタマイズ END■■■■■■■■■■■■■■■

//■■■■■■■■■■■■■■■管理画面外観カスタマイズ START■■■■■■■■■■■■■■■

/**
 * 不要なメニューを削除する場合に利用します。
 *
 * @author Kobayashi
 */
function remove_menus ()
{
	// global $menu を出力するとslugが確認しやすいです。
	remove_menu_page('index.php'); // 本体更新ページ
	remove_menu_page('edit.php');                   // 投稿
	remove_menu_page('edit-comments.php');          // コメント
	remove_menu_page('upload.php');                 // メディア
	remove_menu_page('plugins.php');                // プラグイン
//	remove_menu_page( 'link-manager.php' );
	remove_menu_page('tools.php');                  // ツール
	remove_menu_page('options-general.php');        // 設定
	remove_menu_page('optionc.php');        // 設定
	remove_menu_page('themes.php');                 // 外観
	remove_menu_page('users.php');                  //Users
	remove_menu_page('edit.php?post_type=page'); //固定ページ
	remove_menu_page('edit.php?post_type=acf'); // カスタムフィールド
}

if ( ! is_super_admin() ) { // ※管理者以外のログイン時にフックする場合。
	add_action( 'admin_menu', 'remove_menus', 11 );
}


/**
 * 管理画面ログイン時にリダイレクトさせるページ先を指定
 */
function edit_login_redirect ($redirect_to, $request){
	return admin_url('edit.php?post_type=message'); // リダイレクト先のURLを指定
}
if ( ! is_super_admin() ) { // ※管理者以外のログイン時にフックする場合。
	add_filter("login_redirect", "edit_login_redirect", 11, 3);
}

/**
 * ログイン画面のスタイルシートを変更する場合に利用します。
 *
 * @author Kobayashi
 */
function lig_wp_custom_login() {
	echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/css/custom-login-page.css" />';
}
//add_action( 'login_head', 'lig_wp_custom_login' );

/**
 * 管理画面のフッターを変更する場合に利用します。
 *
 * @author Kobayashi
 */
function lig_wp_custom_admin_footer() {
	echo '<p>株式会社えふなな</p>';
}
//add_filter( 'admin_footer_text', 'lig_wp_custom_admin_footer' );

/**
 * ログインメッセージを変更する場合に利用します。
 *
 * @param  object $wp_admin_bar
 * @author Kobayashi
 */
function lig_wp_replace_hello_text( $wp_admin_bar ) {
	$my_account = $wp_admin_bar->get_node( 'my-account' );
	$newtitle = str_replace( 'こんにちは、', 'お疲れさまです！', $my_account->title );
	$wp_admin_bar->add_menu( array(
			'id' => 'my-account',
			'title' => $newtitle,
			'meta' => false
	) );
}
//add_filter( 'admin_bar_menu', 'lig_wp_replace_hello_text', 25 );


/**
 * WordPressSEOプラグインのメニュー非表示
 */
function remove_wordpress_seo_menu() {
	echo '<style type="text/css">';
	echo '#toplevel_page_wpseo_dashboard,#wp-admin-bar-view,#wp-admin-bar-wpseo-menu {';
	echo '  display: none;';
	echo '}';
	echo '</style>';
}
//add_action( 'admin_head', 'remove_wordpress_seo_menu', 100);

// バージョンを表示しない
remove_action('wp_head', 'wp_generator');
//■■■■■■■■■■■■■■■管理画面外観カスタマイズ END■■■■■■■■■■■■■■■


//■■■■■■■■■■■■■■■投稿一覧、カテゴリ一覧カスタマイズ START■■■■■■■■■■■■■■■

/**
 * 投稿一覧画面で表示タグを非表示にする（CSS）
 *
 * @author Kobayashi
 */
function remove_indexpage_view_link() {
	global $post_type; // 投稿タイプで変更可能。
	echo '<style type="text/css">';
	echo 'span.view {';
	echo '  display: none;';
	echo '}';
	echo '</style>';
}
//add_action('admin_print_styles-edit.php', 'remove_indexpage_view_link');

/**
 * カテゴリ一覧で表示リンクを非表示にする
 */
function remove_category_view_link() {
	echo '<style type="text/css">';
	echo '.view {';
	echo '  display: none;';
	echo '}';
	echo '</style>';
}
//add_action("admin_head-edit-tags.php", "remove_category_view_link");

//■■■■■■■■■■■■■■■投稿一覧、カテゴリ一覧カスタマイズ END■■■■■■■■■■■■■■■

/**
 * 固定ページなどでURLを使用する際のショートコードを設定します
 * @param type $atts
 * @return type
 */
function my_home_url( $atts ) {
	return home_url();
}
//add_shortcode( 'my_home_url', 'my_home_url' );


/**
 * カテゴリ一覧で表示リンクを非表示にする
 */

//カテゴリ一覧ページの説明の箇所を非表示にする
if(is_admin()){
	if($pagenow == "edit-tags.php"){
		function remove_tag_view_link(){
			echo '<style type="text/css">';
			echo '.form-field:nth-of-type(4){';
			echo '  display: none;';
			echo '}';
			echo '</style>';

		}
//		add_action("admin_print_styles-edit-tags.php", "remove_tag_view_link");
	}
}

/**
 * タイトルが入力されていない場合、alertを出します
 */
add_action( 'admin_head-post-new.php', 'my_title_required' );
function my_title_required() {
	?>
<script type="text/javascript">
jQuery(document).ready(function($){
	var post_type = $('#post_type').val();
	if('blog' == post_type || 'page' == post_type || 'member' == post_type || 'works' == post_type){
		$("#post").submit(function(e){
			if('' == $('#title').val()) {
				alert('タイトルを入力してください。');
				$('#ajax-loading').css('visibility', 'hidden');
				$('#publish').removeClass('button-primary-disabled');
				$('#publishing-action .spinner').hide();
				$('#title').focus();
				return false;
			}
		});
	}
});
</script>
<?php
}

/**
 * カテゴリが入力されていない場合、alertを出します
 */
if ( !has_action( 'admin_footer', 'alert_category' ) ){
//	add_action( 'admin_footer' , 'alert_category' );
}
function alert_category() {
	echo <<< EOF
<script type="text/javascript">

	jQuery("#post").attr("onsubmit", "return check_category();");

	function check_category(){
		var post_type = jQuery('#post_type').val() ,
			categoryDiv,
			categoryList;
		if(post_type == "blog") {
			categoryList = jQuery("#genrechecklist");
			categoryDiv = jQuery("#genrediv");
		} else if( post_type == "works") {
			categoryList = jQuery("#works_categorychecklist");
			categoryDiv = jQuery("#works_categorydiv");
		} else {
			return true;
		}

		if(categoryList.length) {
			var check_num = categoryList.find("input:checked").length;
			if(check_num <= 0){
				alert(categoryDiv.find("span").html() + "を選択してください。");
				jQuery("#ajax-loading").css("visibility","hidden");
				jQuery("#publish").removeClass("button-primary-disabled");
				return false;
			} else {
				return true;
			}
		}
	}

</script>';
EOF;
}

// タクソノミーを1つしか選べないようにする
if ( !has_action( 'admin_print_footer_scripts', 'select_to_radio_hoge_taxonomy' ) ){
//	add_action( 'admin_print_footer_scripts' , 'select_to_radio_hoge_taxonomy' );
}

function select_to_radio_hoge_taxonomy() {
	?>
	<script type="text/javascript">
		jQuery( function( $ ) {
			var tax_name = "";
			var post_type = jQuery('#post_type').val();

			if(post_type == "blog") {
				tax_name = "genre";
			} else if(post_type == "works") {
				tax_name = "works";
			} else {
				return;
			}

			// 投稿画面
			$( '#taxonomy-' + tax_name + ' input[type=checkbox]' ).each( function() {
				$( this ).replaceWith( $( this ).clone().attr( 'type', 'radio' ) );
			} );

			// 一覧画面
			var hoge_taxonomy_checklist = $( '.' + tax_name + '_taxonomy-checklist input[type=checkbox]' );
			hoge_taxonomy_checklist.click( function() {
				$( this ).parents( '.' + tax_name + '-checklist' ).find( ' input[type=checkbox]' ).attr( 'checked', false );
				$( this ).attr( 'checked', true );
			} );
		} );
	</script>
<?php
}

// メディアから画像いれたときのうっとおしいリンクを削除
//add_filter( 'media_send_to_editor', 'my_media_send_to_editor', 999, 3 );
function my_media_send_to_editor( $html ) {
	return preg_replace( '/<a .*?>(.*?)<\/a>/', '$1', $html );
}

// adminbarがあるとレイアウト崩れるの削除
//add_filter( 'show_admin_bar' , 'my_function_admin_bar');
function my_function_admin_bar(){
	return false;
}