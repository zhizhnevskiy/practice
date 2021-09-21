<div class="wrap">
    <h1>Status Page</h1>
    <h2>Plugin innowise</h2>
</div>
<form class="wrap" action="" method="post">

    <p>Please select your page:</p>

    <select name="pages">

		<?php

		$my_wp_pages = get_pages();
		foreach ( $my_wp_pages as $value ) {
			$post  = get_post( $value );
			$title = $post->post_title;
			$id    = $post->ID;
			echo '<option value="pageId' . $id . '">' . $title . '</option>';
		}; ?>

    </select>

    <br><br>
    <p>Please select your option:</p>
    <select name="cron">
        <option selected disabled>Select Options</option>
        <option name="" value="Option 1"><?php echo bloginfo( 'name' ) ?></option>
        <option name="" value="Option 2">Option 2</option>
        <option name="" value="Option 3">Option 3</option>
        <option name="" value="Option 4">Option 4</option>
    </select>

    <br><br>
    <?php
    add_action( 'wp_ajax_(action)', 'action_function_name_5825' );
    function action_function_name_5825(){
    ?>
    <button type="submit">Submit</button>
    <?php
      }
    do_action( "wp_ajax_(action)" );
    ?>

    <br><br>

</form>

<?php
//test №1
function my_filter_function( $str ) {
	return 'Hello ' . $str;
}

// Прикрепим функцию к фильтру
add_filter( 'my_filter', 'my_filter_function' );

// Вызов фильтра
echo apply_filters( 'my_filter', 'Yuriy' ); //> Hello Yuriy
?>

<br><br>

<?php
//test №2
function my_action_function( $text ) {
	echo 'Событие `my_action` сработало сейчас. <br>';
}

// Прикрепим функцию к событию 'my_action'
add_action( 'my_action', 'my_action_function' );

// Вызов события
do_action( 'my_action' ); //> Событие `my_action` сработало сейчас.
?>
