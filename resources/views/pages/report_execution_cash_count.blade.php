@extends('layouts.app')
@section('content')

    @if (\Session::has('success'))

        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{route('reports.audit_report_list')}}">
                    Audit Report
                </a> </li>
            <li class="breadcrumb-item active" aria-current="page">Audit Execute </li>
        </ol>
    </nav>
    <div class="col-lg-12 mb-4">
        <div class="row pl-3 pt-2">
            <div class="col-md-12">
                <h3>Execute Audit</h3>
            </div>
        </div>
        <!-- Content here -->
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-body">
                    @include('includes.forms.execution_report_summary')
                    <div class="row">
                        <div class="col-6">
                        </div>
                        <div class="col-6 text-right mb-3">
                            <button type="button" class="btn btn-info">Comment</button>
                            <a href="{{url('export-excel-csv-file/csv')}}" class="btn btn-success">Export</a>
                        </div>
                    </div>
                    <div class="row col-12">
                        <div class="col-3">
                            @include('includes.forms.execution_list')
                        </div>
                        <div class="col-9 mb-3">
                            <div class="row">
                                <div class=" col-12 mb-3">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">As Per Register</th>
                                            <th scope="col">As Per Physical</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cash_count_data as $key => $cash)
                                        <tr>
                                            <th scope="row">{{$key+1}}</th>
                                            <td>{{isset($cash->type) ? $cash->type:''}}</td>
                                            <td>{{isset($cash->as_per_physical) ? $cash->as_per_physical: ''}}</td>
                                            <td>{{isset($cash->as_per_register) ? $cash->as_per_register: ''}}</td>
                                            <td>{{isset($cash->created_at) ? $cash->created_at: ''}}</td>
                                            <td>{{isset($cash->staus) ? $cash->staus: ''}}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                <div class="col-12 mt-3">
                                    <table class="table shadow-0">
                                        <thead>
                                        <tr>
                                            <th scope="col">Type</th>
                                            <th scope="col">As Per Register</th>
                                            <th scope="col">As Per Physical</th>
                                            <th scope="col">Difference</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">Petty Cash</th>
                                            <td>{{isset($petty_amount_register) ? $petty_amount_register : ''}}</td>
                                            <td>{{isset($petty_amount_physical) ? $petty_amount_physical : ''}}</td>
                                            <td>{{$petty_amount_register - $petty_amount_physical }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Recovery/Mdp/Operations</th>
                                            <td>{{isset($rmo_amount_register) ? $rmo_amount_register : ''}}</td>
                                            <td>{{isset($rmo_amount_physical) ? $rmo_amount_physical : ''}}</td>
                                            <td>{{$rmo_amount_register - $rmo_amount_physical}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Total</th>
                                            <td>{{isset($total_as_per_register) ? $total_as_per_register : ''}}</td>
                                            <td>{{isset($total_as_per_physical) ? $total_as_per_physical : ''}}</td>
                                            <td>{{$total_as_per_register - $total_as_per_physical}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
