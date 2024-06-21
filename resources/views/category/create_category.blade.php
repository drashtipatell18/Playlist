@extends('layouts.main')
@section('content')
    <div class="col-lg-8 align-content">
        <div class="card section-center">
            <div class="card-body">
                <div class="card-body">
                    <h5 class="card-title">{{ isset($category) ? 'Edit Category' : 'Create Category' }}</h5>

                    <!-- General Form Elements -->
                    <form action="{{ isset($category) ? '/category/update/' . $category->id : '/category/store' }}"
                        method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Category Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('category_name') is-invalid @enderror"
                                    name="category_name" value="{{ old('category_name', $category->category_name ?? '') }}">
                                @error('category_name')
                                    <span class="invalid-feedback" style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
        </div>
    </div>
@endsection
