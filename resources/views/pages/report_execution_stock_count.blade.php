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

                                </div>
                                <div class="col-12 mt-3">
                                    <table class="table table-bordered">
                                        <thead class="border-2">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Project</th>
                                            <th scope="col">Branch</th>
                                            <th scope="col">Item</th>
                                            <th scope="col">Issued Qty</th>
                                            <th scope="col">Issued From</th>
                                            <th scope="col">Issued To</th>
                                            <th scope="col">Received Qty</th>
                                            <th scope="col">Received From (Serial No.)</th>
                                            <th scope="col">Received To (Serial No.)</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Returned (Serial From)</th>
                                            <th scope="col">Returned (Serial To)</th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = $stock_count_data->perPage() * ($stock_count_data->currentPage() -1); ?>
                                        @foreach($stock_count_data as $key=> $stock)
                                            <tr>
                                                <td>{{ $i+1 }}</td>
                                                <td>{{isset($stock->project) ? $stock->project : ''}}</td>
                                                <td>{{isset($stock->branch_id) ? $stock->branch_id : ''}}</td>
                                                <td>{{isset($stock->item) ? $stock->item : ''}}</td>
                                                <td>{{isset($stock->issued_qty) ? $stock->issued_qty : ''}}</td>
                                                <td>{{isset($stock->issued_from) ? $stock->issued_from : ''}}</td>
                                                <td>{{isset($stock->issued_to) ? $stock->issued_to : ''}}</td>
                                                <td>{{isset($stock->received_qty) ? $stock->received_qty : ''}}</td>
                                                <td>{{isset($stock->serial_from) ? $stock->serial_from : ''}}</td>
                                                <td>{{isset($stock->serial_to) ? $stock->serial_to : ''}}</td>
                                                <td>{{isset($stock->status) ? $stock->status : ''}}</td>
                                                <td>{{isset($stock->returned_serial_from) ? $stock->returned_serial_from : ''}}</td>
                                                <td>{{isset($stock->returned_serial_to) ? $stock->returned_serial_to : ''}}</td>
                                                <td></td>
                                            </tr>
                                            <?php $i++;?>
                                        @endforeach
                                        </tbody>

                                    </table>
                                    {{ $stock_count_data->links() }}
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
