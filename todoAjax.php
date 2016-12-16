<?php
include("connection.php");
if (isset($_POST['todo'])) {
    $todo = $_POST['todo'];
    $todoval = array();
    $todoval['todo_data'] = $todo;
    $todoval['todo_date'] = date("d-m-Y");
    $todoval['sponsor_id'] = $_POST['sponsor_id'];
    $todoval['todo_status'] = "view";
    $toAja = $db->secure_insert("sm_todo_list", $todoval);
    ?>
    <li id="<?php echo $toAja; ?>">
        <div class="view" id="vClass">
            <label class="checkbox checkbox-custom m-0 text-muted inline">
                <input type="checkbox" id="check"><i></i>
            </label>
            <span><?php echo $todo; ?></span>
            <a role="button" tabindex="0" class="text-danger remove-todo pull-right">
                <i class="fa fa-times"></i>
            </a>
        </div>
    </li>
    <?php
}
?>
<script>
    $('#check').click(function () {
        $('#vClass').removeClass('view');
        $('#vClass').addClass('completed');
    });
</script>

