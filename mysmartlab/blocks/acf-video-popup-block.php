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
        'acf/popup-button-block',
    ),
    array(
        'acf/popup-panel-block',
    ),
);

?>

<div class="popup <?php echo $styleClasses; ?>">
    <InnerBlocks template="<?php echo esc_attr(wp_json_encode($template)); ?>" />
</div>
