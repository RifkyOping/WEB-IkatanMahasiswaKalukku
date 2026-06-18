<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = ['name', 'section', 'sort_order'];

    public function members()
    {
        return $this->hasMany(Member::class)->orderBy('sort_order')->orderBy('id');
    }
}
