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
            <div class="col-lg-12">
                <div class="card" style="width: 78.5rem;">
                    <div class="card-header bg-white pb-1">
                        <h5>Create New Audit </h5>
                    </div>
                    <div class="card-body">
                        <form method="get" action="{{route('create_new_audit')}}">
                            @include('includes.forms.form_create_new_audit')
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mb-4">
                <form action="{{route('branch_audit_save')}}" method="get">
                    <div class="card mt-2">
                        <div class="card-body">
                            <table id="dynamic_field"  class="table shadow-0">
                                <thead class="border-0">
                                <tr>
                                    <th scope="col">Branch</th>
                                    <th scope="col">Visit Date</th>
                                    <th scope="col">Auditor</th>
                                    <th scope="col">Disbursed Cases</th>
                                    <th scope="col">Sample Selected</th>
                                    <th scope="col">No of Days Cases</th>
                                    <th scope="col">No of Days Branches</th>
                                    <th scope="col">Total Days</th>
                                    <th scope="col"></th>  <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                <tr>
                                                                <td>
                                                                    <select class="form-control" aria-label="branches" name="branches" id="branches for_branch" style="width: 10rem;">
                                                                        <option></option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                                                                        <input class="span2 datepicker
                                                                 form-control" size="16" id="for_visit_date" name="date_table" type="text"
                                                                               value="12-02-2012" style="width: 6rem !important;"/>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" aria-label="TeamLead" name="team_lead_table"
                                                                            id="for_auditor"  style="width: 10rem !important;" >
                                                                        <option selected>Select Team Lead</option>
                                                                        <option value="leasd">Adil</option>
                                                                        <option value="leasd">Ammar</option>
                                                                        <option value="leasd">Ader</option>
                                                                    </select>
                                                                </td>
                                                                <td><input type="number" class="form-control" id="for_disbursed_cases" name="t_for_disbursed_cases" /></td>
                                                                <td><input type="number" class="form-control" id="for_sample_selected" name="t_for_sample_selected" /></td>
                                                                <td><input type="number" class="form-control" id="for_no_of_days_cases" name="t_for_no_of_days_cases"/></td>
                                                                <td><input type="number" class="form-control" id="for_no_of_days_branches" name="t_for_no_of_days_branches" /></td>
                                                                <td><input type="number" class="form-control" id="for_total_days" name="t_for_total_days"/></td>
                                                                <td id="btns"><input type="button" class="btn btn-success det"  id="addbtn" value="Add"/></td>
                                                            </tr>
                            </table>
                            <input type="submit" class="btn btn-info" value="Create">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
