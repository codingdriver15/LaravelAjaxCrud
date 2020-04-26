@extends('layouts.dashboard')
@section('content')
  <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Simple Table</h4>
            <a href="{{ route('users.create') }}" class="btn btn-primery pull-right">Create User </a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Name
                  </th>
                  <th>
                    Email
                  </th>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  <tr>
                    <td>
                      {{ $user->name }}
                    </td>
                    <td>
                      {{ $user->email }}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>
@endsection
