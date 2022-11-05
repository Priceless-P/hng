<?php

namespace App\Traits;



use Illuminate\Support\Collection;
use function collect;

trait EnumValueMangager
{
    public static  function  getValue():Collection
    {
        return collect(self::cases())->pluck('value');
    }

    public static  function  hasValue(string $value):bool
    {
        return self::getValue()->contains($value);
    }
}
