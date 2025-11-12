<?php
/**
 * Admin Post ID Utility
 *
 * This utility adds a sortable 'ID' column to the admin list tables for all
 * public post types in WordPress.
 *
 * @package     HussainasAdminPostID
 * @version     1.0.0
 * @author      Hussain Ahmed Shrabon
 * @license     MIT
 * @link        https://github.com/iamhussaina
 * @textdomain  hussainas
 */

// Prevent direct script access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Initializes the admin post ID utility by adding necessary filters and actions.
 *
 * This loader function targets all public post types and attaches
 * functions to add, populate, and make the ID column sortable.
 */
function hussainas_admin_id_utility_loader() {
	// Get all public post types (post, page, custom post types, etc.)
	$public_post_types = get_post_types( array( 'public' => true ), 'names' );

	if ( empty( $public_post_types ) ) {
		return;
	}

	foreach ( $public_post_types as $post_type ) {
		// Add the ID column
		add_filter( "manage_{$post_type}_posts_columns", 'hussainas_admin_id_add_column' );

		// Populate the ID column
		add_action( "manage_{$post_type}_posts_custom_column", 'hussainas_admin_id_display_column', 10, 2 );

		// Make the ID column sortable
		add_filter( "manage_edit-{$post_type}_sortable_columns", 'hussainas_admin_id_make_column_sortable' );
	}

	// Handle the sorting logic when the ID column is clicked
	add_action( 'pre_get_posts', 'hussainas_admin_id_sort_by_id' );
}

add_action( 'admin_init', 'hussainas_admin_id_utility_loader' );

/**
 * Adds the 'ID' column to the admin post list table.
 *
 * @param array $columns The existing array of columns.
 * @return array The modified array of columns including 'ID'.
 */
function hussainas_admin_id_add_column( $columns ) {
	// We add the ID column right after the 'cb' (checkbox) column.
	// To add it at the end, simply append it: $columns['hussainas_id'] = 'ID';
	$new_columns = array();
	
	foreach ( $columns as $key => $title ) {
		$new_columns[ $key ] = $title;
		// 'cb' is the key for the checkbox column.
		if ( 'cb' === $key ) {
			$new_columns['hussainas_id'] = 'ID';
		}
	}

	return $new_columns;
}

/**
 * Displays the post ID in the custom 'ID' column.
 *
 * @param string $column_name The key of the current column.
 * @param int    $post_id     The ID of the current post.
 */
function hussainas_admin_id_display_column( $column_name, $post_id ) {
	// Check if this is our custom column.
	if ( 'hussainas_id' === $column_name ) {
		echo (int) $post_id;
	}
}

/**
 * Registers the 'ID' column as sortable.
 *
 * @param array $sortable_columns The existing array of sortable columns.
 * @return array The modified array with 'hussainas_id' set as sortable.
 */
function hussainas_admin_id_make_column_sortable( $sortable_columns ) {
	// 'hussainas_id' is the column key, 'ID' is the orderby value.
	$sortable_columns['hussainas_id'] = 'ID';
	return $sortable_columns;
}

/**
 * Handles the custom sorting logic for the 'ID' column.
 *
 * This function modifies the main WP_Query when sorting by 'ID'
 * in the admin panel.
 *
 * @param WP_Query $query The main WordPress query object.
 */
function hussainas_admin_id_sort_by_id( $query ) {
	// We only modify the query if all conditions are met:
	// 1. We are in the admin area.
	// 2. This is the main query for the post list table.
	// 3. The 'orderby' parameter is set to 'ID' (which we defined in our sortable function).
	if ( ! is_admin() || ! $query->is_main_query() || 'ID' !== $query->get( 'orderby' ) ) {
		return;
	}

	// Set the query to order by the actual database 'ID' field.
	$query->set( 'orderby', 'ID' );
}
