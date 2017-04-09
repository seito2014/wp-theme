<?php
/**
 * WordPress全体で共通して使用する処理を記載します。
 *
 *
 */
	
	/**
	 * print_rを整形
	 * @param type $vars
	 */
	function pr( $vars ) {
			if ( WP_DEBUG ) {
				echo '<pre>';
				print_r( $vars );
				echo '</pre>';
			}
	}
	

	/**
	 * 抜粋の文字数設定
	 * @param unknown_type $length
	 * @return number
	 * @author danda hayato
	 * @create 2013/09/12
	 * @version    1.0
	 */
	function set_excerpt_mblength($length) {
		return 59;
	}
	//add_filter('excerpt_mblength', 'set_excerpt_mblength');

	/**
	 * 抜粋の文末変更
	 * @param unknown_type $more
	 * @return string
	 * @author danda hayato
	 * @create   2013/09/12
	 * @version    1.0
	 */
	function set_excerpt_more($more) {
		return '...';
	}
	//add_filter('excerpt_more', 'set_excerpt_more');

	/**
	 * 指定のスラッグがURIに含まれているか確認する。
	 * 主に静的ページのチェックに使ってください。
	 * @param unknown_type $slug
	 * @return boolean
	 * @author danda hayato
	 * @create  2013/09/12
	 * @version    1.0
	 */
	function is_static_page($slug = ''){
		if(strstr($_SERVER["REQUEST_URI"],$slug)):
			return true;
		endif;
			return false;
	}

	/**
	 *
	 * ファイル保存しているカスタムフィールドからファイルリンクを取得する
	 * @param unknown_type $postid 記事ID
	 * @param unknown_type $key ファイルを保持しているカスタムフィールドキー
	 */
	function get_customfield_filelink($postid,$key){
		$files = get_post_meta($postid, $key, false);
		foreach($files as $file):
			$file = wp_get_attachment_url($file);
			return $file;
		endforeach;
	}

	
	/**
	 * 投稿が指定期間以内かチェックする
	 * @param type $post_id 記事ID
	 * @param type $time 期間指定　strtotimeのフォーマットを指定
	 * @return boolean
	 */
	function is_newpost( $post_id = null,$time=NEW_POST_TIME){
		$dt = new DateTime();
		$dt->setTimeZone(new DateTimeZone('Asia/Tokyo'));
		$today = get_post_time('Y-m-d', false, $post_id );
		$limit_day = date( "Y-m-d", strtotime( $time ) );
		if ( strtotime($today) >= strtotime($limit_day)) :
			return true;
		endif;
		return false;
	}
	
	/**
	 * エンコード
	 * @param unknown_type $str
	 * @author danda hayato
	 * @create
	 * @version    1.0
	 */
	function xss($str = null){
		return htmlentities($str,ENT_QUOTES, "UTF-8");
	}

    /**
     * get_template_part の変わりに利用してください。
     * $argsをローカルスコープにて渡すことが可能です。
     *
     * @param $tpl
     * @param array $vars
     */
    function importTemplate($tpl, $vars=array()){
        $tpl = ltrim($tpl, '/') .'.php';
        $path = locate_template(array($tpl));
        if(empty($path)){
            throw new LogicException("Cannot locate the template '$tpl'.");
        }
        extract($vars);
        include $path;
    }

    function importPart($tpl, $vars=array()){
        importTemplate('parts/'. ltrim($tpl, '/'), $vars);
    }

    /**
     * pre_get_postsの代わりに使用
     * 同一ページで複数のクエリを投げるときなどに使用
     */
    function create_new_query($args) {
        // global $wp_query;

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args += array('paged' => $paged);
        $wp_query = new WP_Query($args);

        return $wp_query;
    }

    /**
     * ブログのカテゴリー名を取得
     */
    function get_blog_category(){
        $cat = get_the_terms(get_the_ID(), 'blog_category');
        return $cat[0]->name;
    }

    /**
     * ブログのカテゴリー名を取得
     */
    function get_blog_tags(){
        $tags = get_the_terms(get_the_ID(), 'blog_tag');
        return $tags;
    }

    /**
     * 著者のプロフィール画像を取得
     */
    function get_user_image_url($field, $user_id, $size = 'avatar') {
        $image_id = get_the_author_meta($field, $user_id);
        $image = wp_get_attachment_image_src($image_id, $size);
        return !empty($image) ? $image[0] : NO_IMAGE_AUTHOR;
    }

    /**
     * カテゴリー名を入れると対応するカラー名を返す
     */
    function get_category_color($category){
        switch($category){
            case BLOG_CATEGORY_0:
                return BLOG_CATEGORY_COLOR_0;
                break;
            case BLOG_CATEGORY_1:
                return BLOG_CATEGORY_COLOR_1;
                break;
            case BLOG_CATEGORY_2:
                return BLOG_CATEGORY_COLOR_2;
                break;
            case BLOG_CATEGORY_3:
                return BLOG_CATEGORY_COLOR_3;
                break;
            case BLOG_CATEGORY_4:
                return BLOG_CATEGORY_COLOR_4;
                break;
            case BLOG_CATEGORY_5:
                return BLOG_CATEGORY_COLOR_5;
                break;
            case BLOG_CATEGORY_6:
                return BLOG_CATEGORY_COLOR_6;
                break;
            default:
                return BLOG_CATEGORY_COLOR_0;
                break;
        }
    }

    /**
     * カテゴリのリストを取得
     * 親子関係にあるカテゴリは階層にする
     * とりあえず親子まで。孫カテゴリ以降には未対応
     *
     * @param type $args クエリパラメータ
     * @author Masamichi
     * @version    1.0
     */
    function get_category_list($args) {
        $results = get_categories($args);

        if(empty($results)) {
            return array();
        }

        //親子に分ける
        foreach($results as $result) {
            if(empty($result->parent)) {
                //親カテゴリ
                $categories[$result->cat_ID] = $result;
            } else {
                //子カテゴリ
                $children[$result->cat_ID] = $result;
            }
        }

        //子カテゴリが一つもなければ処理終了
        if(empty($children)) {
            return $categories;
        }

        //親カテゴリに子カテゴリを入れる
        foreach($children as $child) {
            $categories[$child->category_parent]->children[$child->cat_ID] = $child;
        }

        return $categories;
    }


    //概要（抜粋）の文字数調整
    function my_excerpt_length($length) {
        return 80;
    }
    add_filter('excerpt_length', 'my_excerpt_length');

    //概要（抜粋）の省略文字
    function my_excerpt_more($more) {
        return '...';
    }
    add_filter('excerpt_more', 'my_excerpt_more');

    // 記事ページでは、記事本文から抜粋を取得
    function get_meta_description() {
        global $post;
        $description = "";

        if ($post->post_excerpt) {
            $description = $post->post_excerpt;
        } else {
            // post_excerpt で取れない時は、自力で記事の冒頭100文字を抜粋して取得
            $description = strip_tags($post->post_content);
            $description = str_replace("\n", "", $description);
            $description = str_replace("\r", "", $description);
            $description = mb_substr($description, 0, 100) . "...";
        }
        return $description;
    }

    // echo meta description tag
    function set_single_description() {
        if (is_single() ) {
            echo '<meta name="description" content="' . get_meta_description() . '" />' . "\n";
        }
    }

    //set noimage
    function setNoimgae($width, $height){
        echo '<img src="'.NO_IMAGE.'" width="'.$width.'" height="'.$height.'" alt="No image">';
    }
