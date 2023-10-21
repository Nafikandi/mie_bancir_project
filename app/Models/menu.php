<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class menu extends Model
{
    use HasFactory;
    use softDeletes;

    protected $primaryKey = 'kd_menu';
    public $incrementing = false;
    protected $keyType = 'String';

    protected $fillable = [
        'kd_menu','photo','name_menu','category_menu','status_menu',
        'price_menu','description_menu'
    ];

    public function categories(){
        return $this->belongsTo(category::class, 'category_menu', 'id');
    }

     public function getPhotoAttribute($value){
        return url('storage/' . $value);
    }

}
