<div class="form-group mb-3">
    <span class="form-group-text" id="basic-addon1">Name</span>
    <input value="{{ old('name') ?? $user->name }}" type="text" class="form-control" name="name" aria-label="Name" aria-describedby="basic-addon1">
</div>

<div>{{ $errors->first('name') }}</div>

<div class="form-group mb-3">
    <span class="form-group-text" id="basic-addon1">Email</span>
    <input value="{{ old('email') ?? $user->email }}" type="text" class="form-control" name="email" aria-label="Email" aria-describedby="basic-addon1">
</div>

<div>{{ $errors->first('email') }}</div>

<div class="form-group mb-3">
    <span class="form-group-text" id="basic-addon1">Password</span>
    <input value="{{ old('password') ?? $user->password }}" type="password" class="form-control" name="password" aria-label="Password" aria-describedby="basic-addon1">
</div>

<div>{{ $errors->first('password') }}</div>

<div class="form-group mb-3">
    <span class="form-group-text" id="basic-addon1">Role</span>
    <select name="role_id" id="role_id" class="form-control">
        <option value="" disabled>Select a Role</option>

        @foreach ($roles as $role)
            <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
        @endforeach
    </select>
</div>

<div>{{ $errors->first('role_id') }}</div>

@csrf