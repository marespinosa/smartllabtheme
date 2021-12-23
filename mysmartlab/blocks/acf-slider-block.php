<?php
if (!empty($block['className'])) {
    $styleClasses .= sprintf(' %s', $block['className']);
}
if (!empty($block['align'])) {
    $styleClasses .= sprintf(' align%s', $block['align']);
}
if (!empty($block['backgroundColor'])) {
    $styleClasses .= sprintf(' has-background has-%s-background-color', $block['backgroundColor']);
}
if (!empty($block['gradient'])) {
    $styleClasses .= sprintf(' has-background has-%s-gradient-background', $block['gradient']);
}
if (!empty($block['textColor'])) {
    $styleClasses .= sprintf(' has-text-color has-%s-color', $block['textColor']);
}

$sliderId = uniqid();

$template = array(
    array(
        'core/heading',
        array(
            'level' => 2,
            'content' => 'Testimonials Heading',
        )
    ),
);

?>

<div class="slider <?php echo $styleClasses; ?>">
    <div class="slider_container alignwide">
        <div class="slider_header">
            <InnerBlocks template="<?php echo esc_attr(wp_json_encode($template)); ?>" />
        </div>
        <?php 
            $args = array( 'posts_per_page' => -1, 'post_type' => 'testimonial', 'orderby' => 'date', 'order' => 'DESC');
            $slider_query = new WP_Query($args);
        ?>
        <div class="slider_wrapper" id="<?php echo $sliderId; ?>">
            <?php while($slider_query->have_posts()) : $slider_query->the_post(); ?>
                <div class="slide_wrapper">
                    <div class="slide">
                        <?php the_content(); ?>                        
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_query(); ?>
        </div>
    </div>
</div>
