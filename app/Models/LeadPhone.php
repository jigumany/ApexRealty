<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadPhone extends Model
{
    use HasFactory;

    protected $table = "lead_phone";
    protected $fillable = ["phone", "lead_id"];
}
