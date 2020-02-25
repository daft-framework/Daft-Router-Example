<?php
/**
 * @author SignpostMarv
 */
declare(strict_types=1);

namespace DaftFramework\DaftRouter\Example;

use SignpostMarv\DaftRouter\DaftRouteAcceptsOnlyEmptyArgs;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * This route does not accept any arguments,
 *	so we can use the prepared abstract class.
 *
 * @psalm-type FORMAT = 'txt.php'|'html.php'
 */
class Index extends DaftRouteAcceptsOnlyEmptyArgs
{
	/**
	 * @return array<string, array<int, 'GET'>> an array of URIs & methods
	 */
	public static function DaftRouterRoutes() : array
	{
		return [
			'/' => ['GET'],
			'/index.php' => ['GET'],
		];
	}

	/**
	 * @return 'GET'
	 */
	public static function DaftRouterHttpRouteDefaultMethod() : string
	{
		return 'GET';
	}

	public static function DaftRouterHandleRequestWithEmptyArgs(
		Request $request
	) : Response {
		$html =
			'<a href="./lorem-ipsum.txt.php">Text</a>' .
			'<br>' .
			'<a href="./lorem-ipsum.html.php">HTML</a>';

		return new Response($html);
	}

	public static function DaftRouterHttpRouteWithEmptyArgs(
		string $method = null
	) : string {
		return '/index.php';
	}
}
