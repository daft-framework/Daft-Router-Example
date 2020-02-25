<?php
/**
 * This is an example of the cache file generated with nikic/fast-route.
 *
 * This file is not the one used by the example router.
 *
 * The other routes file will need to be manually deleted if routes change.
 */
declare(strict_types=1);

return [
	0 => [
	  'GET' => [
		'/' => [
		  'SignpostMarv\\DaftRouter\\DaftRequestInterceptor' => [
		  ],
		  'SignpostMarv\\DaftRouter\\DaftResponseModifier' => [
		  ],
		  0 => 'DaftFramework\\DaftRouter\\Example\\Index',
		],
		'/index.php' => [
		  'SignpostMarv\\DaftRouter\\DaftRequestInterceptor' => [
		  ],
		  'SignpostMarv\\DaftRouter\\DaftResponseModifier' => [
		  ],
		  0 => 'DaftFramework\\DaftRouter\\Example\\Index',
		],
	  ],
	],
	1 => [
	  'GET' => [
		0 => [
		  'regex' => '~^(?|/lorem\\-ipsum\\.(txt)\\.php|/lorem\\-ipsum\\.(html)\\.php())$~',
		  'routeMap' => [
			2 => [
			  0 => [
				'SignpostMarv\\DaftRouter\\DaftRequestInterceptor' => [
				],
				'SignpostMarv\\DaftRouter\\DaftResponseModifier' => [
				],
				0 => 'DaftFramework\\DaftRouter\\Example\\LoremIpsum',
			  ],
			  1 => [
				'format' => 'format',
			  ],
			],
			3 => [
			  0 => [
				'SignpostMarv\\DaftRouter\\DaftRequestInterceptor' => [
				],
				'SignpostMarv\\DaftRouter\\DaftResponseModifier' => [
				],
				0 => 'DaftFramework\\DaftRouter\\Example\\LoremIpsum',
			  ],
			  1 => [
				'format' => 'format',
			  ],
			],
		  ],
		],
	  ],
	],
  ];
