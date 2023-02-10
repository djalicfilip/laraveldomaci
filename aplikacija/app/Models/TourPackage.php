<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;


class TourPackage extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false; 
    protected $primaryKey = 'package_id';


    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
}
