<form class="card" wire:submit.prevent="submit">
    @csrf
    <div class="card-header">
        <h3 class="card-title">Horizontal form</h3>
    </div>
    <div class="card-body">

        @foreach ($fields as $field)
            @if ($field['type'] == 'text')
                <x-obelaw-text-field label="{{ $field['label'] }}" model="{{ $field['model'] }}" :hint="$field['hint']"
                    :required="str_contains($field['rules'], 'required')" />
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
