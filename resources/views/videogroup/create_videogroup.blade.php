@extends('layouts.main')
@section('content')
    <div class="col-lg-8 align-content" style="margin-left: auto;margin-right: auto">
        <div class="card section-center">
            <div class="card-body">
                <h5 class="card-title text-align">
                    <div class="text-center">{{ isset($videoGroup) ? 'Edit Video Group' : 'Create Video Group' }}</div>
                </h5>
                <!-- General Form Elements -->
                <form enctype="multipart/form-data"
                    action="{{ isset($videoGroup) ? '/video-group/update/' . $videoGroup->id : '/video-group/store' }}"
                    method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Video Group Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('group_name') is-invalid @enderror"
                                name="group_name" value="{{ old('group_name', $videoGroup->group_name ?? '') }}">
                            @error('group_name')
                                <span class="invalid-feedback" style="color: red">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Video Group Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                                value="{{ old('price', $videoGroup->price ?? '') }}">
                            @error('price')
                                <span class="invalid-feedback" style="color: red">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-10">
                        @if (isset($videoGroup) && $videoGroup->image)
                            <img id="oldImage" style="width:100px" src="{{ asset('video_groups/' . $videoGroup->image) }}"
                                alt="Uploaded Document">
                            <input type="hidden" class="form-control" name="oldimage" value="{{ $videoGroup->image }}">
                        @endif
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Video Group Image</label>
                        <div class="col-sm-10">
                            <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror"
                                name="image" value="{{ old('image', $videoGroup->image ?? '') }}">
                            @error('image')
                                <span class="invalid-feedback" style="color: red">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-10 text-center">
                            <button type="submit" class="btn btn-primary">
                                @if (isset($videoGroup))
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
    </div>
@endsection
