<div class="col-12">
    <div class="form-row">
        <div class="col-md-3 mb-3">

            <label class="font-weight-bold">Module :</label>
            <p>{{ !empty($audit_details) ? $audit_details->module_id:'' }}</p>
        </div>
        <div class="col-md-3 mb-3">
            <label class="font-weight-bold">Area Name :</label>
            <p>{{ !empty($audit_details) ? $audit_details->getArea->name:'' }}</p>

        </div>
        <div class="col-md-3 mb-3">
            <label class="font-weight-bold">Auditor Name :</label>
            <p>{{ !empty($audit_details->getUser->name) ? $audit_details->getUser->name:'' }}</p>

        </div>
        <div class="col-md-3 mb-3">
            <label class="font-weight-bold">Audit Period :</label>
            <p>{{ !empty($audit_details) ? $audit_details->audit_period:'' }}</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">

    </div>
    <div class="col-6 text-right mb-3">

        <button type="button" class="btn btn-info">Total :   {{ !empty($audit_execution_details->total_records) ? $audit_execution_details->total_records:'0' }}</button>
        <button type="button" class="btn btn-ligh">Observation :   {{ !empty($audit_execution_details->observations) ? $audit_execution_details->observations:'0' }}</button>
        <button type="button" class="btn btn-danger">Rejected :   {{ !empty($audit_execution_details->rejected) ? $audit_execution_details->rejected:'0' }}</button>
        <button type="button" class="btn btn-success">Verified :  {{ !empty($audit_execution_details->verified) ? $audit_execution_details->verified:'0' }}</button>
    </div>
</div>
