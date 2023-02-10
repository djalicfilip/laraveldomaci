<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;


class Client extends Model
{
    use HasFactory;
   protected $primaryKey = 'client_id';
    protected $guarded = [];
    public $timestamps = false; 

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
}
