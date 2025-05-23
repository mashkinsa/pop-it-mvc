<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;
    protected $table = 'building';
    public $timestamps = false;
    protected $primaryKey = 'id_building';
    protected $fillable = [
        'address',
        'name'
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class, 'id_building', 'id_building');
    }
}