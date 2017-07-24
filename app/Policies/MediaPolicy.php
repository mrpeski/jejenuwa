<?php

namespace App\Policies;

use App\User;
use App\Policies\Authorization;
use Illuminate\Auth\Access\HandlesAuthorization;

class MediaPolicy
{
    use HandlesAuthorization;
    use Authorization;
}
