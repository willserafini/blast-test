<div class="form-group mb-3">
    <span class="form-group-text" id="basic-addon1">Name</span>
    <input value="{{ old('name') ?? $customer->name }}" type="text" class="form-control" name="name" aria-label="Name" aria-describedby="basic-addon1">
</div>

<div>{{ $errors->first('name') }}</div>

<div class="form-group mb-3">
    <span class="form-group-text" id="basic-addon1">Document</span>
    <input value="{{ old('document') ?? $customer->document }}" type="text" class="form-control" name="document" aria-label="Document" aria-describedby="basic-addon1">
</div>

<div>{{ $errors->first('document') }}</div>

<div class="form-group mb-3">
    <span class="form-group-text" id="basic-addon1">Status</span>
    <select name="status" id="status" class="form-control">
        <option value="" disabled>Select status</option>

        @foreach ($customer->getStatusOptions() as $key => $value)
            <option value="{{ $key }}" {{ $customer->status == $value ? 'selected' : '' }}>{{ $value }}</option>
        @endforeach
    </select>
</div>

@csrf