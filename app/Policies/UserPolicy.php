<?php

namespace App\Policies;

use App\User;
use App\Policies\Authorization;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    use Authorization;
}
