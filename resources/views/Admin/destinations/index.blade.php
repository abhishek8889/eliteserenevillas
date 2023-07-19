@extends('admin_layout/index')
@section('content')


<div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="title nk-block-title">
                                                    @if($destination)
                                                    Update Destination
                                                    @else
                                                   Add Destinations
                                                   @endif
                                                </h4>
                                         
                                            </div>
                                        </div>
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <form action="{{ route('adddestinations') }}" method="post" class="form-validate is-alter" enctype = "multipart/form-data" >
                                                   @csrf
                                                   <input type="hidden" name="id" value="{{ $destination->id ?? '' }}">
                                                        <div class="col-md-9">
                                                            <div class="form-group">
                                                                <label class="form-label" for="heading">Title</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="heading" name="heading"  value="{{ $destination->heading ?? '' }}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="form-group">
                                                                <label class="form-label" for="sub_heading">Sub Heading</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="sub_heading" name="sub_heading"  value="{{ $destination->subheading ?? '' }}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="form-group">
                                                                <label class="form-label" for="description">Description</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea class="form-control form-control-sm" id="description" name="description" placeholder="Write your Description"  required> {{ $destination->description ?? '' }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="form-group">
                                                                <label class="form-label" for="Image">Image</label>
                                                                <div class="form-control-wrap">
                                                                <div class="form-file">
                                                                    <input type="file" class="form-file-input" name="image" id="customFile">
                                                                    <label class="form-file-label" for="customFile">Choose file</label>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="col-md-12 mt-2">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-primary">@if($destination) Update @else Save @endif</button>
                                                            </div>
                                                        </div>
                                                  
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                ClassicEditor
                                .create( document.querySelector( '#description' ) );
                             
                                </script>

@endsection