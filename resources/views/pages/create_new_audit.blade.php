@extends('layouts.app')
@section('content')
    <div class="col-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create New Audit</li>
        </ol>
    </nav>
    <div class="col-12 mb-4">
        <div class="row pl-3 pt-2">
            <div class="col-md-12">
                <h3>Create Audit</h3>
            </div>
        </div>
        <!-- Content here -->
        <form action="{{route('create_new_audit_save')}}" method="get">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-white pb-1">
                    <h5>Create New Audit </h5>
                </div>
                <div class="card-body">

                        @include('includes.forms.form_create_new_audit')

                </div>
            </div>
        </div>
            <div class="col-lg-12 mb-4">

                <div class="card mt-2">
                    <div class="card-body" id="cardbody">
                        <p id="datanote">There is no data to display</p>
                    </div>
                </div>

            </div>
        </form>
        </div>
    </div>

@endsection
