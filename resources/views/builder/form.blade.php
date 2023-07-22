<form class="card" method="{{ $method }}" action="{{ $action }}">
    @csrf
    <div class="card-header">
        <h3 class="card-title">Horizontal form</h3>
    </div>
    <div class="card-body">

        @foreach ($fields as $field)
            @if ($field['type'] == 'text')
                <div class="mb-3 row">
                    <label
                        class="col-3 col-form-label @if (isset($field['required'])) required @endif">{{ $field['label'] }}</label>
                    <div class="col">
                        <input type="text" name="{{ $field['model'] }}" value="{{ old($field['model']) }}"
                            class="form-control @error($field['model']) is-invalid @enderror"
                            placeholder="{{ $field['placeholder'] ?? '' }}">
                        @error($field['model'])
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        @if (isset($field['hint']))
                            <small class="form-hint">{{ $field['hint'] }}</small>
                        @endif
                    </div>
                </div>
            @endif

            @if ($field['type'] == 'select')
                <x-obelaw-select-field label="{{ $field['label'] }}" model="{{ $field['model'] }}" :options="$field['options']"
                    :hint="$field['hint']" :required="str_contains($field['rules'], 'required')" :multiple="$field['multiple']" />
            @endif
        @endforeach

    </div>
    <div class="card-footer text-end">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
