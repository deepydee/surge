<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'amount',
        'status',
        'date',
    ];

    const STATUSES = [
        'success' => 'Success',
        'failed' => 'Failed',
        'processing' => 'Processing',
    ];

    // protected $guarded = [];
    protected $casts = ['date' => 'date'];

    public function getStatusColorAttribute()
    {
        return [
            'processing' => 'yellow',
            'success' => 'green',
            'failed' => 'red',
        ][$this->status] ?? 'gray';
    }
   
    // public function getDateForHumansAttribute()
    // {
    //     return $this->date->format('M, d Y');
    // }

    protected function date(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('m/d/Y'),
            set: fn ($value) => Carbon::parse($value),
        );
    }

    // public function getDateAttribute($value)
    // {
    //     dd($value)
    //     return $value->format('m/d/Y');
    // }

    // public function setDateAttribute($value)
    // {
    //     $this->date = Carbon::parse($value);
    // }
}
