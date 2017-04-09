<?php 
/*
Plugin Name: WP Missed Schedule
Plugin URI: http://slangji.wordpress.com/wp-missed-schedule/
Description: WordPress Plugin WP <code>Missed Schedule</code> Fix <code>Scheduled</code> <code>Failed Future Posts</code> <code>Virtual Cron Job</code>: find only items that match this problem, no others, and republish them correctly 10 items each session, every 5 minutes. All others will be solved on next sessions, to no waste resources, until no longer exist: 10 items every 5 minutes, 120 items every hour, 1 session every 5 minutes, 12 sessions every hour. Free Version.
Version: 2013.1231.2013
Author: sLa NGjI's
Author URI: http://slangji.wordpress.com/
Requires at least: 2.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Indentation: GNU style coding standard
Indentation URI: http://www.gnu.org/prep/standards/standards.html
 *
 * DEVELOPMENTAL release: Version 2013 Build 0110 Revision 1913
 *
 * PROFESSIONAL  release: Version 2014 Build 0101 Revision 2014
 *
 * STABLE        release: Version 2013 Build 1212 Revision 9999 - RC2013
 *
 * MAJOR         release: Version 2013 Build 1231 Revision 2013
 *
 * GOLD          release: Version 2013 Build 1231 Revision 2013
 *
 * [WP Missed Schedule](http://wordpress.org/plugins/wp-missed-schedule/) Fix Scheduled Failed Future Posts
 *
 * This plugin patched an important unfixed problem since WordPress 2.5+
 *
 * Copyright (C) 2008-2014 [slangjis](http://slangji.wordpress.com/) (email: <slangjis [at] googlegmail [dot] com>))
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the [GNU General Public License](http://wordpress.org/about/gpl/)
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, see [GNU General Public Licenses](http://www.gnu.org/licenses/),
 * or write to the Free Software Foundation, Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301, USA.
 *
 * DISCLAIMER
 *
 * The license under which the WordPress software is released is the GPLv2 (or later) from the
 * Free Software Foundation. A copy of the license is included with every copy of WordPress.
 *
 * Part of this license outlines requirements for derivative works, such as plugins or themes.
 * Derivatives of WordPress code inherit the GPL license.
 *
 * There is some legal grey area regarding what is considered a derivative work, but we feel
 * strongly that plugins and themes are derivative work and thus inherit the GPL license.
 *
 * The license for this software can be found on [Free Software Foundation](http://www.gnu.org/licenses/gpl-2.0.html)
 * and as license.txt into this plugin package.
 *
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * THERMS
 *
 * This uses (or it parts) code derived from
 *
 * wp-header-footer-log.php by slangjis <slangjis [at] googlemail [dot] com>
 * Copyright (C) 2008-2013 [slangjis](http://slangji.wordpress.com/) (email: <slangjis [at] googlemail [dot] com>)
 *
 * according to the terms of the GNU General Public License version 2 (or later)
 *
 * This wp-header-footer-log.php uses (or it parts) code derived from
 *
 * wp-footer-log.php by slangjis <slangjis [at] googlemail [dot] com>
 * Copyright (C) 2008-2013 [slangjis](http://slangji.wordpress.com/) (email: <slangjis [at] googlemail [dot] com>)
 *
 * sLa2sLaNGjIs.php by slangjis <slangjis [at] googlemail [dot] com>
 * Copyright (C) 2009-2013 [slangjis](http://slangji.wordpress.com/) (email: <slangjis [at] googlemail [dot] com>)
 *
 * according to the terms of the GNU General Public License version 2 (or later)
 *
 * According to the Terms of the GNU General Public License version 2 (or later) part of Copyright belongs to your own author
 * and part belongs to their respective others authors:
 *
 * Copyright (C) 2008-2013 [slangjis](http://slangji.wordpress.com/) (email: <slangjis [at] googlemail [dot] com>)
 *
 * VIOLATIONS
 *
 * [Violations of the GNU Licenses](http://www.gnu.org/licenses/gpl-violation.en.html)
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * GUIDELINES
 *
 * This software meet [Detailed Plugin Guidelines](http://wordpress.org/plugins/about/guidelines/)
 * paragraphs 1,4,10,12,13,16,17 quality requirements.
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * CODING
 *
 * This software implement [GNU style](http://www.gnu.org/prep/standards/standards.html) coding standard indentation.
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * VALIDATION
 *
 * This readme.txt rocks. Seriously. Flying colors. It meet the specifications according to
 * WordPress [Readme Validator](http://wordpress.org/plugins/about/validator/) directives.
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * THANKS
 *
 * [nicokaiser](http://wordpress.org/support/topic/plugin-uses-post_date_gmt-which-is-not-indexed)
 * Jack Hayhurst <jhayhurst [at] liquidweb [dot] com> MySQL Queries with Server Load Optimization and Index Suggestion.
 * [Arkadiusz Rzadkowolski](http://profiles.wordpress.org/fliespl/) HyperDB table_name from query broken in select query.
 * [milewis1](http://profiles.wordpress.org/milewis1/) WordPress blog's timezone implementation instead of the MySQL time.
 */

	/**
	 * @package WP Missed Schedule
	 * @subpackage WordPress PlugIn
	 * @description Fix Scheduled Missed Schedule Failed Future Posts Virtual Cron Job Items
	 * @noted This plugin patched an important unfixed problem since WordPress 2.5+
	 * @since 2.5.0
	 * @version     2013.1231.2013
	 * @1stversion  2008.1210.2008
	 * @devversion  2014.0110.1913-DEV
	 * @goldversion 2013.1231.2013-GLD
	 * @proversion  2014.0101.2014-PRO
	 * @status STABLE (tag) major release 2013
	 * @install The configuration of this Plugin is Automattic! not need other actions except activate deactivate delete
	 * @author slangjis
	 * @license GPLv2 or later
	 * @indentation GNU style coding standard
	 * @satisfaction 4 Jan 2014 3:57 100.000 Downloads!
	 * @keybit m78BbFMtb3g46FsK338kT29FPANa8zFXj3lC62b79H8651411574J4YQCeLCQM540
	 * @keysum 6C33486E8694ECB50857E8283BC532D9
	 * @keytag 6707293c0218e2d8b7aa38d418ffa608
	 */

	if ( !function_exists( 'add_action' ) )
		{
			header( 'HTTP/0.9 403 Forbidden' );
			header( 'HTTP/1.0 403 Forbidden' );
			header( 'HTTP/1.1 403 Forbidden' );
			header( 'Status: 403 Forbidden' );
			header( 'Connection: Close' );
				exit();
		}

	global $wp_version;

	if ( $wp_version < 2.5 )
		{
			wp_die( __( 'This Plugin Requires WordPress 2.5+ or Greater: Activation Stopped!' ) );
		}

	function wpms_option()
		{
			define( 'WPMS_OPTION', 'wp_missed_schedule' );

			$last = get_option( WPMS_OPTION, false );

			if ( ( $last !== false ) && ( $last > ( time() - ( 5 * 60 ) ) ) )
				return;

			update_option( WPMS_OPTION, time() );
		}
	add_action( 'init', 'wpms_option', 0 );

	function wpms_init()
		{
			global $wpdb;

$qry = <<<SQL

			SELECT ID FROM {$wpdb->posts} WHERE ( ( post_date > 0 && post_date <= %s ) ) AND post_status = 'future' LIMIT 0,10

SQL;

			$sql = $wpdb->prepare( $qry, current_time( 'mysql', 0 ) );

			$scheduledIDs=$wpdb->get_col($sql);

			if ( !count( $scheduledIDs ) )
				return;

			foreach ( $scheduledIDs as $scheduledID )
				{
					if ( !$scheduledID )
						continue;

					wp_publish_post( $scheduledID );
				}
		}
	add_action( 'init', 'wpms_init', 0 );

	function wpms_prml( $links, $file )
		{
			if ( $file == plugin_basename( __FILE__ ) )
				{
					$links[] = '<a href="http://slangji.wordpress.com/contact/">Contact</a>';
					$links[] = '<a href="http://slangji.wordpress.com/donate/">Donate</a>';
					$links[] = '<a href="http://slangji.wordpress.com/plugins/">Other plugin</a>';
				}
			return $links;
		}
	add_filter( 'plugin_row_meta', 'wpms_prml', 10, 2 );

	function wpms_shfl()
		{
			echo "\n<!--Plugin WP Missed Schedule 2013.1231.2013 Active - Tag ".md5(md5("m78BbFMtb3g46FsK338kT29FPANa8zFXj3lC62b79H8651411574J4YQCeLCQM540"."6C33486E8694ECB50857E8283BC532D9"))."-->\n";
			echo "\n<!-- This site is patched which an important unfixed problem since WordPress 2.5+ -->\n\n";
		}
	add_action( 'wp_head', 'wpms_shfl' );
	add_action( 'wp_footer', 'wpms_shfl' );
	add_action( 'admin_head', 'wpms_shfl' );
	add_action( 'admin_footer', 'wpms_shfl' );

	function wpms_clnp()
		{
			delete_option( WPMS_OPTION );
		}
	register_deactivation_hook( __FILE__, 'wpms_clnp', 0 );
?>