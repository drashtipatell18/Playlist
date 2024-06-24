@extends('layouts.main')
@section('content')
    <div class="col-lg-8 align-content" style="margin-left: auto;margin-right: auto">
        <div class="card section-center">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title text-align">
                        {{ isset($subscriptionsell) ? 'Edit Subscription Sell' : 'Create Subscription Sell' }}
                    </h5>
                    <a href="{{ route('subscriptionsell') }}"><button type="button" class="button-color"></i>View Subscription Sell</button></a>
                </div>
                <!-- General Form Elements -->
                <form
                    action="{{ isset($subscriptionsell) ? '/subscription-sell/update/' . $subscriptionsell->id : '/subscription-sell/store' }}"
                    method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="subscription_id" class="col-sm-2 col-form-label">Subscription Name</label>
                        <div class="col-sm-10">
                            <select class="form-control @error('subscription_id') is-invalid @enderror" name="subscription_id" id="subscription_id">
                                <option value="">Select Subscription Name</option>
                                @foreach ($subscriptions as $id => $plan_name)
                                    <option value="{{ $id }}" 
                                        {{ (old('subscription_id') ?? $subscriptionsell->subscription_id ?? '') == $id ? 'selected' : '' }}>
                                        {{ $plan_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('subscription_id')
                                <span class="invalid-feedback" style="color: red">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="user_id" class="col-sm-2 col-form-label">User</label>
                        <div class="col-sm-10">
                            <select class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id">
                                <option value="">Select User</option>
                                @foreach ($users as $id => $name)
                                    <option value="{{ $id }}" 
                                        {{ (old('user_id') ?? $subscriptionsell->user_id ?? '') == $id ? 'selected' : '' }}>
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <span class="invalid-feedback" style="color: red">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="group_id" class="col-sm-2 col-form-label">Video Group</label>
                        <div class="col-sm-10">
                            <select class="form-control @error('group_id') is-invalid @enderror" name="group_id" id="group_id">
                                <option value="">Select Video Group</option>
                                @foreach ($groups as $id => $group_name)
                                    <option value="{{ $id }}" 
                                        {{ (old('group_id') ?? $subscriptionsell->group_id ?? '') == $id ? 'selected' : '' }}>
                                        {{ $group_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('group_id')
                                <span class="invalid-feedback" style="color: red">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="video_id" class="col-sm-2 col-form-label">Video</label>
                        <div class="col-sm-10">
                            <select class="form-control @error('video_id') is-invalid @enderror" name="video_id" id="video_id">
                                <option value="">Select Video</option>
                                @foreach ($videos as $id => $video_course_name)
                                    <option value="{{ $id }}" 
                                        {{ (old('video_id') ?? $subscriptionsell->video_id ?? '') == $id ? 'selected' : '' }}>
                                        {{ $video_course_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('video_id')
                                <span class="invalid-feedback" style="color: red">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="validity" class="col-sm-2 col-form-label">Validity</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control @error('validity') is-invalid @enderror" name="validity" value="{{ old('validity', $subscriptionsell->validity ?? '') }}">
                            @error('validity')
                                <span class="invalid-feedback" style="color: red">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $subscriptionsell->price ?? '') }}">
                            @error('price')
                                <span class="invalid-feedback" style="color: red">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="payment_id" class="col-sm-2 col-form-label">Payment ID</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control @error('payment_id') is-invalid @enderror" name="payment_id" value="{{ old('payment_id', $subscriptionsell->payment_id ?? '') }}">
                            @error('payment_id')
                                <span class="invalid-feedback" style="color: red">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                   
                    <div class="row mt-4">
                        <div class="col-sm-10 text-center">
                            <button type="submit" class="btn btn-primary">
                                @if (isset($subscriptionsell))
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
