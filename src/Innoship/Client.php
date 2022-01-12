<?php

namespace Innoship;

use Innoship\Response\Contract;
use Innoship\Response\ResponseFactory;

class Client
{
    private $apiKey;
    private $version = '1.0';
    private $endpoint = 'https://api.innoship.com/api/';

    private $curl;

    private $error;

    private $useragent = 'Innoship API Consumer v1.0';

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->curl = curl_init();
    }

    public function __destruct()
    {
        curl_close($this->curl);
    }

    public function request($path, $method, array $data = null): Contract
    {
        curl_setopt($this->curl, CURLOPT_URL, $this->endpoint . $path);
        curl_setopt($this->curl, CURLOPT_USERAGENT, $this->useragent);
        curl_setopt($this->curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($this->curl, CURLOPT_HEADER, false);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, true);

        $headers = [
            "X-Api-Key: {$this->apiKey}",
            "api-version: {$this->version}",
            'Content-type: application/json; charset=utf-8',
            'Accept: application/json,application/pdf',
        ];

        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $headers);

        if ($method == 'POST') {
            curl_setopt($this->curl, CURLOPT_POST, true);

            if ($data) {
                curl_setopt($this->curl, CURLOPT_POSTFIELDS, json_encode($data));
            }
        } elseif ($method == 'DELETE') {
            curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, 'DELETE');

            if ($data) {
                curl_setopt($this->curl, CURLOPT_POSTFIELDS, json_encode($data));
            }
        } elseif ($method == 'GET' && $data) {
            curl_setopt($this->curl, CURLOPT_URL, $this->endpoint . $path . '?' . http_build_query($data));
        }

        //get response headers
        $responseHeaders = [];
        curl_setopt($this->curl, CURLOPT_HEADERFUNCTION, function ($curl, $header) use (&$responseHeaders) {
            $length = strlen($header);
            $header = array_map('trim', explode(':', $header, 2));
            if (count($header) === 2) {
                $responseHeaders[strtolower($header[0])][] = $header[1];
            }

            return $length;
        });

        $response = curl_exec($this->curl);
        $httpStatus = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);
        $error = curl_error($this->curl);

        return ResponseFactory::make($response, $httpStatus, $error, $responseHeaders);
    }

    public function get($path, array $data = null)
    {
        return $this->request($path, 'GET', $data);
    }

    public function post($path, array $data)
    {
        return $this->request($path, 'POST', $data);
    }

    public function delete($path, array $data = null)
    {
        return $this->request($path, 'DELETE', $data);
    }

    public function skipSslVerification(): Client
    {
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);

        return $this;
    }

    public function setOption($option, $value): Client
    {
        curl_setopt($this->curl, $option, $value);

        return $this;
    }

    public function setError($error): Client
    {
        $this->error = $error;

        return $this;
    }

    public function getError()
    {
        return $this->error;
    }
}
