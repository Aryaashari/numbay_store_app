<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function show(User $user, Product $product) {
        return $user->id == $product->store->user_id;
    }

    public function edit(User $user, Product $product) {
        return $user->id == $product->store->user_id;
    }

    public function destroy(User $user, Product $product) {
        return $user->id == $product->store->user_id;
    }
}
