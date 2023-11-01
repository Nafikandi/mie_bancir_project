<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'code_order';
    public $incrementing = false;
    public $keyType = 'String';

    protected $fillable = [
        'code_order','kd_menu','user','order_date','quantity','desctipted'
    ];

    public function Menu(){
        return $this->belongsTo(menu::class, 'kd_menu', 'kd_menu');
    }

}
