<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Audit extends Model
{

    use HasFactory;
    protected $fillable = [
        'type',
        'region_id',  'area_id','department_id','expected_start_date','audit_year','audit_period',
        'period_from','period_to','team_lead','completed_date','extra_days','total_days','planned_leaves','required_days',
        'status','rejected_reason','remarks','created_by','updated_by','created_by','updated_by','deleted'
    ];




    public  function  getRegion(){
        return $this->hasOne(Region::class,'id','region_id');
    }
    public  function  getArea(){
        return $this->hasOne(Area::class,'id','area_id');
    }
    public  function  getBranch(){
        return $this->hasOne(Branch::class,'id','branch_id');
    }
    public  function  getUser(){
        return $this->hasOne(User::class,'id','team_lead');
    }
}
