@extends('admin_layout/index')
@section('content')

            <div class="nk-block">
                <div class="card card-bordered card-stretch">
                    <div class="card-inner-group">
                        <div class="card-inner position-relative card-tools-toggle">
                           <h4>Destination list</h4>
                        </div><!-- .card-inner -->
                        <div class="card-inner p-0">
                            <div class="nk-tb-list nk-tb-ulist">
                                <div class="nk-tb-item nk-tb-head">
                                    <div class="nk-tb-col nk-tb-col-check">
                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                            <input type="checkbox" class="custom-control-input" id="uid">
                                            <label class="custom-control-label" for="uid"></label>
                                        </div>
                                    </div>
                                    <div class="nk-tb-col"><span class="sub-text">Sr. No.</span></div>
                                    <div class="nk-tb-col"><span class="sub-text">Title</span></div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Image</span></div>
                                 
                                    <div class="nk-tb-col tb-col-lg"><span class="sub-text">Action</span></div>
                                   
                                  
                                </div><!-- .nk-tb-item -->
                                <?php $count = 1; ?>
                                @foreach($destination as $destination)
                                <div class="nk-tb-item">
                                    <div class="nk-tb-col nk-tb-col-check">
                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                            <input type="checkbox" class="custom-control-input" id="uid1">
                                            <label class="custom-control-label" for="uid1"></label>
                                        </div>
                                    </div>
                                    <div class="nk-tb-col tb-col-mb">
                                        <span class="tb-amount">{{ $count++; }}</span></span>
                                    </div>
                                    <div class="nk-tb-col">
                                            <!-- <div class="user-card"> -->
                                            <!-- <div class="user-avatar">
                                                <img src="{{ asset('destination_images/'.$destination->banner_img) }}" alt="">
                                            </div> -->
                                                <!-- <div class="user-info"> -->
                                                    <span class="tb-lead">{{ $destination->heading ?? '' }} <span class="dot dot-success d-md-none ms-1"></span></span>
                                                
                                                <!-- </div> -->
                                            <!-- </div> -->
                                    </div>
                                    <div class="nk-tb-col tb-col-mb destination-img">
                                       <img src="{{ asset('destination_images/'.$destination->banner_img) }}" alt="" class="img-fluid">
                                    </div>
                                    <div class="nk-tb-col tb-col-lg">
                                    <div class="dropdown drop1">
                                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                            <ul class="link-list-plain">
                                                <li><a href="{{ url('admin-dashboard/destination/add/'.$destination->slug) }}" class="edit-amenities" data-id="1">Edit</a></li>
                                                <li><a link="{{ url('admin-dashboard/destination/delete/'.$destination->id) }}" id="delete_destination" class="delete_destination remove-amenities" data-id="1">Remove</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    </div>
                                   
                                </div><!-- .nk-tb-item -->
                                @endforeach
                            </div><!-- .nk-tb-list -->
                        </div><!-- .card-inner -->
                    </div><!-- .card-inner-group -->
                </div><!-- .card -->
            </div>
                                <script>
                                      $(document).ready(function(){
                                                $('.delete_destination').click(function(){
                                                   link = $(this).attr('link');
                                                   console.log(link);
                                                   Swal.fire({
                                                        title: 'Do you want to delete this destination ?',
                                                        icon: 'error',
                                                        showCancelButton: true,
                                                        confirmButtonText: 'yes',
                                                        confirmButtonColor: '#008000',
                                                        cancelButtonText: 'no',
                                                        cancelButtonColor: '#d33',
                                                        }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            window.location.href = link;
                                                        } 
                                                        }); 
                                                });
                                            });
                                </script>
@endsection