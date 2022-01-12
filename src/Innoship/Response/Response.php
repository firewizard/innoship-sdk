<?php
namespace Innoship\Response;

class Response implements Contract
{
    protected $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function isSuccessful(): bool
    {
        return true;
    }
}
