<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'number', 
        'description', 
        'user_id', 
        'status_id'
    ];

    public function getStatus(){
        return $this->belongsTo(Status::class);
    }

}
