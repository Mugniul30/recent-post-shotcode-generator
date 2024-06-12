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


add_shortcode('clickfunnels_recent_post_title', 'clickfunnels_recent_post_title_shortcode');
function clickfunnels_recent_post_title_shortcode($atts) {
    $atts = shortcode_atts(array(
        'category' => 'clickfunnels', // Default category if not specified
        'number_of_post' => 1,
    ), $atts);

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $atts['number_of_post'],
        'category_name' => $atts['category'],
    );

    $posts = get_posts($args);

    ob_start();

    foreach ($posts as $post) {
        echo esc_html($post->post_title);
    }

    return ob_get_clean();
}

// Shortcode for Featured Image
add_shortcode('clickfunnels_recent_post_image', 'clickfunnels_recent_post_image_shortcode');
function clickfunnels_recent_post_image_shortcode($atts) {
    $atts = shortcode_atts(array(
        'category' => 'clickfunnels', // Default category if not specified
        'number_of_post' => 1,
    ), $atts);

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $atts['number_of_post'],
        'category_name' => $atts['category'],
    );

    $posts = get_posts($args);

    ob_start();

    foreach ($posts as $post) {
        if (has_post_thumbnail($post->ID)) {
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail');
            echo '<div class="img-with-aniamtion-wrap" data-max-width="100%" data-max-width-mobile="default" data-shadow="none" data-animation="none">';
            echo '  <div class="inner">';
            echo '    <div class="hover-wrap"> ';
            echo '      <div class="hover-wrap-inner">';
            echo '        <img loading="lazy" decoding="async" class="img-with-animation skip-lazy" data-delay="0" height="3456" width="6912" data-animation="none" src="' . esc_url($image[0]) . '" alt="' . esc_attr($post->post_title) . '">';
            echo '      </div>';
            echo '    </div>';
            echo '  </div>';
            echo '</div>';
        } else {
            // You can handle the case when there's no featured image if needed
            return '';
        }
    }

    return ob_get_clean();
}
// Shortcode for Post Excerpt
add_shortcode('clickfunnels_recent_post_excerpt', 'clickfunnels_recent_post_excerpt_shortcode');
function clickfunnels_recent_post_excerpt_shortcode($atts) {
    $atts = shortcode_atts(array(
        'category' => 'clickfunnels', // Default category if not specified
        'number_of_post' => 1,
    ), $atts);

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $atts['number_of_post'],
        'category_name' => $atts['category'],
    );

    $posts = get_posts($args);

    ob_start();

    foreach ($posts as $post) {
        echo mb_substr(strip_tags($post->post_excerpt), 0, 100) . '...'; // Adjust the excerpt length as needed
    }

    return ob_get_clean();
}

add_shortcode('email_marketing_recent_post_title', 'email_marketing_recent_post_title_shortcode');
function email_marketing_recent_post_title_shortcode($atts) {
    $atts = shortcode_atts(array(
        'category' => 'email-marketing', // Default category if not specified
        'number_of_post' => 1,
    ), $atts);

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $atts['number_of_post'],
        'category_name' => $atts['category'],
    );

    $posts = get_posts($args);

    ob_start();

    foreach ($posts as $post) {
        echo esc_html($post->post_title);
    }

    return ob_get_clean();
}

// Shortcode for Featured Image
// Shortcode for Post Image
add_shortcode('email_marketing_recent_post_image', 'email_marketing_recent_post_image_shortcode');
function email_marketing_recent_post_image_shortcode($atts) {
    $atts = shortcode_atts(array(
        'category' => 'email-marketing', // Default category if not specified
        'number_of_post' => 1,
    ), $atts);

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $atts['number_of_post'],
        'category_name' => $atts['category'],
    );

    $posts = get_posts($args);

    ob_start();

    foreach ($posts as $post) {
        if (has_post_thumbnail($post->ID)) {
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail');
            echo '<div class="img-with-aniamtion-wrap" data-max-width="100%" data-max-width-mobile="default" data-shadow="none" data-animation="none">';
            echo '  <div class="inner">';
            echo '    <div class="hover-wrap"> ';
            echo '      <div class="hover-wrap-inner">';
            echo '        <img loading="lazy" decoding="async" class="img-with-animation skip-lazy" data-delay="0" height="3456" width="6912" data-animation="none" src="' . esc_url($image[0]) . '" alt="' . esc_attr($post->post_title) . '">';
            echo '      </div>';
            echo '    </div>';
            echo '  </div>';
            echo '</div>';
        } else {
            // You can handle the case when there's no featured image if needed
            return '';
        }
    }

    return ob_get_clean();
}


// Shortcode for Post Excerpt
add_shortcode('email_marketing_recent_post_excerpt', 'email_marketing_recent_post_excerpt_shortcode');
function email_marketing_recent_post_excerpt_shortcode($atts) {
    $atts = shortcode_atts(array(
        'category' => 'email-marketing', // Default category if not specified
        'number_of_post' => 1,
    ), $atts);

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $atts['number_of_post'],
        'category_name' => $atts['category'],
    );

    $posts = get_posts($args);

    ob_start();

    foreach ($posts as $post) {
        echo mb_substr(strip_tags($post->post_excerpt), 0, 100) . '...'; // Adjust the excerpt length as needed
    }

    return ob_get_clean();
}

// For category "podcast"
add_shortcode('podcast_recent_post_title', 'podcast_recent_post_title_shortcode');
function podcast_recent_post_title_shortcode($atts) {
    $atts = shortcode_atts(array(
        'category' => 'podcast', // Default category if not specified
        'number_of_post' => 1,
    ), $atts);

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $atts['number_of_post'],
        'category_name' => $atts['category'],
    );

    $posts = get_posts($args);

    ob_start();

    foreach ($posts as $post) {
        echo esc_html($post->post_title);
    }

    return ob_get_clean();
}

// Shortcode for Featured Image for category "podcast"
add_shortcode('podcast_recent_post_image', 'podcast_recent_post_image_shortcode');
function podcast_recent_post_image_shortcode($atts) {
    $atts = shortcode_atts(array(
        'category' => 'podcast', // Default category if not specified
        'number_of_post' => 1,
    ), $atts);

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $atts['number_of_post'],
        'category_name' => $atts['category'],
    );

    $posts = get_posts($args);

    ob_start();

    foreach ($posts as $post) {
        if (has_post_thumbnail($post->ID)) {
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail');
            echo '<div class="img-with-aniamtion-wrap" data-max-width="100%" data-max-width-mobile="default" data-shadow="none" data-animation="none">';
            echo '  <div class="inner">';
            echo '    <div class="hover-wrap"> ';
            echo '      <div class="hover-wrap-inner">';
            echo '        <img loading="lazy" decoding="async" class="img-with-animation skip-lazy" data-delay="0" height="3456" width="6912" data-animation="none" src="' . esc_url($image[0]) . '" alt="' . esc_attr($post->post_title) . '">';
            echo '      </div>';
            echo '    </div>';
            echo '  </div>';
            echo '</div>';
        } else {
            // You can handle the case when there's no featured image if needed
            return '';
        }
    }

    return ob_get_clean();
}

// Shortcode for Post Excerpt for category "podcast"
add_shortcode('podcast_recent_post_excerpt', 'podcast_recent_post_excerpt_shortcode');
function podcast_recent_post_excerpt_shortcode($atts) {
    $atts = shortcode_atts(array(
        'category' => 'podcast', // Default category if not specified
        'number_of_post' => 1,
    ), $atts);

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $atts['number_of_post'],
        'category_name' => $atts['category'],
    );

    $posts = get_posts($args);

    ob_start();

    foreach ($posts as $post) {
        echo mb_substr(strip_tags($post->post_excerpt), 0, 100) . '...'; // Adjust the excerpt length as needed
    }

    return ob_get_clean();
}

// For category "web-hosting"
add_shortcode('webhosting_recent_post_title', 'webhosting_recent_post_title_shortcode');
function webhosting_recent_post_title_shortcode($atts) {
    $atts = shortcode_atts(array(
        'category' => 'web-hosting', // Default category if not specified
        'number_of_post' => 1,
    ), $atts);

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $atts['number_of_post'],
        'category_name' => $atts['category'],
    );

    $posts = get_posts($args);

    ob_start();

    foreach ($posts as $post) {
        echo esc_html($post->post_title);
    }

    return ob_get_clean();
}

// Shortcode for Featured Image for category "web-hosting"
add_shortcode('webhosting_recent_post_image', 'webhosting_recent_post_image_shortcode');
function webhosting_recent_post_image_shortcode($atts) {
    $atts = shortcode_atts(array(
        'category' => 'web-hosting', // Default category if not specified
        'number_of_post' => 1,
    ), $atts);

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $atts['number_of_post'],
        'category_name' => $atts['category'],
    );

    $posts = get_posts($args);

    ob_start();

    foreach ($posts as $post) {
        if (has_post_thumbnail($post->ID)) {
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail');
            echo '<div class="img-with-aniamtion-wrap" data-max-width="100%" data-max-width-mobile="default" data-shadow="none" data-animation="none">';
            echo '  <div class="inner">';
            echo '    <div class="hover-wrap"> ';
            echo '      <div class="hover-wrap-inner">';
            echo '        <img loading="lazy" decoding="async" class="img-with-animation skip-lazy" data-delay="0" height="3456" width="6912" data-animation="none" src="' . esc_url($image[0]) . '" alt="' . esc_attr($post->post_title) . '">';
            echo '      </div>';
            echo '    </div>';
            echo '  </div>';
            echo '</div>';
        } else {
            // You can handle the case when there's no featured image if needed
            return '';
        }
    }

    return ob_get_clean();
}

// Shortcode for Post Excerpt for category "web-hosting"
add_shortcode('webhosting_recent_post_excerpt', 'webhosting_recent_post_excerpt_shortcode');
function webhosting_recent_post_excerpt_shortcode($atts) {
    $atts = shortcode_atts(array(
        'category' => 'web-hosting', // Default category if not specified
        'number_of_post' => 1,
    ), $atts);

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $atts['number_of_post'],
        'category_name' => $atts['category'],
    );

    $posts = get_posts($args);

    ob_start();

    foreach ($posts as $post) {
        echo mb_substr(strip_tags($post->post_excerpt), 0, 100) . '...'; // Adjust the excerpt length as needed
    }

    return ob_get_clean();
}

// For category "WordPress"
add_shortcode('wordpress_recent_post_title', 'wordpress_recent_post_title_shortcode');
function wordpress_recent_post_title_shortcode($atts) {
    $atts = shortcode_atts(array(
        'category' => 'WordPress', // Default category if not specified
        'number_of_post' => 1,
    ), $atts);

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $atts['number_of_post'],
        'category_name' => $atts['category'],
    );

    $posts = get_posts($args);

    ob_start();

    foreach ($posts as $post) {
        echo esc_html($post->post_title);
    }

    return ob_get_clean();
}

// Shortcode for Featured Image for category "WordPress"
add_shortcode('wordpress_recent_post_image', 'wordpress_recent_post_image_shortcode');
function wordpress_recent_post_image_shortcode($atts) {
    $atts = shortcode_atts(array(
        'category' => 'WordPress', // Default category if not specified
        'number_of_post' => 1,
    ), $atts);

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $atts['number_of_post'],
        'category_name' => $atts['category'],
    );

    $posts = get_posts($args);

    ob_start();

    foreach ($posts as $post) {
        if (has_post_thumbnail($post->ID)) {
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail');
            echo '<div class="img-with-aniamtion-wrap" data-max-width="100%" data-max-width-mobile="default" data-shadow="none" data-animation="none">';
            echo '  <div class="inner">';
            echo '    <div class="hover-wrap"> ';
            echo '      <div class="hover-wrap-inner">';
            echo '        <img loading="lazy" decoding="async" class="img-with-animation skip-lazy" data-delay="0" height="3456" width="6912" data-animation="none" src="' . esc_url($image[0]) . '" alt="' . esc_attr($post->post_title) . '">';
            echo '      </div>';
            echo '    </div>';
            echo '  </div>';
            echo '</div>';
        } else {
            // You can handle the case when there's no featured image if needed
            return '';
        }
    }

    return ob_get_clean();
}

// Shortcode for Post Excerpt for category "WordPress"
add_shortcode('wordpress_recent_post_excerpt', 'wordpress_recent_post_excerpt_shortcode');
function wordpress_recent_post_excerpt_shortcode($atts) {
    $atts = shortcode_atts(array(
        'category' => 'WordPress', // Default category if not specified
        'number_of_post' => 1,
    ), $atts);

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $atts['number_of_post'],
        'category_name' => $atts['category'],
    );

    $posts = get_posts($args);

    ob_start();

    foreach ($posts as $post) {
        echo mb_substr(strip_tags($post->post_excerpt), 0, 100) . '...'; // Adjust the excerpt length as needed
    }

    return ob_get_clean();
}
// For category "wordpresssneaksandpeeks"
add_shortcode('wordpresssneaksandpeeks_recent_post_title', 'wordpresssneaksandpeeks_recent_post_title_shortcode');
function wordpresssneaksandpeeks_recent_post_title_shortcode($atts) {
    $atts = shortcode_atts(array(
        'category' => 'wordpresssneaksandpeeks', // Default category if not specified
        'number_of_post' => 1,
    ), $atts);

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $atts['number_of_post'],
        'category_name' => $atts['category'],
    );

    $posts = get_posts($args);

    ob_start();

    foreach ($posts as $post) {
        echo esc_html($post->post_title);
    }

    return ob_get_clean();
}

// Shortcode for Featured Image for category "wordpresssneaksandpeeks"
add_shortcode('wordpresssneaksandpeeks_recent_post_image', 'wordpresssneaksandpeeks_recent_post_image_shortcode');
function wordpresssneaksandpeeks_recent_post_image_shortcode($atts) {
    $atts = shortcode_atts(array(
        'category' => 'wordpresssneaksandpeeks', // Default category if not specified
        'number_of_post' => 1,
    ), $atts);

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $atts['number_of_post'],
        'category_name' => $atts['category'],
    );

    $posts = get_posts($args);

    ob_start();

    foreach ($posts as $post) {
        if (has_post_thumbnail($post->ID)) {
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail');
            echo '<div class="img-with-aniamtion-wrap" data-max-width="100%" data-max-width-mobile="default" data-shadow="none" data-animation="none">';
            echo '  <div class="inner">';
            echo '    <div class="hover-wrap"> ';
            echo '      <div class="hover-wrap-inner">';
            echo '        <img loading="lazy" decoding="async" class="img-with-animation skip-lazy" data-delay="0" height="3456" width="6912" data-animation="none" src="' . esc_url($image[0]) . '" alt="' . esc_attr($post->post_title) . '">';
            echo '      </div>';
            echo '    </div>';
            echo '  </div>';
            echo '</div>';
        } else {
            // You can handle the case when there's no featured image if needed
            return '';
        }
    }

    return ob_get_clean();
}

// Shortcode for Post Excerpt for category "wordpresssneaksandpeeks"
add_shortcode('wordpresssneaksandpeeks_recent_post_excerpt', 'wordpresssneaksandpeeks_recent_post_excerpt_shortcode');
function wordpresssneaksandpeeks_recent_post_excerpt_shortcode($atts) {
    $atts = shortcode_atts(array(
        'category' => 'wordpresssneaksandpeeks', // Default category if not specified
        'number_of_post' => 1,
    ), $atts);

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $atts['number_of_post'],
        'category_name' => $atts['category'],
    );

    $posts = get_posts($args);

    ob_start();

    foreach ($posts as $post) {
        echo mb_substr(strip_tags($post->post_excerpt), 0, 100) . '...'; // Adjust the excerpt length as needed
    }

    return ob_get_clean();
}

