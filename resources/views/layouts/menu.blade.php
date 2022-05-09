@php
$urlAdmin = config('fast.admin_prefix');
@endphp

@can('dashboard')
    @php
    $isDashboardActive = Request::is($urlAdmin);
    @endphp
    <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link {{ $isDashboardActive ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>@lang('menu.dashboard')</p>
        </a>
    </li>
@endcan


@canany(['generator_builder.index', 'attendances.index', 'fileUploads.index'])
    @php
    $isGenerator_builderActive = Request::is($urlAdmin . '*generator_builder*');
    $isAttendancesActive = Request::is($urlAdmin . '*attendances*');
    $isFileUploadsActive = Request::is($urlAdmin . '*fileUploads*');
    @endphp
    <li class="nav-item {{ $isGenerator_builderActive || $isAttendancesActive || $isFileUploadsActive ? 'menu-open' : '' }} ">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-shield-virus"></i>
            <p>
                @lang('Administrar')
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @can('generator_builder.index')
                <li class="nav-item">
                    <a href="{{ route('generator_builder.index') }}"
                        class="nav-link {{ $isGenerator_builderActive ? 'active' : '' }}">
                        <i class="nav-icon fas fa-coins"></i>
                        <p>@lang('menu.generator_builder.title')</p>
                    </a>
                </li>
            @endcan

            @can('attendances.index')
                <li class="nav-item">
                    <a href="{{ route('attendances.index') }}" class="nav-link {{ $isAttendancesActive ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>@lang('menu.attendances.title')</p>
                    </a>
                </li>
            @endcan
            @can('fileUploads.index')
                <li class="nav-item ">
                    <a href="{{ route('fileUploads.index') }}" class="nav-link {{ $isFileUploadsActive ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>@lang('models/fileUploads.plural')</p>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endcan

@canany(['users.index', 'roles.index', 'permissions.index'])
    @php
    $isUserActive = Request::is($urlAdmin . '*users*');
    $isRoleActive = Request::is($urlAdmin . '*roles*');
    $isPermissionActive = Request::is($urlAdmin . '*permissions*');
    @endphp
    <li class="nav-item {{ $isUserActive || $isRoleActive || $isPermissionActive ? 'menu-open' : '' }} ">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-shield-virus"></i>
            <p>
                @lang('menu.user.title')
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @can('users.index')
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link {{ $isUserActive ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            @lang('menu.user.users')
                        </p>
                    </a>
                </li>
            @endcan
            @can('roles.index')
                <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link {{ $isRoleActive ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>
                            @lang('menu.user.roles')
                        </p>
                    </a>
                </li>
            @endcan
            @can('permissions.index')
                <li class="nav-item ">
                    <a href="{{ route('permissions.index') }}" class="nav-link {{ $isPermissionActive ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shield-alt"></i>
                        <p>
                            @lang('menu.user.permissions')
                        </p>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endcan



@canany(['tbltrimestres.index', 'tblnivels.index', 'tblestadocivils.index', 'tblestadocivils.index'])
    @php
    $isTrimestreActive = Request::is($urlAdmin . '*tbltrimestres*');
    $isNivelActive = Request::is($urlAdmin . '*tblnivels*');
    $isAulaActive = Request::is($urlAdmin . '*tblaulas*');
    $isAnioActive = Request::is($urlAdmin . '*tblanioacademicos*');
    @endphp
    <li class="nav-item {{ $isTrimestreActive || $isNivelActive || $isAulaActive || $isAnioActive ? 'menu-open' : '' }} ">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-shield-virus"></i>
            <p>
                @lang('Categoria Academica')
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @can('tbltrimestres.index')
                <li class="nav-item">
                    <a href="{{ route('tbltrimestres.index') }}"
                        class="nav-link {{ $isTrimestreActive ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            {{-- @lang('menu.user.users') --}}
                            <p>@lang('models/tbltrimestres.singular')</p>
                        </p>
                    </a>
                </li>
            @endcan

            @can('tblnivels.index')
                <li class="nav-item">
                    <a href="{{ route('tblnivels.index') }}" class="nav-link {{ $isNivelActive ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>@lang('models/tblnivels.singular')</p>
                    </a>
                </li>
            @endcan

            @can('tblaulas.index')
                <li class="nav-item ">
                    <a href="{{ route('tblaulas.index') }}" class="nav-link {{ $isAulaActive ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>@lang('models/tblaulas.singular')</p>
                    </a>
                </li>
            @endcan

            @can('tblanioacademicos.index')
                <li class="nav-item ">
                    <a href="{{ route('tblanioacademicos.index') }}" class="nav-link {{ $isAnioActive ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>@lang('models/tblanioacademicos.singular')</p>
                    </a>
                </li>
            @endcan


        </ul>
    </li>
@endcan



@canany(['tblsexos.index', 'tblcargos.index', 'tblestadocivils.index'])
    @php
    $isSexoActive = Request::is($urlAdmin . '*tblsexos*');
    $isCargoActive = Request::is($urlAdmin . '*tblcargos*');
    $isCivilActive = Request::is($urlAdmin . '*tblestadocivils*');
    @endphp
    <li class="nav-item {{ $isSexoActive || $isCargoActive || $isCivilActive ? 'menu-open' : '' }} ">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-shield-virus"></i>
            <p>
                @lang('Categoria')
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @can('tblsexos.index')
                <li class="nav-item">
                    <a href="{{ route('tblsexos.index') }}"
                        class="nav-link {{ $isSexoActive ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            {{-- @lang('menu.user.users') --}}
                            <p>@lang('models/tblsexos.singular')</p>
                        </p>
                    </a>
                </li>
            @endcan

            @can('tblcargos.index')
                <li class="nav-item">
                    <a href="{{ route('tblcargos.index') }}" class="nav-link {{ $isCargoActive ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>@lang('models/tblcargos.singular')</p>
                    </a>
                </li>
            @endcan

            @can('tblestadocivils.index')
                <li class="nav-item ">
                    <a href="{{ route('tblestadocivils.index') }}" class="nav-link {{ $isCivilActive ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>@lang('models/tblestadocivils.singular')</p>
                    </a>
                </li>
            @endcan


        </ul>
    </li>
@endcan


{{-- <li class="nav-item">
    <a href="{{ route('tblsexos.index') }}"
       class="nav-link {{ Request::is('tblsexos*') ? 'active' : '' }}">
        <p>@lang('models/tblsexos.plural')</p>
    </a>
</li>
 --}}
{{-- <li class="nav-item">
    <a href="{{ route('tblnivels.index') }}"
       class="nav-link {{ Request::is('tblnivels*') ? 'active' : '' }}">
        <p>@lang('models/tblnivels.plural')</p>
    </a>
</li> --}}

<li class="nav-item">
    <a href="{{ route('tbliglesias.index') }}"
       class="nav-link {{ Request::is('tbliglesias*') ? 'active' : '' }}">
        <p>@lang('models/tbliglesias.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('tblinstitucions.index') }}"
       class="nav-link {{ Request::is('tblinstitucions*') ? 'active' : '' }}">
        <p>@lang('models/tblinstitucions.plural')</p>
    </a>
</li>



<li class="nav-item">
    <a href="{{ route('tblprofesornivels.index') }}"
       class="nav-link {{ Request::is('tblprofesornivels*') ? 'active' : '' }}">
        <p>@lang('models/tblprofesornivels.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('tbldirectivas.index') }}"
       class="nav-link {{ Request::is('tbldirectivas*') ? 'active' : '' }}">
        <p>@lang('models/tbldirectivas.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('tblprofesordatos.index') }}"
       class="nav-link {{ Request::is('tblprofesordatos*') ? 'active' : '' }}">
        <p>@lang('models/tblprofesordatos.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('estudiantes.index') }}"
       class="nav-link {{ Request::is('estudiantes*') ? 'active' : '' }}">
        <p>@lang('models/estudiantes.plural')</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('asignaturas.index') }}"
       class="nav-link {{ Request::is('asignaturas*') ? 'active' : '' }}">
        <p>@lang('models/asignaturas.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('mes.index') }}"
       class="nav-link {{ Request::is('mes*') ? 'active' : '' }}">
        <p>@lang('models/mes.plural')</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('matriculas.index') }}"
       class="nav-link {{ Request::is('matriculas*') ? 'active' : '' }}">
        <p>@lang('models/matriculas.plural')</p>
    </a>
</li>

