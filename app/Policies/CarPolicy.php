<?php

namespace App\Policies;

use App\Models\Car;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CarPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Car $car): bool
    {
        return ($user->type==0&&$car->owner->user_id==$user->id)||$user->role==1|| $user->role==2;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Car $car): bool
    {
        return ($user->role==0||$user->role==1)&&$car->owner->user_id==$user->id || $user->role==2;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Car $car): bool
    {
        return ($user->role==0||$user->role==1)&&$car->owner->user_id==$user->id || $user->role==2;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Car $car): bool
    {
        return ($user->role==0||$user->role==1)&&$car->owner->user_id==$user->id || $user->role==2;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Car $car): bool
    {
        return ($user->role==0||$user->role==1)&&$car->owner->user_id==$user->id || $user->role==2;
    }
}
