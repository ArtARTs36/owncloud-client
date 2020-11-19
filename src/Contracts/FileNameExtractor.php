<?php

namespace ArtARTs36\OwnCloud\Contracts;

use Psr\Http\Message\ResponseInterface;

interface FileNameExtractor
{
    public function extract(ResponseInterface $response): string;
}
