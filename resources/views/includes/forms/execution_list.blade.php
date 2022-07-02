<ul class="list-group">
    <li class="list-group-item"><a href="{{route('report_audit_list_execution',['audit_id' => $audit_details->id, 'execution_id' => $audit_execution_details->id])}}">MIS vs Bank Statements</a></li>
    <li class="list-group-item"><a href="{{route('report_execution_unpresented_cheque',['audit_id' => $audit_details->id, 'module_id' => 2])}}">Unpresented Cheques</a></li>
    <li class="list-group-item"><a href="{{route('report_execution_fund_requests',['audit_id' => $audit_details->id, 'module_id' => 3])}}">Fund Requests</a></li>
    <li class="list-group-item"><a href="{{route('report_execution_reconcillation',['audit_id' => $audit_details->id, 'execution_id' => $audit_execution_details->id])}}">Reconciliation </a></li>
    <li class="list-group-item"><a href="{{route('report_execution_human_resource',['audit_id' => $audit_details->id, 'execution_id' => $audit_execution_details->id])}}">Human Resource </a></li>
    <li class="list-group-item"><a href="{{route('report_execution_stock_count',['audit_id' => $audit_details->id, 'execution_id' => $audit_execution_details->id])}}">Stock Count</a></li>
    <li class="list-group-item"><a href="{{route('report_cash_count',['audit_id' => $audit_details->id, 'execution_id' => $audit_execution_details->id])}}">Cash Count</a></li>
    <li class="list-group-item"><a href="{{route('report_fixed_assets',['audit_id' => $audit_details->id, 'execution_id' => $audit_execution_details->id])}}">Fixed Assets</a></li>
    <li class="list-group-item"><a href="{{route('report_general',['audit_id' => $audit_details->id, 'execution_id' => $audit_execution_details->id])}}">General</a></li>
    <li class="list-group-item"><a href="{{route('report_reports',['audit_id' => $audit_details->id, 'module_id' => 8])}}">Reports</a></li>
    <li class="list-group-item">Finalize Audit</li>
</ul>
