<nav class="navbar navbar-expand navbar-light bg-gradient-primary topbar mb-4 static-top shadow">

  <!-- Sidebar - Brand -->
  <div class="dropdown no-arrow">
    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
      aria-haspopup="true" aria-expanded="false">
      <h3 class="text-white"><i class="fas fa-laugh-wink"></i></h3>
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">

      @guest
        <a class="dropdown-item" href="{{ url('/login') }}">Login</a>
      @else
        <button class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Logout
        </button>
      @endguest


    </div>
  </div>
  <a class="nav-link" href="{{ url('/') }}">
    <h3 class="text-white">Help center(Covid 19)</h3>
  </a>


  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">

    {{-- <div class="topbar-divider d-none d-sm-block"></div>
    <!-- Nav Item - Messages -->
    <li class="nav-item dropdown no-arrow mx-1">
      <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope fa-fw"></i>
        <!-- Counter - Messages -->
        <span class="badge badge-danger badge-counter">7</span>
      </a>
      <!-- Dropdown - Messages -->
      <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="messagesDropdown">
        <span class="dropdown-header">
          Message Center
        </span>
        <a class="dropdown-item d-flex align-items-center" href="#">
          <div class="dropdown-list-image mr-3">
            <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
            <div class="status-indicator bg-success"></div>
          </div>
          <div class="font-weight-bold">
            <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been
              having.</div>
            <div class="small text-gray-500">Emily Fowler · 58m</div>
          </div>
        </a>
        <a class="dropdown-item d-flex align-items-center" href="#">
          <div class="dropdown-list-image mr-3">
            <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
            <div class="status-indicator"></div>
          </div>
          <div>
            <div class="text-truncate">I have the photos that you ordered last month, how would you like them
              sent to you?</div>
            <div class="small text-gray-500">Jae Chun · 1d</div>
          </div>
        </a>
        <a class="dropdown-item d-flex align-items-center" href="#">
          <div class="dropdown-list-image mr-3">
            <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
            <div class="status-indicator bg-warning"></div>
          </div>
          <div>
            <div class="text-truncate">Last month's report looks great, I am very happy with the progress so
              far, keep up the good work!</div>
            <div class="small text-gray-500">Morgan Alvarez · 2d</div>
          </div>
        </a>
        <a class="dropdown-item d-flex align-items-center" href="#">
          <div class="dropdown-list-image mr-3">
            <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
            <div class="status-indicator bg-success"></div>
          </div>
          <div>
            <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people
              say this to all dogs, even if they aren't good...</div>
            <div class="small text-gray-500">Chicken the Dog · 2w</div>
          </div>
        </a>
        <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
      </div>
    </li> --}}

    {{--
    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
        <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
      </a>
      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="#">
          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          Profile
        </a>
        <a class="dropdown-item" href="#">
          <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
          Settings
        </a>
        <a class="dropdown-item" href="#">
          <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
          Activity Log
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Logout
        </a>
      </div>
    </li> --}}

    <li class="nav-item dropdown">
      <button class="btn btn-primary text-lg border-bottom-info bg-gradient-primary" data-toggle="modal" data-target="#help_line_modal">Helpline</button>

      @push('modals')
      <div class="modal fade" id="help_line_modal" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-info text-lg" id="add_hospital_info">Help Line</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body text-gray-900">
            
              <div class="form-group">
                <p class="text-lg">
                  <br>
                  Notional help center- 333
                  <br>
                  IEDCR -1065
                  <br>
                  Health line -09611677777
                  <br>
                  National help line-109
                </p>
              </div>
            
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
      @endpush


      <button class="btn btn-primary text-lg border-bottom-info bg-gradient-primary" data-toggle="modal" data-target="#symptoms_modal">Symptoms</button>
      @push('modals')
      <div class="modal fade" id="symptoms_modal" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-info text-lg" id="add_hospital_info">Symptoms</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body text-gray-900">
      
              <div class="form-group">
                <p class="text-lg">
                  Symptoms may appear 2-14 days after exposure to the
                  virus. People with these symptoms may have COVID-
                  19:
                  
                  <ol>
                    <li>Fever or chills</li>
                    <li>Cough</li>
                    <li>Shortness of breath or difficulty breathing</li>
                    <li>Fatigue</li>
                    <li>Muscle or body aches</li>
                    <li>Headache</li>
                    <li>New loss of taste or smell</li>
                    <li>Sore throat</li>
                    <li>Congestion or runny nose</li>
                    <li>Nausea or vomiting</li>
                    <li>Diarrhea</li>
                  </ol>
                  
                </p>
              </div>
      
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
      @endpush


      <button class="btn btn-primary text-lg border-bottom-info bg-gradient-primary" data-toggle="modal" data-target="#about_modal">About</button>
      @push('modals')
      <div class="modal fade" id="about_modal" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-info text-lg" id="add_hospital_info">About</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body text-gray-900">
      
              <div class="form-group">
                <p>
                  <br>
                  Used PHP frameword Laravel for backend
                  <br>
                  Used Api link: <a href="https://documenter.getpostman.com/view/11144369/Szf6Z9B3?version=latest#f3782d0a-53db-4024-ab1c-95e3bd8c33ec">https://documenter.getpostman.com/view/11144369</a>
                </p>
              </div>
      
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
      @endpush

    </li>

  </ul>

</nav>
