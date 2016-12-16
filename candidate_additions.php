<?php 
include("connection.php");
if($_POST['qual_val']!="" && $_POST['qualification_add']!=""){
$qual_val = $_POST['qual_val'];
$quali = $_POST['qualification_add']; ?>

<div class="row">
                                <div class="form-group col-md-4">
                                    <label for="fax">Qualification: </label>
                                    <select class="form-control" name="qualification[<?php echo $qual_val; ?>][qualification_name]">
                                        <option selected="" value=""> Select</option>
                                        <?php
                                        $selectQual = $db->selectQuery("SELECT * FROM `sm_recruit_qualification` WHERE `qualification_status`='1'");
                                        if (count($selectQual)) {
                                            for ($qi = 0; $qi < count($selectQual); $qi++) {
                                                ?>
                                                <option
                                                    value="<?php echo $selectQual[$qi]['qualification_name']; ?>"><?php echo $selectQual[$qi]['qualification_name']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="phone">Status: </label>
                                    <select class="form-control mb-10" name="qualification[<?php echo $qual_val; ?>][qualification_status]">
                                        <option selected="" value=""> Select</option>
                                        <option value="Passed">Passed</option>
										<option value="Failed">Failed</option>
                                    </select>
                                </div>
                            </div>
<?php } ?>