<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'number',
        'id_type',
        'square',
        'quantity',
        'id_building'
    ];

    // Связь с таблицей building
    public function building()
    {
        return $this->belongsTo(Building::class, 'id_building');
    }

    // Связь с таблицей room_type
    public function type()
    {
        return $this->belongsTo(RoomType::class, 'id_type');
    }
}