<?php

namespace ArtARTs36\OwnCloud;

class UrlResolver implements Contracts\UrlResolver
{
    public function resolveDownloadUrl(string $url): string
    {
        if (strpos($url, '/download') !== false) {
            return $url;
        }

        return $url . '/download';
    }
}
