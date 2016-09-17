<div class="nav_profile">
    <div class="media profile-left">
        <div class="content-profile">
            <ul class="icon-list">
                <li>
                    <a href="{{ URL::to('admin/users/'.Sentinel::getUser()->id) }}">
                        <i class="fa fa-fw fa-user"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ route('users.edit', Sentinel::getUser()->id) }}">
                        <i class="fa fa-fw fa-gear"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ URL::to('logout') }}">
                        <i class="fa fa-fw fa-sign-out"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
