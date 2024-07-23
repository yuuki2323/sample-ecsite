<?php
namespace App\Policies;

use App\Models\Review;
use App\Models\User;
use App\Models\AdminUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReviewPolicy
{
    use HandlesAuthorization;

    public function update($user, Review $review)
    {
        return $user->id === $review->user_id || $user instanceof AdminUser;
    }

    public function delete($user, Review $review)
    {
        return $user->id === $review->user_id || $user instanceof AdminUser;
    }
}

