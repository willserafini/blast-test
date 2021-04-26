<div class="form-group mb-3">
    <span class="form-group-text" id="basic-addon1">Number</span>
    <select name="number_id" id="number_id" class="form-control">
        @foreach ($numbers as $number)
            <option value="{{ $number->id }}">{{ $number->customer_and_number }}</option>
        @endforeach                        
    </select>
</div>

<div>{{ $errors->first('number_id') }}</div>

<div class="form-group mb-3">
    <span class="form-group-text" id="basic-addon1">Name</span>
    <input value="{{ old('name') ?? $numberPreference->name }}" type="text" class="form-control" name="name" aria-label="Name" aria-describedby="basic-addon1">
</div>

<div>{{ $errors->first('number') }}</div>

<div class="form-group mb-3">
    <span class="form-group-text" id="basic-addon1">Value</span>
    <input value="{{ old('value') ?? $numberPreference->value }}" type="text" class="form-control" name="value" aria-label="Name" aria-describedby="basic-addon1">
</div>

<div>{{ $errors->first('value') }}</div>

@csrf