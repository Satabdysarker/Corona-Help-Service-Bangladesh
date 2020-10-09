@extends('template.main')

@section('main-content')
  <div class="container-fluid">
  <div class="table-responsive">
          <table class="table table-bordered datatable text-gray-800" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Name</th>
                <th>City</th>
                <th>Phone</th>
                <th>Today's Tests</th>
                <th>Total Tests</th>
                <th>Available Seat</th>
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
                <th>Today's Tests</th>
                <th>Total Tests</th>
                <th>Available Seat</th>
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
                  <td>{{ $item->today_test_count ?? 0 }}</td>
                  <td>{{ $item->total_test_count ?? 0 }}</td>
                  <td>{{ $item->available_seat ?? 0 }}</td>
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
  </div>
@endsection