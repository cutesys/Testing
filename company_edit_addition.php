<?php

if (isset($_POST["doc"])) {
    $incrmnt = $_POST['incrmnt'];
    $set = '   <div class="parent_div"> <div class="row">'
            . '        <div class="form-group col-md-6 mb-0">'
            . '            <input type="text" name="docs[' . $incrmnt . '][doc_title]" value="" placeholder="Document Title"  class="form-control new_doc_title">'
            . '            <input type="text" name="docs[' . $incrmnt . '][doc_data]" id="cr" placeholder="Document ID" class="form-control" >'
            . '        </div>'
            . '        <div class="form-group col-md-6 mb-0">'
            . '            <label for="pr-name">Owner: </label>'
            . '            <input type="text" name="docs[' . $incrmnt . '][doc_owner]" id="owner" class="form-control" >'
            . '        </div>'
            . '</div>'
            . '    <div class="row">'
            . '        <div class="form-group col-md-6 mb-0">'
            . '            <label for="scstart">Start Date: </label>'
            . '               <input type="text" class="form-control datepickerx" name="docs[' . $incrmnt . '][doc_start_date]" />'
            . '        </div>'
            . '        <div class="form-group col-md-6 mb-0">'
            . '            <label for="prend">End Date: </label>'
            . '                <input type="text" class="form-control datepickerx" name="docs[' . $incrmnt . '][doc_end_date]" />'
            . '</div>'
            . ' </div>'
            . '</div><p></p>';
    $in = $incrmnt + 1;
    $result = array('data_view' => $set, 'inVal' => $in);
    echo json_encode($result);
}