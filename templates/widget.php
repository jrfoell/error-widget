<?php echo $args['before_widget']; ?>

<?php echo $args['before_title'], 'Error Widget', $args['after_title']; ?>

<p><?php echo wp_kses_post( $text ) ?></p>

<?php echo $args['after_widget']; ?>

<?php // $x = // uncomment for syntax error.