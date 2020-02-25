<?php
/**
 * @author SignpostMarv
 */
declare(strict_types=1);

namespace DaftFramework\DaftRouter\Example;

use SignpostMarv\DaftRouter\DaftSource;

class Source implements DaftSource
{
	/**
	 * Order of source declaration only matters if a route captures another.
	 */
	public static function DaftRouterRouteAndMiddlewareSources() : array
	{
		return [
			LoremIpsum::class,
			Index::class,
		];
	}
}
