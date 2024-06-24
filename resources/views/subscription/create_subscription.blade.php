@extends('layouts.main')
@section('content')
    <div class="col-lg-8 align-content" style="margin-left: auto;margin-right: auto">
        <div class="card section-center">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title text-align">
                        {{ isset($subscription) ? 'Edit Subscription' : 'Create Subscription' }}</h5>
                    <a href="{{ route('subscription') }}"><button type="button" class="button-color"></i>View
                        Subscription</button></a>
                </div>
                <!-- General Form Elements -->
                <form
                    action="{{ isset($subscription) ? '/subscription/update/' . $subscription->id : '/subscription/store' }}"
                    method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Plan Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('plan_name') is-invalid @enderror"
                                name="plan_name" value="{{ old('plan_name', $subscription->plan_name ?? '') }}">
                            @error('plan_name')
                                <span class="invalid-feedback" style="color: red">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Duration</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('duration') is-invalid @enderror"
                                name="duration" value="{{ old('duration', $subscription->duration ?? '') }}">
                            @error('duration')
                                <span class="invalid-feedback" style="color: red">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                                rows="4">{{ old('description', $subscription->description ?? '') }}</textarea>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-sm-10 text-center">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form><!-- End General Form Elements -->
            </div>
        </div>
    </div>
@endsection
