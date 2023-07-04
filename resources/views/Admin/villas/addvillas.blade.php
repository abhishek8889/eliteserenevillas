@extends('admin_layout/index')
@section('content')
<div class="card card-bordered card-preview">
         <div class="card-inner">
             <div class="preview-block">
                 <span class="preview-title-lg overline-title">Add Villas</span>
                 <div class="row gy-4">
                     <div class="col-sm-6">
                    <form action="{{ route('addVillasProc') }}" method="post" enctype="multipart/form-data">
                        @csrf
                         <div class="form-group">
                             <label class="form-label" for="default-01">Name</label>
                             <div class="form-control-wrap">
                                 <input type="text" class="form-control" name ="villaname" id="default-01" placeholder="Villas Name">
                             </div>
                             @if ($errors->has('villaname'))
                            <span class="text-danger">{{ $errors->first('villaname') }}</span>
                             @endif
                         </div>
                         <div class="form-group">
                             <label class="form-label" for="default-02">Slug</label>
                             <div class="form-control-wrap">
                                 <input type="text" class="form-control" name ="slug" id="default-02" placeholder="slug">
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
                            <button type="submit" class="btn btn-primary">Submit</button>
                         </div>
                     </div> 
                    <div class="col-sm-6">
                    <div class="form-group">
                            <label class="form-label" for="customMultipleFilesLabel">Upload Images</label>
                            <div class="form-control-wrap">
                                <div class="form-file">
                                    <input type="file" multiple class="form-file-input" name="images[]" id="customMultipleFiles">
                                    <label class="form-file-label" for="customMultipleFiles">Choose files</label>
                                </div>
                            </div>
                         </div>
                    </div>
                     </form>
                   
                 </div>
             </div>
         </div>
</div>

@endsection