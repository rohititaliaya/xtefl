<!-- ======== main-wrapper start =========== -->
<main class="main-wrapper">
    <!-- ========== header start ========== -->
    <header class="header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-5 col-md-5 col-6">
            <div class="header-left d-flex align-items-center">
              <div class="menu-toggle-btn mr-20">
                {{-- <button
                  id="menu-toggle"
                  class="main-btn primary-btn btn-hover"
                >
                  <i class="lni lni-chevron-left me-2"></i> Menu
                </button> --}}
                <span class="fw-bold text-black fs-2">Admin Dashboard</span>
              </div>
              <div class="header-search d-none d-md-flex">
                {{-- <form action="#">
                  <input type="text" placeholder="Search..." />
                  <button><i class="lni lni-search-alt"></i></button>
                </form> --}}
              </div>
            </div>
          </div>
          <div class="col-lg-7 col-md-7 col-6">
            <div class="header-right">
            <!-- profile start -->
              <div class="profile-box ml-15">
                <button
                  class="dropdown-toggle bg-transparent border-0"
                  type="button"
                  id="profile"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <div class="profile-info">
                    <div class="info">
                        <form action="{{route('admin.logout')}}" method="post">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-light"><i class='bx bx-log-out-circle'></i> Logout</button>
                        </form>
                    </div>
                  </div>
                  <i class="lni lni-chevron-down"></i>
                </button>
              </div>
              <!-- profile end -->
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- ========== header end ========== -->