@extends('layouts.students')
@section('content')

<section class="sec-padding bg-gray">
    <div class="container introductory-phase">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-10 col-lg-offset-1 form-box">
                <form role="form" action="" method="post" class="f1">
                    @foreach($portals as $news)
                    <h3>{{ $news->title }}</h3>
                    <br>
                    <p class="text-danger">{{ $news->subtitle }} </p>
                    <br>

                    <div class="image-holder">
                        <img class="img-responsive" alt="" src="{{ asset($news->image) }}"> 
                    </div>
                    <div class="row" style="padding: 20px; text-align:left;">
                        <p> {!! nl2br($news->description) !!} </p>
                    </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
@endsection