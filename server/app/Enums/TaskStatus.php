<?php

namespace App\Enums;

enum TaskStatus: int
{
    case Todo = 1;
    case Done = 2;

    public function title(): string {
        return match($this) {
            self::Todo => "未完了",
            self::Done => "完了"
        };
    }
}