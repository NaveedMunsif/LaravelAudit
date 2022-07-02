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
                                            <th scope="col">Project</th>
                                            <th scope="col">Disbursed Amount</th>
                                            <th scope="col">Fund Transferred</th>
                                            <th scope="col">Status</th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = $reconciliation_data->perPage() * ($reconciliation_data->currentPage() -1); ?>
                                        @foreach($reconciliation_data as $key=> $recon)
                                            <tr>
                                                <td>{{ $i+1 }}</td>
                                                <td>{{isset($recon->project) ? $recon->project : ''}}</td>
                                                <td>{{isset($recon->disbursed_amount) ? $recon->disbursed_amount : ''}}</td>
                                                <td>{{isset($recon->fund_transferred) ? $recon->fund_transferred : ''}}</td>
                                                <td>{{isset($recon->status) ? $recon->status : ''}}</td>
                                                <td></td>
                                            </tr>
                                            <?php $i++;?>
                                        @endforeach
                                        </tbody>

                                    </table>
                                    {{ $reconciliation_data->links() }}

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
