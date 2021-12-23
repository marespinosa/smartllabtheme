<?php
if (!empty($block['className'])) {
    $styleClasses .= sprintf(' %s', $block['className']);
}
if (!empty($block['align'])) {
    $styleClasses .= sprintf(' align%s', $block['align']);
}

$template = array(
    array(
        'core/video',
    ),
);

?>

<div class="popup_panel <?php echo $styleClasses; ?>">
    <InnerBlocks template="<?php echo esc_attr(wp_json_encode($template)); ?>" />
</div>