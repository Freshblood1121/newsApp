<?php

namespace App\Services;

use App\Services\Contracts\ParserInterface;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\View\View;

class ParserService implements ParserInterface
{
    private string $link;

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getParseData(): View
    {
        $newsPath = 'news/'; // путь к папке с новостями
        $news = [];

        // получаем список файлов в папке
        $files = Storage::files($newsPath);

        foreach ($files as $file) {
            $content = Storage::get($file);
            $news[] = json_decode($content, true);
        }

        dd($news);

        return view('admin.parser', [
            'news' => $news,
        ]);

    }

    public function saveParseData(): void
    {
        $xml = XmlParser::load($this->link);

        $data = $xml->parse([
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

        $exp = \explode("/", $this->link);
        $fileNames = end($exp);
        $jsonEncoder = json_encode($data);

        Storage::append('news/' . $fileNames, $jsonEncoder);
    }
}
