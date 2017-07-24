<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Policies\Authorization;

class WarehousePolicy
{
    use HandlesAuthorization;
    use Authorization;
}
