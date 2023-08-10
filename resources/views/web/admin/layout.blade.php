<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  @include('web.admin.partials._header')

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        @include('web.admin.partials._side-nav')
        <!-- Layout container -->
        <div class="layout-page">
          @include('web.admin.partials._top-nav')
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              @yield('page-content')
            </div>

            @include('web.admin.partials._footer')

            <div class="content-backdrop fade"></div>
          </div>
        </div>
      </div>
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    @include('web.admin.partials._scripts')
    @yield('editor-script')
  </body>
</html>
