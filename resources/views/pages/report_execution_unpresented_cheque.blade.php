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
                                    <table class="table table-bordered mb-3">
                                        <thead class="border-2">
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Total Records</th>
                                            <th scope="col">Presented</th>
                                            <th scope="col">Unpresented</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                        </thead>
                                        <form id="excel-csv-import-form" action="{{ route('report.misImportCSV') }}" method="POST"  accept-charset="utf-8" enctype="multipart/form-data">
                                            @csrf
                                            <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>aaa</td>
                                                <td>aaa</td>
                                                <td>aaa</td>
                                                <td>
                                                    <input type="file" name="file" class="form-control" placeholder="Choose file">
                                                    @error('file')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                                <td><button class="btn btn-success">Import User Data</button></td>
                                            </tr>
                                            </tbody>
                                        </form>
                                    </table>
                                </div>
                                <div class="col-12 mt-3">
                                    <table class="table table-bordered">
                                        <thead class="border-2">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Cheque No</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = $audit_mis_data->perPage() * ($audit_mis_data->currentPage() -1); ?>
                                        @foreach($audit_mis_data as $key=> $mis)
                                            <tr>
                                                <td>{{ $i+1 }}</td>
                                                <td>{{$mis->cheque_no}}</td>
                                                <td></td>
                                            </tr>
                                            <?php $i++;?>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{ $audit_mis_data->links() }}
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
