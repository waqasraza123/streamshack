<aside class="sidebar sidebar-left sidebar-menu">
    <section class="content">
        <h5 class="heading">@lang("Organiser.organiser_menu")</h5>

        <ul id="nav" class="topmenu">
            <li class="{{ Request::is('*dashboard*') ? 'active' : '' }}">
                <a href="">
                    <span class="figure"><i class="ico-home2"></i></span>
                    <span class="text">@lang("Organiser.dashboard")</span>
                </a>
            </li>
            <li class="{{ Request::is('*events*') ? 'active' : '' }}">
                <a href="">
                    <span class="figure"><i class="ico-calendar"></i></span>
                    <span class="text">@lang("Organiser.event")</span>
                </a>
            </li>

            <li class="{{ Request::is('*customize*') ? 'active' : '' }}">
                <a href="">
                    <span class="figure"><i class="ico-cog"></i></span>
                    <span class="text">@lang("Organiser.customize")</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
