@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{route('reports.audit_report_list')}}">
                    Audit Report
                </a></li>
            <li class="breadcrumb-item active" aria-current="page">Audit Area Observation List </li>
        </ol>
    </nav>
    <div class="col-lg-12 mb-4">
        <div class="row pl-3 pt-2">
            <div class="col-md-12">
                <h3>Area Observation List</h3>
            </div>
        </div>
        <!-- Content here -->
        <div class="col-lg-12 mb-4">
            <div class="card mt-2">
                <div class="card-header bg-white pb-1">
                    <div class="btn-group mb-2" role="group" aria-label="Basic example">
               <h5>Observation List</h5>
                    </div>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">

                        </div>

                        <div class="col-6 text-right mb-3">
                            <button type="button" class="btn btn-info">Sample File</button>
                            <button type="button" class="btn btn-success">Add</button>
                            <span data-href="export-area-observation-report/{{$audit_area_observation->first()->area_id}}"  class="btn btn-primary" onclick="exportTasks3(event.target);">Export Observation</span>
{{--                            <span data-href="{{url('export_area_observation',$audit_area_observation->first()->area_id)}}"  class="btn btn-primary" onclick="exportTasks3(event.target);">Export Observation</span>--}}
                        </div>
                    </div>

                    @if($audit_area_observation != null)
                        <div class="form-row">
                            <div class="col-12">
                                <table class="table shadow-0">
                                    <thead>
                                    <th scope="col">#</th>
                                    <th scope="col">Document</th>
                                    <th scope="col">Observation</th>
                                    <th scope="col">Risk Level</th>
                                    <th scope="col">Module</th>
                                    <th scope="col">Record</th>
                                    </thead>
                                    <tbody>
                                    <?php $i = $audit_area_observation->perPage() * ($audit_area_observation->currentPage() -1); ?>
                                    @foreach($audit_area_observation as $key=> $a)
                                        <tr>
                                            <td>{{ $i+1 }}</td>
                                            <td> {{ !empty($a->document) ? $a->document:'' }}</td>

                                            <td> {{ !empty($a->observation) ? $a->observation:'' }}</td>

                                            <td> {{ !empty($a->risk_level) ? $a->risk_level:'' }}</td>
                                            <td> {{ !empty($a->type) ? $a->type:'' }}</td>

                                            <td> {{ !isset($a->count) ? $a->count:'0' }}</td>
                                        </tr>
                                        <?php $i++;?>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $audit_area_observation->links() }}
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
