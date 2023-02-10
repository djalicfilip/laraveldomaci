<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\TourPackage;
use App\Models\User;


class Reservation extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false; 
    protected $primaryKey = 'reservation_id';

    public function package()
    {
        return $this->belongsTo(TourPackage::class,'package_id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
}
