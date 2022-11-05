<?php

namespace App\Enums;

use App\Traits\EnumValueMangager;

enum OperationType: string
{
    use EnumValueMangager;

case Addition = "addition";
case Subtraction = "subtraction";
case Multiplication  = "multiplication";
}
