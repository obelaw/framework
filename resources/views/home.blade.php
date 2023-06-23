<x-obelaw-dashboard-layout>
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Dashboard
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="hr-text hr-text-left">Obelaw modules</div>
            <div class="row row-cols-5 g-5">
                @foreach ($modules as $module)
                    <div class="col">
                        <a href="{{ route($module['href']) }}">
                            <div class="card text-center py-5">
                                <p class="m-0">
                                    @svg('tabler-' . $module['icon'], 'w-7 h-7')
                                </p>
                                <p class="m-0 mt-3 h3">{{ $module['name'] }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-obelaw-dashboard-layout>
