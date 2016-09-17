<ul class="navigation">
    {{-- Dashboard --}}
    <li {{ (Request::is('/') ? 'class="active"' : '') }}>
        <a href="{{ route('dashboard') }}">
            <i class="menu-icon fa fa-fw fa-home"></i>
            <span class="mm-text">Dashboard</span>
        </a>
    </li>
    
    {{-- Cadastros --}}
    <li class="menu-dropdown {{ (Request::is('cadastro') || Request::is('cadastro/*') ? 'active' : '') }}">
        <a href="#">
            <i class="menu-icon  fa fa-fw fa-users"></i>
            <span>Cadastros</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {{ (Request::is('cadastro/cliente/*') ? 'class=active' : '') }}>
                <a href="{{ route('cadastro.cliente.index') }}">Clientes</a>
            </li>
        </ul>
    </li>

    {{-- Usuários --}}
    <li class="menu-dropdown {{ (Request::is('users') || Request::is('users/create') || Request::is('users/*') || Request::is('deleted_users') ? 'active' : '') }}">
        <a href="{{ URL::to('users') }}">
            <i class="menu-icon fa fa-fw fa-user"></i>
            <span>Operadores</span>
        </a>
    </li>

    {{-- Grupo de operadores --}}
    <li class="menu-dropdown {{ (Request::is('user/group') || Request::is('user/group/create') || Request::is('user/group/*') ? 'active' : '') }}">
        <a href="{{ route('user.group.index') }}">
            <i class="menu-icon  fa fa-fw fa-users"></i>
            <span>Grupo de Operadores</span>
        </a>
    </li>

    {{-- Pool --}}
    <li class="menu-dropdown {{ (Request::is('tipo_de_pool') || Request::is('tipo_de_pool/*') ? 'active' : '') }}">
        <a href="#">
            <i class="menu-icon  fa fa-fw fa-users"></i>
            <span>Pool</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {{ (Request::is(url('pool.tipo.index')) ? 'class=active' : '') }}>
                <a href="{{ route('pool.tipo.index') }}">Tipos de Pool</a>
            </li>
        </ul>
        <ul class="sub-menu">
            <li {{ (Request::is(route('pool.index')) ? 'class=active' : '') }}>
                <a href="{{ route('pool.index') }}">Listar Pool's</a>
            </li>
        </ul>
    </li>

    {{-- Equipamentos --}}
    <li class="menu-dropdown {{ (Request::is('equipamento') || Request::is('equipamento/*') ? 'active' : '') }}">
        <a href="#">
            <i class="menu-icon  fa fa-fw fa-server"></i>
            <span>Equipamentos</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {{ (Request::is('equipment/grupo') ? 'class=active' : '') }}>
                <a href="{{ route('equipment.group.index') }}">Grupos de Equipamento</a>
            </li>
        </ul>
        <ul class="sub-menu">
            <li {{ (Request::is(route('equipment.type.index')) ? 'class=active' : '') }}>
                <a href="{{ route('equipment.type.index') }}">Tipos de Equipamento</a>
            </li>
        </ul>
        <ul class="sub-menu">
            {{--@foreach($equipmentTypesMenu as $equipmentType)--}}
                {{--<li {{ (Request::is(route('equipment.type.create')) ? 'class=active' : '') }}>--}}
                    {{--<a href="{{ route('equipment.show', $equipmentType->id) }}">{{ $equipmentType->name }}</a>--}}
                {{--</li>--}}
            {{--@endforeach--}}
        </ul>
    </li>

    {{-- Serviços --}}
    <li class="menu-dropdown {{ (Request::is('servico') || Request::is('servico/*') ? 'active' : '') }}">
        <a href="#">
            <i class="menu-icon  fa fa-fw fa-wrench"></i>
            <span>Serviço</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {{ (Request::is('tipo_servico') ? 'class=active' : '') }}>
                <a href="{{ route('service.type.index') }}">Tipos de Serviço</a>
            </li>
        </ul>
        <ul class="sub-menu">
            {{--@foreach($serviceTypesMenu as $serviceType)--}}
                {{--<li {{ (Request::is(route('service.type.create')) ? 'class=active' : '') }}>--}}
                    {{--<a href="{{ route('service.show', $serviceType->id) }}">{{ $serviceType->description }}</a>--}}
                {{--</li>--}}
            {{--@endforeach--}}
        </ul>
    </li>

    {{--Pop--}}
    <li class="menu-dropdown {{ (Request::is('pop') || Request::is('pop/create') || Request::is('pop/*') ? 'active' : '') }}">
        <a href="{{ URL::to('pop') }}">
            <i class="menu-icon  fa fa-fw fa-sitemap"></i>
            <span>Pop</span>
        </a>
    </li>

    
<!--    {{--Acesso--}}
    <li class="menu-dropdown {{ (Request::is('acesso') || Request::is('acesso/create') || Request::is('acesso/*') ? 'active' : '') }}">
        <a href="{{ URL::to('acesso') }}">
            <i class="menu-icon  fa fa-fw fa-key"></i>
            <span>Acesso</span>
        </a>
    </li>-->
</ul>
