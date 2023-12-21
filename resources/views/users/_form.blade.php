<div class="mb-3">
    <label for="first_name" class="form-label">First Name</label>
    <input type="text" class="form-control" id="first_name" name="first_name" required
           value="{{ old('first_name', $user->first_name ?? '') }}">
    @if($errors->has('first_name'))
        <div class="col-12 text-center mt-2">
            <span role="alert" class="alert alert-danger d-inline-block text-center mb-0">{{ $errors->first('first_name') }}</span>
        </div>
    @endif
</div>
<div class="mb-3">
    <label for="last_name" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="last_name" name="last_name" required
            value="{{ old('last_name', $user->last_name ?? '') }}">
    @if($errors->has('last_name'))
        <div class="col-12 text-center mt-2">
            <span role="alert" class="alert alert-danger d-inline-block text-center mb-0">{{ $errors->first('last_name') }}</span>
        </div>
    @endif
</div>
<div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" required
            value="{{ old('username', $user->username ?? '') }}">
    @if($errors->has('username'))
        <div class="col-12 text-center mt-2">
            <span role="alert" class="alert alert-danger d-inline-block text-center mb-0">{{ $errors->first('username') }}</span>
        </div>
    @endif
</div>
<div class="mb-3">
    <label for="mobile" class="form-label">Phone number</label>
    <input type="text" class="form-control" id="mobile" name="mobile" required
            value="{{ old('mobile', $user->mobile ?? '') }}">
    @if($errors->has('mobile'))
        <div class="col-12 text-center mt-2">
            <span role="alert" class="alert alert-danger d-inline-block text-center mb-0">{{ $errors->first('mobile') }}</span>
        </div>
    @endif
</div>
<div class="mb-3">
    <label for="email" class="form-label">Email Address</label>
    <input type="email" class="form-control" id="email" name="email" autocomplete="email" required
            value="{{ old('email', $user->email ?? '') }}">
    @if($errors->has('email'))
        <div class="col-12 text-center mt-2">
            <span role="alert" class="alert alert-danger d-inline-block text-center mb-0">{{ $errors->first('email') }}</span>
        </div>
    @endif
</div>
<div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" autocomplete="new-password">
    @if($errors->has('password'))
        <div class="col-12 text-center mt-2">
            <span role="alert" class="alert alert-danger d-inline-block text-center mb-0">{{ $errors->first('password') }}</span>
        </div>
    @endif
</div>
<div class="d-flex justify-content-end mb-4">
    <a href="{{ route('users.index') }}" class="btn btn-outline-light me-3 text-dark" style="border: 1px solid black;">Go Back</a>
    <button type="submit" class="btn btn-primary">Save</button>
</div>
