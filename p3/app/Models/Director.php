<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;

    public function dramas()
    {
        # Author has many Books
        # Define a one-to-many relationship.
        return $this->hasMany('App\Models\Drama');
    }
}
