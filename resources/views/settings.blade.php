<div>
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        {{ __('obelaw::account.account') }}
                    </div>
                    <h2 class="page-title">
                        {{ __('obelaw::settings.settings') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">

            <div class="row row-cols-5 g-5">
                <div class="col-md-4">
                    <h2 class="page-title mb-3">{{ __('obelaw::settings.language') }}</h2>
                    <p>{{ __('obelaw::settings.language_desc') }}</p>
                </div>
                <div class="col-md-8">
                    <form class="card" wire:submit.prevent="submitLanguage">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('obelaw::settings.select_language') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label class="col-3 col-form-label">{{ __('obelaw::settings.language') }}</label>
                                <div class="col">
                                    <select class="form-select" wire:model="language">
                                        <option>{{ __('obelaw::settings.select_language') }}...</option>
                                        @foreach ($languages as $alpha2 => $label)
                                            <option value="{{ $alpha2 }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    <small class="form-hint">{{ __('obelaw::settings.select_language_hint') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">{{ __('obelaw::settings.save') }}</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
