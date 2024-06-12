<?php

namespace App\Enums;

enum ProjectColor: int
{
    case Blue = 1;
    case Indigo = 2;
    case Purple = 3;
    case Pink = 4;
    case Red = 5;
    case Orange = 6;
    case Yellow = 7;
    case Green = 8;
    case Teal = 9;
    case Cyan = 10;
    case Gray = 11;
    case Black = 12;

    public function title(): string {
        return match($this) {
            self::Blue => 'blue',
            self::Indigo => 'indigo',
            self::Purple => 'purple',
            self::Pink => 'pink',
            self::Red => 'red',
            self::Orange => 'orange',
            self::Yellow => 'yellow',
            self::Green => 'green',
            self::Teal => 'teal',
            self::Cyan => 'cyan',
            self::Gray => 'gray',
            self::Black => 'black'
        };
    }

    public function code(): string {
        return match($this) {
            self::Blue => '#0d6efd',
            self::Indigo => '#6610f2',
            self::Purple => '#6f42c1',
            self::Pink => '#d63384',
            self::Red => '#dc3545',
            self::Orange => '#fd7e14',
            self::Yellow => '#ffc107',
            self::Green => '#198754',
            self::Teal => '#20c997',
            self::Cyan => '#0dcaf0',
            self::Gray => '#adb5bd',
            self::Black => '#000000'
        };
    }
}