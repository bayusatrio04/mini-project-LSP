<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    use HasFactory;

    protected $table = 'event_categories';

    protected $guarded = [];

    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }


}
