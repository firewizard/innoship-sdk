<?php
namespace Innoship\Response;

class BadRequest implements Contract
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
        return false;
    }
}
