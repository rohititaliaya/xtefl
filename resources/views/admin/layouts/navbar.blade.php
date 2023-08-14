<body>
<!-- ======== sidebar-nav start =========== -->
<aside class="sidebar-nav-wrapper">
    <div class="navbar-logo">
      <a href="{{route('admin.dashboard')}}">
        <img src="{{asset('assets/images/logo/logo.png')}}" alt="logo" />
      </a>
    </div>
    <nav class="sidebar-nav">
      <ul>
        <li class="nav-item">
            <a href="{{route('admin.dashboard')}}">
                <span class="icon">
                    <svg width="22" height="22" viewBox="0 0 22 22">
                      <path
                        d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z"
                      />
                    </svg>
                  </span>
                  <span class="text">Dashboard</span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a href="{{ route('admin.category.index') }}"><i class="bx bx-user-check"></i>
                <span class="mx-2">Category</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.subcategory.index') }}"><i class="bx bx-user-check"></i>
                <span class="mx-2">Sub-Category</span>
            </a>
        </li>
        
        
        <li class="nav-item">
            <a href="{{ route('admin.country.index') }}"><i class="bx bx-user-check"></i>
                <span class="mx-2">Countries</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.city.index') }}"><i class="bx bx-user-check"></i>
                <span class="mx-2">Cities</span>
            </a>
        </li> --}}
        {{-- <li class="nav-item">
            <a href="{{ route('admin.content.index') }}"><i class="bx bx-user-check"></i>
                <span class="mx-2">Contents</span>
            </a>
        </li> --}}
        {{-- <li class="nav-item">
            <a href="{{ route('admin.timing.index') }}"><i class="bx bx-user-check"></i>
                <span class="mx-2">Timing</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.url.index') }}"><i class="bx bx-user-check"></i>
                <span class="mx-2">Url</span>
            </a>
        </li> --}}

        <li class="nav-item">
            <a href="{{ route('admin.listing') }}"><span class="icon">
                <svg
                  width="22"
                  height="22"
                  viewBox="0 0 22 22"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M12.8334 1.83325H5.50008C5.01385 1.83325 4.54754 2.02641 4.20372 2.37022C3.8599 2.71404 3.66675 3.18036 3.66675 3.66659V18.3333C3.66675 18.8195 3.8599 19.2858 4.20372 19.6296C4.54754 19.9734 5.01385 20.1666 5.50008 20.1666H16.5001C16.9863 20.1666 17.4526 19.9734 17.7964 19.6296C18.1403 19.2858 18.3334 18.8195 18.3334 18.3333V7.33325L12.8334 1.83325ZM16.5001 18.3333H5.50008V3.66659H11.9167V8.24992H16.5001V18.3333Z"
                  />
                </svg>
              </span>
                <span class="mx-2">Listings</span>
            </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.provider.index') }}"><span class="icon">
              <svg
                width="22"
                height="22"
                viewBox="0 0 22 22"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M12.8334 1.83325H5.50008C5.01385 1.83325 4.54754 2.02641 4.20372 2.37022C3.8599 2.71404 3.66675 3.18036 3.66675 3.66659V18.3333C3.66675 18.8195 3.8599 19.2858 4.20372 19.6296C4.54754 19.9734 5.01385 20.1666 5.50008 20.1666H16.5001C16.9863 20.1666 17.4526 19.9734 17.7964 19.6296C18.1403 19.2858 18.3334 18.8195 18.3334 18.3333V7.33325L12.8334 1.83325ZM16.5001 18.3333H5.50008V3.66659H11.9167V8.24992H16.5001V18.3333Z"
                />
              </svg>
            </span>
              <span class="mx-2">Providers</span>
          </a>
      </li>
        <span class="divider"><hr /></span>
      </ul>
    </nav>
  </aside>
  <div class="overlay"></div>
  <!-- ======== sidebar-nav end =========== -->