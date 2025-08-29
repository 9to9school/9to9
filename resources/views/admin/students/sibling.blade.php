@foreach($studentdata as $data)
 <div class="row sibling-cont">
        <div class="col-lg-3 col-md-3">
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text"  class="form-control">
                <span class="text-danger error-sib_first_name"></span>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text"  class="form-control">
                <span class="text-danger error-sib_last_name"></span>
            </div>
        </div>
        <div class="col-lg-2 col-md-3">
            <div class="mb-3">
                <label class="form-label">Age</label>
                <select class="form-select w-100">
                    <option value="">Select</option>
                    ${ageOptions}
                </select>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="mb-3">
                <label class="form-label">Per Month Amount</label>
                <input type="text"  class="form-control" id="per_month_${siblingCounter}">  
                <input type="hidden" class="form-control" id="dis_amount_${siblingCounter}">  
                <input type="hidden"  class="form-control" id="ann_amount_${siblingCounter}">                                            
            </div>
        </div>  
        <div class="col-lg-2 col-md-3">
            <div class="mb-3">
                <label class="form-label">Gender</label>
                <div class="d-flex align-items-center">
                    <select  class="form-select w-100">
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                    <!-- <a href="javascript:void(0);" class="trash-icon ms-3 remove-sibling">
                        <i class="ti ti-trash-x"></i>
                    </a> -->
                </div>
                <span class="text-danger error-gender"></span>
            </div>
        </div>
    </div>
@endforeach