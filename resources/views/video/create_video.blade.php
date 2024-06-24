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
            <form action="{{ isset($video) ? '/video/update/' . $videovideoid : '/video/store' }}" id="frm" method="POST">
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
                                    {{ old('popular_topic_id', isset($video) ? $video->popular_topic_id : '') == $name ? 'selected' : '' }}>
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
                            @if (isset($video) && $video->video)
                                <div class="mt-2">
                                    <video width="320" height="240" controls>
                                        <source src="{{ url('videos/' . $video->video) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                    <input type="hidden" name="existing_video" value="{{ $video->video }}">
                                </div>
                            @endif
                            <div class="dz-default dz-message">Drop files here or click to upload +</div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Video Course Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('video_course_name') is-invalid @enderror"
                            name="video_course_name"
                            value="{{ old('video_course_name', $video->video_course_name ?? '') }}">
                        @error('video_course_name')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                            value="{{ old('price', $video->price ?? '') }}">
                        @error('price')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description" id="description" rows="4">{{ old('description', $video->description ?? '') }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Author</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('author') is-invalid @enderror" name="author"
                            value="{{ old('author', $video->author ?? '') }}">
                        @error('author')
                            <span class="invalid-feedback" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputPopularTopic" class="col-sm-2 col-form-label">Preview</label>
                    <div class="col-sm-10">
                        <div id="dZUpload1" class="dropzone">
                            <div class="dz-default dz-message">Drop files here or click to upload +</div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-10 text-center">
                        <button type="submit" class="btn btn-primary">
                            @if (isset($video))
                                Update
                            @else
                                Save
                            @endif
                        </button>
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
        const myDropzone1 = new Dropzone("#dZUpload1", {
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

            let formData = new FormData($("#frm")[0]);
            formData.append('video', myDropzone.getAcceptedFiles()[0]);
            formData.append('preview', myDropzone1.getAcceptedFiles()[0]);

            $.ajax({
                url: "{{ route('video.store') }}", // Ensure the correct route is set
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // alert('Video inserted successfully.');
                        window.location.href = "{{ route('video') }}"; // Redirect to the videos page
                    } else {
                        alert('An error occurred.');
                        console.log(response.errors);
                    }
                },
                error: function(xhr, status, error) {
                    let errors = xhr.responseJSON.errors;
                    for (let key in errors) {
                        if (errors.hasOwnProperty(key)) {
                            alert(errors[key]);
                        }
                    }
                }
            });
        });
    </script>
@endpush
