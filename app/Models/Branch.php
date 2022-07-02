<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Branch extends Model
{
    protected $fillable = ['id','region_id','area_id','type','name','short_name','code','uc'
        ,'village','address','mobile','city_id','tehsil_id','district_id','division_id','province_id'
        ,'country_id','latitude','longitude','opening_date','status','cr_division_id','effective_id'
        ,'assigned_to','created_by','updated_by','created_at','updated_at','deleted','opening_date_old'
        ,'created_on_old','updated_on_old'
    ];
}
