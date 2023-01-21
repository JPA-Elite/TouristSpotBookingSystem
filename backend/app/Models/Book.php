<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment',
        'time_travel',
        'customer_account_id',
        'place_id'
    ];

    public function customer(){
        return $this->belongsTo(CustomerAccount::class, 'customer_account_id','id' );
    }


    /**
     * The roles that belong to the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function place()
    {
        return $this->belongsToMany(Place::class)->withPivot('visitors', 'total_payment');
    }

    // public function place(){
    //     return $this->belongsToMany(Place::class);
    // }
}
