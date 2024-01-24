<?php

namespace App\Policies;

use App\Models\Pelatihan;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PelatihanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->role === 'admin' || $user->role === 'mentor';
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Pelatihan $pelatihan): bool
    {
        return $user->role === 'admin' || ($user->role === 'mentor' && $user->id === $pelatihan->user_id);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Pelatihan $pelatihan): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Pelatihan $pelatihan): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Pelatihan $pelatihan): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Pelatihan $pelatihan): bool
    {
        return $user->role === 'admin';
    }
}
