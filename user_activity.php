<section class="tile">

    <!-- tile header -->
    <div class="tile-header dvd dvd-btm">
        <h1 class="custom-font"><strong>User</strong>Activity</h1>
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
            <li class="remove"><a role="button" tabindex="0" class="tile-close"><i
                        class="fa fa-times"></i></a></li>
        </ul>
    </div>
    <div class="tile-widget mb-40">

        <div class="progress-list mt-20">
            <div class="details">
                <div class="title text-lg" style="line-height: 30px"><strong>125</strong> Users Online
                </div>
            </div>
            <div class="status pull-right bg-greensea">
                <span>41</span>%
            </div>
            <div class="clearfix"></div>
            <div class="progress not-rounded mb-10">
                <div class="progress-bar progress-bar-greensea" role="progressbar" aria-valuenow="41"
                     aria-valuemin="0" aria-valuemax="100" style="width: 41%;"></div>
            </div>
        </div>
    </div>
    <div class="tile-body p-0" style="height: 133px">
        <div class="rickshaw" id="realtime-rickshaw"></div>
    </div>
</section>