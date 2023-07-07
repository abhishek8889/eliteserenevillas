@extends('admin_layout/index')
@section('content')
<div class="card card-bordered card-preview">
         <div class="card-inner">
             <div class="preview-block">
                 <span class="preview-title-lg overline-title">Add Listing</span>
                 <div class="row gy-4">
                     <div class="col-sm-6">
                    <form action="{{ route('addVillasProc') }}" method="post" enctype="multipart/form-data">
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
                             <label class="form-label" for="default-textarea">Description</label>
                             <div class="form-control-wrap">
                                 <textarea class="form-control no-resize" name="description" id="default-textarea"></textarea>
                             </div>
                         </div>
                         <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                         </div>
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
                         </div>
                         @foreach($services as $service)
                             <div class="form-group">
                                <label class="form-label" for="cf-full-name">{{ $service->name ?? '' }}</label>
                                <input type="text" class="form-control" name="servicename[]" id="cf-full-name">
                            </div>
                            @endforeach
                        
                    </div>
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

@endsection