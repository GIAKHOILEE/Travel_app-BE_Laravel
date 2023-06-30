<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TourModel extends Model
{
    use HasFactory ,SoftDeletes;
    protected $table = 'tour';
    protected $fillable = [
        'tour_name',
        'img',
        'description',
        'date_start',
        'date_end',
        'max_people',
        'price',
        'detail',
        'type_tour',
        'location',
    ];
}
