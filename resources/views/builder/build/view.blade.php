<div>
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        {{ $pretitle }}
                    </div>
                    <h2 class="page-title">
                        {{ $title }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card" x-data="{ tab: '{{ $tabs[0] }}' }">
                <div class="row g-0">
                    <div class="col-12 col-md-3 border-end">
                        <div class="card-body">
                            {{-- <h4 class="subheader">Tabs</h4> --}}
                            <div class="list-group list-group-transparent">
                                @foreach ($tabs as $tab)
                                    <a href="#" x-on:click="tab = '{{ $tab }}'"
                                        class="list-group-item list-group-item-action d-flex align-items-center"
                                        :class="{ 'active': tab === '{{ $tab }}' }">
                                        {{ $tab }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-9 d-flex flex-column">
                        @foreach ($components as $tab => $component)
                            <div class="card-body" x-show="tab == '{{ $tab }}'">
                                @livewire($component, $parameters)
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
