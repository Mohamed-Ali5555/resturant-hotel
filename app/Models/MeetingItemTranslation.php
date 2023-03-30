<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingItemTranslation extends Model
{
    use HasFactory;
    protected $fillable=["description","name"];
}
