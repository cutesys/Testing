<section class="tile tile-simple bg-lightred" style="min-height: 190px; overflow: hidden;">
    <div class="tile-header">
        <h1 class="custom-font">To do's Progress</h1>
        <ul class="controls">
            <li class="add"><a data-toggle="modal" data-target="#splash_todo" data-options="splash-ef-3" tabindex="0" ><i class="fa fa-plus"></i></a></li>
            <li class="remove"><a role="button" tabindex="0" class="tile-close"><i class="fa fa-times"></i></a></li>
        </ul>
    </div>
    <div class="tile-body">
        <div id="todo-carousel" class="owl-carousel">
            <?php
            $todoPro = $db->selectQuery("SELECT * FROM `sm_time_todo` WHERE `todo_active_status`='1' ORDER BY `todo_id` DESC LIMIT 5");
            if (count($todoPro)) {
                for ($tp = 0; $tp < count($todoPro); $tp++) {
                    ?>
                    <div class="toParent">
                        <div class="progress-list">
                            <div class="details">
                                <div class="title toTitle"><i class="fa fa-caret-right mr-5"></i> <span class="text-md"><?php echo $todoPro[$tp]['todo_data'] ?></span></div>
                                <div class="description text-transparent-white text-lowercase toStatus">status: <?php echo $todoPro[$tp]['todo_status']; ?></div>
                                <div class="toDate" style="display:none"><?php echo $todoPro[$tp]['todo_date']; ?></div>
                                <div class="toTime" style="display:none"><?php echo $todoPro[$tp]['todo_time']; ?></div>
                                <div class="toProg" style="display:none"><?php echo $todoPro[$tp]['todo_progress']; ?></div>
                                <div class="toStat" style="display:none"><?php echo $todoPro[$tp]['todo_status']; ?></div>
                                <div class="toId" style="display:none"><?php echo $todoPro[$tp]['todo_id']; ?></div>
                            </div>
                            <div class="clearfix" style="height: 45px"></div>
                            <div class="progress transparent-black not-rounded mb-10">
                                <div class="progress-bar " role="progressbar" aria-valuenow="<?php echo $todoPro[$tp]['todo_progress']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $todoPro[$tp]['todo_progress']; ?>%;">
                                    <?php echo $todoPro[$tp]['todo_progress']; ?>%
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                            <a type="button" class="btn btn-border btn-rounded-20 btn-white btn-xs mr-5 editToClass" style="width:22px;" data-toggle="modal" data-target="#todo_edit" data-options="splash-ef-3" tabindex="0"><i class="fa fa-pencil"></i></a>
                            <a type="button" class="btn btn-border btn-rounded-20 btn-white btn-xs mr-5 deleteToClass" style="width:22px;" data-toggle="modal" data-target="#todo_delete" data-options="splash-ef-3" tabindex="0"><i class="fa fa-trash"></i></a>
                            <input type="hidden" class="todo_delete_id" value="<?php echo $todoPro[$tp]['todo_id']; ?>" />
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>
