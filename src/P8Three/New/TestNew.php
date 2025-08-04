<?php

namespace SchrodtSven\P8One\New;
use SchrodtSven\P8One\Internal\StringClass;

class TestNew
{
    public function __construct(private StringClass $content = new StringClass('Foo'))
    {

    }

    public function getContent(): StringClass
    {
        return $this->content;
    }
}