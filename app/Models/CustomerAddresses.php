<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddresses extends Model
{
    use HasFactory;
    public $table = "customer_addresses";
    protected $fillable = ['customer_id','address','pincode'];
    
}
