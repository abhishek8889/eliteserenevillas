@extends('admin_layout/index')
@section('content')
<form action="{{ route('updateVillasProc') }}" method="post" >

<div class="card card-bordered card-preview">
         <div class="card-inner">
             <div class="preview-block">
                 <span class="preview-title-lg overline-title">Update Listing</span>
                 <div class="row gy-4">
                     <div class="col-sm-6">
                        @csrf
                        <input type="hidden" value="{{ $villasData->id ?? '' }}" name="id" />
                         <div class="form-group">
                             <label class="form-label" for="villaname">Name</label>
                             <div class="form-control-wrap">
                                 <input type="text" class="form-control" name ="villaname" id="villaname" placeholder="Listing Name" value="{{ $villasData->name ?? '' }}" />
                             </div>
                             @if ($errors->has('villaname'))
                            <span class="text-danger">{{ $errors->first('villaname') }}</span>
                             @endif
                         </div>
                         <div class="form-group">
                             <label class="form-label" for="slug">Slug</label>
                             <div class="form-control-wrap">
                                 <input type="text" class="form-control" name ="slug" id="slug" placeholder="slug"  value="{{ $villasData->slug ?? '' }}">
                             </div>
                             @if ($errors->has('slug'))
                            <span class="text-danger">{{ $errors->first('slug') }}</span>
                             @endif
                         </div>
                         <div class="form-group">
                             <label class="form-label" for="default-textarea">Description</label>
                             <div class="form-control-wrap">
                                 <textarea class="editor form-control no-resize" name="description" value="{{ $villasData->description ?? '' }}" >{{ $villasData->description ?? '' }}</textarea>
                             </div>
                         </div>
                        
                         
                     </div> 
                    <div class="col-sm-6">
                        
                         <div class="form-group">
                                 <label class="form-label">Amenities</label>
                                 <div class="form-control-wrap">
                                     <select class="form-select js-select2" multiple="multiple" data-placeholder="Select Multiple Amenities"  name="amemities[]" value="{{ $villasData->amenities ?? '' }}" >
                                         <!-- <option value="default_option">Default Option</option> -->
                                         @foreach($amenities as $a)
                                            <option value="{{ $a->id ?? '' }}"
                                                <?php
                                                for($i = 0 ; $i < count($villasData->amenities) ; $i++){
                                                    if($a->id == $villasData->amenities[$i]->amenitie_id){
                                                        echo ' selected ';
                                                    }
                                                }
                                                ?> >
                                                {{ $a->name ?? '' }}
                                            </option>
                                        @endforeach
                                     </select>
                                 </div>
                         </div>
                         <div class="form-group">
                                        <label class="form-label" for="min-guest">Minimum number of Guests</label>
                                        <div class="form-control-wrap">
                                                <input type="number" class="form-control" name ="min_guest" id="min-guest" placeholder="minimum number of guest" value="{{ $villasData->min_guest ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <label class="form-label" for="min-guest">Maximum number of Guests</label>
                                        <div class="form-control-wrap">
                                                <input type="number" class="form-control" name ="max_guest" id="max-guest" placeholder="maximum number of guest" value="{{ $villasData->max_guest ?? '' }}">
                                            </div>
                                        </div>
                         
                         <div class="form-group">
                         <label class="form-label" for="category">Category</label>
                             <div class="form-control-wrap">
                                 <select class="form-select js-select2 select2-hidden-accessible" id="category" name="cat_id" data-select2-id="3" tabindex="-1" aria-hidden="true">
                                 @foreach($categories as $cat)    
                                 @if($cat->id == $villasData->category_id) selected @endif
                                 <option value="{{ $cat->id ?? '' }}" data-select2-id="24">{{ $cat->name ?? '' }}</option>    
                                 
                                @endforeach
                            </select>
                             </div>
                         </div>
                         </div>
                    </div>
                    
                   
                 </div>
             </div>
         </div>
</div>
<div class="px-3">
                        <div class="code-block my-5">
                        <h6 class="overline-title title">Services</h6>
                        <hr>  
                        <div class="row">
                         @foreach($services as $service)
                         <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="cf-full-name">{{ $service->name ?? '' }}</label>
                                <input type="text" class="form-control" name="servicename[]" id="cf-full-name" 
                                value="<?php 
                                for($s = 0; $s < count($villasData->service); $s++){
                                    if($service->id == $villasData->service[$s]->service_id){
                                        echo $villasData->service[$s]->value;
                                    }
                                }
                                ?>"
                                />
                            </div>
                            </div>
                        @endforeach
                        </div>
</div>
            <div class="code-block my-5">
                                    <h6 class="overline-title title">Address</h6>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="default-03">Street Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name ="street_name" id="default-03" placeholder="Street"  value="{{ $villasData->address->street_name ?? '' }}" />
                                            </div>
                                            @if ($errors->has('street_name'))
                                            <span class="text-danger">{{ $errors->first('street_name') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="default-03">City</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name ="city" id="default-03" placeholder="City" value="{{ $villasData->address->city ?? '' }}">
                                            </div>
                                            @if ($errors->has('city'))
                                            <span class="text-danger">{{ $errors->first('city') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="default-03">State</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name ="state" id="default-03" placeholder="State" value="{{ $villasData->address->state ?? '' }}">
                                            </div>
                                            @if ($errors->has('state'))
                                            <span class="text-danger">{{ $errors->first('state') }}</span>
                                            @endif
                                        </div>
                                       
                                        </div>
                                        <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="default-03">Country Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name ="country_name" id="default-03" placeholder="Country Name" value="{{ $villasData->address->country ?? '' }}" />
                                            </div>
                                            @if ($errors->has('country_name'))
                                            <span class="text-danger">{{ $errors->first('country_name') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                                    <label class="form-label" for="default-03">Longitude</label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" class="form-control" name ="Longitude" id="default-03" placeholder="Longitude" value="{{ $villasData->address->longitude ?? '' }}">
                                                    </div>
                                                    @if ($errors->has('Longitude'))
                                                    <span class="text-danger">{{ $errors->first('Longitude') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="default-03">Latitude</label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" class="form-control" name ="Latitude" id="default-03" placeholder="Latitude" value="{{ $villasData->address->latitude ?? '' }}">
                                                    </div>
                                                    @if ($errors->has('Latitude'))
                                                    <span class="text-danger">{{ $errors->first('Latitude') }}</span>
                                                    @endif
                                                </div>
                                        </div>
                                    </div>
</div>
<div class="example-alert ">
                 <div class="alert alert-primary alert-icon d-flex justify-content-between">
                      <strong>Custome Section</strong>
                      <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#modalDefault">add more custome section</button>
                 </div>
             </div>
             <?php  $num = 1; ?>
             <div id="cusotmesection">
             @foreach($villasData->customedata as $data)
             
                 <div class="code-block my-5" id="customesection{{ $data->id ?? '' }}">
                    <div class="d-flex justify-content-between">
                        <h6 class="overline-title title">Custom section{{ $num++; }}</h6>
                        <a class="deletecustomesection" data-id="{{ $data->id ?? '' }}"><em class="icon ni ni-cross"></em></a>
                    </div>
                    <div class="form-group">
                                    <label class="form-label" for="Customtitle">Title</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name ="Customtitle[]" id="CustomTitle" placeholder="Title" value="{{ $data->title ?? '' }}">
                                    </div>
                     </div>
                    <div class="form-group">
                                    <label class="form-label" for="default-textarea">Description</label>
                                    <div class="form-control-wrap">
                                        <textarea class="editor form-control no-resize" name="customedescription[]" id="">{{ $data->description ?? '' }}</textarea>
                                    </div>
                    </div>
                </div><script>
                ClassicEditor
                                .create( document.querySelector( '#editor{{ $data->id }}' ) );
                             
                                </script>
            
            @endforeach
            </div>
            <div class="custome-area">
                
                </div>
          
            <div class="form-group my-5">
            
                            <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </div>
            </div>
</form>

<div class="modal fade" tabindex="-1" id="modalDefault">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">Add more custome section</h5>
            </div>
            <div class="modal-body">
               <form action="{{ route('addcustome') }}" method="post">
                    @csrf
                                <input type="hidden" name="villa_id" value="{{ $villasData->id ?? '' }}">
                <div class="code-block1 my-5">
                <!-- <h6 class="overline-title title">Custom section1</h6> -->
                <div class="form-group">
                <label class="form-label" for="Customtitle">Title</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control" name ="Customtitle" id="CustomTitle" placeholder="Title"></div></div>
                <div class="form-group">
                    <label class="form-label" for="froala-editor">Description</label>
               <div class="form-control-wrap">
                <textarea class="editor form-control no-resize" name="customedescription" id="editor-text2"></textarea>
              
                </div>
                </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                
               </form>
            </div>
          
        </div>
    </div>
</div>

            <script>
    $(document).ready(function(){
        $('#villaname').on('keyup',function(){
            let name = $(this).val().toLowerCase();
            let slug = name.replace(/ /g, "-");
           $('#slug').val(slug);
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('#addmore').click(function(){
                html ='<div class="code-block my-5"><h6 class="overline-title title">Custom section1</h6><div class="form-group"><label class="form-label" for="Customtitle">Title</label><div class="form-control-wrap"><input type="text" class="form-control" name ="Customtitle[]" id="CustomTitle" placeholder="Title"></div></div><div class="form-group"><label class="form-label" for="default-textarea">Description</label><div class="form-control-wrap"><textarea class="form-control no-resize" name="customedescription[]" id="default-textarea"></textarea></div></div>';
               
                $('.custome-area').append(html);
        });
    });

</script>
<script>
    $(document).ready(function(){
        $("body").delegate(".deletecustomesection", "click", function(e) {
       
            e.preventDefault();
            id = $(this).attr('data-id');
            $.ajax({
            method: 'POST',
            url: '{{ route('cutomedelete') }}',
            dataType: 'json',
            data: {
                    id : id,
                    _token: '{{csrf_token()}}'
                },
            success: function(response) {
                $("#cusotmesection").load(location.href + " #cusotmesection");
                console.log(response);
            }
        });
        })
    });
   
  
</script>

@endsection