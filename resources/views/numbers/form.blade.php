<div class="form-group mb-3">
    <span class="form-group-text" id="basic-addon1">Costumer</span>
    <select name="customer_id" id="customer_id" class="form-control">
        @foreach ($costumers as $costumer)
            <option value="{{ $costumer->id }}">{{ $costumer->name }}</option>
        @endforeach                        
    </select>
</div>

<div>{{ $errors->first('customer_id') }}</div>

<div class="form-group mb-3">
    <span class="form-group-text" id="basic-addon1">Number</span>
    <input value="{{ old('number') ?? $number->number }}" type="text" class="form-control" name="number" aria-label="Number" aria-describedby="basic-addon1">
</div>

<div>{{ $errors->first('number') }}</div>

<div class="form-group mb-3">
    <span class="form-group-text" id="basic-addon1">Status</span>
    <select name="status" id="status" class="form-control">
        <option value="" disabled>Select status</option>

        @foreach ($number->getStatusOptions() as $key => $value)
            <option value="{{ $key }}" {{ $number->status == $value ? 'selected' : '' }}>{{ $value }}</option>
        @endforeach
    </select>
</div>

<div>{{ $errors->first('status') }}</div>

@csrf