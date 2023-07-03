@extends('admin_layout/index')
@section('content')
<div class="card card-bordered card-preview">
         <div class="card-inner">
             <div class="preview-block">
                 <span class="preview-title-lg overline-title">Add Villas</span>
                 <div class="row gy-4">
                    <form action="{{ route('addVillasProc') }}" method="post">
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
                             <label class="form-label" for="default-01">Slug</label>
                             <div class="form-control-wrap">
                                 <input type="text" class="form-control" name ="slug" id="default-01" placeholder="slug">
                             </div>
                             @if ($errors->has('slug'))
                            <span class="text-danger">{{ $errors->first('slug') }}</span>
                             @endif
                         </div>
                         <div class="form-group">
                             <label class="form-label" for="default-01">Location</label>
                             <div class="form-control-wrap">
                                 <input type="text" class="form-control" name ="location" id="default-01" placeholder="Location">
                             </div>
                             @if ($errors->has('location'))
                            <span class="text-danger">{{ $errors->first('location') }}</span>
                             @endif
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