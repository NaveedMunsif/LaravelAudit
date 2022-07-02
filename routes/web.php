<?php

use App\Http\Controllers\AuditReportController;
use Illuminate\Support\Facades\Route;
use APP\HTTP\Controllers\ProductAjaxController;
use App\Http\Controllers\AuditController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
Route::get('/test', function () {
    return view('test');
});
Route::get('/productAjax', 'App\Http\Controllers\ProductAjaxController@index');


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/high-risk-report',[AuditController::class, 'highRiskSummaryReport'])->name('reports.high_risk_report');
    Route::get('/risk-wise-report',[AuditController::class, 'riskWiseReport'])->name('reports.risk_wise_report');
    Route::get('/search-high-risk-report',[AuditController::class, 'highRiskSummaryReport'])->name('reports.high_risk_report_search');
    Route::get('/search-risk-wise-report',[AuditController::class, 'riskWiseReport'])->name('reports.risk_wise_report');
    Route::get('/audit-report-list',[AuditReportController::class, 'auditReportList'])->name('reports.audit_report_list');

    Route::get('/areas',[AuditController::class, 'all_areas'])->name('toareas');
    Route::get('/branches',[AuditController::class, 'all_branches'])->name('tobranches');
    Route::get('/report-branches',[AuditController::class, 'report_all_branches'])->name('toreportbranches');

    Route::get('/table-branches',[AuditController::class, 'table_branches'])->name('tableBranches');

    Route::get('/create-new-audit',[AuditController::class, 'createNewAduit'])->name('create_new_audit');

    Route::get('/to-auditchange',[AuditController::class, 'toAuditChnage'])->name('ajax.toAuditChange');
    Route::get('/branch-audit-save',[AuditController::class, 'createNewAuditSave'])->name('create_new_audit_save');
    Route::post('/addProductMore',[AuditController::class, 'addProductMore'])->name('addProductMore');

    Route::get('/field-audit-listing',[AuditController::class, 'fieldAuditListing'])->name('field_audit_listing');

    Route::get('/audit-area/{id}',[AuditController::class, 'audit_area_view'])->name('audit_area_view');

    Route::get('/report-audit-details-view/{id}',[AuditReportController::class, 'auditReportDetails'])->name('report.audit_details_view');

    Route::get('/audit-area-observation/{id}',[AuditReportController::class, 'auditAreaObservation'])->name('report.audit_area_observation');

    Route::get('/report-audit-details-branch-view/{id}/{branchid}',[AuditReportController::class, 'auditReportBranchDetails'])->name('report.audit_details_view_branch');

    Route::get('/export-field-audit',[AuditController::class, 'exportFieldAuditList'])->name('export_field_audit_list');
    Route::get('/export-audit-report',[AuditReportController::class, 'exportAuditReport'])->name('export_audit_report');

    Route::get('/export-area-observation-report/{id}',[AuditReportController::class, 'exportAreaObservationReport'])->name('export_area_observation');

    Route::get('/audit-list-execution',[AuditReportController::class, 'auditListExecution'])->name('report_audit_list_execution');

    Route::get('/execution-unpresented-cheque',[AuditReportController::class, 'ExecutionUnpresentedCheque'])->name('report_execution_unpresented_cheque');
    Route::get('/execution-fund-requests',[AuditReportController::class, 'ExecutionFundRequests'])->name('report_execution_fund_requests');
    Route::get('/execution-reconcillation',[AuditReportController::class, 'ExecutionReconcillation'])->name('report_execution_reconcillation');
    Route::get('/execution-human-resource',[AuditReportController::class, 'ExecutionHumanResource'])->name('report_execution_human_resource');
    Route::get('/execution-stock-count',[AuditReportController::class, 'ExecutionStockCount'])->name('report_execution_stock_count');
    Route::get('/execution-cash-count',[AuditReportController::class, 'ExecutionCashCount'])->name('report_cash_count');
    Route::get('/execution-fixed-assets',[AuditReportController::class, 'ExecutionFixedAssets'])->name('report_fixed_assets');
    Route::get('/execution-general',[AuditReportController::class, 'ExecutionGeneral'])->name('report_general');
    Route::get('/execution-reports',[AuditReportController::class, 'ExecutionReports'])->name('report_reports');


    Route::post('/mis-import-csv',[AuditReportController::class, 'misImportCSV'])->name('report.misImportCSV');
    Route::get('export-excel-csv-file/{slug}',[AuditReportController::class, 'exportExcelCSV']);

});
