<?php

namespace App\Services;

use App\Services\Contracts\ParserInterface;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements ParserInterface
{
    private string $link;
    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getParseData(): array
    {
        $xml = XmlParser::load($this->link);
        return $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[guid,title,link,pubDate,description]'
            ],
        ]);
    }
}
