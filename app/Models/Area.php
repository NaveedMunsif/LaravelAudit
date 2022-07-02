<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Area extends Model
{
    use HasFactory;
//
//    public function Region(){
//        return $this->belongsTo(Region::class,'region_id');
//    }

    protected $fillable = ['id','name','tags','short_description','mobile','opening_date'
        ,'full_address','region_id','latitude','longitude','status','assigned_to','created_by','updated_by',
        'created_at','updated_by','deleted','opening_date_old'
        ,'created_on_old','updated_on_old'
    ];

}
