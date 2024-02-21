
@extends('layouts.home')

@section('title', 'Profiles')

@section('content')

<div class="pagetitle">
  <h1>Profiles</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Profiles</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="card col-lg-12">
    <div class="card-body">
      <h5 class="card-title"><a href="{{url('profile/create')}}" class="btn btn-primary btn-sm">Tambah</a></h5>
      <!-- Table with stripped rows -->
      <table class="table datatable">
        <thead>
          <tr>
            <th scope="col">Firstname</th>
            <th scope="col">Lastname</th>
            <th scope="col">Username</th>
            <th scope="col">City</th>
            <th scope="col">State</th>
            <th scope="col">Zip Code</th>
            <th scope="col">Address</th>
            <th scope="col">#</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($profiles as $e)
          <tr>
            <td>{{$e->firstname}}</td>
            <td>{{$e->lastname}}</td>
            <td>{{$e->username}}</td>
            <td>{{$e->city}}</td>
            <td>{{$e->state}}</td>
            <td>{{$e->zip_code}}</td>
            <td>{{$e->address}}</td>
            <td>
              <a href="{{url('profile/edit/'.$e->id)}}" class="btn btn-success btn-sm">Ubah</a>
              <a id="show_confirm" link="{{url('profile/delete/'.$e->id)}}" class="btn btn-danger btn-sm" > Hapus</a>
              {{-- <a href="{{url('profile/delete/'.$e->id)}}" class="btn btn-danger btn-sm"> Hapus</a> --}}
            </td>
          </tr>  
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>    
@endsection

