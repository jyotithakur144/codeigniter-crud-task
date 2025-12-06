<?php

namespace App\Validation;

use App\Models\UserModel;

class UserRules
{
    public function uniqueEmailExceptDeleted(string $email, string $field, array $data): bool
    {
        $model = new UserModel();

        // Current user ID (if editing)
        $currentId = $data[$field] ?? null;

        $query = $model->where('email', $email)
                       ->where('deleted_at', null);

        if ($currentId !== null) {
            // Only exclude current user if editing
            $query->where('id !=', $currentId);
        }

        $user = $query->first();

        return $user === null; // valid if no other active user has this email
    }
}
