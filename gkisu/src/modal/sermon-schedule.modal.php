<div class="modal fade" tabIndex="-1" role="dialog" id="create-schedule-modal">
    <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered" role="document">
        <form class="form-horizontal" name="formSchedule" id="formSchedule" method="post" >
        <div class="modal-content">
            <div class="modal-header">
                <div class="spinner-grow" id="modalLoaderStatus" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <h5 class="modal-title" id="modalTitleLabel"><h3>New Schedule</h3></h5>
            
                <button type="button" class="close" data-dismiss="modal">
                <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="scheduleName" class="col-sm-2 col-form-label">Schedule Name</label>
                    <div class="col-sm-3">
                        <input type="text" name="scheduleName" id="scheduleName" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pickupStartDate" class="col-sm-2 col-form-label">Start Date</label>
                    <div class="input-group date col-sm-3" id="pickupStartDate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#pickupStartDate"/>
                        <div class="input-group-append" data-target="#pickupStartDate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    <label for="pickupTime" class="col-sm-2 col-form-label ml-5 ">End Date</label>
                    <div class="input-group date col-sm-3" id="pickupEndDate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#pickupEndDate"/>
                        <div class="input-group-append" data-target="#pickupEndDate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pickupTime" class="col-sm-2 col-form-label">Time</label>
                    <div style="overflow:hidden;" class="col-sm-5">
                        <div id="pickupTime"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="selectInterval" class="col-sm-2 col-form-label">Interval</label>
                    <div class="col-sm-3">
                        <select class="form-control" name="selectInterval" id="selectInterval">
                            <option value="weekly" selected="selected">weekly</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group row">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <div class="form-group row mt-10">
                    <div class="col-sm-12 collapse" id="displayStatus"></div>
                </div>
            </div>

        </div>
        </form>
    </div>
</div>
