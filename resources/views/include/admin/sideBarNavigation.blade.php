<ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3 ">
          <img src="{{ asset('resource/assets/img/LOGO_MAIN.png') }}" style="height: 35px;">
        </div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <hr class="sidebar-divider">

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ Route::currentRouteName() == 'allUsers' ? 'active' : '' }} {{ Route::currentRouteName() == 'blockUserList' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fas fa-fw fa-users"></i>
          <span>Users</span>
        </a>
        <div id="collapseOne" class="collapse {{ Route::currentRouteName() == 'allUsers' ? 'show' : '' }} {{ Route::currentRouteName() == 'blockUserList' ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Users</h6>
            <a class="collapse-item {{ Route::currentRouteName() == 'allUsers' ? 'active' : '' }}" href="{{ route('allUsers') }}">All Users</a>
            <a class="collapse-item {{ Route::currentRouteName() == 'blockUserList' ? 'active' : '' }}" href="{{ route('blockUserList') }}">Block  Users</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ Route::currentRouteName() == 'students' ? 'active' : '' }} {{ Route::currentRouteName() == 'acceptedStudents' ? 'active' : '' }} {{ Route::currentRouteName() == 'studentsDocuments' ? 'active' : '' }}  {{ Route::currentRouteName() == 'rejectedStudents' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-graduation-cap"></i>
          <span>Students</span>
        </a>
        <div id="collapseTwo" class="collapse {{ Route::currentRouteName() == 'students' ? 'show' : '' }} {{ Route::currentRouteName() == 'acceptedStudents' ? 'show' : '' }} {{ Route::currentRouteName() == 'studentsDocuments' ? 'show' : '' }}  {{ Route::currentRouteName() == 'rejectedStudents' ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Students</h6>
            <a class="collapse-item {{ Route::currentRouteName() == 'students' ? 'active' : '' }}" href="{{ route('students') }}">All Students</a>            
            <a class="collapse-item {{ Route::currentRouteName() == 'acceptedStudents' ? 'active' : '' }}" href="{{ route('acceptedStudents') }}">Accepted Students</a>            
            <a class="collapse-item {{ Route::currentRouteName() == 'rejectedStudents' ? 'active' : '' }}" href="{{ route('rejectedStudents') }}">Rejected Students</a>
          </div>
        </div>
      </li>
  

      <li class="nav-item {{ Route::currentRouteName() == 'contacts' ? 'active' : '' }} ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#contacts" aria-expanded="true" aria-controls="collapseOne">
          <i class="fas fa-fw fa-envelope"></i>
          <span>Contacts</span>
        </a>
        <div id="contacts" class="collapse {{ Route::currentRouteName() == 'contacts' ? 'show' : '' }} " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Contacts</h6>
            <a class="collapse-item {{ Route::currentRouteName() == 'contacts' ? 'active' : '' }}" href="{{ route('contacts') }}">Contacts</a>
          </div>
        </div>
      </li>
       
      <!-- Divider -->
      {{-- <hr class="sidebar-divider">

      <hr class="sidebar-divider"> --}}

      <li class="nav-item {{ Route::currentRouteName() == 'addSlider' ? 'active' : '' }} {{ Route::currentRouteName() == 'sliders' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
          <i class="fas fa-fw fa-image"></i>
          <span>Sliders</span>
        </a>
        <div id="collapseFour" class="collapse {{ Route::currentRouteName() == 'sliders' ? 'show' : '' }} {{ Route::currentRouteName() == 'addSlider' ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Sliders</h6>
            <a class="collapse-item {{ Route::currentRouteName() == 'addSlider' ? 'active' : '' }}" href="{{ route('addSlider') }}">Add Slider</a>
            <a class="collapse-item {{ Route::currentRouteName() == 'sliders' ? 'active' : '' }}" href="{{ route('sliders') }}">Manage Sliders</a>

          </div>
        </div>
      </li> 

      <li class="nav-item {{ Route::currentRouteName() == 'news' ? 'active' : '' }} {{ Route::currentRouteName() == 'addNews' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
          <i class="fas fa-fw fa-newspaper"></i>
          <span>News & Events</span>
        </a>
        <div id="collapseSeven" class="collapse {{ Route::currentRouteName() == 'addNews' ? 'show' : '' }} {{ Route::currentRouteName() == 'news' ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">News & Events</h6>
            <a class="collapse-item {{ Route::currentRouteName() == 'news' ? 'active' : '' }}" href="{{ route('news') }}">All News</a>
            <a class="collapse-item {{ Route::currentRouteName() == 'addNews' ? 'active' : '' }}" href="{{ route('addNews') }}">Add News</a>

          </div>
        </div>
      </li>

      <li class="nav-item {{ Route::currentRouteName() == 'studentportal' ? 'active' : '' }} {{ Route::currentRouteName() == 'addstudentportal' ? 'active' : '' }} {{ Route::currentRouteName() == 'howItWorksAdmin' ? 'active' : '' }} {{ Route::currentRouteName() == 'whyUkAdmin' ? 'active' : '' }} {{ Route::currentRouteName() == 'universities' ? 'active' : '' }} {{ Route::currentRouteName() == 'clients' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Settings</span>
        </a>
        <div id="collapseFive" class="collapse {{ Route::currentRouteName() == 'studentportal' ? 'show' : '' }} {{ Route::currentRouteName() == 'addstudentportal' ? 'show' : '' }} {{ Route::currentRouteName() == 'whyUkAdmin' ? 'show' : '' }} {{ Route::currentRouteName() == 'howItWorksAdmin' ? 'show' : '' }} {{ Route::currentRouteName() == 'universities' ? 'show' : '' }} {{ Route::currentRouteName() == 'clients' ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Settings</h6>
            <a class="collapse-item {{ Route::currentRouteName() == 'whyUkAdmin' ? 'active' : '' }}" href="{{ route('whyUkAdmin') }}">Why Uk</a>
            <a class="collapse-item {{ Route::currentRouteName() == 'howItWorksAdmin' ? 'active' : '' }}" href="{{ route('howItWorksAdmin') }}">How it works</a>
            <a class="collapse-item {{ Route::currentRouteName() == 'universities' ? 'active' : '' }}" href="{{ route('universities') }}">University List</a>
            <a class="collapse-item {{ Route::currentRouteName() == 'clients' ? 'active' : '' }}" href="{{ route('clients') }}">Our Clients</a>
            <a class="collapse-item {{ Route::currentRouteName() == 'studentportal' ? 'active' : '' }}" href="{{ route('studentportal') }}">Student Portal</a>
          </div>
        </div>
      </li> 

      <li class="nav-item {{ Route::currentRouteName() == 'faqs' ? 'active' : '' }} {{ Route::currentRouteName() == 'addFaqs' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFaq" aria-expanded="true" aria-controls="collapseFaq">
          <i class="fas fa-fw fa-question"></i>
          <span>FAQ</span>
        </a>
        <div id="collapseFaq" class="collapse {{ Route::currentRouteName() == 'addFaqs' ? 'show' : '' }} {{ Route::currentRouteName() == 'faqs' ? 'show' : '' }}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ Route::currentRouteName() == 'addFaqs' ? 'active' : '' }}" href="{{ route('addFaqs') }}">Add FAQ</a>
            <a class="collapse-item {{ Route::currentRouteName() == 'faqs' ? 'active' : '' }}" href="{{ route('faqs') }}">All FAQ</a>
          </div>
        </div>
      </li>

      <li class="nav-item {{ Route::currentRouteName() == 'addAbout' ? 'active' : '' }} {{ Route::currentRouteName() == 'abouts' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
          <i class="fas fa-tools"></i>
          <span>About</span>
        </a>
        <div id="collapseEight" class="collapse {{ Route::currentRouteName() == 'addAbout' ? 'show' : '' }}{{ Route::currentRouteName() == 'abouts' ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">About</h6>
            <a class="collapse-item {{ Route::currentRouteName() == 'addAbout' ? 'active' : '' }}" href="{{ route('addAbout') }}">Add Info</a>
            <a class="collapse-item {{ Route::currentRouteName() == 'abouts' ? 'active' : '' }}" href="{{ route('abouts') }}">Manage Info</a>
          </div>
        </div>
      </li>


      <hr class="sidebar-divider">
 
      <li class="nav-item {{ Route::currentRouteName() == 'manageAdmin' ? 'active' : '' }} {{ Route::currentRouteName() == 'addAdmin' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin" aria-expanded="true" aria-controls="collapseAdmin">
          <i class="fas fa-fw fa-users"></i>
          <span>Admins</span>
        </a>
        <div id="collapseAdmin" class="collapse {{ Route::currentRouteName() == 'addAdmin' ? 'show' : '' }} {{ Route::currentRouteName() == 'manageAdmin' ? 'show' : '' }}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ Route::currentRouteName() == 'addAdmin' ? 'active' : '' }}" href="{{ route('addAdmin') }}">Add Admin</a>
            <a class="collapse-item {{ Route::currentRouteName() == 'manageAdmin' ? 'active' : '' }}" href="{{ route('manageAdmin') }}">Manage Admins</a>
          </div>
        </div>
      </li> 


     
      <hr class="sidebar-divider">
      <!-- statement sidebar -->
      

      <!-- Divider -->
      {{-- <hr class="sidebar-divider"> --}}
      
      
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>