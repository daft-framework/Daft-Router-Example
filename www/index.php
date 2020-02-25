<?php
/**
 * @author SignpostMarv
 */
declare(strict_types=1);

namespace DaftFramework\DaftRouter\Example;

use function ob_end_clean;
use function ob_get_level;
use function ob_start;
use SignpostMarv\DaftRouter\Router\Compiler;
use Symfony\Component\HttpFoundation\Request;

ob_start();

require_once(__DIR__ . '/../vendor/autoload.php');

$dispatcher = Compiler::ObtainDispatcher(
	[
		'cacheFile' => __DIR__ . '/../cache/routes.php',
	],
	Source::class
);

$request = Request::createFromGlobals();

$response = $dispatcher->handle($request, '/');

$response->prepare($request);

while (ob_get_level()) {
	ob_end_clean();
}

$response->send();
