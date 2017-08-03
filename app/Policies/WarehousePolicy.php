<?php

namespace App\Policies;

use App\User;
use App\Policies\Authorization;
use Illuminate\Auth\Access\HandlesAuthorization;

class WarehousePolicy
{
    use HandlesAuthorization;
    use Authorization;
}
