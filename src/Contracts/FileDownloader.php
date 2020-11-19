<?php

namespace ArtARTs36\OwnCloud\Contracts;

use ArtARTs36\OwnCloud\File;

interface FileDownloader
{
    public function downloadByUrl(string $url, string $dir, string $name = null): File;
}
