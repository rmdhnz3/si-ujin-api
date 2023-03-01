<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum RoleEnum: string
{
    use EnumToArray;

    case ADMINISTRATOR = 'Administrator';
    case GURU = 'Guru';
    case SISWA = 'Siswa';
}