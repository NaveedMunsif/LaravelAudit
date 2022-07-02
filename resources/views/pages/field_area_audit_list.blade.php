@extends('layouts.app')
@section('content')

    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">View Audit</li>
            </ol>
        </nav>
        <div class="col-12 mb-4">
            <div class="row pl-3 pt-2">
                <div class="col-md-12">
                    {{--
                    <h3>View Audit</h3>
                    --}}
                </div>
            </div>
            <!-- Content here -->
            <div class="col-lg-12 mb-4">
                <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-header bg-white pb-1">
                        <h5>View Audit </h5>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label id="fontweight">Auit Structure Information</label>
                                <table class="table shadow-0">
                                    <tbody>
                                    <tr>
                                        <td id="fontweight bord" style="border-top: none !important;" >Type</td>
                                        <td style="border-top: none !important;">{{ isset($audit_data->type) ? ucfirst($audit_data->type): 'Not found' }}</td>
                                    </tr>
                                    <tr>
                                        <td id="fontweight">Region</td>
                                        <td>{{ isset($audit_data->getRegion) ? $audit_data->getRegion->name: 'Not found' }}</td>
                                    </tr>
                                    <tr>
                                        <td id="fontweight">Area</td>
                                        <td>{{ isset($audit_data->getArea) ? $audit_data->getArea->name: 'Not found' }}</td>
                                    </tr>
                                    <tr>
                                        <td id="fontweight">Extra Days</td>
                                        <td>{{ isset($audit_data->extra_days) ? $audit_data->extra_days: 'Not found' }}</td>
                                    </tr>
                                    <tr>
                                        <td id="fontweight">Total Days</td>
                                        <td>{{ isset($audit_data->total_days) ? $audit_data->total_days: 'Not found' }}</td>
                                    </tr>
                                    <tr>
                                        <td id="fontweight">Required Days</td>
                                        <td>{{ isset($audit_data->required_days) ? $audit_data->required_days: 'Not found' }}</td>
                                    </tr>
                                    <tr>
                                        <td id="fontweight">Planned Leaves</td>
                                        <td>{{ isset($audit_data->planned_leaves) ? $audit_data->planned_leaves: 'Not found' }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label id="fontweight">Audit Information</label>
                                <table class="table shadow-0">
                                    <tbody>
                                    <tr>
                                        <td id="fontweight bord" style="border-top: none !important;">Expected Start Date</td>
                                        <td style="border-top: none !important;">{{ isset($audit_data->expected_start_date) ? $audit_data->expected_start_date: 'Not found' }}</td>
                                    </tr>
                                    <tr>
                                        <td id="fontweight">Expected Completion Date</td>
                                        <td>{{ isset($audit_data->completed_date) ? $audit_data->completed_date: 'Not found' }}</td>
                                    </tr>
                                    <tr>
                                        <td id="fontweight">Audit Period</td>
                                        <td>{{ isset($audit_data->audit_period) ? $audit_data->audit_period: 'Not found' }}</td>
                                    </tr>
                                    <tr>
                                        <td id="fontweight">Period From</td>
                                        <td>{{ isset($audit_data->period_from) ? gmdate("Y-m-d", $audit_data->period_from): 'Not found' }}</td>
                                    </tr>
                                    <tr>
                                        <td id="fontweight">Period To</td>
                                        <td>{{ isset($audit_data->period_to) ? gmdate("Y-m-d", $audit_data->period_to): 'Not found' }}</td>
                                    </tr>
                                    <tr>
                                        <td id="fontweight">Status</td>
                                        <td>{{ isset($audit_data->status) ? ucfirst($audit_data->status): 'Not found' }}</td>
                                    </tr>
                                    <tr>
                                        <td id="fontweight">Sample Cases</td>
                                        <td>   @if($branches_audit_details != null){{$branches_audit_details->sum('sample_selected')}}@endif</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label id="fontweight">Audit Team</label>
                                <table class="table shadow-0">
                                    <tbody>
                                    <tr>
                                        <td id="fontweight" style="border-top: none !important;">Team Lead</td>
                                        <td style="border-top: none !important;">{{ isset($audit_data->getUser) ? $audit_data->getUser->name: 'Not found' }}</td>
                                    </tr>
                                    <tr>

                                        @if($branches_audit_details != null)
                                            <td id="fontweight">Member</td>
                                            @foreach($branches_audit_details as $b)
                                                <td>{{ isset($b->getUser) ? $b->getUser->name: '' }}</td>
                                            @endforeach
                                        @endif
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
                </div>
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-header bg-white pb-1">
                        <h5>Audit Details </h5>
                    </div>
                    <div class="card-body">
                        @if($branches_audit_details != null)
                        <table class="table shadow-0">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Branch</th>
                                <th scope="col">Visit Date</th>
                                <th scope="col">Auditor</th>
                                <th scope="col">Disbursed Cases</th>
                                <th scope="col">Sample Selected</th>
                                <th scope="col">No of Days Cases</th>
                                <th scope="col">Total Days</th>
                            </tr>
                            </thead>

                            @foreach($branches_audit_details as $key => $branch)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{ isset($branch->getBranch) ? $branch->getBranch->name: 'Not found' }}</td>
                                    <td>{{ isset($branch->visit_date) ? $branch->visit_date: 'Not found' }}</td>
                                    <td>{{ isset($branch->getUser) ? $branch->getUser->name: 'Not found' }}</td>
                                    <td>{{ isset($branch->disbursed_cases) ? $branch->disbursed_cases: 'Not found' }}</td>
                                    <td>{{ isset($branch->sample_selected) ? $branch->sample_selected: 'Not found' }}</td>
                                    <td>{{ isset($branch->no_of_days_cases) ? $branch->no_of_days_cases: 'Not found' }}</td>
                                    <td>{{ isset($branch->total_days) ? $branch->total_days: 'Not found' }}</td>
                                </tr>

                            @endforeach

                            </tbody>

                        </table>

                        @else
                            <p id="datenote" style="  display: flex;
       align-items: center;
       justify-content: center;">Record not Found</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection
