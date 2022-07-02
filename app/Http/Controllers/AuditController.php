<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\AuditDetail_;
use App\Models\Audit;
use App\Models\audit_detail_later;
use App\Models\AuditDetail;
use App\Models\AuditReport;
use App\Models\Branch;
use App\Models\Observation;
use App\Models\Region;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuditController extends Controller
{
    //

    public function exportFieldAuditList(Request $request){
        $fileName = 'Audit_List.csv';
        $AuditListing = Audit::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Region', 'Area', 'Expected Start Date', 'Period From', 'Period To','Audit Year','Audit Period','Team Lead','Status');

        $callback = function() use($AuditListing, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($AuditListing as $task) {
                if(isset($task->getRegion))
                $row['Region']  = $task->getRegion->name;
                else
                    $row['Region']  = "Not Found";
                if(isset($task->getArea))
                $row['Area']    = $task->getArea->name;
                else
                    $row['Area']    = "Not Found";
                $row['Expected Start Date']    = date('Y-m-d', strtotime($task->expected_start_date));
                $row['Period From']  = gmdate("Y-m-d\TH:i:s\Z", $task->period_from);
                $row['Period To']  = gmdate("Y-m-d\TH:i:s\Z", $task->period_to);
                $row['Audit Year']  = $task->audit_year;
                $row['Audit Period']  = $task->audit_period;
                $row['Team Lead']  = $task->team_lead;
                $row['Status']  = $task->status;

                fputcsv($file, array($row['Region'], $row['Area'], $row['Expected Start Date'], $row['Period From'], $row['Period To'], $row['Audit Year'], $row['Audit Period'], $row['Team Lead'], $row['Status']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }


    public function createNewAduit(Request  $request){

        $all_regions =  Region::Select('id','name')->get();
        $all_users =  User::Select('id','name')->get();

//        return view('test',compact('all_regions'));

        return view('pages.create_new_audit',compact('all_regions','all_users'));
    }

    public function audit_area_view($audit_id){


//        $branch_data = Branch::Select('id','name')->where('area_id',$area_id)->get();
        $audit_data = Audit::where('id',$audit_id)->first();


                $branches_audit_details=  AuditDetail::where('audit_id', $audit_id)->get();
                if(!count($branches_audit_details) > 0){
                    $branches_audit_details=null;
                }


//        }
//        else{
//            $branches_audit_details=null;
//        }





        return view('pages/field_area_audit_list',compact('audit_data','branches_audit_details'));

    }


    public function fieldAuditListing(Request $request){
        $all_regions = Region::Select('id','name')->get();

        if($request->all() != null && isset($request->regions))
        {

            $audit = Audit::where('region_id',$request->regions)
                ->where('area_id',$request->areas)
                ->where('audit_year',$request->audit_year)
                ->where('audit_period',$request->audit_period)
            ->paginate(30);
        }
        else{
            $audit = Audit::paginate(30);
        }

//        $audit = Audit::Select('id','region','area','audit_year','audit_period','expected_start_date','period_form','period_to',)->get();
//        $audit = Audit::Select('region_id','area_id','audit_year',
//            'audit_period','expected_start_date','period_from','period_to','team_lead','status')
//            ->groupBy('region_id','area_id','audit_year',
//                'audit_period','expected_start_date','period_from','period_to','team_lead','status')->get();

//        $audit= $data->unique('region_id');
              return view('pages.field_audit_list',compact('all_regions','audit'));
    }
    public function createNewAuditSave(Request $request)
    {
        $audit_data = $request->all();


        $audit_save = new Audit();
        $audit_save->region_id = $request->regions;
        $audit_save->area_id = $request->areas;
        $audit_save->expected_start_date = date("Y-m-d", strtotime($request->main_expected_start_date));
        $audit_save->audit_year = $request->audit_year;
        $audit_save->audit_period = $request->audit_period;
        $audit_save->period_from = $request->audit_period_from;
        $audit_save->period_to = $request->audit_period_to;
        $audit_save->team_lead = $request->team_lead;
        $audit_save->extra_days = $request->main_extra_days;
        $audit_save->planned_leaves = $request->main_planned_leaves;
        $audit_save->status = "draft";
        $audit_save->total_days = $request->main_total_days;
        $audit_save->created_by = $request->team_lead;
        $audit_save->save();

      $audit_id = Audit::latest()->first();



//                $rules = [];
//        foreach($request->input('name') as $key => $value) {
//            $rules["name.{$key}"] = 'required';
//        }
//        $validator = Validator::make($request->all(), $rules);
//
//        if ($validator->passes()) {
//            foreach($request->input('name') as $key => $value) {
//                AuditDetail::create([
//                    'name'=>$value,
//                       'audit_id' => $audit_id->id
//
//                ]);
//            }
//            return response()->json(['success'=>'done']);
//        }
//        return response()->json(['error'=>$validator->errors()->all()]);

//        echo '<pre>';print_r($branches);die();
        $branches    = $request->input('branches');
        $date    = $request->input('date');
        $auditiors    = $request->input('auditiors');
        $disbursed    = $request->input('disbursed');
        $sample_selected    = $request->input('sample_selected');
        $days_cases    = $request->input('days_cases');
        $days_branches    = $request->input('days_branches');
        $total_days    = $request->input('total_days');
       ;
            for ($i = 0; $i < count($branches); $i++) {
                $data = [
                    'audit_id' => $audit_id->id,
                    'branch_id' => $branches[$i],
//                    'visit_date' =>  Carbon::parse($date[$i]),
                    'visit_date' =>  date("Y-m-d", strtotime($date[$i])),
                    'auditor_id' => $auditiors[$i],
                    'disbursed_cases' => $disbursed[$i],
                    'sample_selected' => $sample_selected[$i],
                    'no_of_days_cases' => $days_cases[$i],
                    'no_of_days_branches' => $days_branches[$i],
                    'total_days' => $total_days[$i],
                    'status' => "draft",
                    'created_by' => $auditiors[$i]


                ];
                AuditDetail::create($data);
            }




//            foreach ($data as $d)
//
//                foreach ($d as $p){
//                    echo '<pre>';print_r($p);die();
//                }
//            }

//            echo '<pre>';print_r($data);die();
////            dd($meta['branches']);
//
////            foreach ($audit_data as $data){
////
////                dd($data);
////                dd($data['branches']);
////                audit_detail_later::create([
////                        'branch_id' => $data['branches'],
////                        'visit_date' => $data->date,
////                        'auditor_id' => $data->auditiors,
////                        'disbursed_cases' => $data->disbursed,
////                        'sample_selected' => $data->sample_selected,
////                        'no_of_days_cases' => $data->days_cases,
////                        'no_of_days_branches' => $data->days_branches,
////                        'total_days' => $data->total_days
////                ]);
//
//                $branch_audit_save = new audit_detail_later();
//                $branch_audit_save->branch_id = $data['branches'];
//                $branch_audit_save->visit_date = $data['date'];
//                $branch_audit_save->auditor_id = $data['auditiors'];
//                $branch_audit_save->disbursed_cases = $data['disbursed'];
//                $branch_audit_save->sample_selected = $data['sample_selected'];
//                $branch_audit_save->no_of_days_cases = $data['days_cases'];
//                $branch_audit_save->no_of_days_branches = $data['days_branches'];
//                $branch_audit_save->total_days = $data['total_days'];
//                $branch_audit_save->save();
//            }
//        }

        return redirect()->route('create_new_audit');

        }


//    public function addProductMore(Request $request)
////    {
//        $rules = [];
//        foreach($request->input('name') as $key => $value) {
//            $rules["name.{$key}"] = 'required';
//        }
//        $validator = Validator::make($request->all(), $rules);
//
//        if ($validator->passes()) {
//            foreach($request->input('name') as $key => $value) {
//                CatList::create(['name'=>$value]);
//            }
//            return response()->json(['success'=>'done']);
//        }
//        return response()->json(['error'=>$validator->errors()->all()]);
//    }



    public function highRiskSummaryReport(Request $request)
    {

        $region_id = $request->regions;
        $area_id =  $request->areas;
        $audit_year =  $request->audit_year;
        $audit_period =  $request->audit_period;



        $all_regions =  Region::get();
        $all_araes =  Area::get();
        $all_branches = Branch::get();
        //echo '<pre>';print_r($all_branches);die();

        $all_observation =  Observation::get();

     if($request->all() != null){
         $observationall = Audit::select('audits.id')
             ->join('audit_execution','audit_execution.audit_id','=','audits.id')
             ->where([
                'region_id' => $region_id,
                'area_id' => $area_id,
                'audit_year' => $audit_year,
                'audit_period' => $audit_period
             ])
             ->join('audit_execution_observations','audit_execution_observations.exe_id','=','audit_execution.id')
             ->select('observation', DB::raw('count(*) as total'))
             ->groupBy('observation')
             ->get();
     }
     else{
         $observationall = null;
     }

        return view('pages.report_high_risk_summary', compact('all_regions','observationall','all_araes','all_branches','all_observation'));
    }


    public function riskWiseReport(Request $request)
    {

        $region_id = $request->regions;
        $area_id =  $request->areas;
        $audit_year =  $request->audit_year;
        $audit_period =  $request->audit_period;
        $branch_id =  $request->branches;
        $all_observation = Observation::get();
        $all_regions = Region::get();

        if($request->all() != null) {
                    if(isset($request->branches) && isset($request->areas)){
                        $area_observation=$area_id;
                        $data_check = "branch_one";
                        $region_observation ="temp";
                        $branch_observation = AuditReport::where([
                                'region_id' => $region_id,
                                'area_id' => $area_id,
                                'year' => $audit_year,
                                'branch_id' => $branch_id,
                                'audit_period' => $audit_period])
                               ->select('branch_id','area_id','region_id', DB::raw('sum(count) as branch_instance_count'))
                               ->groupBy('branch_id','area_id','region_id')
                               ->get();

                        $region_total_count = AuditReport::where([
                            'region_id' => $region_id,
                            'year' => $audit_year,
                            'audit_period' => $audit_period])
                            ->select('region_id', DB::raw('sum(count) as region_instance_count'))
                            ->groupBy('region_id')->first();

                        $area_total_count =   AuditReport::where([
                            'region_id' => $region_id,
                            'area_id' => $area_id,
                            'year' => $audit_year,
                            'audit_period' => $audit_period])
                            ->select('area_id', DB::raw('sum(count) as area_instance_count'))
                            ->groupBy('area_id')->first();

                }
                    elseif(!isset($request->branches) && isset($request->areas)) {


                        $area_observation=$area_id;
                        $region_observation ="temp";
                        $data_check = "area_two";

//                        $query = AuditReport::where([
//                            'region_id' => $region_id,
//                            'area_id' => $area_id,
//                            'year' => $audit_year,
//                            'audit_period' => $audit_period]);

                        $branch_observation = AuditReport::where([
                            'region_id' => $region_id,
                            'area_id' => $area_id,
                            'year' => $audit_year,
                            'audit_period' => $audit_period])
                        ->Select('branch_id','area_id','region_id', DB::raw('sum(count) as branch_instance_count'))
                            ->groupBy('branch_id','area_id','region_id')
                            ->get();

//
//                        $branch_observation = $query
//                            ->addSelect('branch_id','area_id','region_id', DB::raw('sum(count) as branch_instance_count'))
//                            ->groupBy('branch_id','area_id','region_id')
//                            ->get();



                        $region_total_count = AuditReport::where([
                            'region_id' => $region_id,
                            'year' => $audit_year,
                            'audit_period' => $audit_period])
                            ->select('region_id', DB::raw('sum(count) as region_instance_count'))
                            ->groupBy('region_id')->first();
//
//                        $area_total_count = $query('area_id', DB::raw('sum(count) as area_instance_count'))
//                            ->groupBy('area_id')->first();
                        $area_total_count =AuditReport::where([
                            'region_id' => $region_id,
                            'area_id' => $area_id,
                            'year' => $audit_year,
                            'audit_period' => $audit_period])
                            ->Select('area_id', DB::raw('sum(count) as area_instance_count'))
                            ->groupBy('area_id')->first();

                    }
//                else{
//
//                    $area_observation=$area_id;
//                    $region_observation ="temp";
//                    $data_check = "area_two";
//                    $branch_observation = AuditReport::where([
//                            'region_id' => $region_id,
//                            'area_id' => $area_id,
//                            'year' => $audit_year,
//                            'audit_period' => $audit_period])
//                        ->select('branch_id','area_id','region_id', DB::raw('sum(count) as branch_instance_count'))
//                        ->groupBy('branch_id','area_id','region_id')
//                        ->get();
//                    $region_total_count = AuditReport::where([
//                        'region_id' => $region_id,
//                        'year' => $audit_year,
//                        'audit_period' => $audit_period])
//                        ->select('region_id', DB::raw('sum(count) as region_instance_count'))
//                        ->groupBy('region_id')->first();
//                    $area_total_count = AuditReport::where([
//                        'region_id' => $region_id,
//                        'year' => $audit_year,
//                        'audit_period' => $audit_period
//
//                    ])->select('area_id','region_id', DB::raw('sum(count) as area_instance_count'))
//                        ->groupBy('area_id','region_id')
//                        ->get();
//                }

//            $branch_observation = DB::table('audit_reports')
//                ->where([
//                    'region_id' => $region_id,
//                    'area_id' => $area_id,
//                    'year' => $audit_year,
//                    'audit_period' => $audit_period]);
//            $branch_observation->where(['branch_id' => $branch_id]);
//
//            $branch_observation->select('branch_id', DB::raw('sum(count) as branch_instance_count'))->groupBy('branch_id')
//                ->get();
//                    dd($branch_observation);

//                   if($branch_id == 'Select Branch' && $area_id == 'Choose Area'){
//                $area_observation = DB::table('audit_reports')
//                    ->where([
//                        'region_id' => $region_id,
//                        'year' => $audit_year,
//                        'audit_period' => $audit_period
//
//                    ])->select('area_id', DB::raw('sum(count) as area_instance_count'))->groupBy('area_id')
//                    ->get();
//            }
//            else{
//                $area_observation = DB::table('audit_reports')
//                    ->where([
//                        'region_id' => $region_id,
//                        'year' => $audit_year,
//                        'area_id' =>$area_id,
//                        'audit_period' => $audit_period
//
//                    ])->select('area_id', DB::raw('sum(count) as area_instance_count'))->groupBy('area_id')
//                    ->get();
//            }

            if(!isset($request->areas) && !isset($request->branches)){
                $region_total_count=null;
                $area_total_count=null;
                $branch_observation = [];
                $data_check = "region_three";
                $region_observation=$region_id;
                  $area_observation = AuditReport::where([
                    'region_id' => $region_id,
                    'year' => $audit_year,
                    'audit_period' => $audit_period

                ])->select('area_id','region_id', DB::raw('sum(count) as area_instance_count'))
                      ->groupBy('area_id','region_id')
                      ->get();

            foreach ($area_observation as $area)
            {
                     $branch_observation [] =  AuditReport::where([
                        'region_id' => $region_id,
                        'area_id' => $area->area_id,
                        'year' => $audit_year,
                        'audit_period' => $audit_period])
                    ->select('branch_id','area_id','region_id', DB::raw('sum(count) as branch_instance_count'))
                         ->groupBy('branch_id','area_id','region_id')
                    ->get();
            }
            }

        }
        else{
            $branch_observation =null;
            $area_observation =null;
            $data_check = null;
            $region_observation =null;
            $region_total_count=null;
            $area_total_count=null;
        }
        /*foreach ($area_observation as $a)
        {
            dd($a->forArea);
        }*/


        return view('pages.report_risk_wise_report', compact('all_regions', 'all_observation',
            'branch_observation','area_observation','data_check','region_observation','region_id','region_total_count','area_total_count'));
    }


    public  function all_areas(Request $request){
        $areas = Area::select('id','name')->where('region_id',$request->region_id)->get()->toArray();
        return response()->json($areas);
    }
    public  function all_branches(Request $request){
        $branches['branches'] = Branch::select('id','name','area_id')->where('area_id',$request->area_id)->get()->toArray();

        $branches['users'] = User::select('id','name')->get()->toArray();
//        print_r($branches);die();
        return response()->json($branches);
    }
    public  function toAuditChnage(Request $request){
        $branches['users'] = User::select('id','name')->get()->toArray();
//        print_r($branches);die();
        return response()->json($branches);
    }
    public  function report_all_branches(Request $request){
        $branches = Branch::select('id','name')->where('area_id',$request->area_id)->get()->toArray();

//        print_r($branches);die();
        return response()->json($branches);
    }
    public  function table_branches(Request $request){
        $branches['branches'] = Branch::select('id','name')->where('area_id',$request->area_id)->get()->toArray();
        $branches['users'] = User::select('id','name')->get()->toArray();
//        $branches = Branch::where('area_id',$request->area_id)->get();
        return response()->json($branches);
    }


        //FOR DEBUGING
    public  function form(Request $request)
    {
//        $region_id = "$request->regions";
//            dd($region_id);
//        $region_id = "36";
//        $area_id = "118";
//        $audit_period = "2";
//        $audit_year = "2019-2020";

        $audit_execution_observation = DB::table('audits')
            ->select('audits.id')
            ->join('audit_execution','audit_execution.audit_id','=','audits.id')
            ->where([
                'region_id' => 36,
                'area_id' =>  118,
                'audit_year' =>  2,
                'audit_period' =>  2019-2020,
            ])
            ->join('audit_execution_observations','audit_execution_observations.exe_id','=','audit_execution.id')
            ->select('observation', DB::raw('count(*) as total'))
            ->groupBy('observation')
            ->get();

        dd($audit_execution_observation);
    }
    public function indexOld()
    {

//        $region_id = "24";
//        $area_id = "108";
//       $audit_period = "2";
//       $audit_year = "2019-2020";


//        $audit_Details = DB::table('audits')->where([
//            'region_id' => '24',
//            'area_id' => '3',
//            'audit_year' => '2018-2019',
//            'audit_period' => '2'
//        ])->first();
//
//        $audit_execution = DB::table('audit_execution')->where('audit_id',$audit_Details->id)->first();

        $audit_execution_observation = DB::table('audits')
            ->select('audits.id')
            ->join('audit_execution','audit_execution.audit_id','=','audits.id')
            ->where([
                'region_id' => '36',
                'area_id' => '118',
                'audit_year' => '2019-2020',
                'audit_period' => '2'

            ])
            ->join('audit_execution_observations','audit_execution_observations.exe_id','=','audit_execution.id')
            ->select('observation', DB::raw('count(*) as total'))
            ->groupBy('observation')
            ->get();

        dd($audit_execution_observation);


//
//        $audit_execution_observation= DB::table('audit_execution_observations')
//            ->where('exe_id',15421)
//            ->select('observation', DB::raw('count(*) as total'))
//            ->groupBy('observation')
//            ->get();




//        $stud = DB::table('audits')
//            ->join('audit_execution','audits.id','=','audit_execution.id')
//            ->get();
//        dd($stud);

//        $audit_execution_observation = DB::table('audit_execution_observations')->where('exe_id','140')->get();





        $observationall= $audit_execution_observation;

//
//            dd($groupedByValue);


//        foreach ($groupedByValue as $auditobservation){
//
//        }



//        foreach ($audit_Details as $feat) {
//          dd($feat->type);
//        }
        $riskall = DB::table('risks')->get();
//        $observationall = DB::table('observations')->get();

//        $allData= $riskall->merge($observationall);

//        $array = array_merge($riskall,$observationall);
//        dd($array);
//        foreach ($observationall as $risks)
//        {
//            dd($risks->name);
//
//        }

        return view('pages.auditRisks', compact('riskall','observationall'));
//        return view('auditRisks', compact('allData'));
    }


}
