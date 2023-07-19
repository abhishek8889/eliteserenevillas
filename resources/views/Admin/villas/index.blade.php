@extends('admin_layout/index')
@section('content')

{{ Breadcrumbs::render('villa-list') }}
<div class="col-xxl-8">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h6 class="title"><span class="me-2">Villas</span> </h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <ul class="card-tools-nav">
                                                                <!-- <li><a href="#"><span>Paid</span></a></li>
                                                                <li><a href="#"><span>Pending</span></a></li>
                                                                <li class="active"><a href="#"><span>All</span></a></li> -->
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-inner p-0 border-top">
                                                    <div class="nk-tb-list nk-tb-orders">
                                                        <div class="nk-tb-item nk-tb-head">
                                                            <div class="nk-tb-col"><span>Sr. No.</span></div>
                                                            <div class="nk-tb-col tb-col-sm"><span>Listing Name</span></div>
                                                            <div class="nk-tb-col tb-col-md"><span>Slug</span></div>
                                                            <div class="nk-tb-col tb-col-lg"><span>Address</span></div>
                                                            <div class="nk-tb-col"><span>Country</span></div>
                                                            <!-- <div class="nk-tb-col"><span class="d-none d-sm-inline">Status</span></div> -->
                                                            <div class="nk-tb-col"><span>&nbsp;</span></div>
                                                        </div>
                                                        <?php 
                                                        $count = 1;
                                                        ?>
                                                        @foreach($villas as $v)
                                                        <div class="nk-tb-item">
                                                            <div class="nk-tb-col">
                                                                <span class="tb-lead"><a href="#">#{{ $count++ }}</a></span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-sm">
                                                                <div class="user-card">
                                                                    <!-- <div class="user-avatar user-avatar-sm bg-purple">
                                                                        <span>AB</span>
                                                                    </div> -->
                                                                    <div class="user-name">
                                                                        <span class="tb-lead">{{ $v->name ?? '' }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-md">
                                                                <span class="tb-sub">{{ $v->slug ?? '' }}</span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-lg">
                                                                <span class="tb-sub text-primary">{{ $v->address['street_name'] ?? ''}},{{ $v->address['city'] ?? ''}},{{ $v->address['state'] ?? ''}}</span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="tb-sub tb-amount">{{ $v->address['country'] ?? ''}}</span>
                                                            </div>
                                                            <!-- <div class="nk-tb-col">
                                                                <span class="badge badge-dot badge-dot-xs bg-success">Paid</span>
                                                            </div> -->
                                                            <div class="nk-tb-col nk-tb-col-action">
                                                                <div class="dropdown">
                                                                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                                                        <ul class="link-list-plain">
                                                                            <li><a href="{{ url('admin-dashboard/villas/'.$v->slug) }}">View</a></li>
                                                                            <li><a href="{{ url('admin-dashboard/villa-update/'.$v->slug) }}">Edit</a></li>
                                                                           <li><a class="delete_villas" link="{{ url('admin-dashboard/villas/delete/'.$v->id) }}">delete</a></li>
                                                                          <!--  <li><a href="#">Export</a></li> -->
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                       
                                                    </div>
                                                </div>
                                                <div class="card-inner-sm border-top text-center d-sm-none">
                                                    <a href="#" class="btn btn-link btn-block">See History</a>
                                                </div>
                                            </div><!-- .card -->
                                        </div>
                                        <script>
                                            $(document).ready(function(){
                                                $('.delete_villas').click(function(){
                                                   link = $(this).attr('link');
                                                   Swal.fire({
                                                        title: 'Do you want to delete this listing ?',
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