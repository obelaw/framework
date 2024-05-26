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

            @foreach ($configurations as $configuration)
                <div class="row row-cols-5 g-5 mb-5">
                    <div class="col-md-4">
                        <span class="bg-white text-black avatar p-1">
                            <img src="{{ asset($configuration['module']['icon']) }}" alt="">
                        </span>
                        <h2 class="page-title mb-3">{{ $configuration['module']['name'] }}</h2>
                    </div>
                    <div class="col-md-8">
                        @foreach ($configuration['configs'] as $config)
                            <div class="mb-1">
                                <x-obelaw-form-component id="{{ $config['formId'] }}" :title="$config['label']" />
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
