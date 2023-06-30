<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryTour extends Model
{
    use HasFactory;
    protected $table = 'history_tour';
    protected $fillable = [
        'tour_id',
        'user_id',
        'tour_name',
        'date_history',
        'price',
        'status_tour',



    ];
}
