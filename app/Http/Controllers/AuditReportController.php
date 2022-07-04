<?php

namespace App\Http\Controllers;

use App\Exports\MisExport;
use App\Imports\MisImport;
use App\Models\Audit;
use App\Models\AuditDetail;
use App\Models\AuditExecution;
use App\Models\AuditExecutionObservation;
use App\Models\AuditReport;
use App\Models\CashCount;
use App\Models\CuttOff;
use App\Models\FixedAsset;
use App\Models\HumanResource;
use App\Models\MisCsv;
use App\Models\Reconcillation;
use App\Models\Region;
use App\Models\StockCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\Console\Input\Input;

class AuditReportController extends Controller
{
    //


    public function misImportCSV(Request $request)
    {
        $validatedData = $request->validate([
            'file' => 'required',
        ]);

////        dd($request->file->originalName);
//        $filename = $request->file->getClientOriginalName();
        $filename = $request->file;
        Excel::import(new MisImport,$request->file);

        return redirect()->back()->with('success', 'You file is uploaded');
//        return redirect('excel-csv-file')->with('status', 'The file has been excel/csv imported to database in laravel 8');
//        return redirect()->route('report.misImportCSV')->with('status', 'The file has been excel/csv imported');
    }
    public function exportExcelCSV($slug)
    {
        return Excel::download(new MisExport, 'MISEXECUTION.'.$slug);
    }

    public function auditListExecution(Request $request){


        $audit_details = Audit::where('id', $request->audit_id)->first();
        $audit_execution_details = AuditExecution::where('id',$request->execution_id)
            ->first();

        $audit_mis_data = MisCsv::Select('id','amount','cheque_no')->paginate(200);
        return view('pages.report_audit_list_details_execution',
            compact('audit_details','audit_execution_details','audit_mis_data')
        );
    }
    public function ExecutionFundRequests(Request $request){

        $audit_details = Audit::where('id', $request->audit_id)->first();
        $audit_execution_details = AuditExecution::where('audit_id', $request->audit_id)->first();
        $audit_mis_data = MisCsv::Select('id','amount','cheque_no')->paginate(200);
        return view('pages.report_execution_fund_requests',
            compact('audit_details','audit_execution_details','audit_mis_data')
        );
    }
    public function ExecutionUnpresentedCheque(Request $request){

        $audit_details = Audit::where('id', $request->audit_id)->first();
        $audit_execution_details = AuditExecution::where('audit_id', $request->audit_id)->first();
        $audit_mis_data = MisCsv::Select('id','amount','cheque_no')->paginate(200);
        return view('pages.report_execution_unpresented_cheque',
            compact('audit_details','audit_execution_details','audit_mis_data')
        );
    }
    public function ExecutionReconciliation(Request $request){

        $audit_details = Audit::where('id', $request->audit_id)->first();
        $audit_execution_details = AuditExecution::where('audit_id', $request->audit_id)->first();
        $reconciliation_data = Reconcillation::where('exe_id',$request->execution_id)->paginate(200);
        return view('pages.report_execution_reconcillation',
            compact('audit_details','audit_execution_details','reconciliation_data')
        );
    }
    public function ExecutionHumanResource(Request $request){
        $audit_details = Audit::where('id', $request->audit_id)->first();

        $human_resource_data = HumanResource::where('exe_id',$request->execution_id)->paginate(200);

        $audit_execution_details = AuditExecution::where('audit_id', $request->audit_id)->first();

        return view('pages.report_execution_human_resource',
            compact('audit_details','audit_execution_details','human_resource_data')
        );
    }
    public function ExecutionStockCount(Request $request){

        $audit_details = Audit::where('id', $request->audit_id)->first();
        $audit_execution_details = AuditExecution::where('audit_id', $request->audit_id)->first();

        $stock_count_data =  StockCount::where('exe_id',$request->execution_id)->paginate(200);

        return view('pages.report_execution_stock_count',
            compact('audit_details','audit_execution_details','stock_count_data')
        );
    }
    public function ExecutionCashCount(Request $request){

        $audit_details = Audit::where('id', $request->audit_id)->first();
        $audit_execution_details = AuditExecution::where('audit_id', $request->audit_id)->first();
        $cash_count_data= CashCount::select('type','as_per_register','as_per_physical')->where('exe_id',$request->execution_id)
            ->groupBy('type','as_per_register','as_per_physical')->get();


        $petty_amount_register =0;
        $petty_amount_physical=0;
        $rmo_amount_register=0;
        $rmo_amount_physical=0;
        $op_amount_register=0;
        $op_amount_physical=0;

        foreach($cash_count_data as $a){
            if($a->type == "petty_cash"){
                $petty_amount_register =$a->as_per_register+$petty_amount_register;
                $petty_amount_physical =$a->as_per_physical+$petty_amount_physical;
            }
            if($a->type == "recovery/mdp/operational"){
                $rmo_amount_register =$a->as_per_register+$rmo_amount_register;
                $rmo_amount_physical =$a->as_per_physical+$rmo_amount_physical;
            }
            if($a->type == "operations"){
                $op_amount_register =$a->as_per_register+$op_amount_register;
                $op_amount_physical =$a->as_per_physical+$op_amount_physical;
            }
        }
        $total_as_per_register = $petty_amount_register+$rmo_amount_register+$op_amount_register;
        $total_as_per_physical = $petty_amount_physical+$rmo_amount_physical+$op_amount_physical;

        return view('pages.report_execution_cash_count',
            compact('audit_details','audit_execution_details','cash_count_data','petty_amount_register'
            ,'petty_amount_physical','rmo_amount_register','rmo_amount_physical','total_as_per_physical','total_as_per_register'
            ,'op_amount_physical','op_amount_register')
        );
    }
    public function ExecutionFixedAssets(Request $request){

        $audit_details = Audit::where('id', $request->audit_id)->first();
        $audit_execution_details = AuditExecution::where('audit_id', $request->audit_id)->where('id',$request->execution_id)->first();
        $fixed_asset_data = FixedAsset::select('title','asset_type','description','quantity','code',
            'item_condition','purchased_date','status')->where('exe_id', $request->execution_id)->paginate(30);

        return view('pages.report_execution_fixed_assets',
            compact('audit_details','audit_execution_details','fixed_asset_data')
        );
    }
    public function ExecutionGeneral(Request $request){

        $audit_exe_observation = AuditExecutionObservation::where('exe_id',$request->execution_id)->paginate(200);
        $audit_details = Audit::where('id', $request->audit_id)->first();
        $audit_execution_details = AuditExecution::where('audit_id', $request->audit_id)->where('id',$request->execution_id)->first();
        return view('pages.report_execution_general',
            compact('audit_details','audit_execution_details','audit_exe_observation')
        );
    }
    public function ExecutionReports(Request $request){

        $audit_details = Audit::where('id', $request->audit_id)->first();
        $audit_execution_details = AuditExecution::where('audit_id', $request->audit_id)->first();
        $audit_mis_data = MisCsv::Select('id','amount','cheque_no')->paginate(200);
        return view('pages.report_execution_reports',
            compact('audit_details','audit_execution_details','audit_mis_data')
        );
    }


    public function auditAreaObservation($id){


        $audit_area_observation =   AuditReport::
            where('area_id', $id)->
             where('document', '!=', 'none' )
            ->select('document','observation','risk_level','type','area_id', DB::raw('sum(observation) as count'))
            ->groupBy('document','observation','risk_level','type','area_id')->paginate(20);

        return view('pages.report_audit_area_observation',compact('audit_area_observation'));
    }

    public function auditReportList(Request  $request){

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

        return view('pages.report_audit_list',compact('all_regions','audit'));
    }

    public function auditReportDetails($id){

        $branch_id = AuditDetail::Select('branch_id')->where('audit_id', $id)->first();
        $audit_details_id = AuditDetail::Select('id','branch_id')->where('audit_id',$id)->where('branch_id',$branch_id->branch_id)->first();
        $audit_branch_execution_d = AuditExecution::where('audit_details_id',$audit_details_id->id )->where('audit_id',$id)->get();
        $branch_details = AuditDetail::Select('id','audit_id','branch_id')->where('audit_id', $id)->get();
        $audit_info = Audit::select('team_lead','completed_date')->where('id',$id)->first();
     

//        foreach ($area_observation as $a)
//        {
//            print_r($a);die();
//        }
//        $ordered = AuditExecutionObservation::select('number')
//            ->selectRaw('count(number) as qty')
//            ->groupBy('number')
//            ->orderBy('qty', 'DESC')
//            ->get();
//        return view('pages.report_audit_list_details',compact('branch_details'));

        return view('pages.report_audit_list_details_branch',compact('branch_details','audit_branch_execution_d','audit_info','audit_details_id'));
    }
    public function auditReportBranchDetails($id,$branch_id){

        $audit_details_id = AuditDetail::Select('id','branch_id')->where('audit_id',$id)->where('branch_id',$branch_id)->first();
        $audit_branch_execution_d = AuditExecution::where('audit_details_id',$audit_details_id->id )->where('audit_id',$id)->get();

        if(!isset($audit_branch_execution_d))
            $audit_branch_execution=null;
        $audit_info = Audit::select('team_lead','completed_date')->where('id',$id)->first();
//        dd($audit_details_id);
        $branch_details = AuditDetail::Select('id','audit_id','branch_id')->where('audit_id', $id)->get();

        return view('pages.report_audit_list_details_branch',compact('branch_details','audit_branch_execution_d','audit_info','audit_details_id'));
    }

    public function exportAuditReport(Request $request){
        $fileName = 'Audit_Report.csv';
        $AuditListing = Audit::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Region', 'Area', 'Expected Start Date', 'Period From', 'Period To','Status');

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
                $row['Status']  = $task->status;

                fputcsv($file, array($row['Region'], $row['Area'], $row['Expected Start Date'], $row['Period From'], $row['Period To'], $row['Status']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function exportAreaObservationReport($id){


        $fileName = 'Audit_Area_Observation_Report.csv';
        $AuditListing =   AuditReport::
        where('area_id', $request->area_id)->
        where('document', '!=', 'none' )
            ->select('document','observation','risk_level','type', DB::raw('sum(observation) as count'))
            ->groupBy('document','observation','risk_level','type')->get();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('document', 'observation', 'risk_level', 'type');

        $callback = function() use($AuditListing, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($AuditListing as $task) {

                $row['document']  = $task->document;
                $row['observation']  = $task->observation;
                $row['risk_level']  = $task->risk_level;
                $row['type']  = $task->type;
                fputcsv($file, array($row['document'], $row['observation'], $row['risk_level'], $row['type']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }



}
