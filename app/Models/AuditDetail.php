<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditDetail extends Model
{

    use HasFactory;
    protected $table = "audit_details";
    protected $fillable = [
        'audit_id',
        'branch_id',   'sub_department_id',
        'visit_date',
        'auditor_id',
        'disbursed_cases',
        'disbursed_cases',
        'sample_selected',
        'planned_leaves',
        'no_of_days_cases',
        'no_of_days_branches',
        'no_of_days_planning',
        'no_of_days_execution',
        'no_of_days_reporting',
        'total_days',
        'status',  'completed_date',
        'created_by',   'updated_by',
        'deleted'

    ];


    public  function  getBranch(){
        return $this->hasOne(Branch::class,'id','branch_id');
    }
    public  function  getUser(){
        return $this->hasOne(User::class,'id','auditor_id');
    }
}
