@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">High Risk Summary Report</li>
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
                    <h5>High Risk Summary </h5>
                </div>
                <div class="card-body">
                    <form method="get" action="{{route('reports.high_risk_report_search')}}">
                        @include('includes.forms.form_one')
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mt-2">
                <div class="card-body">
                    <table class="table">
                        <thead class="border-0">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">observation</th>
                            <th scope="col">No of Instances</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if($observationall != null)

                        @foreach($observationall as $key => $observation)
                        <tr>

                            <th scope="row">{{$key+1}}</th>
                            <td>{{$observation->observation}}</td>
                            <td>{{$observation->total}}</td>
                        </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
