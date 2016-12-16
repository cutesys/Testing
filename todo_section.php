<section class="tile widget-todo" fullscreen="isFullscreen04" ng-controller="TodoWidgetCtrl">

    <!-- tile header -->
    <div class="tile-header dvd dvd-btm">
        <h1 class="custom-font"><strong>Todo </strong>List</h1>
        <ul class="controls">
            <li class="dropdown">

                <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">
                    <i class="fa fa-cog"></i>
                    <i class="fa fa-spinner fa-spin"></i>
                </a>

                <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                    <li>
                        <a role="button" tabindex="0" class="tile-toggle">
                            <span class="minimize"><i class="fa fa-angle-down"></i>&nbsp;&nbsp;&nbsp;Minimize</span>
                            <span class="expand"><i class="fa fa-angle-up"></i>&nbsp;&nbsp;&nbsp;Expand</span>
                        </a>
                    </li>
                    <li>
                        <a role="button" tabindex="0" class="tile-refresh">
                            <i class="fa fa-refresh"></i> Refresh
                        </a>
                    </li>
                    <li>
                        <a role="button" tabindex="0" class="tile-fullscreen">
                            <i class="fa fa-expand"></i> Fullscreen
                        </a>
                    </li>
                </ul>

            </li>
            <li class="remove"><a role="button" tabindex="0" class="tile-close"><i class="fa fa-times"></i></a></li>
        </ul>
    </div>
    <!-- /tile header -->

    <!-- tile body -->
    <div class="tile-body lined-paper">
        <form class="form-horizontal" role="form">
            <label for="todo" class="text-strong mb-0">Add Todo: </label>
            <div class="form-group mb-0">
                <div class="col-sm-10">
                    <input type="text" class="form-control input-unstyled" id="todo" placeholder="type todo here..." required>
                </div>
                <div class="col-sm-2">
                    <button type="button" id="todo_btn" class="btn btn-link"><i class="fa fa-chevron-right text-lg"></i></button>
                </div>
            </div>
        </form>

        <ul class="todo-list list-unstyled" id="todo_ul">

            <?php
            $todoView = $db->selectQuery("SELECT * FROM `sm_todo_list` ORDER BY `todo_id` DESC LIMIT 8");
            if (count($todoView)) {
                for ($tv = 0; $tv < count($todoView); $tv++) {
                    $todoStatus = $todoView[$tv]['todo_status'];
                    ?>
                    <li id="<?php echo $todoView[$tv]['todo_id']; ?>" class="<?php echo $todoStatus; ?>">
                        <div class="<?php echo $todoStatus; ?>">
                            <!--<input type="hidden" class="todoClass" value="<?php //echo $todoView[$tv]['todo_id'];      ?>"/>-->
                            <label class="checkbox checkbox-custom m-0 text-muted inline">
                                <input type="checkbox" id="todo_check" class="todo_check" <?php if (!empty($todoStatus)) { ?> checked=""<?php } ?> ><i></i>
                                </label>
                                <span><?php echo $todoView[$tv]['todo_data']; ?></span>
                                <a role="button" id="todoDel" tabindex="0" class="text-danger remove-todo pull-right">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </li>
                        <?php
                    }
                }
                ?>


        </ul>

    </div>
    <!-- /tile body -->

</section>

