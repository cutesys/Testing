<?php

include("connection.php");
if (isset($_POST["doc"])) {
    $incrmnt = $_POST['incrmnt'];
    $set = '    <div class="row">'
            . '        <div class="form-group col-md-3 mb-0">'
            . '            <input type="text" name="docs[' . $incrmnt . '][doc_title]" value="" placeholder="Document Title"  class="form-control new_doc_title">'
            . '            <input type="text" name="docs[' . $incrmnt . '][doc_data]" id="cr" placeholder="Document ID" class="form-control" >'
            . '        </div>'
            . '        <div class="form-group col-md-3 mb-0">'
            . '            <label for="pr-name">Owner: </label>'
            . '            <input type="text" name="docs[' . $incrmnt . '][doc_owner]" id="owner" class="form-control" >'
            . '        </div>'
            . '        <div class="form-group col-md-3 mb-0">'
            . '            <label for="scstart">Start Date: </label>'
            . '               <input type="text" class="form-control addmore" name="docs[' . $incrmnt . '][doc_start_date]" />'
            . '        </div>'
            . '        <div class="form-group col-md-3 mb-0">'
            . '            <label for="prend">End Date: </label>'
            . '                <input type="text" class="form-control addmore" name="docs[' . $incrmnt . '][doc_end_date]" />'
            . '</div>'
            . ' </div><p></p>';
    $in = $incrmnt + 1;
    $result = array('data_view' => $set, 'inVal' => $in);
    echo json_encode($result);
}
if (isset($_POST['contact'])) {
    $contact_view_op = "";
    $desc = $db->selectQuery("SELECT `designation_name` FROM `" . $db->db_prefix . "designation` WHERE designation_status='1'");
    for ($ic = 0; $ic < count($desc); $ic++) {
        $contact_view_op .= '<option value="' . $desc[$ic]["designation_name"] . '">' . $desc[$ic]["designation_name"] . '</option>';
    }
    $con_incrmnt = $_POST['con_incrmnt'];
    $contact_view = '<div class="row">';
    $contact_view .= '<div class="form-group col-md-6 mb-0">';
    $contact_view .= '<label for="email">Designation:</label>'
            . '<select name="contact[' . $con_incrmnt . '][contact_designation]" id="contact_designation" class="form-control" >';
    $contact_view .= '<option selected="">Select</option>';
    $contact_view .=$contact_view_op;
    $contact_view .= '</select>'
            . '        </div>'
            . '        <div class="form-group col-md-6 mb-0">'
            . '            <label for="name">Name: </label>'
            . '            <input type="text" name="contact[' . $con_incrmnt . '][contact_name]" id="contact_name" class="form-control"  placeholder=""/>'
            . '        </div>'
            . '    </div>'
            . '    <div class="row">'
            . '        <div class="form-group col-md-6 mb-0">'
            . '            <label for="email">Email: </label>'
            . '            <input type="email" name="contact[' . $con_incrmnt . '][contact_email]" id="contact_email" class="form-control"'
            . '                   >'
            . '        </div>'
            . '        <div class="form-group col-md-6 mb-0">'
            . '            <label for="phone">Phone: </label>'
            . '            <input type="text" name="contact[' . $con_incrmnt . '][contact_phone]" id="contact_phone" class="form-control" placeholder="(XXX) XXXX XXX"'
            . '                   pattern="^[\d\+\-\.\(\)\/\s]*$">'
            . '        </div>'
            . '    </div>'
            . '    <div class="row">'
            . '        <div class="col-sm-2">'
            . '            <label for="email">Get Notification: </label>'
            . '        </div>'
            . '    </div>'
            . '    <div class="row">'
            . '        <div class="col-sm-3">'
            . '            <label class="checkbox checkbox-custom-alt">'
            . '                <input type="checkbox" name="contact_not[' . $con_incrmnt . '][cr]" value="Commercial Registration" checked="checked"><i></i> Commercial Registration Expiry'
            . '            </label>'
            . '            <label class="checkbox checkbox-custom-alt">'
            . '                <input type="checkbox" name="contact_not[' . $con_incrmnt . '][cc]" value="Computer Card" checked="checked"><i></i> Computer Card Expiry'
            . '            </label>'
            . '            <label class="checkbox checkbox-custom-alt">'
            . '                <input type="checkbox" name="contact_not[' . $con_incrmnt . '][ml]" value="Municipal Licence" checked="checked"><i></i>  Municipal Licence Expiry'
            . '            </label>'
            . '            <label class="checkbox checkbox-custom-alt">'
            . '                <input type="checkbox" name="contact_not[' . $con_incrmnt . '][tc]" value="Tax Card" checked="checked"><i></i>  Tax Card Expiry'
            . '            </label>'
            . '        </div>'
            . '    </div>';
    $inc = $con_incrmnt + 1;
    $result1 = array('cnt_view' => $contact_view, 'inVal1' => $inc);
    echo json_encode($result1);
}
