@extends('layouts.user_type.auth') @section('content')

<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __("Profile Information") }}</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <form action="user-profile" method="POST" role="form text-left">
                    @csrf @if($errors->any())
                    <div
                        class="mt-3 alert alert-primary alert-dismissible fade show"
                        role="alert"
                    >
                        <span class="alert-text text-white">
                            {{$errors->first()}}</span
                        >
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                            aria-label="Close"
                        >
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </button>
                    </div>
                    @endif @if(session('success'))
                    <div
                        class="m-3 alert alert-success alert-dismissible fade show"
                        id="alert-success"
                        role="alert"
                    >
                        <span class="alert-text text-white">
                            {{ session("success") }}</span
                        >
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                            aria-label="Close"
                        >
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </button>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label
                                    for="user-name"
                                    class="form-control-label"
                                    >{{ __("Full Name") }}</label
                                >
                                <div
                                    class="@error('user.name')border border-danger rounded-3 @enderror"
                                >
                                    <input
                                        class="form-control"
                                        value="{{ auth()->user()->name }}"
                                        type="text"
                                        placeholder="Name"
                                        id="user-name"
                                        name="name"
                                    />
                                    @error('name')
                                    <p class="text-danger text-xs mt-2">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label
                                    for="user-email"
                                    class="form-control-label"
                                    >{{ __("Email") }}</label
                                >
                                <div
                                    class="@error('email')border border-danger rounded-3 @enderror"
                                >
                                    <input
                                        class="form-control"
                                        value="{{ auth()->user()->email }}"
                                        type="email"
                                        placeholder="@example.com"
                                        id="user-email"
                                        name="email"
                                    />
                                    @error('email')
                                    <p class="text-danger text-xs mt-2">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button
                            type="submit"
                            class="btn bg-gradient-dark btn-md mt-4 mb-4"
                        >
                            {{ "Save Changes" }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
