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
                                            <div class="form-file">
                                               <button type="submit" class="btn btn-md">Upload</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


@endsection