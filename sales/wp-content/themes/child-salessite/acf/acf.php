<?php if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_new',
		'title' => 'New',
		'fields' => array (
			array (
				'key' => 'field_570e4bd076125',
				'label' => 'madhan',
				'name' => 'madhan',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '5',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
?>