<div class="form-group mb-3">
    <span class="form-group-text" id="basic-addon1">Name</span>
    <input value="{{ old('name') ?? $customer->name }}" type="text" class="form-control" name="name" aria-label="Name" aria-describedby="basic-addon1">
</div>

<div>{{ $errors->first('name') }}</div>

<div class="form-group mb-3">
    <span class="form-group-text" id="basic-addon1">Email</span>
    <input value="{{ old('email') ?? $customer->email }}" type="text" class="form-control" name="email" aria-label="Email" aria-describedby="basic-addon1">
</div>

<div>{{ $errors->first('email') }}</div>

<div class="form-group mb-3">
    <span class="form-group-text" id="basic-addon1">Status</span>
    <select name="active" id="active" class="form-control">
        <option value="" disabled>Select customer status</option>

        @foreach ($customer->getActiveOptions() as $key => $value)
            <option value="{{ $key }}" {{ $customer->active == $value ? 'selected' : '' }}>{{ $value }}</option>
        @endforeach
    </select>
</div>

<div class="form-group mb-3">
    <span class="form-group-text" id="basic-addon1">Company</span>
    <select name="company_id" id="active" class="form-control">
        @foreach ($companies as $company)
            <option value="{{ $company->id }}">{{ $company->name }}</option>
        @endforeach                        
    </select>
</div>

@csrf