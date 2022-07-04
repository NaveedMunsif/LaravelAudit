@extends('layouts.app')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{route('reports.audit_report_list')}}">
                    Audit Report
                </a> </li>
            <li class="breadcrumb-item active" aria-current="page">Audit Branch Details </li>
        </ol>
    </nav>
    <div class="col-lg-12 mb-4">
        <div class="row pl-3 pt-2">
            <div class="col-md-12">
                <h3>Audit List  Details</h3>
            </div>
        </div>
        <!-- Content here -->
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header bg-white pb-1">

                    <div class="btn-group mb-2" role="group" aria-label="Basic example">
                        @foreach($branch_details as $br)

                            <a href="/report-audit-details-branch-view/{{$br->audit_id}}/{{$br->branch_id}}"
                                @if($br->branch_id == $audit_details_id->branch_id )
                               class="btn btn-success d-block mb-2"
                            @else
                               class="btn btn-outline-success d-block mb-2"
                                    @endif
                            >{{$br->getBranch->name}}</a>
                        @endforeach
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Team Lead :</label>
                            <p>{{ isset($audit_info->getUser) ? $audit_info->getUser->name:'' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Audit Complete Date :</label>
                            <p>{{ isset($audit_info->compelted_date) ? $audit_info->compelted_date:'' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mb-4">
            <div class="card mt-2">
                <div class="card-body">
                    @if($audit_branch_execution_d != null)
                        <div class="form-row">
                            <div class="col-12">
                                <table class="table shadow-0">
                                    <thead>
                                    <th scope="col">#</th>
                                    <th scope="col">Module</th>
                                    <th scope="col">Total Records</th>
                                    <th scope="col">Verified</th>
                                    <th scope="col">Rejected</th>
                                    <th scope="col">Observation</th>
                                    <th scope="col"></th>
                                    </thead>
                                    <tbody>
                                    @foreach($audit_branch_execution_d as $key=> $audit_branch_execution)

                                        <tr>
                                        <td>{{$key+1}}</td>
                                        <td> {{ !empty($audit_branch_execution->module_id) ? $audit_branch_execution->module_id:'0' }}</td>

                                        <td> {{ !empty($audit_branch_execution->total_records) ? $audit_branch_execution->total_records:'0' }}</td>

                                        <td> {{ !empty($audit_branch_execution->verified) ? $audit_branch_execution->verified:'0' }}</td>

                                        <td> {{ !empty($audit_branch_execution->rejected) ? $audit_branch_execution->rejected:'0' }}</td>

                                        <td> {{ !empty($audit_branch_execution->observations) ? $audit_branch_execution->observations:'0' }}</td>

                                            <td><a href="{{route('report_audit_list_execution',['audit_id' => $audit_branch_execution->audit_id,'execution_id' =>$audit_branch_execution->id])}}">View Details</a> </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                    <p>Record Not Found</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
