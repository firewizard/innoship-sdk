<?php
namespace Innoship\Response;

abstract class Contract
{
    protected $content;
    protected $rawResponse;

    public function __construct($content, $rawResponse = null)
    {
        $this->content = $content;
        $this->rawResponse = $rawResponse;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function isSuccessful(): bool
    {
        return false;
    }

    public function getRawResponse()
    {
        return $this->rawResponse;
    }
}
