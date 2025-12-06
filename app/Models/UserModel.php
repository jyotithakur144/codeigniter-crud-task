<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;  // added soft delete
    protected $allowedFields = ['name', 'email', 'mobile', 'gender', 'state'];
}
