@extends('admin_layout/index')
@section('content')
<div class="card card-bordered card-preview">
         <div class="card-inner">
             <div class="preview-block">
                 <span class="preview-title-lg overline-title">Add Villas</span>
                 <div class="row gy-4">
                    <form action="{{ route('addVillasProc') }}" method="post" enctype="multipart/form-data">
                        @csrf
                     <div class="col-sm-6">
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
                             <label class="form-label" for="default-03">Address</label>
                             <div class="form-control-wrap">
                                 <input type="text" class="form-control" name ="address" id="default-03" placeholder="Address">
                             </div>
                             @if ($errors->has('location'))
                            <span class="text-danger">{{ $errors->first('location') }}</span>
                             @endif
                         </div>
                         <div class="form-group">
                            <label class="form-label" for="customMultipleFilesLabel">Upload Images</label>
                            <div class="form-control-wrap">
                                <div class="form-file">
                                    <input type="file" multiple class="form-file-input" name="images[]" id="customMultipleFiles">
                                    <label class="form-file-label" for="customMultipleFiles">Choose files</label>
                                </div>
                            </div>
                         </div>
                         <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                         </div>
                     </div>
                     </form>
                 </div>
             </div>
         </div>
</div>

@endsection