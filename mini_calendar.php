<section class="tile bg-slategray widget-calendar">
    <div class="tile-header dvd dvd-btm">
        <h1 class="custom-font"><strong>Mini </strong>Calendar</h1>
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
    <div class="tile-body p-0">
	 <div  id="realtime-rickshaw" style="height:0px;display:none;"></div>
        <div id="mini-calendar"></div>
    </div>
</section>