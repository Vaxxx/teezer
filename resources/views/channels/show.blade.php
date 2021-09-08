@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="text-center msg"><small class="text-muted">@include('includes.message')</small></div>
        <div class="row justify-content-center">
            <div class="col-md-3 col-sm-12 col-lg-3 text-center align-items-center">
            <!---display menu-->
                   <ul class="nav nav-pills flex-column">
                       <li class="nav-item">
                           <a class="nav-link active" aria-current="page" href="#">Home</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="#">Link</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link active" aria-current="page" href="#">Upload Video to Channel</a>
                       </li>


                   </ul>
            </div>
            <div class="col-md-8 col-sm-12 col-lg-8">

                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                       <!--show all videos-->
                      @livewire('video-system', ['channel' => $channel])
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $('div.msg').delay(5000).slideUp(300);
    </script>
@endsection
