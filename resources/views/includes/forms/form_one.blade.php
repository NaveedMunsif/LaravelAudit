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
        <select class="form-control" aria-label="areas" name="areas" id="report_areas">
            <option></option>
        </select>
    </div>
    <div class="col-md-4 mb-3">
        <label>Branch</label>
        <select class="form-control" aria-label="branches" name="branches" id="report_branches">
            <option></option>
        </select>
    </div>
</div>
<div class="form-row">
    <div class="col-md-4 mb-3">
        <label>Audit Year</label>
        <select class="form-control" aria-label="Audit Year" name="audit_year" required>
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
        <select class="form-control" aria-label="Audit-Period" name="audit_period" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
    </div>
    <div class="col-md-4 mb-3">
        <label>Risk Levels</label>
        <select class="form-control" aria-label="Risks-Leavel" name="risks_levels">
            <option selected>Select Risk Leavels</option>
            <option value="1">Low</option>
            <option value="2">Medium</option>
            <option value="3">High</option>
        </select>
    </div>
</div>
<div class="form-row">
    <div class="col-md-4 mb-3">
        <label>Observation Categories</label>
        <select class="form-control" aria-label="Risk Categories" name="observation_categories">
            <option selected>Risk Categories</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
    </div>
    <div class="col-md-4 mb-3">
        <label>Observations</label>
        <select class="form-control" aria-label="Observations" name="observations">
            <option selected>Select Observation</option>
            @foreach($all_observation as $observation)
                <option value="{{$observation->id}}">{{$observation->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4 mb-3">
        <label>Risk Categories</label>
        <select class="form-control" aria-label="Risk Categories" name="risk_categories">
            <option selected>All Risk Categories</option>
            @foreach($all_observation as $observation)
                <option value="{{$observation->id}}">{{$observation->category}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-row">
    <div class="col-md-6 mb-3">
    </div>
    <div class="col-md-6 mb-3 text-right">
        <input type="submit" class="btn btn-primary" value="Search">
    </div>
</div>
