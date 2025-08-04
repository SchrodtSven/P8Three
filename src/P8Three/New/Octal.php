<?php

declare(strict_types=1);
/**
 * Class representing integer values - mostly as octal literals
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P8One
 * @package P8One
 * @version 0.1
 * @since 2023-04-26
 */


namespace SchrodtSven\P8One\New;

class Octal
{
    public function __construct(private int $value = 0o0)
    {
        echo 'MEE ' . __CLASS__;
        \var_dump($this->value);
    }

    public function __toString(): string
    {
        return sprintf('%o', $this->value);
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function upTo(int $max)
    {
        for($i = $this->value; $i <= $max; $i++) {
            yield $i;
        }
    }


}