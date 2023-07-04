@extends('admin_layout/index')
@section('content')


            <div class="card card-bordered card-preview">
                <div class="card-inner">
                    <div class="preview-block">
                        <div class="row gy-4">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Default File Upload</label>
                                    <form action="{{ route('importproc') }}" method="post" enctype="multipart/form-data">
                                    @csrf   
                                    <div class="form-control-wrap">
                                            <div class="form-file">
                                                <input type="file" name="file" class="form-file-input" id="customFile">
                                                <label class="form-file-label" for="customFile">Choose file</label>
                                                @if ($errors->has('file'))
                                            <span class="text-danger">{{ $errors->first('file') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group mt-2">
                                               <button type="submit" class="btn btn-primary">Upload</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <div class="row pb-5">
                                                <div class="col-lg-6">
                                                    <div class="product-gallery me-xl-1 me-xxl-5">
                                                        <div class="slider-init" id="sliderFor" data-slick='{"arrows": false, "fade": true, "asNavFor":"#sliderNav", "slidesToShow": 1, "slidesToScroll": 1}'>
                                                          @foreach($villas['media'] as $media)  
                                                             <div class="slider-item rounded">
                                                                <img src="{{ url('villa_images/'.$media->media_name) }}" class="w-100" alt="">
                                                            </div>
                                                          @endforeach
                                                        </div><!-- .slider-init -->
                                                        <div class="slider-init slider-nav" id="sliderNav" data-slick='{"arrows": false, "slidesToShow": 5, "slidesToScroll": 1, "asNavFor":"#sliderFor", "centerMode":true, "focusOnSelect": true, 
                                "responsive":[ {"breakpoint": 1539,"settings":{"slidesToShow": 4}}, {"breakpoint": 768,"settings":{"slidesToShow": 3}}, {"breakpoint": 420,"settings":{"slidesToShow": 2}} ]
                            }'>                          @foreach($villas['media'] as $media)  
                                                            <div class="slider-item">
                                                                <div class="thumb">
                                                                    <img src="{{ url('villa_images/'.$media->media_name) }}" alt="">
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div><!-- .slider-nav -->
                                                    </div><!-- .product-gallery -->
                                                </div><!-- .col -->
                                                <div class="col-lg-6">
                                                    <div class="product-info mt-5 me-xxl-5">
                                                        <h2 class="product-title">{{ $villas->name ?? '' }}</h2>
                                                        <div class="product-rating">
                                                            <!-- <ul class="rating">
                                                                <li><em class="icon ni ni-star-fill"></em></li>
                                                                <li><em class="icon ni ni-star-fill"></em></li>
                                                                <li><em class="icon ni ni-star-fill"></em></li>
                                                                <li><em class="icon ni ni-star-fill"></em></li>
                                                                <li><em class="icon ni ni-star-half"></em></li>
                                                            </ul> -->
                                                            <!-- <div class="amount">(2 Reviews)</div> -->
                                                        </div><!-- .product-rating -->
                                                        <div class="product-excrept text-soft">
                                                            <p class="lead">Location: {{ $villas->address['street_name'] ?? '' }},{{ $villas->address['city'] ?? '' }}, {{ $villas->address['state'] ?? '' }} ,{{ $villas->address['country'] ?? '' }}</p>
                                                        </div>
                                                      
                                                        <div class="product-meta">
                                                            <ul class="d-flex flex-wrap ailgn-center g-2 pt-1">
                                                                <li>
                                                                   <a href="{{ url('admin-dashboard/villas/update/'.$villas->id) }}"> <button class="btn btn-primary">Edit</button></a>
                                                                </li>
                                                                <li>
                                                                   <a href="{{ url('admin-dashboard/villas/delete/'.$villas->id) }}"> <button class="btn btn-danger">Delete</button></a>
                                                                </li>
                                                              
                                                            </ul>
                                                        </div>
                                                    </div><!-- .product-info -->
                                                </div><!-- .col -->
                                            </div><!-- .row -->
                                            
                                            </div><!-- .row -->
                                        </div>
                                    </div>
                                </div>


@endsection