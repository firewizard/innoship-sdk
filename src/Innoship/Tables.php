<?php

namespace Innoship;

class Tables
{
    public static function services(): array
    {
        return [
            1 => 'National Standard (Including Pick-up)',
            11 => 'National Cargo',
            12 => 'National Palet',
            6 => 'National Same-Day delivery',
            2 => 'eMag Marketplace',
            3 => 'Lockers',
            4 => 'PUDO (PickUp DropOff)',
            5 => 'International Shipping Road',
            51 => 'International Shipping Air',
        ];
    }

    public static function serviceNameById($id): ?string
    {
        return static::services()[(int)$id] ?? null;
    }

    public static function carriers(): array
    {
        return [
            1 => 'Cargus',
            2 => 'DPD',
            3 => 'FanCourier',
            4 => 'GLS',
            5 => 'Nemo',
            6 => 'Sameday',
            7 => 'ExpressOne',
            8 => 'Econt',
            9 => 'TeamCourier',
            10 => 'DHL Romania',
            11 => 'Posta Romana',
            12 => 'Posta Panduri',
            13 => 'GLS Hungary',
            14 => 'DragonStar',
            15 => 'Packeta (Coletaria)',
            16 => 'Bookurier',
            17 => 'Asendia',
            18 => 'TNT',
            19 => 'Speedy Bulgaria',
            20 => 'GLS Croatia',
            21 => 'GLS Czech Republic',
            22 => 'GLS Slovenia',
            23 => 'GLS Slovakia',
            24 => 'InOut',
            25 => 'Stack Courier',
            26 => 'Gebruder Weiss',
            27 => 'Pallex',
            28 => 'Geniki Taxydromiki',
            29 => 'Courier Manager',
            30 => 'GLS Italy',
            31 => 'ECourier',
            32 => 'Unimasters',
            33 => 'TCE',
            34 => 'Transilvania Post',
            35 => 'Bulgarian Post',
            36 => 'Evropat Bulgaria',
            37 => 'SMP Courier',
            38 => 'DHL Germany',
            39 => 'Raben',
            40 => 'Memex',
            41 => 'PTT Express',
            42 => 'XD Courier',
            43 => 'Intelligent Logistik',
            44 => 'Nova Poshta Moldova',
            45 => 'Pink Post',
            46 => 'Strongo',
            47 => 'DHL Paket Germany',
            48 => 'DHL Parcel Poland',
            49 => 'BeeFast',
            50 => 'InPost Poland',
            51 => 'KLG',
            52 => 'Schenker',
            53 => 'Eastride',
            54 => 'Kargo',
            55 => 'Sunday Courier',
        ];
    }

    public static function carrierNameById($id): ?string
    {
        return static::carriers()[(int)$id] ?? null;
    }

    public static function statuses(): array
    {
        return [
            1 => [
                'status' => 'New',
                'description' => 'Shipment label was created',
                'is_final' => false,
            ],
            2 => [
                'status' => 'Picked-Up',
                'description' => 'Shipment was pickup by the courier',
                'is_final' => false,
            ],
            3 => [
                'status' => 'Handover',
                'description' => 'Shipment was handed over to the courier',
                'is_final' => false,
            ],
            10 => [
                'status' => 'In Courier WH',
                'description' => 'Shipment arrived into courier warehouse',
                'is_final' => false,
            ],
            20 => [
                'status' => 'In Transit',
                'description' => "In transit between courier's warehouses / offices",
                'is_final' => false,
            ],
            30 => [
                'status' => 'Out for Delivery',
                'description' => "Out for delivery - to consignee's address",
                'is_final' => false,
            ],
            31 => [
                'status' => 'Bad Address',
                'description' => 'Incorrect address - courier unable to deliver',
                'is_final' => false,
            ],
            33 => [
                'status' => 'Damaged',
                'description' => 'Shipment is damaged (packaging is damaged)',
                'is_final' => false,
            ],
            34 => [
                'status' => 'Delayed',
                'description' => 'Delivery is delayed',
                'is_final' => false,
            ],
            35 => [
                'status' => 'Not Delivered',
                'description' => 'Shipment is not delivered',
                'is_final' => false,
            ],
            36 => [
                'status' => 'Not Home',
                'description' => 'Consignee is not home - shipment not delivered',
                'is_final' => false,
            ],
            37 => [
                'status' => 'Closed on Arrival',
                'description' => "Consignee's office is closed - shipment not delivered",
                'is_final' => false,
            ],
            38 => [
                'status' => 'On hold',
                'description' => 'Shipment is on hold at courier warehouse / office',
                'is_final' => false,
            ],
            39 => [
                'status' => 'Redirected',
                'description' => 'Shipment redirected - delivery to a different address',
                'is_final' => false,
            ],
            40 => [
                'status' => 'Refused',
                'description' => 'Consignee refused the delivery',
                'is_final' => false,
            ],
            41 => [
                'status' => 'Scan Error / Missing Info',
                'description' => 'Courier scan error or missing info',
                'is_final' => false,
            ],
            42 => [
                'status' => 'Scheduled',
                'description' => 'Delivery is scheduled for different date',
                'is_final' => false,
            ],
            43 => [
                'status' => 'Security Check',
                'description' => 'Shipment needs a security check',
                'is_final' => false,
            ],
            44 => [
                'status' => 'Customer pick-up',
                'description' => 'Consignee will pickup the shipment from courier office',
                'is_final' => false,
            ],
            45 => [
                'status' => 'Loaded into locker',
                'description' => 'Shipment loaded into locker',
                'is_final' => false,
            ],
            46 => [
                'status' => 'Storage duration exceeded',
                'description' => 'Locker storage duration exceeded',
                'is_final' => false,
            ],
            47 => [
                'status' => 'Locker issues',
                'description' => 'Locker technical issues',
                'is_final' => false,
            ],
            100 => [
                'status' => 'Delivered',
                'description' => 'Shipment was delivered',
                'is_final' => true,
            ],
            101 => [
                'status' => 'Destroyed',
                'description' => 'Shipment was destroyed',
                'is_final' => true,
            ],
            102 => [
                'status' => 'Lost',
                'description' => 'Shipment was lost by the courier',
                'is_final' => true,
            ],
            103 => [
                'status' => 'Partial Delivery',
                'description' => 'Partial delivery for multipiece shipment',
                'is_final' => true,
            ],
            104 => [
                'status' => 'Returned',
                'description' => 'Shipment is returned to sender',
                'is_final' => true,
            ],
            105 => [
                'status' => 'Compensated',
                'description' => 'The shipment value was reimbursed',
                'is_final' => true,
            ],
            106 => [
                'status' => 'Canceled',
                'description' => 'Shipment is cancelled by sender',
                'is_final' => true,
            ],
            107 => [
                'status' => 'Canceled by Carrier',
                'description' => 'Shipment is cancelled by courier',
                'is_final' => true,
            ],
            108 => [
                'status' => 'Canceled by System',
                'description' => '-',
                'is_final' => true,
            ],
            109 => [
                'status' => 'Tracking expired',
                'description' => 'Unable to get track status from courier',
                'is_final' => true,
            ],
            110 => [
                'status' => 'Return Confirmed',
                'description' => 'Return shipment delivered',
                'is_final' => true,
            ],
        ];
    }

    public static function statusNameById($id): ?string
    {
        return (static::statuses()[(int)$id] ?? [])['status'] ?? null;
    }

    public static function statusDescriptionById($id): ?string
    {
        return (static::statuses()[(int)$id] ?? [])['description'] ?? null;
    }

    public static function statusIsFinal($id): ?bool
    {
        return (static::statuses()[(int)$id] ?? [])['is_final'] ?? null;
    }

    public static function codStatuses(): array
    {
        return [
            1 => [
                'status' => 'New',
                'is_final' => false,
            ],
            2 => [
                'status' => 'Collected',
                'is_final' => false,
            ],
            3 => [
                'status' => 'Paid',
                'is_final' => true,
            ],
            99 => [
                'status' => 'Untrackable',
                'is_final' => true,
            ],
        ];
    }

    public static function codStatusById($id): ?string
    {
        return (static::codStatuses()[(int)$id] ?? [])['status'] ?? null;
    }

    public static function codStatusIsFinal($id): ?bool
    {
        return (static::codStatuses()[(int)$id] ?? [])['is_final'] ?? null;
    }
}