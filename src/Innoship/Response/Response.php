<?php
namespace Innoship\Response;

class Response extends Contract
{
    public function isSuccessful(): bool
    {
        return true;
    }
}
