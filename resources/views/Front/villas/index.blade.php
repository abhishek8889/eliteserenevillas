@extends('front_layout/index')
@section('front-content')
<section class="nearby-sec">
        <div class="container-fluid">
            <h3>Villas</h3>
            <div class="row">
                @foreach($villas as $villa)
                <div class="col-md-3">
                    <img src="{{ asset('/villa_images/'.$villa->villafeatureimage['media_name']) }}" alt="" class="img-fluid">
                    <a href="{{ url('villas-list/villas-view') }}/{{ $villa->slug ?? '' }}">{{ $villa->name ?? ''}}</a>
                    <p>{{ $villa->address['street_name'] ?? '' }},{{ $villa->address['city'] ?? '' }},{{ $villa->address['state'] ?? '' }},{{ $villa->address['country'] ?? '' }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endsection