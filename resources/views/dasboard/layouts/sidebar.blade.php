<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dasboard') ? 'active' : '' }}" aria-current="page" href="/dasboard">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dasboard/posts*') ? 'active' : '' }}" href="/dasboard/posts">
            <span data-feather="file-text"></span>
            My Posts
          </a>
        </li>
      
      </ul>

@can('admin')
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1
      text-muted">
        Administrator
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dasboard/categories*') ? 'active' : '' }}" href="/dasboard/categories">
            <span data-feather="grid"></span>
           Categories
          </a>
        </li>

      </ul>
@endcan
    </div>
  </nav>