@extends('admin_layout/index')
@section('content')
<div class="card card-bordered card-preview">
         <div class="card-inner">
             <div class="preview-block">
                 <span class="preview-title-lg overline-title">Update Listing</span>
                 <div class="row gy-4">
                     <div class="col-sm-6">
                    <form action="{{ route('updateVillasProc') }}" method="post" >
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
                             <label class="form-label" for="default-textarea">Description</label>
                             <div class="form-control-wrap">
                                 <textarea class="form-control no-resize" name="description" value="{{ $villasData->description ?? '' }}" id="default-textarea">{{ $villasData->description ?? '' }}</textarea>
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
                                                    if($a->id == $villasData->amenities[$i]->id){
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
                         @foreach($services as $service)
                            <div class="form-group">
                                <label class="form-label" for="cf-full-name">{{ $service->name ?? '' }}</label>
                                <input type="text" class="form-control" name="servicename[]" id="cf-full-name" 
                                value="<?php 
                                for($s = 0; $s < count($villasData->service); $s++){
                                    if($service->id == $villasData->service[$s]->id){
                                        echo $villasData->service[$s]->value;
                                    }
                                }
                                ?>"
                                />
                            </div>
                        @endforeach

                        
                    </div>
                    <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                     </form>
                   
                 </div>
             </div>
         </div>
</div>

@endsection