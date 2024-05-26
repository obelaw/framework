<div>
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Permissions
                    </div>
                    <h2 class="page-title">
                        Permissions List
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <form class="card" wire:submit.prevent="submit">
                <div class="card-header">
                    <h3 class="card-title">Select Permissions</h3>
                    <div class="card-actions">
                        {{--  --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="row row-cols-3" data-masonry='{"percentPosition": true }'>
                        @foreach ($ACls as $module => $sections)
                            <div class="col">
                                <div class="mb-3"
                                    style="background: #fffcf6; border-radius: 5px; padding: 15px; margin-bottom: 15px !important;">
                                    <div class="form-label">
                                        <input wire:model.defer="permissions" name="permissions"
                                            class="form-check-input" type="checkbox" value="{{ $module }}">
                                        {{ $module }}
                                    </div>
                                    <div style="padding-left: 21px">
                                        @foreach ($sections as $section)
                                            <label class="form-check">
                                                <input wire:model.defer="permissions" name="permissions"
                                                    class="form-check-input" type="checkbox"
                                                    value="{{ $section['permission'] }}">
                                                <span class="form-check-label">{{ $section['label'] }}</span>
                                            </label>
                                            <div style="padding-left: 21px">
                                                @foreach ($section['permissions'] as $permission)
                                                    <label class="form-check">
                                                        <input wire:model.defer="permissions" name="permissions"
                                                            class="form-check-input" type="checkbox"
                                                            value="{{ $permission['permission'] }}">
                                                        <span class="form-check-label">{{ $permission['label'] }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js" defer></script>
@endpush
