<?php

declare(strict_types=1);
/**
 * Testing Integer Octal Literal Prefix ¶
 * 
 * @see 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P8One
 * @package P8One
 * @version 0.1
 * @since 2023-04-26
 */

use PHPUnit\Framework\TestCase;
use SchrodtSven\P8One\New\Octal;

class OctalTest extends TestCase
{
    /**
     * @data   Provider getBits
     */
    public function testAttributes(): void
    {
        // from 0 .. 255
        $byte = range(0o0, 0o377);
        // from 0o0 .. 0o377

        $oct = new Octal(0);
        $foo = 0;

        foreach ($oct->upTo(255) as $value) {
            
            $next = array_shift($byte);
            $this->assertSame(
                sprintf('%o', $value),
                sprintf('%o', $next)
            ); 

            $this->assertSame((int) $next, (int) $value);

            
        }
        
        
       
    }   


    
     

}