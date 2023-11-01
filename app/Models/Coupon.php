<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory;
    use softDeletes;

    protected $primaryKey = 'coupon_code';
    public $incrementing = false;
    protected $keyType = 'String';
}
