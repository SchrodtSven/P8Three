<?php

declare (strict_types = 1);
/**
 * Testing <code>readonly</code> property
 *
 * Providing possibility of accessing objects as arrays
 *
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P8One
 * @package P8One
 * @version 0.1
 * @since 2023-04-26
 */

namespace SchrodtSven\P8One\Internal;

class ReadOnlyClass
{

    public readonly string  $prop;

    public function __construct(string $prop)
    {
        // Legal initialization.
        $this->prop = $prop;
    }

    public function setProp(sring $what)
    {
        $this->prop = $what;
    }

}
