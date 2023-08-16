<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="" class="app-brand-link gap-2">
        <span class="app-brand-logo demo">
          <img width="60" src="/admin/imgs/logo.png" alt="logo" />
        </span>
        <div class="mt-3">
          <h6>
            Borno State Scholarship Board
          </h6>
        </div>
      </a>
      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item">
        <a href="{{ route('admin.dashboard.index') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
          <div data-i18n="Authentications">Settings</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('admin.settings.countries.index') }}" class="menu-link">
              <div data-i18n="Basic">Countries</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('admin.settings.schools.index') }}" class="menu-link">
              <div data-i18n="Basic">Schools</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
          <div data-i18n="Authentications">Application</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href=" {{ route('admin.applicants.index', [
              'page' => 1,
              'per_page' => 100,
              'programme' => 'Undergraduate'
            ]) }} " class="menu-link">
              <div data-i18n="Basic">Undergraduate</div>
            </a>
          </li>
          <li class="menu-item">
            <a href=" {{ route('admin.applicants.index', [
              'page' => 1,
              'per_page' => 100,
              'programme' => 'Masters'
            ]) }} " class="menu-link">
              <div data-i18n="Basic">Masters</div>
            </a>
          </li>
          <li class="menu-item">
            <a href=" {{ route('admin.applicants.index', [
              'page' => 1,
              'per_page' => 100,
              'programme' => 'Doctorate'
            ]) }} " class="menu-link">
              <div data-i18n="Basic">Doctrate(Phd)</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
          <div data-i18n="Authentications">Messages</div>
        </a>
        <ul class="menu-sub">
        </ul>
      </li>
      {{-- <li class="menu-item">
        <a href="/admin/reports" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Reports</div>
        </a>
      </li> --}}
    </ul>
  </aside>
