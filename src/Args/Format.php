<?php
/**
 * @author SignpostMarv
 */
declare(strict_types=1);

namespace DaftFramework\DaftRouter\Example\Args;

use SignpostMarv\DaftRouter\TypedArgs;

/**
 * psalm type hints are used to provide a more relaxed approach to values,
 *	i.e. one does not explicitly need to check for both FORMAT strings,
 *	since if it is not one of them, it will be "guaranteed" to be the other.
 *
 * @psalm-type FORMAT = 'txt'|'html'
 *
 * @template-extends TypedArgs<array{format:FORMAT}, array{format:FORMAT}>
 */
class Format extends TypedArgs
{
	const TYPED_PROPERTIES = [
		'format',
	];

	/** @var FORMAT */
	public string $format;

	/**
	 * @param array{format:FORMAT} $args
	 */
	public function __construct(array $args)
	{
		$this->format = $args['format'];
	}
}
