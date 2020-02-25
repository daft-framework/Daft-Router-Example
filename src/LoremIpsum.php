<?php
/**
 * @author SignpostMarv
 */
declare(strict_types=1);

namespace DaftFramework\DaftRouter\Example;

use Faker\Factory;
use SignpostMarv\DaftRouter\DaftRouteAcceptsTypedArgs;
use SignpostMarv\DaftRouter\TypedArgs;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @psalm-type FORMAT = 'txt'|'html'
 */
class LoremIpsum implements DaftRouteAcceptsTypedArgs
{
	/**
	 * This is an array of route strings where the values are the acceptable
	 *	HTTP methods,
	 *	and the keys follow the format prescribed by nikic/fast-route.
	 *
	 * The ".php" suffix exists only because this example is built to avoid
	 *	using any particular server's routing (i.e. mod_rewrite) system.
	 *
	 * @see https://github.com/nikic/FastRoute
	 *
	 * @return array<string, array<int, 'GET'>> an array of URIs & methods
	 */
	public static function DaftRouterRoutes() : array
	{
		return [
			'/lorem-ipsum.{format:txt}.php' => ['GET'],
			'/lorem-ipsum.{format:html}.php' => ['GET'],
			/* one could use this instead:
			'/lorem-ipsum.{format:(?:txt|html)}.php' => ['GET'],
			*/
		];
	}

	/**
	 * If a route accepts multiple HTTP methods (i.e. GET, POST, etc.) then
	 *	this method can be used for referencng what the default method is.
	 *
	 * @example `$method = $method ?? static::DaftRouterHttpRouteDefaultMethod()`
	 *
	 * @return 'GET'
	 */
	public static function DaftRouterHttpRouteDefaultMethod() : string
	{
		return 'GET';
	}

	/**
	 * psalm array shapes are implemented here to avoid writing code that
	 *	validates $args & throws an exception on failure.
	 *
	 * @param array{format:FORMAT} $args
	 * @param 'GET' $method
	 *
	 * @return Args\Format
	 */
	public static function DaftRouterHttpRouteArgsTyped(
		array $args,
		string $method = null
	) : ? TypedArgs {
		return new Args\Format($args);
	}

	/**
	 * @param Args\Format $args
	 */
	public static function DaftRouterHandleRequestWithTypedArgs(
		Request $request,
		TypedArgs $args
	) : Response {
		$faker = Factory::create();

		if ('txt' === $args->format) {
			$lorem_ipsum = (string) $faker->text;
			$content_type = 'text/plain';
		} else {
			$lorem_ipsum =
				'<p>' .
				implode(
					'</p><p>',
					array_map('htmlentities', (array) $faker->paragraphs())
				) .
				'</p>';
			$content_type = 'text/html';
		}

		/** untrusted content should be filtered, but this is a demo so 🤷‍♂️ */
		return new Response($lorem_ipsum, Response::HTTP_OK, [
			'Content-Type' => $content_type,
		]);
	}

	/**
	 * @param Args\Format $args
	 * @param 'GET'|null $method
	 */
	public static function DaftRouterHttpRouteWithTypedArgs(
		TypedArgs $args,
		string $method = null
	) : string {
		return '/lorem-ipsum.' . $args->format;
	}
}
