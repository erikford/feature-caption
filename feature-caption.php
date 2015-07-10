<?php
/*
Plugin Name: Feature Caption
Plugin URI: http://erikford.me/code/featured-image-caption
Description: A simple plugin that will return the set caption for a featured image.
Version: 1.0.0
Author: Erik Ford
Author URI: http://erikford.me
License:
	Copyright 2015 Erik Ford <@okayerik>
	
	This program is free software; you can redistribute it and/or modify it under
	the terms of the GNU General Public License, version 2, as published by the Free
	Software Foundation.
	
	This program is distributed in the hope that it will be useful, but WITHOUT ANY
	WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
	PARTICULAR PURPOSE. See the GNU General Public License for more details.
	
	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software Foundation, Inc.,
	51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*/

/*----------------------------------------------------------------------------*/
/* Feature Caption
/*----------------------------------------------------------------------------*/

/**
 * Feature Caption
 *
 * Display the featured image caption if the option to do so is set.
 *
 * @package Feature Caption
 * @version 1.0.0
 * @since 1.0.0
 * @author Erik Ford <@okayerik>
 *
 */

function okayerik_feature_caption() {

  global $post;

  // post thumbnail ID
  $thumbnail_id = get_post_thumbnail_id( $post->ID );

  // retrieve post thumbnail image data
  $args = array(
    'p'         => $thumbnail_id,
    'post_type' => 'attachment',
  );
  $thumbnail_image = get_posts( $args );

  if ( $thumbnail_image && isset( $thumbnail_image[0] ) && !empty( $thumbnail_image[0]->post_excerpt ) ) {
    return '<figcaption class="wp-caption-text">' . wp_kses_post( $thumbnail_image[0]->post_excerpt ) . '</figcaption>';
  }

}