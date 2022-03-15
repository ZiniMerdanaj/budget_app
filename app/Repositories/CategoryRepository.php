<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Category;

class CategoryRepository
{
    public function forUser(User $user)
    {
        return Category::where('user_id', $user->id)
                        ->orderBy('created_at', 'asc')
                        ->get();
    }
}