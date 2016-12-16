<?php

include("connection.php");
if (isset($_POST['dc_data']) && isset($_POST['docu_title'])) {
    $dc_data = $_POST['dc_data'];
    $docu_title = $_POST['docu_title'];
    $check = $db->selectQuery("SELECT `document_id` FROM `sm_employee_documents` WHERE `document_title`='$docu_title' AND `document_data`='$dc_data'");
    if (count($check)) {
        $result = array("status" => "Value Exist!", "data_val" => "0", "color" => "red");
        echo json_encode($result);
    } else {
        $result = array("status" => "", "data_val" => "1", "color" => "green");
        echo json_encode($result);
    }
}
if (isset($_POST["incrmnt"])) {
    $incrmnt = $_POST['incrmnt'];
    $set = '    <div class="row">'
            . ' <div class="form-group col-md-4 mb-0">'
            . '     <input type="text" name="emp_docs[' . $incrmnt . '][document_title]" placeholder="Document title"  value="" class="form-control new_doc_title" style="">'
            . '    <input type="text" name="emp_docs[' . $incrmnt . '][document_data]" id="licence" placeholder="Document ID" class="form-control" placeholder=""/>'
            . '</div>'
            . '<div class="form-group col-md-4 mb-0">'
            . '    <label for="licence_start">Issue date: </label>'
            . '        <input type="text" name="emp_docs[' . $incrmnt . '][document_start_date]" class="form-control datepicker_recurring_start" placeholder=""/>'
            . '</div>'
            . '<div class="form-group col-md-4 mb-0">'
            . '    <label for="licence_end">Expiry date: </label>'
            . '        <input type="text" name="emp_docs[' . $incrmnt . '][document_end_date]"  class="form-control datepicker_recurring_start" placeholder=""/>'
            . '</div>'
            . '</div><p></p>';
    $in = $incrmnt + 1;
    $result = array('data_view' => $set, 'inVal' => $in);
    echo json_encode($result);
}
