<?php

namespace App\Policies;

use App\Models\Parcelle;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ParcellePolicy
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
    public function view(User $user, Parcelle $parcelle): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role == 'admin';
        return $user->role == 'owner';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Parcelle $parcelle): bool
    {
        return $user->role == 'admin';
        return $user->role == 'owner';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Parcelle $parcelle): bool
    {
        return $user->role == 'admin';
        return $user->role == 'owner';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Parcelle $parcelle): bool
    {
        return $user->role == 'admin';
        return $user->role == 'owner';
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Parcelle $parcelle): bool
    {
        return $user->role == 'admin';
    }
}
