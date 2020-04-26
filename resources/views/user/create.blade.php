@extends('layouts.dashboard')
@section('content')
  <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Simple Table</h4>
            <a href="{{ route('users.index') }}" class="btn btn-primery pull-right">Back</a>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('users.store') }}">
              @csrf
              <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Create Name">
              </div>
              <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Create Email">
              </div>
              <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Create Password">
              </div>
              <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            </form>
          </div>
        </div>
      </div>
  </div>
@endsection
