<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;

    protected $fillable=['hall_id','name','description','capacity','task','created_by'];

    public function hall(){
        return $this->belongsTo(Hall::class);
    }

    public function creator(){
        return $this->belongsTo(User::class,'created_by');
    }
}
