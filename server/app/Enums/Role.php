<?php

namespace App\Enums;

enum Role: int
{
    case Admin = 1;
    case General = 2;

    public function title(): string {
        return match($this) {
            self::Admin => "管理者",
            self::General => "一般"
        };
    }
}