@extends('layouts.app')

@section('content')
<div class="">
    <div class="">
        <div class="">
            <div class="card">
                <div class="card-header">Home</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    {{-- fade out div  --}}
                    <div class="se-pre-con"></div>


                    <div class="">
                      @component('components.who')
                      @endcomponent
                    </div>





                </div>

            </div>
        </div>
    </div>
</div>







@endsection
