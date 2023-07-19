@extends('admin_layout/index')
@section('content')
{{ Breadcrumbs::render('add-new-villas') }} 
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
                                 <textarea class="form-control no-resize editor" name="description" id="editor-text2"></textarea>
                             </div>
                         </div>
                         @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                             @endif
                         <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file" name="images[]" multiple onchange="javascript:updateList()">
                            <label class="custom-file-label" for="file">
                            <img width="30" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAQlBMVEX///8AAABhYWFlZWWSkpL19fW9vb01NTXf398kJCTw8PBRUVGdnZ1dXV3m5uZ0dHR8fHzExMSMjIzU1NSxsbEhISGIc9b1AAADv0lEQVR4nO2d607jMBhEa1pa6AVaLu//qgixq2+XxmlSe+IZa85vazQjhZMCarJaGWOMMcYYc8WxdQE0m7RpXQHLNqW0bV0CyVP65ql1DRyP6YfH1kVg7P4s3LUugmKd/rJuXQXDJgVdCnWb/qVDoT6l/+lOqI/pN70JdXe1sDOhrq8GdibUzcDAroS6HRzYkVB/a7Q7oV5rtDehXms06EKoQxoNOhDqsEYDeaHmNBqICzWv0UBaqGMaDZSFOqbRQFio4xoNZIV6S6OBqFBvazSQFOoUjQaCQp2m0UBPqNM0GsgJdapGAzGhTtdoICXUORoNhIQ6T6OBjFDnajRQEepcjQYiQp2v0UBCqPdoNBAQ6n0aDeiFeq9GA3Kh3q/RgFuo92s0oBZqiUYDYqGWaTSgFWqpRgNSoZZrNKAUag2NBoxCraHRgFCodTQa0Am1lkYDMqHW02hAJdSaGg2IhFpXowGPUOtqNKARam2NBiRCra/RgEKoCI0GBELFaDRoLlSURoPWQkVpNGgsVJxGg6ZCRWo0aChUrEaDZkJFazRoJFS8RoM2QsVrNGgi1NOCA1M6LT9we3iYzPp5sPXzenrEgeDj2xjDt02S3xyq8DC48KF1rYp4oT5eqI8X6uOF+nihPl6ojxfq44X6eKE+XqiPF+rjhfp4oT5eqI8X6uOF+nihPl6ojxfq44X6eKE+XqiPF+rjhfp4oT5eqI8XLsVhsMehQjJu4bzOuB4sySw9cMksPXDJLD1wySw9cMksPXDJLD1wySw9cMksPXDJLD1wySw9cMksPXDJLD1wySw9cMksPXDJLD1wySw9cMksPXDJLD1wySw9cMksPXDJLD1wySw9cMksPXDJLD1wySw9cMksPXDJLD1wySw9cMksPXDJLD1wybgew8/nq/EcPZaFb6eBx+id3ioksyzE4YUlpznwwpLTHHhhyWkOvLDkNAdeWHKaAy8sOc2BF5ac5sALS05z4IUlpznwwpLTHNRYyP2OhuH3SsxbOOc9G4uTeTdIbuESr6dahtx1d25drBrnzMJj62LVOGYWXloXq8Yls3Dfulg19pmFq8/WzSrxnBu40Kvw8ORftvfSulolXrILM99XVGPsO6HvrctV4X1k4cKvi8Mw/s/zHm4Y2VvFDx+t+xXzMT5wtXpt3bCQ11sD1X066bv1yhMnPjxA90KdcIn+oKqbm5IJ9or3xdON28Qv3tV+Gg+jn2QGedkM/5WHkc/NyIftMfaX45n5L23frM/Hy7zL0xhjjDHGEPIFcc477O4fZUsAAAAASUVORK5CYII=" /> Upload Images</label>
                        </div>
                        @if ($errors->has('images'))
                            <span class="text-danger">{{ $errors->first('images') }}</span>
                             @endif
                        <ul id="fileList" class="file-list"></ul>
                        <hr>
                        
                     </div> 
                    <div class="col-sm-6">
                        
                         <div class="form-group">
                                 <label class="form-label">Amenities</label>
                                 <div class="form-control-wrap">
                                     <select class="form-select js-select2" multiple="multiple" data-placeholder="Select Multiple Amenities"  name="amemities[]">
                                 
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
                                        @if ($errors->has('min_guest'))
                                        <span class="text-danger">{{ $errors->first('min_guest') }}</span>
                                        @endif
                                        <div class="form-group">
                                            <label class="form-label" for="mix-guest">Maximum number of Guests</label>
                                            <div class="form-control-wrap">
                                                    <input type="number" class="form-control" name ="max_guest" id="max-guest" placeholder="maximum number of guest">
                                                </div>
                                            </div>
                                            @if ($errors->has('max_guest'))
                                            <span class="text-danger">{{ $errors->first('max_guest') }}</span>
                                            @endif
</div>
                         <!-- <div class="form-group">
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
                         </div> -->
                       
                         <div class="form-group">
                         <label class="form-label" for="category">Category</label>
                             <div class="form-control-wrap">
                                 <select class="form-select js-select2 select2-hidden-accessible" id="category" name="cat_id" data-select2-id="3" tabindex="-1" aria-hidden="true">
                                 @foreach($categories as $cat)    
                                 <option value="{{ $cat->id ?? '' }}" data-select2-id="3">{{ $cat->name ?? '' }}</option>    
                                @endforeach
                                </select>
                             </div>
                         </div>
                         <div class="form-group">
                                <label class="form-label" for="icsurl">Ics url</label>
                                 <div class="form-control-wrap">
                                     <input type="text" class="form-control" name ="ics_url" id="icsurl">
                                 </div>
                             </div>
                             @if ($errors->has('ics_url'))
                                <span class="text-danger">{{ $errors->first('ics_url') }}</span>
                                @endif
                             <!-- <div class="form-group">
                                <label class="form-label" for="Check-in">Check-in</label>
                                 <div class="form-control-wrap">
                                     <input type="number" class="form-control" name ="Check_in" id="Check-in">
                                 </div>
                             </div>
                             @if ($errors->has('Check_in'))
                             <span class="text-danger">{{ $errors->first('Check_in') }}</span>
                             @endif
                             <div class="form-group">
                                <label class="form-label" for="Check-in">Check-out</label>
                                 <div class="form-control-wrap">
                                     <input type="number" class="form-control" name ="Check_in" id="Check-out">
                                 </div>
                             </div>
                             @if ($errors->has('Check_in'))
                             <span class="text-danger">{{ $errors->first('Check_out') }}</span>
                             @endif -->
                        
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
                                                    <div class="form-group col-6">
                                                    <label class="form-label" for="default-03">Destination</label>
                                                    <div class="form-control-wrap">
                                                        <select name="destination" id="destination" name="destination" class="form-control">

                                                            @foreach($destination as $d)
                                                            <option value="{{ $d->id ?? '' }}">{{ $d->heading ?? '' }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @if ($errors->has('destination'))
                                                    <span class="text-danger">{{ $errors->first('destination') }}</span>
                                                    @endif
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
                      <strong>Custom Section</strong>
                     
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
                                        <textarea  name="customedescription[]" id="editor-text3" class="editor"></textarea>
                                    </div>
                </div>
            </div>
            </div>
            <!-- <div class="code-block mt-5"> -->
            <div class="form-group mt-5">
                             <button type="button" class="btn btn-primary" id="addmore" class="addmorebtn">add more custome section</button>
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
    $(document).ready(function() {
        $('#addmore').click(function() {
            let x = Math.floor((Math.random() * 10000) + 1);
            let html = '<div class="code-block my-5"><h6 class="overline-title title">Custom section1</h6><div class="form-group"><label class="form-label" for="Customtitle">Title</label><div class="form-control-wrap"><input type="text" class="form-control" name ="Customtitle[]" id="CustomTitle" placeholder="Title"></div></div><div class="form-group"><label class="form-label" for="default-textarea">Description</label><div class="form-control-wrap"><textarea class="form-control no-resize editor" name="customedescription[]" id="editor-text-' + x + '"></textarea></div></div>';

            $('.custome-area').append(html);

            const editorId = 'editor-text-' + x;
            ClassicEditor
            .create(document.querySelector(`#${editorId}`))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
        });
    });
</script>
<script>
      updateList = function() {
      var input = document.getElementById('file');
      var output = document.getElementById('fileList');
      var children = "";
      for (var i = 0; i < input.files.length; ++i) {
          children +=  '<li>'+ input.files.item(i).name + '<span class="remove-list" onclick="return this.parentNode.remove()">X</span>' + '</li>'
      }
      output.innerHTML = children;
  }
</script>
@endsection