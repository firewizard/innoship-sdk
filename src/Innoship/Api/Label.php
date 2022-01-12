<?php

namespace Innoship\Api;

use Innoship\Response\Contract;
use Innoship\Traits\HasHttpClient;

class Label
{
    use HasHttpClient;

    public function byCourierAwb($courierId, $awb, $type = 'PDF', $format = 'A6', $base64 = false): Contract
    {
        return $this->getClient()->get("Label/by-courier/{$courierId}/awb/{$awb}", [
            'type' => in_array($type, ['PDF', 'HTML']) ? $type : 'PDF',
            'format' => in_array($format, ['A4', 'A6']) ? $format : 'A6',
            'useFile' => $base64 ? 'false' : 'true',
        ]);
    }

    public function byCourierParcel($courierId, $parcelBarcode, $useClientBarcode = false, $type = 'PDF', $format = 'A6', $base64 = false)
    {
        return $this->getClient()->get("Label/by-courier/{$courierId}/parcel/{$parcelBarcode}", [
            'type' => in_array($type, ['PDF', 'HTML']) ? $type : 'PDF',
            'format' => in_array($format, ['A4', 'A6']) ? $format : 'A6',
            'useFile' => $base64 ? 'false' : 'true',
            'useClientBarcode' => $useClientBarcode ? 'false' : 'true',
        ]);
    }
}