@extends('admin_layout/index')
@section('content')


            <!-- <div class="card card-bordered card-preview">
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
            </div> -->
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
                                                <div class="product-meta">
                                                            <ul class="d-flex flex-wrap ailgn-center g-2 pt-1">
                                                                <li>
                                                                   <a href="#"> <button class="btn btn-primary">Import</button></a>
                                                                </li>
                                                                <li>
                                                                   <a href="#"> <button class="btn btn-primary">Export</button></a>
                                                                </li>
                                                              
                                                            </ul>
                                                        </div>
                                                    <div class="product-info mt-5 me-xxl-5">
                                                        <h2 class="product-title"><span id="villa_name">{{ $villas->name ?? '' }} </span><sup><span id="edit"><em class="icon ni ni-edit"></em></span></sup></h2>
                                                        <input type="text" name="name" data-id="{{ $villas->id ?? '' }}" id="edit_form" class="form-control" value="{{ $villas->name ?? '' }}" style="display:none;">
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
                                                            <p class="lead">Location: <span class="location-span">{{ $villas->address['street_name'] ?? '' }},{{ $villas->address['city'] ?? '' }}, {{ $villas->address['state'] ?? '' }} ,{{ $villas->address['country'] ?? '' }} </span><sup><span id="edit_location"><em class="icon ni ni-edit"></em></span></sup> </p>
                                                        </div>
                                                        <form id="location-form" style="display:none;">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $villas->address['id'] ?? '' }}">
                                                            <div class="form-group">
                                                                <label for="street">Street Name</label>
                                                                <input type="text" name="street" id="street" class="form-control" value="{{ $villas->address['street_name'] ?? '' }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="City">City</label>
                                                                <input type="text" name="city" id="City" class="form-control" value="{{ $villas->address['city'] ?? '' }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="state">State</label>
                                                                <input type="text" name="state" id="state" class="form-control" value="{{ $villas->address['state'] ?? '' }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Country">Country Name</label>
                                                                <input type="text" name="country_name" id="Country" class="form-control" value="{{ $villas->address['country'] ?? '' }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-primary" value="update">
                                                            </div>
                                                        </form>
                                                      
                                                        <div class="product-meta">
                                                            <ul class="d-flex flex-wrap ailgn-center g-2 pt-1">
                                                                
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
<script>
    $(document).ready(function(){
        // $('#edit_form').hide();
    $('#edit').on('click',function(){
        $(this).parent().parent().hide();
        $('#edit_form').show();
        $('#edit_form').focusout(function(){
       $('#edit').parent().parent().show();
       $(this).hide();
       val = $(this).val();
       id = $(this).attr('data-id');
       $.ajax({
        method: 'post',
          url: '{{ url('admin-dashboard/villas/update') }}',
          dataType: 'json',
          data: {id:id,val:val,_token: '{{csrf_token()}}'},
          success: function(response)
                    {
                    console.log(response);
                    $('#villa_name').html(val);
                    }
       })
        });
    });

    $('#edit_location').on('click',function(){
       
        $(this).parent().parent().hide();
        $('#location-form').show();
        $('#location-form').on('submit',function(e){
            e.preventDefault();
            formData = new FormData(this);
            $.ajax({
         method: 'post',
         url: '{{url('admin-dashboard/villas/update')}}',
         data: formData,
         dataType: 'json',
         contentType: false,
         processData: false,
         success: function(response)
         {
            console.log(response);
            $('#location-form').hide();
            $('#edit_location').parent().parent().show();
            html = response.street_name+','+response.city+','+response.state+','+response.country;
            $('#location-span').html(html);

         }
        })
    });



    });
});
</script>

@endsection