@extends('admin.layouts.app')

@section('content')
    <div class="col-8 offset-3 mt-5">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <legend class="text-center">Change Your Password</legend>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            {{-- Alert Message Start --}}
                            @if (Session::has('updateSuccess'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ Session::get('updateSuccess') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true" class="text-white">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (Session::has('fail'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ Session::get('fail') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true" class="text-white">&times;</span>
                                    </button>
                                </div>
                            @endif
                            {{-- Alert Message End --}}
                            <form class="form-horizontal text-center" action="{{ route('admin#changePassword') }}" method="post">
                                @csrf
                                <div class="form-group row mt-3">
                                    <label class="col-4 col-form-label">Current Password</label>
                                    <div class="col-6">
                                        <input type="password" name="currentPassword" class="form-control"
                                            placeholder="Enter Your Current Password">
                                        @error('currentPassword')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group row mt-3">
                                    <label class="col-4 col-form-label">New Password</label>
                                    <div class="col-6">
                                        <input type="password" name="newPassword" class="form-control"
                                            placeholder="Enter Your New Password">
                                        @error('newPassword')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <label class="col-4 col-form-label">Confirm Password</label>
                                    <div class="col-6">
                                        <input type="password" name="confirmPassword" class="form-control"
                                            placeholder="Enter Your Confirm Password">
                                        @error('confirmPassword')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <form method="post">
                                    <button class="btn bg-dark w-50 text-white mt-2 col" type="submit">Change Password</button>
                                </form>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
