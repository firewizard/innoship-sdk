<?php
namespace Innoship\Response;

interface Contract
{
    public function getContent();
    public function isSuccessful(): bool;
}
