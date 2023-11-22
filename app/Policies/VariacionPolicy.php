<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Variacion;
use Illuminate\Auth\Access\Response;

class VariacionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Variacion $variacion): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->email == 'nisha@lol.com';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Variacion $variacion): bool
    {
        return $user->email == 'nisha@lol.com';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Variacion $variacion): bool
    {
        return $user->email == 'nisha@lol.com';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Variacion $variacion): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Variacion $variacion): bool
    {
        //
    }
}
