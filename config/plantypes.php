<?php

return [
	'list' => [
		
		'internet',

		'tv',

		'home_phone',

		'home_security',
	],

	'options' => [
		
		'internet' => [
			  	'DSL or Cable',
 				'Unlimited usage',
  				'Up to 300 Mbps',
		],

		'tv' => [
			'Choice and Flexibility',
			'100s of Apps on Your TV',
			'FREE TV SPECIAL',
		],

		'home_phone' => [
			 'Unlimited Calling',
			 'Canada & US and World Plans',
			 '15 Features Included'
		],

		'home_security' => [
			 'Easy install',
			 'Control from smartphone',
			 'Alerts and Notifications',
		],
	],

	'ignore_field' => [
		
		'internet' => [
			'plan_belongstomany_channel_relationship', 
			'type'
		],

		'tv' => [
			"tagline", 
			"detail_desctiption", 
			"upspeed",
			"downspeed",
			"upspeed_type",
			"downspeed_type", 
			'type'
		],

		'home_phone' => [
			"tagline", 
			"upspeed",
			"downspeed",
			"upspeed_type",
			"downspeed_type", 
			'type', 
			'plan_belongstomany_channel_relationship'
		],

		'home_security' => [
			"tagline", 
			"upspeed",
			"downspeed",
			"upspeed_type",
			"downspeed_type", 
			'type', 
			'plan_belongstomany_channel_relationship'
		],
	],
];