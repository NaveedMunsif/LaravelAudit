<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Region extends Model
{
    use HasFactory;
    protected $table = "regions";
//    public function subcategories(){
//        return $this->hasMany(Area::class,'region_id');
//    }



    protected $fillable = ['id','cr_division_id','name','code','tags','short_description','mobile','opening_date'
        ,'full_address','latitude','longitude','status','assigned_to','created_by','updated_by','deleted','opening_date_old'
        ,'created_on_old','updated_on_old'
        ];




}
