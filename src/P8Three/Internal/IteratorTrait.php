<?php
/**
 * Trait for classes implementing interface \Iterator
 * 
 * Providing possibility of accessing objects as arrays
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P8
 * @package P8
 * @version 0.1
 * @since 2023-04-25
 */

namespace SchrodtSven\P8\Internal;

trait IteratorTrait
{
    
    // The following functions implement interface \Iterator making it possible
    // to iterate container objects with foreach

    /**
     * Resetting pointer to first array element
     */
    public function rewind(): void
    {
        reset($this->content);
    }

    /**
     * Getting current element
     *
     */
    public function current(): mixed
    {
        return current($this->content);
    }

    /**
     * Getting key of current element
     * 
     * @return mixed
     */
    public function key(): mixed
    {
        return key($this->content);
    }

    /**
     * Forward internal array pointer
     * 
     * @return mixed|void
     */
    public function next(): void
    {
        next($this->content);
    }

    /**
     * Returning if current element is valid
     *
     * @return bool
     */
    public function valid(): bool
    {
        return ($this->current() !== false);
    }
}