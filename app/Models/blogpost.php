<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blogpost extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this -> belongsToMany(Categorypost::class);
    }

    public function tag()
    {
        return $this -> belongsToMany(Tagpost::class);
    }

    public function author()
    {
        return $this-> belongsTo(Admin::class, 'admin_id', 'id');
    }
}
