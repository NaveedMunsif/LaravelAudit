@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Audit Report</li>
        </ol>
    </nav>
    <div class="col-lg-12 mb-4">
        <div class="row pl-3 pt-2">
            <div class="col-md-12">
                <h3>Audit List</h3>
            </div>
        </div>
        <!-- Content here -->
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header bg-white pb-1">
                    <h5>Audit List </h5>
                </div>
                <div class="card-body">
                    <form method="get" action="{{route('field_audit_listing')}}">
                        @include('includes.forms.audit_serach_four_select')
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mb-4">
            <div class="card mt-2">
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                        </div>
                        <div class="col-md-6 mb-3 text-right">
                            <span data-href="/export-audit-report" id="export" class="btn btn-success btn-sm" onclick="exportTasks1(event.target);">Export to CSV</span>
                        </div>
                    </div>
                    <table class="table" id="">
                        @if (count($audit) > 0)
                            <thead class="border-0">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Region</th>
                                <th scope="col">Area</th>
                                <th scope="col">Expected Start Date</th>
                                <th scope="col">Period From</th>
                                <th scope="col">Period To</th>
                                <th scope="col">Team Lead</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $i = $audit->perPage() * ($audit->currentPage() -1); ?>

                            @foreach($audit as $Key => $a)

                                <tr>
                                    <td>{{ $i+1 }}</td>
                                    <td>{{ !empty($a->getRegion) ? $a->getRegion->name:'' }}</td>
                                    <td>{{ !empty($a->getArea) ? $a->getArea->name:'' }}</td>
                                    <td>{{ !empty($a->expected_start_date) ? $a->expected_start_date:'' }}</td>
                                    <td>{{ !empty($a->period_from) ? gmdate("Y-m-d", $a->period_from) :'' }}</td>
                                    <td>{{ !empty($a->period_to) ? gmdate("Y-m-d", $a->period_to):'' }}</td>
                                    <td>{{ !empty($a->getUser) ? $a->getUser->name:'' }}</td>
                                    <td>{{ !empty($a->status) ? ucfirst($a->status):'' }}</td>
                                    <td>
                                        <a href="{{route('report.audit_details_view',['id'=>$a->id])}}" class="btn btn-success mb-1">
                                            Details
                                        </a><br>
                                        <a href="{{route('audit_area_view',['id'=>$a->id])}}" class="btn btn-info mb-1">
                                            Area Report
                                        </a><br>
                                        <a href="{{route('report.audit_area_observation',['id'=>$a->area_id])}}" class="btn btn-primary">
                                            Observation
                                        </a>
                                    </td>
                                </tr>
                                <?php $i++;?>
                            @endforeach

                            </tbody>
                        @else
                            <p id="datanote">Record Not Found</p>
                        @endif


                    </table>

                    {{ $audit->links() }}

                </div>
            </div>
        </div>
    </div>
@endsection
