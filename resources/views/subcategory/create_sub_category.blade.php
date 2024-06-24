@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ isset($subcategory) ? 'Edit Sub Category' : 'Create Sub Category' }}</h5>

            <!-- General Form Elements -->
            <form action="{{ isset($subcategory) ? '/subcategory/update/' . $subcategory->id : '/subcategory/store' }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                            <option value="">Select Category</option>
                            @foreach($categorys as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $subcategory->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Sub Category Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('subcategory_name') is-invalid @enderror"
                            name="subcategory_name" value="{{ old('subcategory_name', $subcategory->subcategory_name ?? '') }}">
                        @error('subcategory_name')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-10 text-center">
                        <button type="submit" class="btn btn-primary"></button>
                    </div>
                </div>

            </form><!-- End General Form Elements -->

        </div>
    </div>
@endsection
