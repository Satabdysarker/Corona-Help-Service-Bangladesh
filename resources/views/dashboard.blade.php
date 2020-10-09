@extends('template.main')

@section('main-content')
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Total Corona Cases
      </h1>
    </div>

    {{-- Report row --}}
    <div class="row">

      {{-- card 1 --}}
      <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2 dash-back-icon"
          style="background-image: url({{ asset('assets/img/virus.svg') }});">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-3">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Cases</div>
                <div id="total_cases" class="h5 mb-0 font-weight-bold text-gray-800">0</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- card 2 --}}
      <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2 dash-back-icon"
          style="background-image: url({{ asset('assets/img/recover-house.svg') }});">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Recovered</div>
                <div id="total_recovered" class="h5 mb-0 font-weight-bold text-gray-800">0</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- card 3 --}}
      <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2 dash-back-icon"
          style="background-image: url({{ asset('assets/img/dead-bad.png') }});">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Deaths</div>
                <div id="total_death" class="h5 mb-0 font-weight-bold text-gray-800">0</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- card 4 --}}
      <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2 dash-back-icon"
          style="background-image: url({{ asset('assets/img/virus.svg') }});">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Today's Cases</div>
                <div id="today_cases" class="h5 mb-0 font-weight-bold text-gray-800">0</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- card 5 --}}
      <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2 dash-back-icon"
          style="background-image: url({{ asset('assets/img/recover-house.svg') }});">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Today's Recovered
                </div>
                <div id="today_recovered" class="h5 mb-0 font-weight-bold text-gray-800">0</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- card 6 --}}
      <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2 dash-back-icon"
          style="background-image: url({{ asset('assets/img/dead-bad.png') }});">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Today's Deaths</div>
                <div id="today_deaths" class="h5 mb-0 font-weight-bold text-gray-800">0</div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    @push('script')
      <script>
        axios.get('https://corona.lmao.ninja/v2/countries/Bangladesh?yesterday&strict&query')
          .then(function(response) {
            // console.log(response.data);

            $("#total_cases").text(response.data.cases);
            $("#total_recovered").text(response.data.recovered);
            $("#total_death").text(response.data.deaths);
            $("#today_cases").text(response.data.todayCases);
            $("#today_recovered").text(response.data.todayRecovered);
            $("#today_deaths").text(response.data.todayDeaths);

          })
          .catch(function(error) {
            console.log(error);
          });

      </script>
    @endpush


    {{---> hospital infomation --}}
    <div id="hospital_table" class="card shadow mb-4">
      <div class="card-header py-3 border-bottom-primary">
        <h6 class="m-0 font-weight-bold text-primary text-lg">Hospitals Information
          @auth
            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#add_hospital_info_modal">
              Add
            </button>
          @endauth
        </h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered datatable text-gray-800" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Name</th>
                <th>City</th>
                <th>Phone</th>
                <th>Divition</th>
                <th>Address</th>
                @auth
                  <th>Action</th>
                @endauth
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Name</th>
                <th>City</th>
                <th>Phone</th>
                <th>Divition</th>
                <th>Address</th>
                @auth
                  <th>Action</th>
                @endauth
              </tr>
            </tfoot>
            <tbody>

              @foreach ($hospitals as $item)
                <tr>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->city }}</td>
                  <td>{{ $item->phone }}</td>
                  <td>{{ $item->divition }}</td>
                  <td>{{ $item->address }}</td>

                  @auth
                    <td><button class="btn btn-info btn-cercle btn-sm" onclick="get_edit_hospotal('{{ $item->id }}');"><i
                          class="fas fa-pencil-alt"></i></button> &nbsp;
                      <button class="btn btn-danger btn-cercle btn-sm" onclick="delete_hospital('{{ $item->id }}');"><i
                          class="fas fa-trash"></i></button>
                    </td>
                  @endauth
                </tr>
              @endforeach

            </tbody>
          </table>

          @push('script')
            <script>
              function delete_hospital(id) {
                $('#delete_modal').find('form').attr('action', "{{ url('hospital/delete') }}/" + id);
                $('#delete_modal').modal('show');
              }
              $('#delete_modal').on('hidden.bs.modal', function(e) {
                $('#delete_modal').find('form').attr('action', "");
              });

            </script>
          @endpush
          @push('modals')
            <!-- Logout Modal-->
            <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-footer justify-content-center">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          @endpush

        </div>
      </div>
    </div>


    {{-- ambulance --}}
    <div class="card shadow mb-4">
      <div class="card-header border-bottom-primary py-3">
        <h6 class="m-0 font-weight-bold text-primary text-lg">Ambulance Information
          @auth
            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#add_ambulance_info_modal">
              Add
            </button>
          @endauth
        </h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered datatable text-gray-800" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Name</th>
                <th>City</th>
                <th>Phone</th>
                <th>Hospital Name</th>
                <th>Divition</th>
                <th>Address</th>
                
                @auth
                  <th>Action</th>
                @endauth
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Name</th>
                <th>City</th>
                <th>Phone</th>
                <th>Hospital Name</th>
                <th>Divition</th>
                <th>Address</th>
                
                @auth
                  <th>Action</th>
                @endauth
              </tr>
            </tfoot>
            <tbody>
              @foreach ($ambulances as $item)
                <tr>
                  <td>{{ $item->name ?? 'N/A' }}</td>
                  <td> {{ $item->city }} </td>
                  <td> {{ $item->phone }}</td>
                  <td> {{ $item->hospital ?? 'N/A' }}</td>
                  <td> {{ $item->divition }}</td>
                  <td> {{ $item->address }}</td>
                
                  @auth
                    <td>
                      <button class="btn btn-info btn-cercle btn-sm" onclick="get_edit_ambulance('{{ $item->id }}');"><i
                          class="fas fa-pencil-alt"></i></button> &nbsp;
                      <button class="btn btn-danger btn-cercle btn-sm" onclick="delete_ambulance('{{ $item->id }}')"><i
                          class="fas fa-trash"></i></button>
                    </td>
                  @endauth
                </tr>
              @endforeach
            </tbody>
          </table>

          @push('script')
            <script>
              function delete_ambulance(id) {
                $('#delete_modal').find('form').attr('action', "{{ url('ambulance/delete') }}/" + id);
                $('#delete_modal').modal('show');
              }
              $('#delete_modal').on('hidden.bs.modal', function(e) {
                $('#delete_modal').find('form').attr('action', "");
              });

            </script>
          @endpush
        </div>
      </div>
    </div>

    {{-- Actions --}}
    <div class="card shadow mb-4">
      <div class="card-header py-3 border-bottom-primary">
        <h6 class="m-0 font-weight-bold text-primary text-lg">Actions</h6>
      </div>
      <div class="card-body" style="background: url({{ asset('assets/img/corona.jpg') }});">

        <div class="text-center">
          <a class="btn btn-primary btn-icon-split my-2 btn-lg scroll-to" href="{{route('hospital.getHospitalInfo')}}">
            <span class="icon text-white-50">
              <i class="fas fa-check"></i>
            </span>
            <span class="text">Available Seat for Corona test</span>
          </a>
          <br>

          <button class="btn btn-success btn-icon-split my-2 btn-lg" data-toggle="modal" data-target="#screen_test">
            <span class="icon text-white-50">
              <i class="fas fa-check"></i>
            </span>
            <span class="text">Take Screening Test</span>
          </button>
          <br>
              <div class="modal fade" id="add_hospital_info_modal" tabindex="-1" role="dialog" aria-labelledby="add_hospital_info"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-info text-lg" id="add_hospital_info">Add Hospital Form</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="{{ route('hospital.postAddHospital') }}" method="POST">
          @csrf
          <div class="modal-body text-gray-900">

            <div class="form-group">
              <label>Hospital Name</label>
              <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
              <label>City</label>
              <input type="text" name="city" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Divition</label>
              <input type="text" name="divition" class="form-control">
            </div>
            <div class="form-group">
              <label>Phone</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">+880</div>
                </div>
                <input type="number" class="form-control" name="phone" required>
              </div>
            </div>
            <div class="form-group">
              <label>Address</label>
              <input type="text" name="address" class="form-control">
            </div>

            <div class="form-group">
              <label>Today's Tests</label>
              <input type="number" name="today_test_count" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Total Tests</label>
              <input type="number" name="total_test_count" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Available Seat</label>
              <input type="number" name="available_seat" class="form-control" required>
            </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
          <div class="modal fade" id="add_hospital_info_modal" tabindex="-1" role="dialog" aria-labelledby="add_hospital_info"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-info text-lg" id="add_hospital_info">Add Hospital Form</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="{{ route('hospital.postAddHospital') }}" method="POST">
          @csrf
          <div class="modal-body text-gray-900">

            <div class="form-group">
              <label>Hospital Name</label>
              <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
              <label>City</label>
              <input type="text" name="city" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Divition</label>
              <input type="text" name="divition" class="form-control">
            </div>
            <div class="form-group">
              <label>Phone</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">+880</div>
                </div>
                <input type="number" class="form-control" name="phone" required>
              </div>
            </div>
            <div class="form-group">
              <label>Address</label>
              <input type="text" name="address" class="form-control">
            </div>

            <div class="form-group">
              <label>Today's Tests</label>
              <input type="number" name="today_test_count" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Total Tests</label>
              <input type="number" name="total_test_count" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Available Seat</label>
              <input type="number" name="available_seat" class="form-control" required>
            </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
 
     </div>
         <h6 class="m-0 font-weight-bold text-primary text-lg"></h6>
      </div>
      <div class="card-body text-center text-gray-900">

        <label class="border-left-success border-bottom-success mx-3 px-3 py-2 rounded bg-gray-100" data-toggle="modal" data-target="#greenzone">
          Green zone           
        </label>
        <label class="border-left-warning border-bottom-warning mx-3 px-3 py-2 rounded bg-gray-100" data-toggle="modal" data-target="#yellowzone">
          Yellow zone
        </label>
        <label class="border-left-danger border-bottom-danger mx-3 px-3 py-2 rounded bg-gray-100" data-toggle="modal" data-target="#redzone">
          Red zone
        </label>
      </div>
    </div>
  </div>
@endsection

@push('modals')

  {{-- add hospotal form --}}
  <div class="modal fade" id="add_hospital_info_modal" tabindex="-1" role="dialog" aria-labelledby="add_hospital_info"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-info text-lg" id="add_hospital_info">Add Hospital Form</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="{{ route('hospital.postAddHospital') }}" method="POST">
          @csrf
          <div class="modal-body text-gray-900">

            <div class="form-group">
              <label>Hospital Name</label>
              <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
              <label>City</label>
              <input type="text" name="city" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Divition</label>
              <input type="text" name="divition" class="form-control">
            </div>
            <div class="form-group">
              <label>Phone</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">+880</div>
                </div>
                <input type="number" class="form-control" name="phone" required>
              </div>
            </div>
            <div class="form-group">
              <label>Address</label>
              <input type="text" name="address" class="form-control">
            </div>

            <div class="form-group">
              <label>Today's Tests</label>
              <input type="number" name="today_test_count" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Total Tests</label>
              <input type="number" name="total_test_count" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Available Seat</label>
              <input type="number" name="available_seat" class="form-control" required>
            </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  {{-- add ambulance info modal --}}
  <div class="modal fade" id="add_ambulance_info_modal" tabindex="-1" role="dialog" aria-labelledby="add_ambulance_info"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-info text-lg" id="add_ambulance_info">Add Ambulance Form</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="{{ route('ambulance.postAddAmbulance') }}" method="POST">
          <div class="modal-body text-gray-900">

            @csrf
            <div class="form-group">
              <label>Ambulance Name</label>
              <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
              <label>City</label>
              <input type="text" name="city" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Divition</label>
              <input type="text" name="divition" class="form-control">
            </div>
            <div class="form-group">
              <label>Hospital Name</label>
              <input type="text" name="hospital_name" class="form-control">
            </div>
            <div class="form-group">
              <label>Phone</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">+880</div>
                </div>
                <input type="number" class="form-control" name="phone" required>
              </div>
            </div>
            <div class="form-group">
              <label>Address</label>
              <input type="text" name="address" class="form-control">
            </div>
          
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  {{-- Screen Test --}}
  <div class="modal fade" id="screen_test" tabindex="-1" role="dialog" aria-labelledby="add_hospital_info"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-info text-lg" id="add_hospital_info">Screening test</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form  action="{{ route('hospital.postAddHospital') }}" method="POST">
          @csrf
          <div class="modal-body text-gray-900">
            <div class="form-group">
            <label for="" >1.Do you have a fever? </label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="FeverRadios" value="1">
                <label class="form-check-label" for="FeverRadios1">
                  Yes
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="FeverRadios" value="0">
                <label class="form-check-label" for="FeverRadios2">
                  no
                </label>
              </div>
            </div>

            <div class="form-group">
            <label for="" >2.Do you have Cough </label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="coughredios" value="1">
                <label class="form-check-label" for="coughredios1">
                  Yes
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="coughredios" value="0">
                <label class="form-check-label" for="coughredios2">
                  no
                </label>
              </div>
            </div>
                 <div class="form-group">
            <label for="" >3.Suffering from shortness of breathe?</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="breathRadios" value="1">
                <label class="form-check-label" for="breathRadios1">
                  Yes
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="breathRadios" value="0">
                <label class="form-check-label" for="breathRadios2">
                  no
                </label>
              </div>
            </div>
             <div class="form-group">
            <label for="" >4.Do you feel fatigue?</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="fatigueRadios" value="1">
                <label class="form-check-label" for="fatigueRadios1">
                  Yes
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="fatigueRadios" value="0">
                <label class="form-check-label" for=fatigueRadios2">
                  no
                </label>
              </div>
            </div>
             <div class="form-group">
            <label for="" >5.Do you have muscles or body aches? </label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="achesRadios" value="1">
                <label class="form-check-label" for="achesRadios1">
                  Yes
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="achesRadios" value="0">
                <label class="form-check-label" for="achesRadios2">
                  no
                </label>
              </div>
            </div>
             <div class="form-group">
            <label for="" > 5.Do you have headache? </label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="headRadios" value="1">
                <label class="form-check-label" for="headRadios1">
                  Yes
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="readRadios" value="0">
                <label class="form-check-label" for="readRadios2">
                  no
                </label>
              </div>
            </div> 
            <div class="form-group">
            <label for="" >6.Have you lost of smell and test? </label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="smellRadios" value="1">
                <label class="form-check-label" for="smellRadios1">
                  Yes
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="smellRadios" value="0">
                <label class="form-check-label" for="smellRadios2">
                  no
                </label>
              </div>
            </div>
             <div class="form-group">
            <label for="" >7.Have you suffaring from sore throat? </label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="soreRadios" value="1">
                <label class="form-check-label" for="soreRadios1">
                  Yes
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="soreRadios" value="0">
                <label class="form-check-label" for="soreRadios2">
                  no
                </label>
              </div>
            </div>
            
              <div class="form-group">
            <label for="" >8.Do you have congestion and runny nose? </label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="noseRadios" value="1">
                <label class="form-check-label" for="noseRadios1">
                  Yes
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="noseRadios" value="0">
                <label class="form-check-label" for="noseRadios2">
                  no
                </label>
              </div>
            </div>
              <div class="form-group">
            <label for="" >9.Do you feel naouseus? </label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="feelRadios" value="1">
                <label class="form-check-label" for="feelRadios1">
                  Yes
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="feelRadios" value="0">
                <label class="form-check-label" for="feelRadios2">
                  no
                </label>
              </div>
            </div>
            
            <div class="form-group">
            <label for="" >10.Have you suffaring from diarrhea? </label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="diarrheaRadios" value="1">
                <label class="form-check-label" for="diarrheaRadios1">
                  Yes
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="diarrheaRadios" value="0">
                <label class="form-check-label" for="diarrheaRadios2">
                  no
                </label>
              </div>
            </div>
            

          </div>
          <div class="modal-footer">
            <h3>Your total point: <span id="result">0</span></h3>
            <p>If your result is more than 5, you should take Corona test</p>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  
  <!-- greenzone -->
  <div class="modal fade" id="greenzone" tabindex="-1" role="dialog" aria-labelledby="add_hospital_info"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-info text-lg" id="add_hospital_info">Green zone area</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
          <div class="modal-body">
          <ol>
         <li>Netrokona</li> 
         <li>Jamalpu</li>
         <li>Shylet</li>
         <li>Jossohor</li>
         <li>Chitagong</li> 
          </div>

      </div>
    </div>
  </div>
    <!-- yellowzone -->
  <div class="modal fade" id="yellowzone" tabindex="-1" role="dialog" aria-labelledby="add_hospital_info"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-info text-lg" id="add_hospital_info">Yellow zone area</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <li>Jhalokathi<li>
          <li>potuakhali</li>
          <li>barishal</li>
          <li>Pabna</li>
          <li>khagrachori</li>
          </div>
      </div>
    </div>
  </div>
    <!-- redzone -->
  <div class="modal fade" id="redzone" tabindex="-1" role="dialog" aria-labelledby="add_hospital_info"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-info text-lg" id="add_hospital_info">Red zone area</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
          <div class="modal-body">
           <li>Dhaka</li>
         <li> Gajipur</li>
         <li>madaripur</li>
         <li>khulna</li>
          </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="add_hospital_info"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-info text-lg" id="add_hospital_info">Screening test</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          </div>
      </div>
    </div>
  </div>

  @push('script')
  <script>
    let total =0;
              $('#screen_test input').click(function(){
                total =0;
                $('#screen_test input[type="radio"]:checked').each(function(i,el){
                  
                  if($(el).val()=="1")
                  {
                    // console.log( $(el).val());
                    total ++;
                  }

                  // console.log();

              
                });
                $('#result').text(total);
                // console.log(total);
              });
  
  </script>
  @endpush

@endpush

@push('script')
  <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('.datatable').DataTable();
    });


    // edit hospital
    function get_edit_hospotal(id) {
      axios.get("{{ url('hospital/hos') }}/" + id)
        .then(function(response) {
          // handle success
          const hospital = response.data.hospital;

          const modal = $('#add_hospital_info_modal');

          for (property in hospital) {
            modal.find('input[name="' + property + '"]').val(hospital[property] || 0);
            // console.log(`key= ${property} value = ${hospital[property]}`)
          }

          const form_action = modal.find('form').attr('action');
          modal.find('form').attr('action', "{{ route('hospital.postEditHospital') }}");

          modal.modal('show');

          modal.on('hidden.bs.modal', function(e) {
            modal.find('form').attr('action', form_action);
          });
        });
    }

    // edit Ambulance
    function get_edit_ambulance(id) {
      axios.get("{{ url('ambulance/ambu') }}/" + id)
        .then(function(response) {
          // handle success
          const ambulance = response.data.ambulance;
          // console.log(ambulance);

          const modal = $('#add_ambulance_info_modal');

          for (property in ambulance) {
            modal.find('input[name="' + property + '"]').val(ambulance[property] || 0);
            // console.log(`key= ${property} value = ${ambulance[property]}`)
          }

          const form_action = modal.find('form').attr('action');
          modal.find('form').attr('action', "{{ route('ambulance.postEdit') }}");

          modal.modal('show');

          modal.on('hidden.bs.modal', function(e) {
            modal.find('form').attr('action', form_action);
          });
        });
    }

  </script>


@endpush
