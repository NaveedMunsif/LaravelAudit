@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Risk Wise Report</li>
        </ol>
    </nav>
    <div class="col-lg-12">
        <div class="row pl-3 pt-2">
            <div class="col-md-12">
                <h3>Audit Report</h3>
            </div>
        </div>
        <!-- Content here -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-white pb-1">
                    <h5>Risk Wise Report</h5>
                </div>
                <div class="card-body">
                    <form method="get" action="{{route('reports.risk_wise_report')}}">
                        @include('includes.forms.form_one')
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mt-2">
                <div class="card-body">
           @if($area_observation != null || $branch_observation != null)
                        <table id="basic" class="table border-1">
                            @if($data_check == "region_three")
                                <thead>
                                <tr data-node-id="Reg-{{$area_observation->first()->region_id}}">
                                    <td><a href="#">{{isset($area_observation->first()->getRegion)?$area_observation->first()->getRegion->name:$branch_observation[0][0]->getRegion->name}}</a></td>
                                    <td>{{$area_observation->sum('area_instance_count')}}</td>
                                </tr>
                                </thead>
                                @foreach($area_observation as  $area)
                                    <tbody>
                                    <tr data-node-id="A-{{$area->area_id}}" data-node-pid="Reg-{{$area->region_id}}">
                                        <td><a href="#">{{isset($area->getArea)?$area->getArea->name:$area_observation->first()->getArea->name}}</a></td>
                                        <td>{{$area->area_instance_count}}</td>
                                    </tr>
                                    @foreach($branch_observation as $key => $branch)
                                        @foreach($branch as $b)
                                            @if($b->area_id == $area->area_id)
                                                <tr data-node-id="B-{{$b->branch_id}}" data-node-pid="A-{{$area->area_id}}">
                                                    <td><a href="#">{{isset($b->getBranch)?$b->getBranch->name:$branch->first()->getArea->name}}</a></td>
                                                    <td>{{$b->branch_instance_count}}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                @endforeach
{{--                            @elseif($data_check == "area_two" || $data_check == "branch_one")--}}
                            @else


                                    @if (count($branch_observation) > 0)
                                <tbody>
                                <tr data-node-id ="{{$branch_observation->first()->region_id}}" data-node-pid="">
                                    <td><a href="#">{{isset($branch_observation->first()->getRegion)?$branch_observation->first()->getRegion->name:'Region'}}</a></td>
                                    <td>{{$region_total_count->region_instance_count}}</td>
                                </tr>
                                <tr data-node-id ="{{$branch_observation->first()->area_id}}" data-node-pid="{{$branch_observation->first()->region_id}}">
                                    <td><a href="#">{{isset($branch_observation->first()->getArea)?$branch_observation->first()->getArea->name:'Area'}}</a></td>
                                    <td>{{$area_total_count->area_instance_count}}</td>
                                </tr>
                                @foreach($branch_observation as $branch)
                                    <tr data-node-id ="{{$branch->branch_id}}" data-node-pid="{{$branch->area_id}}">
                                        <td><a href="#">{{isset($branch->getBranch)?$branch->getBranch->name:$branch_observation->first()->getArea->name}}</a></td>
                                        <td>{{$branch->branch_instance_count}}</td>
                                    </tr>
                                @endforeach
                    @else
                        <p id="#datanote" style="display: flex;align-items: center;justify-content: center;">Record not found</p>

                    @endif


                    @endif

               @endif
                </div>
            </div>
        </div>
    </div>
@endsection
