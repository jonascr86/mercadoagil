<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle padding-user" data-toggle="dropdown">
        @if(Sentinel::getUser()->pic)
            <img src="{!! url('/').'/uploads/users/' . Sentinel::getUser()->pic !!}" alt="img"
                 class="img-circle img-responsive pull-left" height="35" width="35"/>
        @else
            <img src="http://api.adorable.io/avatars/35/{!! Sentinel::getUser()->email !!}" alt="img"
                 class="img-circle img-responsive pull-left" height="35" width="35"/>
        @endif
        <div class="riot">
            <div>
                {{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }}
                <span>
                    <i class="caret"></i>
                </span>
            </div>
        </div>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            @if(Sentinel::getUser()->pic)
                <img src="{!! url('/').'/uploads/users/'.Sentinel::getUser()->pic !!}" alt="img"
                     class="img-circle img-bor"/>
            @else
                <img src="http://api.adorable.io/avatars/90/{!! Sentinel::getUser()->email !!}"
                     alt="img" class="img-circle img-bor"/>
            @endif
            <p>{{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }}</p>
        </li>
        <!-- Menu Body -->
        <li class="pad-3" role="presentation"></li>
        <li>
            <a href="{{ route('users.edit', Sentinel::getUser()->id) }}">
                <i class="fa fa-fw fa-user"></i> Minha conta
            </a>
        </li>
        <li>
            <a href="{{ URL::to('logout') }}">
                <i class="fa fa-fw fa-sign-out"></i> Sair
            </a>
        </li>
    </ul>
</li>
