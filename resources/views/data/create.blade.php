@extends('layouts.app')
@section('title', 'Create Registry')
@section('content')
<div class="pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-9 col-lg-7 m-md-auto">
                <div class="card">
                    <div class="card-header fw-bold">@yield('title')</div>
                    <div class="card-body">
                        <form action="{{ route('data.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6  mb-2 mb-md-3">
                                    <label class="mb-1 fw-bold" for="firstname">Firstname</label>
                                    <input type="text" name="firstname" class="form-control @error('firstname') is-invalid @enderror" value="{{ old('firstname') }}">
                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6  mb-2 mb-md-3">
                                    <label class="mb-1 fw-bold" for="lastname">Lastname</label>
                                    <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{ old('lastname') }}">
                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6  mb-2 mb-md-3">
                                    <label class="mb-1 fw-bold" for="age">Age(years)</label>
                                    <input type="number" name="age" class="form-control @error('age') is-invalid @enderror" min="0" value="{{ old('age') }}">
                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6  mb-2 mb-md-3">
                                    <label class="mb-1 fw-bold" for="idno">National ID</label>
                                    <input type="number" name="idno" class="form-control @error('idno') is-invalid @enderror" min="0" value="{{ old('idno') }}">
                                    @error('idno')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-2 mb-md-3 @error('email') is-invalid @enderror mt-1">
                                <label for="gender" class="fw-bold">Gender &nbsp;</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" checked value="Male" />
                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female" />
                                    <label class="form-check-label" for="inlineRadio2">Female</label>
                                </div>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6  mb-2 mb-md-3">
                                    <label class="mb-1 fw-bold" for="pob">Place of birth</label>
                                    <input type="text" name="place_of_birth" class="form-control @error('place_of_birth') is-invalid @enderror" value="{{ old('place_of_birth') }}">
                                    @error('place_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6  mb-2 mb-md-3">
                                    <label class="mb-1 fw-bold" for="address">Physical Address</label>
                                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-grid gap-2 mt-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection