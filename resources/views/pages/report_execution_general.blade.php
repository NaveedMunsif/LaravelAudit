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
                                            <th scope="col">Document</th>
                                            <th scope="col">Observation</th>
                                            <th scope="col">Remarks</th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = $audit_exe_observation->perPage() * ($audit_exe_observation->currentPage() -1); ?>
                                        @foreach($audit_exe_observation as $key=> $exe_ob)
                                            <tr>
                                                <td>{{ $i+1 }}</td>
                                                <td> {{ !empty($exe_ob->document) ? $exe_ob->document:'' }}</td>
                                                <td> {{ !empty($exe_ob->observation) ? $exe_ob->observation:'' }}</td>
                                                <td> {{ !empty($exe_ob->remarks) ? $exe_ob->remarks:'' }}</td>
                                            </tr>
                                            <?php $i++;?>
                                        @endforeach
                                        </tbody>

                                    </table>
                                    {{ $audit_exe_observation->links() }}
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

