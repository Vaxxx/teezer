@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="text-center msg"><small class="text-muted">@include('includes.message')</small></div>
    <div class="row justify-content-center">
        <div class="col-md-4 col-sm-12 col-lg-4 text-center align-items-center">
            <!--display all channels -->
            @if($channelsCount == 0)
                <i class="fas fa-film fa-3x"></i>
                <h3>No Channels yet!</h3>
            @else
                @foreach($channels as $channel)
                    <ul class="collection" style="list-style: none">
                        <li class="collection-item avatar">
                            <img src='{{asset("images/$channel->image")}}' alt='{{$channel->image}}' class='circle'>
                            <h2><a href="{{route('channels.show', $channel)}}"><p class="title">{{$channel->name}}</p></a></h2>
                            <br>
                            <p>
                                {{$channel->description}}
                            </p>

                        </li>
                    </ul>
                @endforeach
            @endif


        </div>
        <div class="col-md-8 col-sm-12 col-lg-8">

            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

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
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $('div.msg').delay(5000).slideUp(300);
    </script>
@endsection
