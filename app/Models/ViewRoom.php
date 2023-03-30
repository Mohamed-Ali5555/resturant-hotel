<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewRoom extends Model
{
    use HasFactory;
    protected $fillable=["room_id","view_id","count"];
}