<?php

if ( ! function_exists( 'easy_addons_posted_on' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function easy_addons_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( DATE_W3C ) ),
            esc_html( get_the_modified_date() )
        );

        $icon = '<i class="fas fa-calendar"></i>';

        $posted_on = sprintf(
            '<a class="post-date-text" href="%s" rel="bookmark">%s%s</a>',
            esc_url( get_permalink() ),
            $icon,
            $time_string
        );

        echo  $posted_on; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
endif;

if ( ! function_exists( 'easy_addons_posted_by' ) ):
    /**
     * return HTML with meta information for the current author.
     */
    function easy_addons_posted_by() {

        $icon = '<i class="fas fa-user-alt"></i>';
        $author_id = get_post_field('post_author', get_the_ID());
        $author_name = get_the_author_meta('display_name', $author_id);
        $url = get_author_posts_url($author_id);
        $byline = sprintf(
            '<a class="post-author-text author vcard" href="%s">%s%s</a>',
            esc_url( $url ),
            $icon,
            esc_html( $author_name )
        );

        echo $byline; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

    }
endif;

/**
 * Return post category array.
 */
if (!function_exists('easy_addons_post_categories')) {

    function easy_addons_post_categories()
    {

        $terms = get_terms(
            array(
                'taxonomy' => 'category',
                'hide_empty' => true,
            )
        );

        $options = array();
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->term_id] = $term->name;
            }
        }

        return $options;
    }

}

/**
 * Return post author array.
 */
if (!function_exists('easy_addons_post_author')) {

    function easy_addons_post_author()
    {

        $args = array(
            'orderby' => 'name',
            'order' => 'ASC',
            'role__not_in' => array('customer', 'subscriber'),
        );
        $authors = get_users($args);

        $options = array();
        if (!empty($authors) && !is_wp_error($authors)) {
            foreach ($authors as $author) {
                $options[$author->ID] = $author->user_login;
            }
        }

        return $options;
    }

}

/**
 * Return post tags array.
 */
if (!function_exists('easy_addons_post_tags')) {

    function easy_addons_post_tags()
    {

        $terms = get_terms(
            array(
                'taxonomy' => 'post_tag',
                'hide_empty' => true,
            )
        );

        $options = array();
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->term_id] = $term->name;
            }
        }

        return $options;
    }

}

/**
 * Return post by author
 * */
if (!function_exists('easy_addons__posted_by')) {

    function easy_addons__posted_by()
    {
        printf(
        /* translators: 1: SVG icon. 2: post author, only visible to screen readers. 3: author link. */
            '<span class="byauthor">%1$s<span class="screen-reader-text">%2$s</span><span class="author vcard"><a class="url fn n" href="%3$s">%4$s</a></span></span>', '<i class="fas fa-user" aria-hidden="true"></i>', __('Posted by', 'easy-addons'), esc_url(get_author_posts_url(get_the_author_meta('ID'))), esc_html(get_the_author())
        );
    }

}

/**
 * Return post by date and time
 * */
if (!function_exists('easy_addons_posted_on')) { // Not Use

    function easy_addons_posted_on()
    {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf(
            $time_string, esc_attr(get_the_date(DATE_W3C)), esc_html(get_the_date()), esc_attr(get_the_modified_date(DATE_W3C)), esc_html(get_the_modified_date())
        );

        printf(
            '<span class="posted-on">%1$s<a href="%2$s" rel="bookmark">%3$s</a></span>', '<i class="fa fa-clock-o" aria-hidden="true"></i>', esc_url(get_permalink()), $time_string
        );
    }

}

/**
 * Return post by categories
 * */
if (!function_exists('easy_addons_posted_categories')) {

    function easy_addons_posted_categories()
    {
        $categories_list = get_the_category_list(__(' ', 'easy-addons'));
        if ($categories_list) {
            printf(
            /* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of categories. */
                '<span class="cat-links">%1$s<span class="screen-reader-text">%2$s</span>%3$s</span>', '', __('Posted in', 'easy-addons'), $categories_list
            ); // WPCS: XSS OK.
        }
    }

}

/**
 * Return post by tags
 * */
if (!function_exists('easy_addons_posted_tag')) {

    function easy_addons_posted_tag()
    {
        /* translators: used between list items, there is a space after the comma. */
        $tags_list = get_the_tag_list('', __(', ', 'easy-addons'));
        if ($tags_list) {
            printf(
            /* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of tags. */
                '<div class="post-card-tags"><span class="tags-links">%1$s<span class="screen-reader-text">%2$s </span>%3$s</span> </div>', '<i class="fa fa-tags" aria-hidden="true"></i>', __('Tags:', 'easy-addons'), $tags_list
            ); // WPCS: XSS OK.
        }
    }

}

/**
 * Return post by comment count
 * */
if (!function_exists('easy_addons_post_comment_count')) {

    function easy_addons_post_comment_count()
    {
        if (!post_password_required() && (comments_open() || get_comments_number())) {
            echo '<span class="comments-link">';
            echo '<i class="fa fa-comments" aria-hidden="true"></i>';

            /* translators: %s: Name of current post. Only visible to screen readers. */
            comments_popup_link(sprintf(__('Leave a comment<span class="screen-reader-text"> on %s</span>', 'easy-addons'), get_the_title()));

            echo '</span>';
        }
    }

}
