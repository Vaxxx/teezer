<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="container">
        <div class="text-center msg"><small class="text-muted">@include('includes.message')</small></div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Upl oad Video') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @livewire('channel-system')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
