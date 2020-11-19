<?php

namespace ArtARTs36\OwnCloud;

class File
{
    protected $name;

    protected $url;

    protected $path;

    public function __construct(string $name, string $url, string $path)
    {
        $this->name = $name;
        $this->url = $url;
        $this->path = $path;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getPath(): string
    {
        return $this->path;
    }
}
