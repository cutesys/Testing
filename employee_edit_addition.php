<?php

if (isset($_POST["doc"])) {
    $incrmnt = $_POST['incrmnt'];
    $set = '   <div class="parent_div"><div class="row">
                                                        <div class="form-group col-sm-4">
                                                            <input type="text" name="emp_docs[' . $incrmnt . '][document_title]" value="" placeholder="Document Title"  class="new_doc_title form-control">
                                                            <input type="text" name="emp_docs[' . $incrmnt . '][document_data]" value="" id="<?php echo $editid; ?>" class="form-control" >
                                                        </div>
                                                        <div class="form-group col-md-4 mb-0">
                                                            <label for="licence_end">Commencing date: </label>
                                                                <input type="text" name="emp_docs[' . $incrmnt . '][document_start_date]" value="" class="form-control datepickerx" >
                                                        </div>
                                                        <div class="form-group col-md-4 mb-0">
                                                            <label for="licence_end">End date: </label>
                                                                <input type="text" name="emp_docs[' . $incrmnt . '][document_end_date]" value=""  class="form-control datepickerx" >
                                                         </div>
                                                    </div></div><p></p>';
    $in = $incrmnt + 1;
    $result = array('data_view' => $set, 'inVal' => $in);
    echo json_encode($result);
}