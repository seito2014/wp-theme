<?php
/**
 * ここはパーマリンク設定、リライトルールを変更する処理を記載するファイルです。
 *  @author  danda hayato
 *  @create  2013/09/12
 *  @version    1.0
 */

add_action("init" , "lig_add_post_type_rules");

function lig_add_post_type_rules(){
    // ユーザ詳細ページようリライトルールの追加
    add_rewrite_rule('member-detail/user_id/(.*)/?$', 'index.php?pagename=member-detail&user_id=$matches[1]', 'top');

    // query_varsでuser_idを扱えるように追加
    add_filter('query_vars', 'add_user_query_vars');
    function add_user_query_vars($vars) {
        $vars[] = 'user_id';
        return $vars;
    }
}



