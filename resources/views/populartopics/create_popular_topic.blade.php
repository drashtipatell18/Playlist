@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><div class="text-center">{{ isset($populartopic) ? 'Edit Popular Topic' : 'Create Popular Topic' }}</div></h5>

            <!-- General Form Elements -->
            <form action="{{ isset($populartopic) ? '/populartopic/update/' . $populartopic->id : '/populartopic/store' }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                            <option value="">Select Category</option>
                            @foreach($categorys as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $populartopic->category_id ?? '') == $category->id ? 'selected' : '' }}>
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
                    <label for="inputCategory" class="col-sm-2 col-form-label">Sub Category Name</label>
                    <div class="col-sm-10">
                        <select class="form-control @error('sub_category_id') is-invalid @enderror" name="sub_category_id">
                            <option value="">Select Sub Category</option>
                            @foreach($subcategorys as $category)
                                <option value="{{ $category->id }}" {{ old('sub_category_id', $populartopic->sub_category_id ?? '') == $category->id ? 'selected' : '' }}>
                                    {{ $category->subcategory_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('sub_category_id')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Popular Topic Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('popular_topics_name') is-invalid @enderror"
                            name="popular_topics_name" value="{{ old('popular_topics_name', $populartopic->popular_topics_name ?? '') }}">
                        @error('popular_topics_name')
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
@endsection
