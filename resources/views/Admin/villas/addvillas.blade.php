@extends('admin_layout/index')
@section('content')
<form action="{{ route('addVillasProc') }}" method="post" enctype="multipart/form-data">
<div class="card card-bordered card-preview">
         <div class="card-inner">
             <div class="preview-block">
                 <span class="preview-title-lg overline-title">Basic details</span>
                 <div class="row gy-4">
                     <div class="col-sm-6">
                    
                        @csrf
                         <div class="form-group">
                             <label class="form-label" for="villaname">Name</label>
                             <div class="form-control-wrap">
                                 <input type="text" class="form-control" name ="villaname" id="villaname" placeholder="Listing Name">
                             </div>
                             @if ($errors->has('villaname'))
                            <span class="text-danger">{{ $errors->first('villaname') }}</span>
                             @endif
                         </div>
                         <div class="form-group">
                             <label class="form-label" for="slug">Slug</label>
                             <div class="form-control-wrap">
                                 <input type="text" class="form-control" name ="slug" id="slug" placeholder="slug">
                             </div>
                             @if ($errors->has('slug'))
                            <span class="text-danger">{{ $errors->first('slug') }}</span>
                             @endif
                         </div>
                         
                        
                         <div class="form-group">
                             <label class="form-label" for="default-textarea">Description</label>
                             <div class="form-control-wrap">
                                 <textarea class="form-control no-resize" name="description" id="default-textarea"></textarea>
                             </div>
                         </div>
                        <hr>
                        
                     </div> 
                    <div class="col-sm-6">
                        
                         <div class="form-group">
                                 <label class="form-label">Amenities</label>
                                 <div class="form-control-wrap">
                                     <select class="form-select js-select2" multiple="multiple" data-placeholder="Select Multiple Amenities"  name="amemities[]">
                                         <option value="default_option">Default Option</option>
                                         @foreach($amenities as $a)
                                         <option value="{{ $a->id ?? '' }}">{{ $a->name ?? '' }}</option>
                                         @endforeach
                                     </select>
                                 </div>
                                 <div class="form-group">
                                        <label class="form-label" for="min-guest">Minimum number of Guests</label>
                                        <div class="form-control-wrap">
                                                <input type="number" class="form-control" name ="min_guest" id="min-guest" placeholder="minimum number of guest">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <label class="form-label" for="min-guest">Maximum number of Guests</label>
                                        <div class="form-control-wrap">
                                                <input type="number" class="form-control" name ="max_guest" id="max-guest" placeholder="maximum number of guest">
                                            </div>
                                        </div>
                         </div>
                         <div class="form-group">
                            <label class="form-label" for="customMultipleFilesLabel">Upload Images</label>
                            <div class="form-control-wrap">
                                <div class="form-file">
                                    <input type="file" multiple class="form-file-input" name="images[]" id="customMultipleFiles">
                                    <label class="form-file-label" for="">Choose files</label>
                                </div>
                                @if ($errors->has('images'))
                            <span class="text-danger">{{ $errors->first('images') }}</span>
                             @endif
                            </div>
                         </div>
                         <div class="form-group">
                         <label class="form-label" for="category">Upload Images</label>
                             <div class="form-control-wrap">
                                 <select class="form-select js-select2 select2-hidden-accessible" id="category" name="cat_id" data-select2-id="3" tabindex="-1" aria-hidden="true">
                                 @foreach($categories as $cat)    
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
            <div class="code-block">
                                    <h6 class="overline-title title">Address</h6>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-6">
                                                    <div class="form-group">
                                                            <label class="form-label" for="default-03">Street Name</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" name ="street_name" id="default-03" placeholder="Street">
                                                            </div>
                                                            @if ($errors->has('street_name'))
                                                            <span class="text-danger">{{ $errors->first('street_name') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label" for="default-03">City</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" name ="city" id="default-03" placeholder="City">
                                                            </div>
                                                            @if ($errors->has('city'))
                                                            <span class="text-danger">{{ $errors->first('city') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label" for="default-03">State</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" name ="state" id="default-03" placeholder="State">
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
                                                                <input type="text" class="form-control" name ="country_name" id="default-03" placeholder="Country Name">
                                                            </div>
                                                            @if ($errors->has('country_name'))
                                                            <span class="text-danger">{{ $errors->first('country_name') }}</span>
                                                            @endif
                                                        </div>
                                                    <div class="form-group">
                                                    <label class="form-label" for="default-03">Longitude</label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" class="form-control" name ="Longitude" id="default-03" placeholder="Longitude">
                                                    </div>
                                                    @if ($errors->has('Longitude'))
                                                    <span class="text-danger">{{ $errors->first('Longitude') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="default-03">Latitude</label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" class="form-control" name ="Latitude" id="default-03" placeholder="Latitude">
                                                    </div>
                                                    @if ($errors->has('Latitude'))
                                                    <span class="text-danger">{{ $errors->first('Latitude') }}</span>
                                                    @endif
                                                </div>
                                                    </div>
                                                </div>
                                            
            </div>
            <div class="code-block my-5">
            <h6 class="overline-title title">Services</h6>
            <div class="row">
                         @foreach($services as $service)
                            <div class="col-lg-6">
                             <div class="form-group">
                                <label class="form-label" for="cf-full-name">{{ $service->name ?? '' }}</label>
                                <input type="text" class="form-control" name="servicename[]" id="cf-full-name">
                            </div>
                            </div>
                            @endforeach
                            </div>
                        </div>
            <div class="example-alert">
                 <div class="alert alert-primary alert-icon">
                      <strong>Custome Section</strong>
                      <button type="button" class="btn btn-primary" id="addmore">add more</button>
                 </div>
             </div>
             <div class="custome-area">
                 <div class="code-block my-5">
                    <h6 class="overline-title title">Custom section1</h6>
                    <div class="form-group">
                                    <label class="form-label" for="Customtitle">Title</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name ="Customtitle[]" id="CustomTitle" placeholder="Title">
                                    </div>
                                </div>
                    <div class="form-group">
                                    <label class="form-label" for="default-textarea">Description</label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control no-resize" name="customedescription[]" id="default-textarea"></textarea>
                                    </div>
                </div>
            </div>
            </div>
            <!-- <div class="code-block mt-5"> -->
            <div class="form-group mt-5">
                            <button type="submit" class="btn btn-primary">Submit</button>
                         </div>
            <!-- </div> -->
            </form>
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
                // console.log(html);
                $('.custome-area').append(html);
        });
    });

</script>

@endsection