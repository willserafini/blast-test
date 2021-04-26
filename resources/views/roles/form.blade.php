<div class="form-group mb-3">
    <span class="form-group-text" id="basic-addon1">Name</span>
    <input value="{{ old('name') ?? $role->name }}" type="text" class="form-control" name="name" aria-label="Name" aria-describedby="basic-addon1">
</div>

<div class="form-group mb-3">
    <span class="form-group-text" id="basic-addon1">Is Admin?</span>
    <select name="is_admin" id="is_admin" class="form-control">
        @foreach (\App\Models\Role::getOptionsIsAdmin() as $key => $value)
            <option value="{{ $key }}" {{ $role->is_admin == $value ? 'selected' : '' }}>{{ $value }}</option>
        @endforeach
    </select>
</div>

<h4>Permissions</h4>
<div class="form-check mb-3">
    
    @foreach ($permissions as $key => $permission)
    <div>
        <input name="permissions[]" value="{{ $permission->id }}" {{ $role->hasPermission($permission->id) ? 'checked' : '' }} class="form-check-input" type="checkbox" id="flexCheckDefault{{ $key }}">
        <label class="form-check-label" for="flexCheckDefault{{ $key }}">{{ $permission->name }}</label>
    </div>
    @endforeach 

</div>


@csrf