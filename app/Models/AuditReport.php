<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class AuditReport extends Model
{

    protected $table = "audit_reports";
    protected $fillable = [
        'id',
        'type',
        'region_id', 'area_id','branch_id',
        'document','observation',
        'category','risk_level',
        'count','total_dibursed_cases','selected_disbursed_cases','social_audit_count','audit_period',
        'year','status'];

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



//    public function forArea(){
//        return $this->hasOne(Area::class);
//    }
//    public function forBranch(){
//        return $this->hasOne(Branch::class);
//    }
}
