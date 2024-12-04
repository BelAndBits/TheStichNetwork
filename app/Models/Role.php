<?php
// Models allow interaction with the data from the database using PHP instead of SQL. More simple and secure.

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Specify the custom primary key
    protected $primaryKey = 'role_id';

    // Allow mass assignment for these fields
    protected $fillable = ['role_name'];

    // Disable auto-incrementing ID if the primary key is non-standard (optional)
    public $incrementing = true;

    // Specify the primary key type if necessary
    protected $keyType = 'int';

    /**
     * Define the relationship with the User model.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
    }
}
