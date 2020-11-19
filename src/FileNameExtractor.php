<?php

namespace ArtARTs36\OwnCloud;

use Psr\Http\Message\ResponseInterface;

class FileNameExtractor implements \ArtARTs36\OwnCloud\Contracts\FileNameExtractor
{
    public function extract(ResponseInterface $response): string
    {
        $disposition = $response->getHeaderLine('Content-Disposition');

        $matches = [];

        preg_match('/filename="(.*)"/i', $disposition, $matches);

        return urldecode($matches[1]);
    }
}
