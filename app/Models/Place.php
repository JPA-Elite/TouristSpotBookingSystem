<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OwnerAccount;
use App\Models\CustomerAccount;
use App\Models\Book;


class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'spot_name',
        'location',
        'description',
        'available_slot',
        'owner_account_id'
    ];

    // public function owner(){
    //     return $this->belongsTo(OwnerAccount::class);
    // }


    public function owner()
    {
        return $this->belongsTo(OwnerAccount::class, 'owner_account_id', 'id');
    }

    public function customer()
    {
       return $this->belongsToMany(Book::class);
    }





    // public function booking(){
    //     return $this->belo
    // }
    /**
     * The roles that belong to the Place
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function booking()
    {
        return $this->belongsToMany(Book::class);
    }
}
