<?php

namespace App\Services\Contracts;

use Illuminate\View\View;

interface ParserInterface
{
    /**
     * @param string $link
     * @return self
     */
    public function setLink(string $link): self;

    /**
     * @return void
     */
    public function saveParseData(): void;

    public function getParseData(): View;
}
