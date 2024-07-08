<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetsModel extends Model
{
    use HasFactory;
    protected $table = 'password_resets';
    protected $fillable = [
        'email',
        'token',
        'created_at',
    ];
    public $timestamps = false;
}
