<?php
/*
 * Plugin Name:       TechyPark Custom Shortcode
 * Plugin URI:        https://techypark.com/
 * Description:       Copy the shortcode for the most recent blog that is posted. Title, Thumbnail, Date & everything. 
 * Version:           1.0.0
 * Author:            A. A. Mugniul Haque
 * Author URI:        https://www.facebook.com/Mugniul/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       techyPark-custom-shortcode
 * Domain Path:       /languages
 */


add_shortcode('recent_post_title', 'recent_post_section');
function recent_post_section( $atts,$content=''){
$atts = shortcode_atts( array(
    'title'=>'This is the title',
    'number_of_post' => 1,
    'post_type'=>'post',
),$atts);
ob_start();
$args = ['post_type'=> $atts['post_type'], 'posts_per_page'=>$atts['number_of_post'],];
$posts= get_posts($args);
foreach ($posts as $post){
echo '<h2>'.$post->post_title.'</h2><br>';
echo '<p>'.substr($post->post_content, 0, 200).'</p><br>';
}
return ob_get_clean();
}
add_shortcode('recent_post_date', 'recent_post_section_date');
function recent_post_section_date( $atts,$content=''){
$atts = shortcode_atts( array(
    'title'=>'This is the title',
    'number_of_post' => 1,
    'post_type'=>'post',
),$atts);
ob_start();
$args = ['post_type'=> $atts['post_type'], 'posts_per_page'=>$atts['number_of_post'],];
$posts= get_posts($args);
foreach ($posts as $post){
    echo get_the_date('',$post->ID);}
    return ob_get_clean();
}
add_shortcode('recent_post_thumbnail', 'recent_post_section_thumbnail');
function recent_post_section_thumbnail( $atts,$content=''){
$atts = shortcode_atts( array(
    'title'=>'This is the title',
    'number_of_post' => 1,
    'post_type'=>'post',
),$atts);
ob_start();
$args = ['post_type'=> $atts['post_type'], 'posts_per_page'=>$atts['number_of_post'],];
$posts= get_posts($args);
foreach ($posts as $post){
echo get_the_post_thumbnail($post->ID);}
return ob_get_clean();
}

function event_title_shortcode() {
    $args = array(
        'post_type' => 'event',
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $title = get_the_title();
        }
        wp_reset_postdata();
        return $title;
    }
}
add_shortcode('event_title', 'event_title_shortcode');

function event_meta_shortcode() {
    $args = array(
        'post_type' => 'event',
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $description = get_the_excerpt();
            $description = substr($description, 0, 200);
        }
        wp_reset_postdata();
        return $description;
    }
}
add_shortcode('event_meta', 'event_meta_shortcode');


function event_date_shortcode() {
    $args = array(
        'post_type' => 'event',
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $date = get_field('event_date', get_the_ID());
            $timestamp = strtotime($date);
            $date_format = date('j', $timestamp) . '<br>' . substr(date('F', $timestamp), 0, 3);
        }
        wp_reset_postdata();
        return $date_format;
    }
}
add_shortcode('event_date', 'event_date_shortcode');

function event_thumbnail_shortcode() {
    $args = array(
        'post_type' => 'event',
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
            $thumbnail_html = '<img src="' . $thumbnail_url . '" />';
        }
        wp_reset_postdata();
        return $thumbnail_html;
    }
}
add_shortcode('event_thumbnail', 'event_thumbnail_shortcode');

