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

use SchrodtSven\P8One\Internal\ReadOnlyClass;
use PHPUnit\Framework\TestCase;

class ReadOnlyTest extends TestCase
{
    public function testFoo(): void
    {
        $x = 'foo';
        $r = new ReadOnlyClass($x);
        $this->assertSame($x, $r->prop);
        $this->expectError('TypeError');
        $r->prop = 'booz';
        $this->expectError('TypeError');
        $r->setProp('BAR');
    }    
}