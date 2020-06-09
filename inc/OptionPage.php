<?php
add_action( 'admin_menu', 'wpe_add_admin_menu' );
add_action( 'admin_init', 'wpe_settings_init' );


function wpe_add_admin_menu(  ) { 

	add_options_page( 'wp-esport', 'wp-esport', 'manage_options', 'wp-esport', 'wpe_options_page' );

}


function wpe_settings_init(  ) { 

	register_setting( 'pluginPage', 'wpe_settings' );

	add_settings_section(
		'wpe_pluginPage_section', 
		__( 'Your section description', 'wp-esport' ), 
		'wpe_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'wpe_checkbox_field_0', 
		__( 'Settings field description', 'wp-esport' ), 
		'wpe_checkbox_field_0_render', 
		'pluginPage', 
		'wpe_pluginPage_section' 
	);


}


function wpe_checkbox_field_0_render(  ) { 

	$options = get_option( 'wpe_settings' );
	?>
<input type='checkbox' name='wpe_settings[wpe_checkbox_field_0]'
    <?php checked( $options['wpe_checkbox_field_0'], 1 ); ?> value='1'>
<?php

}


function wpe_settings_section_callback(  ) { 

	echo __( 'This section description', 'wp-esport' );

}


function wpe_options_page(  ) { 

		?>
<form action='options.php' method='post'>

    <h2>wp-esport</h2>

    <?php
			settings_fields( 'pluginPage' );
			do_settings_sections( 'pluginPage' );
			submit_button();
			?>

</form>
<?php

}