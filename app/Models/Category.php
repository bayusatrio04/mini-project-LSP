<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $guarded = [];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_categories', 'id_category', 'id_event');
    }

}
