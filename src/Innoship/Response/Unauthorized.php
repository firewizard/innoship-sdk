<?php
namespace Innoship\Response;

class Unauthorized implements Contract
{
    public function getContent()
    {
        return 'Unauthorized';
    }

    public function isSuccessful(): bool
    {
        return false;
    }
}
