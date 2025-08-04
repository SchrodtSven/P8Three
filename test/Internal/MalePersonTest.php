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
use SchrodtSven\P8One\Internal\MalePerson;

class MalePersonTest extends TestCase
{
   
    public function testBasix(): void
    {
    
        $tmp = $this->personSupplier();
        var_dump($tmp);
        foreach(MalePerson::cases() as $item) 
        {
            $this->assertTrue(array_key_exists($item->value, $tmp));
            $this->assertSame($item->label(), $tmp[$item->value]);
        }
    }   

    public function personSupplier(): array
    {
        return  [
                 'R' => 'rich man',
                 'P' => 'poor man',
                 'B' => 'beggar man',
                 'T' => 'thief'
                ];
    }


    
     

}