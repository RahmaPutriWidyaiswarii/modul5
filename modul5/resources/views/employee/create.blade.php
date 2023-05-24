<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }}</title>
    @vite('resources/sass/app.scss')
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand mb-0 h1"><i class="bi-hexagon-fill me-2"></i> Data Master</a>

            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <hr class="d-lg-none text-white-50">

                <ul class="navbar-nav flex-row flex-wrap">
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('employees.index') }}" class="nav-link">Employee List</a></li>
                </ul>

                <hr class="d-lg-none text-white-50">

                <a href="{{ route('profile') }}" class="btn btn-outline-light my-2 ms-md-auto"><i class="bi-person-circle me-1"></i> My Profile</a>
            </div>
        </div>
    </nav>

    <div class="container-sm mt-5">
        <form action="{{ route('employees.store') }}" method="POST">
            {{-- csrf untuk melindungi data yang akan terinput nantinya--}}
            @csrf
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">

                    {{-- codingan ini di comment karna agar tampilan peringatan tidak muncul lagi diatasnya--}}
                    {{-- @if ($errors->any())
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show">
                            {{ $error }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>

                        @endforeach
                    @endif --}}

                    <div class="mb-3 text-center">
                        <i class="bi-person-circle fs-1"></i>
                        <h4>Create Employee</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            {{-- @error('firstName') is-invalid @enderror  agar kotak pada email berwarna merah --}}
                            {{-- value {{ old('') }} agar data yang dimasukkan tersimpan--}}
                            <input class="form-control @error('firstName') is-invalid @enderror " type="text" name="firstName" id="firstName" value="{{ old('firstName') }}" placeholder="Enter First Name">
                            {{-- agar error tampak dibawa kotak email --}}
                            @error('firstName')
                            {{-- nambah text bootstrap color agar tulisan peringatan tidak didalam kotak--}}
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            {{-- @error('lastName') is-invalid @enderror  agar kotak pada email berwarna merah --}}
                            {{-- value {{ old('') }} agar data yang dimasukkan tersimpan--}}
                            <input class="form-control @error('lastName') is-invalid @enderror " type="text" name="lastName" id="lastName" value="{{ old('lastName') }}" placeholder="Enter Last Name">
                            {{-- agar error tampak dibawa kotak email --}}
                            @error('lastName')
                            {{-- nambah text bootstrap color agar tulisan peringatan tidak didalam kotak--}}
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            {{-- @error('email') is-invalid @enderror  agar kotak pada email berwarna merah --}}
                            {{-- value {{ old('') }} agar data yang dimasukkan tersimpan--}}
                            <input class="form-control @error('email') is-invalid @enderror " type="text" name="email" id="age" value="{{ old('email') }}" placeholder="Enter Email">
                            {{-- agar error tampak dibawa kotak age --}}
                            @error('email')
                            {{-- nambah text bootstrap color agar tulisan peringatan tidak didalam kotak--}}
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="age" class="form-label">Age</label>
                            {{-- @error('age') is-invalid @enderror  agar kotak pada age berwarna merah --}}
                            {{-- value {{ old('') }} agar data yang dimasukkan tersimpan--}}
                            <input class="form-control @error('age') is-invalid @enderror " type="text" name="age" id="age" value="{{ old('age') }}" placeholder="Enter Age">
                            {{-- agar error tampak dibawa kotak age --}}
                            @error('age')
                            {{-- nambah text bootstrap color agar tulisan peringatan tidak didalam kotak--}}
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="position" class="form-label">Position</label>
                            <select name="position" id="position" class="form-select">
                                @foreach ($positions as $position)
                                    <option value="{{ $position->id }}" {{ old('position') == $position->id ? 'selected' : '' }}>{{ $position->code.' - '.$position->name }}</option>
                                @endforeach
                            </select>
                            @error('position')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            {{-- button cancel: ketika cancel akan langsung kembali ke employees --}}
                            <a href="{{ route('employees.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            {{-- button submit untuk save data yg diinput --}}
                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i> Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @vite('resources/js/app.js')
</body>
</html>
