<?php

declare(strict_types=1);
/**
 * Class representing strings as objects
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P8One
 * @package P8One
 * @version 0.1
 * @since 2023-04-26
 */

namespace  SchrodtSven\P8One\Internal;

class StringClass implements \Stringable
{
    public function __construct(private string $content)
    {

    }

    public static function createFromFile(string $filename): self
    {
        return new self(\file_get_contents($filename));
    }

    public static function createFromStringable(\Stringable $stringable): self
    {
        return new self((string) $stringable);
    }

    // of course: we MUST know possible types, but we are using this for testing <code>mixed type declaration</code>
    // that said, we call it *Unknown - :P
    public static function createFromUnknown(string | \Stringable $content): self
    {
        return (\is_string($content)) 
            ? new self($content)
            : new self((string) $content);

            //@FIXME -> adding possible casts for int|bool|float
    }

    /**
     * We are just testing here, but this could be helpfull, if you MUST get a string context of given
     * $variable | data | data structure | foo 
     * e.g: debugging, logging, ...$bar 
     * 
     */
    public static function forceToBeStringClass(int|float|bool|string|null|array|\Stringable $content): self
    {
        if($content instanceof \Stringable) {
            $content = (string) $content;
        }

        return new self(
            match(get_debug_type($content)) {
                'int', 'float' => (string) $content,
                'bool' => ($content) ? 'true' : 'false',
                'array' => implode(', ', $content),
                'null' => 'null',
                default => $content
            } 
        );
    }

    public function prepend(string $begin): self
    {
        $this->content = $begin . $this->content;
        return $this;
    }

    public function append(string $end): self
    {
        $this->content .= $end;
        return $this;
    }

    public function quote(string $mark="'"): self
    {
        return $this->append($mark)->prepend($mark);
    }

    public function splitBy(string $separator): ListClass
    {
        return new ListClass(\explode($separator, $this->content));
    }

    public function __toString(): string
    {
        return $this->content;
    }

    public function ends(string $end): bool
    {
        return \str_ends_with($this->content, $end);
    }

    public function begins(string $begin): bool
    {
        return \str_starts_with($this->content, $begin);
    }

    public function contains(string $needle): bool
    {
        return \str_contains($this->content, $needle);
    }


    public function subString(int $offset, ?int $length = null, ?string $encoding = null): self
    {
        return new self(mb_substr($this->content, $offset, $length, $encoding));
    }

    public function length(): int
    {
        return \mb_strlen($this->content);
    }

    public function trim(): self
    {
        $this->content = trim($this->content);
        return $this;
    }

    public function quoteTypographic(string $open = '“', string $close = '”'): self
    {
        return $this->prepend($open)->append($close);
    }
}