<?php
/**
 * Template Name: FAQ Template
 *
 * This template is used for displaying FAQs on the site using Carbon Fields.
 */

get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <div class="faq-page">
            <h1><?php the_title(); ?></h1>
            <div class="faq-content">
                <?php the_content(); ?>
            </div>
            
            <?php
            $faq_items = carbon_get_the_post_meta( 'faq_items' );
            if ( $faq_items ) : ?>
                <div class="faq-items">
                    <?php foreach ( $faq_items as $item ) : ?>
                        <details class="faq-item">
                            <summary><?php echo esc_html( $item['question'] ); ?></summary>
                            <p><?php echo esc_html( $item['answer'] ); ?></p>
                        </details>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endwhile;
endif;

get_footer();