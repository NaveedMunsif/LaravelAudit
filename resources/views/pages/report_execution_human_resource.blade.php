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
                    <div class="row">
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
                                            <th scope="col">Employee Code</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Designation</th>
                                            <th scope="col">Found in ERP File</th>
                                            <th scope="col">Staus</th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = $human_resource_data->perPage() * ($human_resource_data->currentPage() -1); ?>
                                        @foreach($human_resource_data as $key=> $cutt)
                                            <tr>
                                                <td>{{ $i+1 }}</td>
                                                <td>{{isset($cutt->emp_code) ? $cutt->emp_code : ''}}</td>
                                                <td>{{isset($cutt->name) ? $cutt->name : ''}}</td>
                                                <td>{{isset($cutt->designation) ? $cutt->designation : '' }}</td>
                                                <td></td>
                                                <td>{{isset($cutt->status) ? $cutt->status : ''}}</td>

                                                <td></td>
                                            </tr>
                                            <?php $i++;?>
                                        @endforeach
                                        </tbody>

                                    </table>
                                    {{ $human_resource_data->links() }}

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
