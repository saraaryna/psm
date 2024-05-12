@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="studentID" class="col-md-4 col-form-label text-md-end">{{ __('Student ID') }}</label>
                            <div class="col-md-6">
                                <input id="studentID" type="text" class="form-control @error('studentID') is-invalid @enderror" name="studentID" value="{{ old('studentID') }}" required autocomplete="studentID" pattern="[A-Z]{2}\d{5}" title="Please enter two capital letters followed by five digits">
                                @error('studentID')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <!-- New form fields -->
                        <div class="row mb-3">
                            <label for="ic" class="col-md-4 col-form-label text-md-end">
                                {{ __('Identification Number') }}<br>
                                <span style="color: red;">{{ __('without dash(-)') }}</span>
                            </label>
                            <div class="col-md-6">
                                <input id="ic" type="text" class="form-control @error('ic') is-invalid @enderror" name="ic" value="{{ old('ic') }}" required autocomplete="ic">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="year" class="col-md-4 col-form-label text-md-end">{{ __('Year') }}</label>
                            <div class="col-md-6">
                                <select id="year" class="form-control @error('year') is-invalid @enderror" name="year" required autocomplete="year">
                                    <option value="">Select Year</option>
                                    <option value="1" {{ old('year') == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ old('year') == '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ old('year') == '3' ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ old('year') == '4' ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ old('year') == '5' ? 'selected' : '' }}>5</option>
                                </select>
                                @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="program" class="col-md-4 col-form-label text-md-end">{{ __('Program') }}</label>
                            <div class="col-md-6">
                                <select id="program" class="form-control @error('program') is-invalid @enderror" name="program" required autocomplete="program">
                                    <option value="">Select Program</option>
                                    <option value="Diploma in Computer Science" {{ old('program') == 'Diploma in Computer Science' ? 'selected' : '' }}>Diploma in Computer Science</option>
                                    <option value="Bachelor of Computer Science (Software Engineering) with Honours" {{ old('program') == 'Bachelor of Computer Science (Software Engineering) with Honours' ? 'selected' : '' }}>Bachelor of Computer Science (Software Engineering) with Honours</option>
                                    <option value="Bachelor of Computer Science (Computer Systems & Networking) with Honours" {{ old('program') == 'Bachelor of Computer Science (Computer Systems & Networking) with Honours' ? 'selected' : '' }}>Bachelor of Computer Science (Computer Systems & Networking) with Honours</option>
                                    <option value="Bachelor of Computer Science (Graphics & Multimedia Technology) with Honours" {{ old('program') == 'Bachelor of Computer Science (Graphics & Multimedia Technology) with Honours' ? 'selected' : '' }}>Bachelor of Computer Science (Graphics & Multimedia Technology) with Honours</option>
                                    <option value="Bachelor of Computer Science (Cyber Security) with Honours" {{ old('program') == 'Bachelor of Computer Science (Cyber Security) with Honours' ? 'selected' : '' }}>Bachelor of Computer Science (Cyber Security) with Honours</option>
                                </select>
                                @error('program')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


