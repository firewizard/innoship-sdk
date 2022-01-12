<?php

namespace Innoship\Response;

class ResponseFactory
{
    public static function make($responseBody, $statusCode, $error, $headers = []): Contract
    {
        if ($statusCode == 401) {
            return new Unauthorized();
        }

        if ($statusCode == 400) {
//           {
//             errors: [ {message: "string", details: ["string"]} ],
//             correlationId: "string"
//           }

            if (static::shouldDecode($headers['content-type'] ?? [])) {
                $responseBody = json_decode($responseBody, true);
            }

            $error = empty($responseBody['errors'])
                ? 'Unknown error'
                : implode(', ', array_column($responseBody['errors'], 'message'));

            return new BadRequest($error);
        }

        if ($statusCode == 200 || $statusCode == 201) {
            if (static::shouldDecode($headers['content-type'] ?? [])) {
                $responseBody = json_decode($responseBody, true);
            }

            return new Response($responseBody);
        }

        return new BadRequest("Error {$statusCode}");
    }

    protected static function shouldDecode(array $contentTypes)
    {
        foreach ($contentTypes as $type) {
            if (false !== strpos(strtolower($type), 'json')) {
                return true;
            }
        }

        return false;
    }
}