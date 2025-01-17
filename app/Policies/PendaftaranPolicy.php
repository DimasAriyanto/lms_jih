<?php

namespace App\Policies;

use App\Models\Pendaftaran;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PendaftaranPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->role === 'admin' || $user->role === 'pegawai' || $user->role === 'umum';
        // return true;

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Pendaftaran $pendaftaran): bool
    {
        return $user->role === 'admin' || (($user->role === 'pegawai' || $user->role === 'umum') && $user->id === $pendaftaran->user_id)|| $user->role === 'mentor';
        // return true;
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
    public function update(User $user, Pendaftaran $pendaftaran): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Pendaftaran $pendaftaran): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Pendaftaran $pendaftaran): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Pendaftaran $pendaftaran): bool
    {
        return false;
    }
}
