@extends('layouts.home')

@section('title', 'Profiles | Create')

@section('content')

<div class="pagetitle">
  <h1>Create Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="{{url('employee')}}">Profiles</a></li>
      <li class="breadcrumb-item active">Create</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
    
<section class="section">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title"></h5>
      <!-- Custom Styled Validation -->
      <form class="row g-3 needs-validation was-validated" novalidate="" action="{{url('profile/add')}}" method="POST">
        @csrf
        <div class="col-md-4">
          <label for="firstname" class="form-label">Firstname</label>
            <input type="text" class="form-control" id="firstname" name="firstname" required>

            <div class="valid-feedback">
              <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Looks good!</span>
            </div>
            <div class="invalid-feedback">
              <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Please provide a valid Firstname</span>
            </div>
        </div>
        
        <div class="col-md-4">
          <label for="lastname" class="form-label">Lastname</label>
          <input type="text" class="form-control" id="lastname" name="lastname" required>

          <div class="valid-feedback">
            Looks good!
          </div>
          <div class="invalid-feedback">
            <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Please provide a valid Lastname</span>
          </div>
        </div>

        <div class="col-md-4">
          <label for="username" class="form-label">Username</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="username">@</span>
            <input type="text" class="form-control" id="username" name="username" required>

            <div class="valid-feedback">
              <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Looks good!</span>
            </div>
            <div class="invalid-feedback">                 
              @error('username')
              <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i>
                {{ $message }}
              </span>
              @enderror
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <label for="city" class="form-label">City</label>
          <input type="text" class="form-control" id="city" name="city" required>

          <div class="valid-feedback">
            <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Looks good!</span>
          </div>
          <div class="invalid-feedback">
            <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Please provide a valid City</span>
          </div>
        </div>

        <div class="col-md-4">
          <label for="state" class="form-label">State</label>
          <input type="text" class="form-control" id="state" name="state" required>

          <div class="valid-feedback">
            <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Looks good!</span>
          </div>
          <div class="invalid-feedback">
            <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Please provide a valid State</span>
          </div>
        </div>

        <div class="col-md-4">
          <label for="zip_code" class="form-label">Zip</label>
          <input type="number" class="form-control" id="zip" name="zip_code" required>

          <div class="valid-feedback">
            <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Looks good!</span>
          </div>
          <div class="invalid-feedback">
            <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Please provide a valid Zip</span>
            @error('zip_code')
              <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i>
                {{ $message }}
              </span>
              @enderror
          </div>
        </div>

        <div class="col-12">
          <label for="inputAddress5" class="form-label">Address</label>
          <textarea class="form-control" name="address" id="address" rows="2" name="address" required></textarea>

          <div class="valid-feedback">
            <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Looks good!</span>
          </div>
          <div class="invalid-feedback">
            <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Please provide a valid Address</span>
          </div>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End Custom Styled Validation -->
    </div>
  </div>
</section>  
@endsection