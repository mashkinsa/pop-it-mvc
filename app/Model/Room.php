<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'room';
    public $timestamps = false;
    protected $primaryKey = 'id_room';

    protected $fillable = [
        'number',
        'id_type',
        'square',
        'quantity',
        'id_building'
    ];

    // Связь с зданием
    public function building()
    {
        return $this->belongsTo(Building::class, 'id_building', 'id_building');
    }

    // Связь с типом помещения
    public function type()
    {
        return $this->belongsTo(RoomType::class, 'id_type', 'id_type');
    }
}