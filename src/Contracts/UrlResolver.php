<?php

namespace ArtARTs36\OwnCloud\Contracts;

interface UrlResolver
{
    public function resolveDownloadUrl(string $url): string;
}
