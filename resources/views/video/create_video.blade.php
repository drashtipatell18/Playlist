@extends('layouts.main')
@section('content')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
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
            margin-left: auto !important;
            margin-right: auto !important;
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
            <form action="{{ isset($video) ? '/video/update/' . $video->id : '/video/store' }}" id="frm" method="POST">
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
                <div class="row mb-3">
                    <label for="inputPopularTopic" class="col-sm-2 col-form-label">Video</label>
                        <div class="col-sm-10">
                            <div id="dZUpload" class="dropzone">
                                <div class="dz-default dz-message">Drop files here or click to upload +</div>
                            </div>
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
@push('scripts')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
        // Initialize Dropzone
        Dropzone.autoDiscover = false;
        const myDropzone = new Dropzone("#dZUpload", {
            uploadMultiple: false,
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 500, // MB
            acceptedFiles: "video/*", // Limit file types to video files
            parallelUploads: 2, // Number of files to upload in parallel
            dictDefaultMessage: "Drop video files here or click to upload.",
            url: "hn_SimpeFileUploader.ashx",
        });

        $("#frm").submit(function(e) {
            e.preventDefault();
            let formData = new FormData($("#frm")[0])
            formData.append('video', myDropzone.getAcceptedFiles()[0]);
            console.log(...formData);
        })
    </script>
@endpush
