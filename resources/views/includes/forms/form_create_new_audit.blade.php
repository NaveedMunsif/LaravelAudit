<div class="form-row">
    <div class="col-md-4 mb-3">
        <label>Regions</label>
        <select class="form-control browser-default custom-select" name="regions" id="regions" required>
            @foreach($all_regions as $key => $region)
                <option value="{{$region->id}}">{{$region->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4 mb-3">
        <label>Areas</label>
        <select class="form-control areaid" aria-label="areas" name="areas" id="areas" required>
            <option></option>
        </select>
    </div>
    <div class="col-md-4 mb-3">
        <label>Expected Start Date</label>
        <input type="text" class="form-control" name="main_expected_start_date"  id="datepicker1" required>
{{--        <div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">--}}
{{--            <input class="span2 datepicker form-control" size="16" name="date" type="text" value="12-02-2012" required />--}}
{{--        </div>--}}
    </div>
</div>
<div class="form-row">
    <div class="col-md-4 mb-3">
        <label>Audit Year</label>
        <select class="form-control" id="audit_year" aria-label="Audit Year" name="audit_year" required>
            <option selected>Select Year</option>
            <option value="2017-2018">2017-2018</option>
            <option value="2018-2019">2018-2019</option>
            <option value="2019-2020">2019-2020</option>
            <option value="2020-2021">2020-2021</option>
            <option value="2021-2022">2021-2022</option>
        </select>
    </div>
    <div class="col-md-4 mb-3">
        <label>Audit Period</label>
        <select class="form-control" aria-label="Audit-Period" name="audit_period" id="audit_period" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
    </div>
    <div class="col-md-4 mb-3">
        <label>Period Form</label>
        <select id="audit_period_form" class="form-control" name="audit_period_from" required>
            <option value="">Select Period From</option>
            <option value="1606780800">December-2020</option>
            <option value="1609459200">January-2021</option>
            <option value="1612137600">February-2021</option>
            <option value="1614556800">March-2021</option>
            <option value="1617235200">April-2021</option>
            <option value="1619827200">May-2021</option>
            <option value="1622505600">June-2021</option>
            <option value="1625097600">July-2021</option>
            <option value="1627776000">August-2021</option>
            <option value="1630454400">September-2021</option>
            <option value="1633046400">October-2021</option>
            <option value="1635724800">November-2021</option>
            <option value="1638316800">December-2021</option>
            <option value="1640995200">January-2022</option>
            <option value="1643673600">February-2022</option>
            <option value="1646092800">March-2022</option>
            <option value="1648771200">April-2022</option>
            <option value="1651363200">May-2022</option>
        </select>
    </div>
</div>
<div class="form-row">
    <div class="col-md-4 mb-3">
        <label>Period To</label>
        <select id="" class="form-control" name="audit_period_to" required>
            <option value="">Select Period From</option>
            <option value="1606780800">December-2020</option>
            <option value="1609459200">January-2021</option>
            <option value="1612137600">February-2021</option>
            <option value="1614556800">March-2021</option>
            <option value="1617235200">April-2021</option>
            <option value="1619827200">May-2021</option>
            <option value="1622505600">June-2021</option>
            <option value="1625097600">July-2021</option>
            <option value="1627776000">August-2021</option>
            <option value="1630454400">September-2021</option>
            <option value="1633046400">October-2021</option>
            <option value="1635724800">November-2021</option>
            <option value="1638316800">December-2021</option>
            <option value="1640995200">January-2022</option>
            <option value="1643673600">February-2022</option>
            <option value="1646092800">March-2022</option>
            <option value="1648771200">April-2022</option>
            <option value="1651363200">May-2022</option>
        </select>
    </div>
    <div class="col-md-4 mb-3">
        <label>Team Lead</label>
        <select class="form-control" aria-label="TeamLead" id="main_team_lead" name="team_lead" required>
            <option selected>Select Team Lead</option>
            @foreach($all_users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
            {{--            @foreach($all_observation as $observation)--}}
            {{--
            <option value="{{$observation->id}}">{{$observation->name}}</option>
            --}}
            {{--            @endforeach--}}
        </select>
    </div>
    <div class="col-md-4 mb-3">
        <label>Extra Days</label>
        <input type="number" name="main_extra_days" class="form-control" id="extradays1" required>
    </div>
</div>
<div class="form-row">
    <div class="col-md-4 mb-3">
        <label>Planned Leaves</label>
        <input type="number" name="main_planned_leaves" class="form-control" id="planedleaves2" required>
    </div>
    <div class="col-md-4 mb-3">
        <label>Total Days</label>
        <input type="number" name="main_total_days" class="form-control" id="totaldays">
    </div>
</div>
<div class="form-row">
    <div class="col-md-6 mb-3">
    </div>
    <div class="col-md-6 mb-3 text-right">
{{--        <input type="submit" class="btn btn-primary" value="Search">--}}
    </div>
</div>
