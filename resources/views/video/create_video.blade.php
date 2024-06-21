@extends('layouts.main')
@section('content')
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
                        <select class="form-control @error('popular_topic_id') is-invalid @enderror" name="popular_topic_id">
                            <option value="">Select Popular Topic</option>
                            @foreach ($populartopics as $id => $name)
                                <option value="{{ $id }}"
                                    {{ old('popular_topic_id', isset($video) ? $video->popular_topic_id : '') == $id ? 'selected' : '' }}>
                                    {{ $name }}
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

                <div id="dropzone" class="dropzone">
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>
                    <div class="dz-message" data-dz-message>
                        <span>Drop video files here or click to upload.</span>
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
@section('scripts')
<script>
      const dropzone = document.getElementById('dropzone');
        const fileInput = document.createElement('input');
        fileInput.setAttribute('type', 'file');
        fileInput.setAttribute('accept', 'video/*'); // Accept video files only

        dropzone.addEventListener('click', () => {
            fileInput.click(); // Trigger file input click when dropzone is clicked
        });

        fileInput.addEventListener('change', () => {
            const files = fileInput.files;
            // Handle selected files (e.g., upload or process them)
            console.log(files);
        });

        dropzone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropzone.classList.add('dragover');
        });

        dropzone.addEventListener('dragleave', () => {
            dropzone.classList.remove('dragover');
        });

        dropzone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropzone.classList.remove('dragover');
            const files = e.dataTransfer.files;
            // Handle dropped files (e.g., upload or process them)
            console.log(files);
        });
</script>
@endsection