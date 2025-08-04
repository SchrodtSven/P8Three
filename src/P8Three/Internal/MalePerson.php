<?php

declare(strict_types=1);
/**
 * Entity enum type for male person
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P8One
 * @package P8One
 * @version 0.1
 * @since 2023-04-26
 */

namespace SchrodtSven\P8One\Internal;

enum MalePerson: string
{
    case Rich = 'R';
    case Poor = 'P';
    case Beggar = 'B';
    case Thief = 'T';

    public function label(): string
    {
        return match($this) {
            static::Rich => 'rich man',
            static::Poor => 'poor man',
            static::Beggar => 'beggar man',
            static::Thief => 'thief',
        };
    }


}