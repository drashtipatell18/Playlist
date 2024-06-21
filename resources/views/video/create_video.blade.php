@extends('layouts.main')
@section('content')
    <style>
        .wrapper {
            background: #39E2B6;
            height: 100%;
            width: 100%;
            position: fixed;
            top: 0;
            z-index: 9999;
            text-align: center;
            left: 0;
            font-size: 100px;
            font-family: calibri;
            color: white;
            line-height: 100vh;
        }

        .dropzone {
            width: 50%;
            margin: 1%;
            border: 2px dashed #3498db !important;
            border-radius: 5px;
        }

        .dz-message {
            text-align: center;
            margin: 2em 0;
        }

        .dz-message .text {
            font-size: 24px;
            font-family: Arial, sans-serif;
            color: #333;
        }
    </style>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ isset($video) ? 'Edit Video' : 'Create Popular Video' }}</h5>

            <!-- General Form Elements -->
            <form action="{{ isset($video) ? '/video/update/' . $video->id : '/video/store' }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                            <option value="">Select Category</option>
                            @foreach ($categorys as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', isset($video) ? $video->category_id : '') == $category->id ? 'selected' : '' }}>
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
                            @foreach ($subcategorys as $subcategory)
                                <option value="{{ $subcategory->id }}"
                                    {{ old('sub_category_id', isset($video) ? $video->sub_category_id : '') == $subcategory->id ? 'selected' : '' }}>
                                    {{ $subcategory->subcategory_name }}
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
                    <label for="inputPopularTopic" class="col-sm-2 col-form-label">Popular Topic Name</label>
                    <div class="col-sm-10">
                        <select class="form-control @error('popular_topic_id') is-invalid @enderror"
                            name="popular_topic_id">
                            <option value="">Select Popular Topic</option>
                            @foreach ($populartopics as $id => $name)
                                <option value="{{ $name }}"
                                    {{ old('popular_topic_id', isset($video) ? $video->popular_topic_id : '') == $id ? 'selected' : '' }}>
                                    {{ $id }}
                                </option>
                            @endforeach
                        </select>
                        @error('popular_topic_id')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                {{-- <div class="row mb-3">
                    <label for="inputVideo" class="col-sm-2 col-form-label">Video </label>
                    <div class="col-sm-10">
                        <div id="dropzone" class="dropzone">
                            <div class="dz-message">
                                <span class="text">Drop files here or click to upload +</span>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <form action="/upload" class="dropzone" id="dropzone">
                    <div class="dz-message ">
                      <span class="text">
                      Drop files here or click to upload + 
                      </span>
                      
                    </div>
                  </form>

                <div class="row mb-3">
                    <div class="col-sm-10 text-center">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>

            </form><!-- End General Form Elements -->

        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css">
    <script>
        // Initialize Dropzone
        Dropzone.autoDiscover = false;
        const myDropzone = new Dropzone("#my-dropzone", {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 500, // MB
            acceptedFiles: "video/*", // Limit file types to video files
            parallelUploads: 2, // Number of files to upload in parallel
            dictDefaultMessage: "Drop video files here or click to upload."
        });

        // Handle form submission
        myDropzone.on("sending", function(file, xhr, formData) {
            // Append all form inputs to the formData Dropzone will send
            document.querySelectorAll('form#my-dropzone input, form#my-dropzone select').forEach(function(input) {
                formData.append(input.name, input.value);
            });
        });
    </script>
@endpush
