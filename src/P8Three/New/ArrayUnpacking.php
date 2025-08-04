<?php

declare(strict_types=1);
/**
 * Testing array unpacking with string keys
 * 
 * @see 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P8One
 * @package P8One
 * @version 0.1
 * @since 2023-04-26
 */

namespace SchrodtSven\P8One\New;

class ArrayUnpacking
{
    
    public function __construct(private array $data)
    {

    }

    public function combine(): self
    {
        $a = [1,2,3,4];
        $b = [5,6,7];
        $this->data = [
            ...$a,
            ...$b,
            ...$this->data
        ];
        return $this;
    }

    public function getData(): array
    {
        return $this->data;
    }

}