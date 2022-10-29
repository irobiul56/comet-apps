<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagpost extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function blogpost()
    {
        return $this -> belongsToMany(blogpost::class);
    }
}
