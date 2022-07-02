<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditExecution extends Model
{
    protected $table = "audit_execution";
//    protected $fillable = [
//        'id',
//        'type',
//        'region_id', 'area_id','branch_id',
//        'document','observation',
//        'category','risk_level',
//        'count','total_dibursed_cases','selected_disbursed_cases','social_audit_count','audit_period',
//        'year','status'];

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
