<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'room_type';
    protected $primaryKey = 'id_type';
    protected $fillable = [
        'name'
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class, 'id_type', 'id_type');
    }
}