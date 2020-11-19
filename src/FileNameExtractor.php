<?php

namespace ArtARTs36\OwnCloud;

use Psr\Http\Message\ResponseInterface;

class FileNameExtractor
{
    public function extract(ResponseInterface $response): string
    {
        $disposition = $response->getHeaderLine('Content-Disposition');

        $matches = [];

        preg_match('/filename="(.*)"/i', $disposition, $matches);

        return urldecode($matches[1]);
    }
}
