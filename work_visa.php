<?php
if (isset($_POST['type'])) {
    $type = $_POST['type'];
    if ($type == "work") {
        ?>
        <div class="row">
            <div class="form-group col-md-4 mb-0">
                <label for="insurance">Visa: </label>
                <input type="text" name="emp_docs[3][document_title]" readonly="" id="visa" class="form-control"    placeholder=""/>
            </div>
            <div class="form-group col-md-4 mb-0">
                <label for="insurance_start">Start date: </label>
                <div class='input-group datepicker' data-format="L">
                    <input type="text" name="emp_docs[3][document_start_date]" id="visa_start" class="form-control"    placeholder=""/>
                    <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                </div>
            </div>
            <div class="form-group col-md-4 mb-0">
                <label for="insurance_end">End date: </label>
                <div class='input-group datepicker' data-format="L">
                    <input type="text" name="emp_docs[3][document_end_date]" id="visa_end" class="form-control"    placeholder=""/>
                    <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4 mb-0">
                <label for="insurance">Passport: </label>
                <input type="text" name="emp_docs[4][document_title]" readonly="" id="passport" class="form-control"    placeholder=""/>
            </div>
            <div class="form-group col-md-4 mb-0">
                <label for="insurance_start">Start date: </label>
                <div class='input-group datepicker' data-format="L">
                    <input type="text" name="emp_docs[4][document_start_date]" id="passport_start" class="form-control"    placeholder=""/>
                    <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                </div>
            </div>
            <div class="form-group col-md-4 mb-0">
                <label for="insurance_end">End date: </label>
                <div class='input-group datepicker' data-format="L">
                    <input type="text" name="emp_docs[4][document_end_date]" id="passport_end" class="form-control"    placeholder=""/>
                    <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                </div>
            </div>
        </div>
        <?php
    }
}
if (isset($_POST['type']) && isset($_POST['depend_num'])) {
    $type1 = $_POST['type'];
    if ($type1 == "resid") {
        $depend_num = $_POST['depend_num'];
        ?>
        <div class="row">
            <div class="form-group col-md-4 mb-0">
                <input type="text" name="emp_docs[3][document_title]" readonly="" value="Visa"  class="form-control addt_text" style="background-color: #fff; cursor: default;">
                <input type="text" name="emp_docs[3][document_data]" id="visa" class="form-control"    placeholder=""/>
            </div>
            <div class="form-group col-md-4 mb-0">
                <label for="insurance_start">Start date: </label>
                <div class='input-group datepicker' data-format="L">
                    <input type="text" name="emp_docs[3][document_start_date]" id="visa_start" class="form-control"    placeholder=""/>
                    <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                </div>
            </div>
            <div class="form-group col-md-4 mb-0">
                <label for="insurance_end">End date: </label>
                <div class='input-group datepicker' data-format="L">
                    <input type="text" name="emp_docs[3][document_end_date]" id="visa_end" class="form-control"    placeholder=""/>
                    <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4 mb-0">
                <input type="text" name="emp_docs[4][document_title]" readonly="" value="Passport"  class="form-control addt_text" style="background-color: #fff; cursor: default;">
                <input type="text" name="emp_docs[4][document_data]" id="passport" class="form-control"    placeholder=""/>
            </div>
            <div class="form-group col-md-4 mb-0">
                <label for="insurance_start">Start date: </label>
                <div class='input-group datepicker' data-format="L">
                    <input type="text" name="emp_docs[4][document_start_date]" id="passport_start" class="form-control"    placeholder=""/>
                    <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                </div>
            </div>
            <div class="form-group col-md-4 mb-0">
                <label for="insurance_end">End date: </label>
                <div class='input-group datepicker' data-format="L">
                    <input type="text" name="emp_docs[4][document_end_date]" id="passport_end" class="form-control"    placeholder=""/>
                    <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4 mb-0">
                <h4><strong>Dependance Details:</strong> </h4>
            </div>
        </div>
        <fieldset class="fieldset">
            <?php
            if ($depend_num != 0) {
                for ($i = 0; $i < $depend_num; $i++) {
                    ?>
                    <div class="row">
                        <div class="form-group col-md-3 mb-0">
                            <label for="depen_name<?php echo $i; ?>">Dependance<?php echo $i; ?> Name: </label>
                            <input type="text" name="depen[<?php echo $i; ?>][dependant_name]" id="depen_name<?php echo $i; ?>" class="form-control"    placeholder=""/>
                        </div>
                        <div class="form-group col-md-3 mb-0">
                            <label for="depen_visa<?php echo $i; ?>">Visa ID: </label>
                            <input type="text" name="depen[<?php echo $i; ?>][dependant_visa]" id="depen_visa<?php echo $i; ?>" class="form-control"    placeholder=""/>
                        </div>
                        <div class="form-group col-md-3 mb-0">
                            <label for="depen_start<?php echo $i; ?>">Start date: </label>
                            <div class='input-group datepicker' data-format="L">
                                <input type="text" name="depen[<?php echo $i; ?>][dependant_visa_start]" id="depen_start<?php echo $i; ?>" class="form-control date_pic"    placeholder=""/>
                                <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                            </div>
                        </div>
                        <div class="form-group col-md-3 mb-0">
                            <label for="depen_end<?php echo $i; ?>">End date: </label>
                            <div class='input-group datepicker' data-format="L">
                                <input type="text" name="depen[<?php echo $i; ?>][dependant_visa_end]" id="depen_end<?php echo $i; ?>" class="form-control"    placeholder=""/>
                                <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 mb-0">
                            <label for="depen_pass<?php echo $i; ?>">Passport Number: </label>
                            <input type="text" name="depen[<?php echo $i; ?>][dependant_pass]" id="depen_pass<?php echo $i; ?>" class="form-control"    placeholder=""/>
                        </div>
                        <div class="form-group col-md-4 mb-0">
                            <label for="depen_pass_start<?php echo $i; ?>">Start date: </label>
                            <div class='input-group datepicker' data-format="L">
                                <input type="text" name="depen[<?php echo $i; ?>][dependant_pass_start]" id="depen_pass_start<?php echo $i; ?>" class="form-control"    placeholder=""/>
                                <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                            </div>
                        </div>
                        <div class="form-group col-md-4 mb-0">
                            <label for="depen_pass_end<?php echo $i; ?>">End date: </label>
                            <div class='input-group datepicker' data-format="L">
                                <input type="text" name="depen[<?php echo $i; ?>][dependant_pass_end]" id="depen_pass_end<?php echo $i; ?>" class="form-control"    placeholder=""/>
                                <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                            </div>
                        </div>
                    </div>
                    <hr class="line-dashed line-full">
                    <?php
                }
            }
            ?>
        </fieldset>
        <?php
    }
    ?>
    <script src="assets/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="assets/js/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="assets/js/vendor/jRespond/jRespond.min.js"></script>
    <script src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>
    <script src="assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>
    <script src="assets/js/vendor/screenfull/screenfull.min.js"></script>
    <script src="assets/js/vendor/parsley/parsley.min.js"></script>
    <script src="assets/js/vendor/form-wizard/jquery.bootstrap.wizard.min.js"></script>
    <script src="assets/js/vendor/daterangepicker/moment.min.js"></script>
    <script src="assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <?php
}
?>