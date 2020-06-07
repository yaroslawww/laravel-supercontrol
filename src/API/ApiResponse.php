<?php


namespace LaravelSupercontrol\API;

use GuzzleHttp\Psr7\Response as GuzzleResponse;
use Mtownsend\XmlToArray\XmlToArray;
use Psr\Http\Message\ResponseInterface;

class ApiResponse
{
    protected $original;

    public function __construct(ResponseInterface $original)
    {
        $this->original = $original;
    }

    /**
     * @return ResponseInterface
     */
    public function getOriginal(): ResponseInterface
    {
        return $this->original;
    }

    public function getStatusCode(): int
    {
        return $this->original->getStatusCode();
    }


    public function getConvertedBody(): array
    {
        if (($this->original instanceof GuzzleResponse) && $body = $this->original->getBody()) {
            return XmlToArray::convert($body->__toString());
        }

        return [];
    }
}
