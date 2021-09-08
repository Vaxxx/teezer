<?php

namespace App\Policies;

use App\Models\Channel;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ChannelPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @param User $user
     * @param Channel $channel
     * @return bool
     */
   public function view(User $user, Channel $channel)
   {
    //   return $user->id === $channel->user_id;
//       return $user->channels->hasRole('Admin') || $user->id === $channel->user_id
//           ? Response::allow()
//           : Response::deny('This action is really forbidden.');
   }
}
