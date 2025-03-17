@if (Auth::user()->getRoleNames()->first() == 'AdminPT' || Auth::user()->getRoleNames()->first() == 'Prodi')
    <li class="nav-title">Unggah Berkas</li>
    {{-- @can('lihat-produk') --}}
    <li class="{{ Request::is('report/*') ? 'active' : '' }}">
        <a href="{{ route('report.indexDosen') }}" title="report Admin" data-filter-tags="admin profil">
            <i class="fa fa-flag"></i>
            <span class="nav-link-text" data-i18n="nav.admin_profil">Pengajuan Konversi</span>
        </a>
    </li>
@else
    @can('lihat-laporan-akhir')
        <li class="nav-title">Unggah Berkas</li>
        {{-- @can('lihat-produk') --}}
        <li class="{{ Request::is('report/*') ? 'active' : '' }}">
            <a href="{{ route('report.index') }}" title="report Admin" data-filter-tags="admin profil">
                <i class="fa fa-flag"></i>
                <span class="nav-link-text" data-i18n="nav.admin_profil">Pengajuan Konversi</span>
            </a>
        </li>
    @endcan
@endif
@can('lihat-mikroskill')
    <li class="nav-title">Komponen Mikroskill</li>
    <li class="{{ Request::is('mikroskil/*') ? 'active' : '' }}">
        <a href="{{ route('mikroskil.index') }}" title="cpl" data-filter-tags="admin profil">
            <i class="fa-solid fa-check-to-slot"></i>
            <span class="nav-link-text" data-i18n="nav.admin_profil">Komponen Mikroskill</span>
        </a>
    </li>
@endcan
@can('lihat-kampus')
    <li class="nav-title">Master Data</li>
    <li class="{{ Request::is('kampus/*') ? 'active' : '' }}">
        <a href="{{ route('kampus.index') }}" title="Profil Admin" data-filter-tags="admin profil">
            <i class="fa fa-building-columns"></i>
            <span class="nav-link-text" data-i18n="nav.admin_profil">Kampus</span>
        </a>
    </li>
@endcan
@can('lihat-kampus')
    <li class="{{ Request::is('fakultas/*') ? 'active' : '' }}">
        <a href="{{ route('fakultas.index') }}" title="Profil Admin" data-filter-tags="admin profil">
            <i class="fa-solid fa-building-un"></i>
            <span class="nav-link-text" data-i18n="nav.admin_profil">Fakultas</span>
        </a>
    </li>
@endcan
@can('lihat-kampus')
    <li class="{{ Request::is('programstudi/*') ? 'active' : '' }}">
        <a href="{{ route('programstudi.index') }}" title="Profil Admin" data-filter-tags="admin profil">
            <i class="fa-solid fa-graduation-cap"></i>
            <span class="nav-link-text" data-i18n="nav.admin_profil">Program Studi</span>
        </a>
    </li>
@endcan
@can('lihat-assessment')
    <li class="{{ Request::is('assessment/*') ? 'active' : '' }}">
        <a href="{{ route('assessment.indexDosen') }}" title="penilaian" data-filter-tags="admin profil">
            <i class="fa-solid fa-clipboard-check"></i>
            <span class="nav-link-text" data-i18n="nav.admin_profil">Penilaian</span>
        </a>
    </li>
@endcan
<li class="nav-title">Settings</li>
<li class="{{ Request::is('settings/*') ? 'active open' : '' }}">
    <a href="#" title="Settings" data-filter-tags="settings">
        <i class="fal fa-cogs"></i>
        <span class="nav-link-text" data-i18n="nav.settings">Settings</span>
    </a>
    <ul>
        <!-- Pengguna -->
        @can('lihat-user')
            <li class="{{ Request::is('settings/user*') ? 'active' : '' }}">
                <a href="{{ route('user.index') }}" title="Pengguna" data-filter-tags="pengguna user">
                    <i class="fal fa-users"></i>
                    <span class="nav-link-text" data-i18n="nav.pengguna">Pengguna</span>
                </a>
            </li>
        @endcan

        <!-- Profil -->
        <li class="{{ Request::is('settings/profile*') ? 'active' : '' }}">
            <a href="{{ route('profil_admin') }}" title="Profil Admin" data-filter-tags="admin profil">
                <i class="fal fa-user-circle"></i>
                <span class="nav-link-text" data-i18n="nav.profil_admin">Profil Pengguna</span>
            </a>
        </li>

        <!-- Role -->
        @can('lihat-role')
            <li class="{{ Request::is('settings/roles*') ? 'active' : '' }}">
                <a href="{{ route('roles.index') }}" title="Profil Admin" data-filter-tags="admin profil">
                    <i class="fa-solid fa-fingerprint"></i>
                    <span class="nav-link-text" data-i18n="nav.profil_admin">Peran Pengguna</span>
                </a>
            </li>
        @endcan

        <!-- Peran -->
        @can('lihat-permission')
            <li class="{{ Request::is('settings/permissions*') ? 'active' : '' }}">
                <a href="{{ route('permissions.index') }}" title="Profil Admin" data-filter-tags="admin profil">
                    <i class="fa-solid fa-key"></i>
                    <span class="nav-link-text" data-i18n="nav.profil_admin">Izin Pengguna</span>
                </a>
            </li>
        @endcan
    </ul>
</li>
@if (Auth::user()->getRoleNames()->first() == 'SuperAdmin')
    <li class="{{ Request::is('tools/*') ? 'active open' : '' }}">
        <a href="#" title="Tools" data-filter-tags="tools">
            <i class="fal fa-wrench"></i>
            <span class="nav-link-text" data-i18n="nav.tools">Tools</span>
        </a>
        <ul>
            <li class="{{ Request::is('tools/app_profiles*') ? 'active' : '' }}">
                <a href="/tools/app_profiles" title="App Profiles" data-filter-tags="tools app profiles">
                    <span class="nav-link-text" data-i18n="nav.tools_app_profiles">Profil Aplikasi</span>
                </a>
            </li>
            <li class="{{ Request::is('tools/app_fiturs*') ? 'active' : '' }}">
                <a href="/tools/app_fiturs" title="App Fiturs" data-filter-tags="tools app fiturs">
                    <span class="nav-link-text" data-i18n="nav.tools_app_fiturs">Fitur Aplikasi</span>
                </a>
            </li>
        </ul>
    </li>
@endif
