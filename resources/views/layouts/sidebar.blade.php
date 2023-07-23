<div class="sidebar">
  <nav class="sidebar-nav sidephone">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.index')}}"><i class="icon-speedometer"></i> لوحة التحكم
        </a>
      </li>
      @can('degree')

      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>
          النتائج</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.degree.index') }}"><i class="icon-user-follow"></i>النتائج</a>

            <a class="nav-link" href="{{ route('admin.degree.create') }}"><i class="icon-user-follow"></i>اضافة
              نتيجة</a>

          </li>
        </ul>
      </li>
      @endcan

      @can('user show')
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>
          المستخدمين</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            @can('roles')
            <a class="nav-link" href="{{ route('admin.roles.index') }}"><i class="icon-user-follow"></i>الأدارات</a>
            @endcan
            @can('permissions')
            <a class="nav-link" href="{{ route('admin.permissions.index') }}"><i
                class="icon-user-follow"></i>الصلاحيات</a>
            @endcan
            @can('user control')
            <a class="nav-link" href="{{ route('admin.users.create') }}"><i class="icon-user-follow"></i>إضافة
              مستخدم</a>
            @endcan
            @can('user show')
            <a class="nav-link" href="{{ route('admin.users.index') }}"><i class="icon-people"></i>
              المستخدمين</a>
            @endcan
          </li>
        </ul>
      </li>
      @endcan

    </ul>
  </nav>
</div>
