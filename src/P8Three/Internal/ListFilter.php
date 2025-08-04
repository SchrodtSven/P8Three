<?php

declare(strict_types=1);
/**
 * Applying filter operations on instances of ListClass
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

class ListFilter
{
    
    private ListClass $filtered;

    public function __construct(private ListClass $content, private string $subject)
    {

    }

    public function by(string $subject = 'id'): self
    {
        $this->subject = $subject;
        return $this;
    }

    public function eq1(mixed $value): ListClass
    {
        $subject = $this->subject;
        return $this->filtered = new ListClass(
            \array_filter(
                $this->content->getContent(),
                function($item) use ($subject, $value) {
                    
                    if($item[$subject] === $value) {
                        return true;
                    }
                }
                )
        );
    }


    public function eq(mixed $value): ListClass
    {
        $subject = $this->subject;
        return $this->filter(
            function($item) use ($subject, $value) {
                    
                if($item[$subject] === $value) {
                    return true;
                }
            }
        );
    }

    public function filter(callable $callback): ListClass
    {
        return $this->filtered = new ListClass(
            \array_filter(
                $this->content->getContent(),
                $callback
                )
        );
    }
}