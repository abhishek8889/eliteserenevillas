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
            <h2 class="text-end" data-bs-toggle="modal" data-bs-target="#modalDefault"><em class="icon ni ni-edit"></em></h2>
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
                                        <!-- start pricing -->
                                        <div class="nk-block-head d-flex justify-content-between">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title">Pricing List</h4>
                                            </div>
                                            <div class="nk-block-head-content">
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDefault">Add new</button>
                                            </div>
                                        </div>
                                        <!-- pricing modal -->
                                        <div class="modal fade" tabindex="-1" id="modalDefault">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <em class="icon ni ni-cross"></em>
                                                        </a>
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Add new Pricing</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                        <div class="card card-bordered h-100">
                                                    <div class="card-inner">
                                                        <form action="#">
                                                            <div class="form-group">
                                                                <label class="form-label" for="cf-full-name">Price per day</label>
                                                                <input type="text" class="form-control" id="cf-full-name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="cf-email-address">From date</label>
                                                                <input type="text" class="form-control" id="cf-email-address">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="cf-phone-no">To Date</label>
                                                                <input type="text" class="form-control" id="cf-phone-no">
                                                            </div>
                                                            <div class="form-group">
                                                            <button type="submit" class="btn btn-md btn-primary">Save Pricing</button>
                                                            </div>
                                                           
                                                        </form>
                                                    </div>
                                                </div>       
                                                    </div>
                                                       
                                                    </div>
                                                </div>
                                        </div>
                                            <!-- pricing modal end -->
                                            <div class="row pb-5">
                                            <table class="table table-tranx">
                                                <thead>
                                                    <tr class="tb-tnx-head">
                                                        <th class="tb-tnx-id"><span class="">#</span></th>
                                                        <th class="tb-tnx-amount is-alt">
                                                            <span class="tb-tnx-total">Price</span>
                                                        </th>
                                                        <th class="tb-tnx-amount is-alt">
                                                            <span class="tb-tnx-total">From Date</span>
                                                        </th>
                                                        <th class="tb-tnx-amount is-alt">
                                                            <span class="tb-tnx-total">To Date</span>
                                                        </th>
                                                        <th class="tb-tnx-action">
                                                            <span>&nbsp;</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="tb-tnx-item">
                                                        <td class="tb-tnx-id">
                                                            <a href="#"><span>1</span></a>
                                                        </td>
                                                        <td class="tb-tnx-id">
                                                            <a href="#"><span> $50</span></a>
                                                        </td><td class="tb-tnx-id">
                                                            <a href="#"><span> 10-05-2019</span></a>
                                                        </td><td class="tb-tnx-id">
                                                            <a href="#"><span> 10-05-2019</span></a>
                                                            <td class="tb-tnx-action">
                                                            <div class="dropdown">
                                                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs" style="">
                                                                    <ul class="link-list-plain">
                                                                        <li><a href="#">View</a></li>
                                                                        <li><a href="#">Edit</a></li>
                                                                        <li><a href="#">Remove</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </div>

                                            
                                            </div><!-- .row -->
                                            <!-- endpricing -->
                                        </div>
                                    </div>
                                </div>
                            <div class="modal fade" tabindex="-1" id="modalDefault">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <em class="icon ni ni-cross"></em>
                                        </a>
                                        <div class="modal-header">
                                            <h5 class="modal-title">Modal Title</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="nk-block">
                                                    <div class="row g-gs">
                                                        @foreach($villas['media'] as $media)
                                                        <div class="col-sm-6 col-lg-4 col-xxl-3">
                                                            <div class="gallery card card-bordered">
                                                                <a class="gallery-image popup-image" href="{{ url('villa_images/'.$media->media_name) }}">
                                                                    <img class="w-100 rounded-top" src="{{ url('villa_images/'.$media->media_name) }}" alt="">
                                                                </a>
                                                                <div class="gallery-body card-inner align-center justify-between flex-wrap g-2">
                                                                    <form action="{{ url('admin-dashboard/villas/update') }}" id="media_form" method="post" enctype="multipart/form-data">
                                                                     @csrf
                                                                     <input type="hidden" name="image_id" value="{{ $media->id }}">
                                                                    <input type="file" class="file_upload" id="file{{ $media->id }}" name="file" style="display:none;">   
                                                                    <div class="user-card">
                                                                        <label for="file{{ $media->id }}" class="btn">
                                                                     update</label>
                                                                     </form>
                                                                      <button class="btn" id="delete" data-id="{{ $media->id }}">delete</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="modal-footer bg-light">
                                            <span class="sub-text">Modal Footer Text</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <button class="btn">import</button><br>
                                    <span>(required only .ics file)</span>
                                </div>
                                <div>
                                <button class="btn">Export</button><br>
                                <span>(for download .ics file)</span>
                                </div>
                            </div>
                        
                        </div>
                        <div class="container">
                             <div id='calendar'></div>
                        </div>

<script>
    $(document).ready(function(){
        // $('#edit_form').hide();
    $('#edit').on('click',function(){
        $(this).parent().parent().hide();
        $('#edit_form').show();
        $('#edit_form').focus();
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
            $('#location-form').hide();
            $('#edit_location').parent().parent().show();
            html = response.street_name+','+response.city+','+response.state+','+response.country;
            $('.location-span').html(html);
         }
        })
    });



    });
});
$('.file_upload').change(function(){
    // console.log($(this).val());
    $('#media_form').submit();
})
</script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script>
var calendar = $('#calendar').fullCalendar({
    displayEventEnd: true,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month'
    },
    eventRender: function (event, element, view) {
        if (event.allDay === 'true') {
                event.allDay = true;
        } else {
                event.allDay = false;
        }
      },
    selectable:true,
    selectHelper:true,
    select: function(start, end, allDay)
    {
        console.log(start._d);
        console.log(end._d);

    }


});
  </script>
  


@endsection