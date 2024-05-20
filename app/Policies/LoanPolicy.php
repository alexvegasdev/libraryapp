<?php

namespace App\Policies;

use App\Models\Loan;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LoanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return $user->email === 'angelalexandra@example.net';
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Loan $loan)
    {
        return $user->id === $loan->user_id
        ? Response::allow()
        : Response::deny('Este préstamo no te pertenece.');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->email === 'angelalexandra@example.net'
        ? Response::allow()
        : Response::denyWithStatus(403, 'No tienes permisos para crear un préstamo.');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Loan $loan)
    {
        return $user->id === $loan->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Loan $loan)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Loan $loan)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Loan $loan)
    {
        //
    }

}
