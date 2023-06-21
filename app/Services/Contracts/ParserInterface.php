<?php

namespace App\Services\Contracts;

interface ParserInterface
{
    public function setLink(string $link): self;
    public function getParseData(): array;
}
