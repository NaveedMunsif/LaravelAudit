@extends('layouts.app')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{route('reports.audit_report_list')}}">
                    Audit Reports
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
                            <a href="/report-audit-details-branch-view/{{$br->audit_id}}/{{$br->branch_id}}" class="btn btn-outline-success d-block mb-2">{{$br->getBranch->name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
