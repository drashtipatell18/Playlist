@extends('layouts.main')
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Create Category</h5>

      <!-- General Form Elements -->
      <form>
        <div class="row mb-3">
          <label for="inputText" class="col-sm-2 col-form-label">Category Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="category_name">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-10 text-center">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>

      </form><!-- End General Form Elements -->

    </div>
  </div>
@endsection