<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['organization_id', 'name', 'sort_order'];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
