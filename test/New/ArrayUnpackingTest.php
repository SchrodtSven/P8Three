<?php

declare(strict_types=1);
/**
 * Testing array unpacking 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P8One
 * @package P8One
 * @version 0.1
 * @since 2023-04-26
 */

use PHPUnit\Framework\TestCase;
use SchrodtSven\P8One\New\ArrayUnpacking;

class ArrayUnpackingTest extends TestCase
{
   
    public function testBasisx(): void
    {
        $expected = [1,2,3,4,5,6,7,8,9,12];

        $foo = new ArrayUnpacking([8, 9, 12]);
        $foo->combine();

        foreach ($foo->getData() as $value) {
            $this->assertSame($value, array_shift($expected));
        }
    }   


    
     

}