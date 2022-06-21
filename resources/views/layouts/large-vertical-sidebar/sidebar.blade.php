<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul class="navigation-left">
            @if (auth()->user()->hasRole('user'))
                <li class="nav-item {{ request()->is('user/myjobs') || request()->is('user/myjobs/*') ? 'active' : '' }}" data-item="jobs">
                    <a class="nav-item-hold" href="{{ route('myjobs.index') }}">
                        <i class="nav-icon i-File-Clipboard-File--Text"></i>
                        <span class="nav-text">Trabajos</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            @endif
            @if (auth()->user()->hasRole('gerente'))
                <li class="nav-item {{ request()->is('gerencia/jobs') || request()->is('gerencia/*') ? 'active' : '' }}" data-item="jobs">
                    <a class="nav-item-hold" href="{{ route('gerencejobs.index') }}">
                        <i class="nav-icon i-File-Clipboard-File--Text"></i>
                        <span class="nav-text">Trabajos</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            @endif
            @if (auth()->user()->hasRole('admin-gerencia'))
                <li class="nav-item {{ request()->is('admingerencia/jobs') || request()->is('admingerencia/*') ? 'active' : '' }}" data-item="jobs">
                    <a class="nav-item-hold" href="{{ route('agerence.jobs.index') }}">
                        <i class="nav-icon i-File-Clipboard-File--Text"></i>
                        <span class="nav-text">Trabajos</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            @endif
            @if (auth()->user()->hasRole('admin'))
                <li class="nav-item {{ request()->is('home') || request()->is('jobs') || request()->is('jobs/*') ? 'active' : '' }}" data-item="jobs">
                    <a class="nav-item-hold" href="{{ route('jobs.index') }}">
                        <i class="nav-icon i-File-Clipboard-File--Text"></i>
                        <span class="nav-text">Trabajos</span>
                    </a>
                    <div class="triangle"></div>
                </li>

                <li class="nav-item {{ request()->is('users') || request()->is('users/*') ? 'active' : '' }}" data-item="users">
                    <a class="nav-item-hold" href="{{ route('users.index') }}?type=user">
                        <i class="nav-icon i-Administrator"></i>
                        <span class="nav-text">Imprentas</span>
                    </a>
                    <div class="triangle"></div>
                </li>
                <li class="nav-item {{ request()->is('users') || request()->is('users/*') ? 'active' : '' }}" data-item="users">
                    <a class="nav-item-hold" href="{{ route('users.index') }}?type=admin-gerencia">
                        <i class="nav-icon i-Administrator"></i>
                        <span class="nav-text">Admin Gerencia</span>
                    </a>
                    <div class="triangle"></div>
                </li>
                <li class="nav-item {{ request()->is('users') || request()->is('users/*') ? 'active' : '' }}" data-item="users">
                    <a class="nav-item-hold" href="{{ route('users.index') }}?type=gerente">
                        <i class="nav-icon i-Administrator"></i>
                        <span class="nav-text">Gerentes</span>
                    </a>
                    <div class="triangle"></div>
                </li>
                <li class="nav-item {{ request()->is('users') || request()->is('users/*') ? 'active' : '' }}" data-item="users">
                    <a class="nav-item-hold" href="{{ route('users.index') }}?type=admin">
                        <i class="nav-icon i-Administrator"></i>
                        <span class="nav-text">Administradores</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            @endif
        </ul>
    </div>
</div>
<!--=============== Left side End ================-->
