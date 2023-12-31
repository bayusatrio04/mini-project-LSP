<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';


    protected $guarded = [];


    public function eventCategories()
    {
        return $this->hasMany(EventCategory::class, 'id_event');
    }

    public function scopeByCategory($query, $categoryId)
    {
        return $query->join('event_categories', 'events.id', '=', 'event_categories.id_event')
            ->where('event_categories.id_category', $categoryId);
    }

    public function scopeByCategoryAndName($query, $categoryId, $eventName)
    {
        return $query->join('event_categories', 'events.id', '=', 'event_categories.id_event')
            ->where('event_categories.id_category', $categoryId)
            ->where('events.title', 'like', '%' . $eventName . '%');
    }

    public function scopeByEventName($query, $eventName)
    {
        return $query->join('event_categories', 'events.id', '=', 'event_categories.id_event')
            ->where('events.title', 'like', '%' . $eventName . '%');
    }

    protected $fillable = [
        'title',
        'description',
        'category_events',

        'start_date',
        'end_date',
        'location',
        'ticket_price',
        'total_tickets',
        'sold_tickets',
        'image_path',

    ];
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'event_categories', 'id_event', 'id_category');
    }

}
