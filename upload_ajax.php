<?php
if (isset($_POST['depend_num'])) {
    $dnum = $_POST['depend_num'];
    ?>
    <h4><strong>Dependance Details </strong></h4>
    <?php
    for ($k = 1; $k <= $dnum; $k++) {
        ?>

        <label class="col-sm-6 control-label">Dependant<?php echo $k; ?> Passport</label>
        <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add files...</span>
            <input type="file" name="files[]"  multiple>
        </span>
        <p id="file" name="File name here"></p>
        <br>
        <label class="col-sm-6 control-label">Dependant<?php echo $k; ?> Visa</label>
        <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add files...</span>
            <input type="file" name="files[]"  multiple>
        </span>
        <p id="file" name="File name here"></p>
        <br>
    <?php
    }
}
?>