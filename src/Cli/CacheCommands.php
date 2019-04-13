<?php

namespace DeliciousBrains\SpinupWp\Cli;

use WP_CLI;

/**
 * Perform SpinupWP operations.
 *
 * ## EXAMPLES
 *
 *     # Purge the entire SpinupWP page cache
 *     $ wp spinupwp purge-site
 */
class CacheCommands {

	/**
     * Purge the entire SpinupWP page cache.
     *
     * ## EXAMPLES
     *
     *     wp spinupwp purge-site
     *
	 * @subcommand purge-site
     */
    public function purge_site() {
		if ( spinupwp()['Cache']->purge_page_cache() ) {
			WP_CLI::success( __( 'Site cache purged.', 'spinupwp' ) );
		} else {
			WP_CLI::error( __( 'Site cache could not be purged.', 'spinupwp' ) );
		}
	}
	
	/**
     * Purge a single post from the SpinupWP page cache.
     *
	 * ## OPTIONS
     *
     * <post_id>
     * : The ID of the post to purge.
	 * 
     * ## EXAMPLES
     *
     *     wp spinupwp purge-post 123
     *
	 * @subcommand purge-post
     */
    public function purge_post( $args ) {
		$post = get_post( $args[0] );

		if ( ! $post ) {
			WP_CLI::error( __( 'Post not found.', 'spinupwp' ) );
			return;
		}

		if ( spinupwp()['Cache']->purge_post( $post ) ) {
			WP_CLI::success( __( 'Post purged from cache.', 'spinupwp' ) );
		} else {
			WP_CLI::error( __( 'Post could not be purged from cache.', 'spinupwp' ) );
		}
	}
	
	/**
     * Purge a single URL from the SpinupWP page cache.
     *
	 * ## OPTIONS
     *
     * <url>
     * : The URL to purge.
	 * 
     * ## EXAMPLES
     *
     *     wp spinupwp purge-url https://example.com
     *
	 * @subcommand purge-url
     */
    public function purge_url( $args ) {
		if ( spinupwp()['Cache']->purge_url( $args[0] ) ) {
			WP_CLI::success( __( 'URL purged from cache.', 'spinupwp' ) );
		} else {
			WP_CLI::error( __( 'URL could not be purged from cache.', 'spinupwp' ) );
		}
    }
}