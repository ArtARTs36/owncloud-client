<?php

namespace ArtARTs36\OwnCloud;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;

class FileDownloader implements Contracts\FileDownloader
{
    protected $urlResolver;

    protected $client;

    protected $nameExtractor;

    public function __construct(
        UrlResolver $urlResolver,
        ClientInterface $client,
        FileNameExtractor $nameExtractor
    ) {
        $this->urlResolver = $urlResolver;
        $this->client = $client;
        $this->nameExtractor = $nameExtractor;
    }

    public function downloadByUrl(string $url, string $dir, string $name = null): File
    {
        $response = $this->sendRequest($this->urlResolver->resolveDownloadUrl($url));

        $name = ($name ? $name : $this->nameExtractor->extract($response));

        return new File($name, $url, $this->save($dir . DIRECTORY_SEPARATOR . $name, $response));
    }

    protected function sendRequest(string $url): ResponseInterface
    {
        return $this->client->request('GET', $url);
    }

    protected function save(string $path, ResponseInterface $response): string
    {
        file_put_contents($path, $response->getBody()->getContents());

        return $path;
    }
}
