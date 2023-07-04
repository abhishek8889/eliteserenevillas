@extends('admin_layout/index')
@section('content')


<div class="nk-block">
                                    <div class="row g-gs">
                                        @foreach($villas as $v)
                                        <?php



?>
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <div class="card card-bordered product-card">
                                                <div class="product-thumb">
                                                    <a href="{{ url('admin-dashboard/villas/'.$v->slug) }}">
                                                        <img class="card-img-top" src="{{ url('villa_images/'.$v['media'][0]['media_name']) }}" alt="">
                                                    </a>
                                                    <ul class="product-badges">
                                                        <li><span class="badge bg-success">New</span></li>
                                                    </ul>
                                                    <ul class="product-actions">
                                                        <li><a href="#"><em class="icon ni ni-cart"></em></a></li>
                                                        <li><a href="#"><em class="icon ni ni-heart"></em></a></li>
                                                    </ul>
                                                </div>
                                                <div class="card-inner text-center">
                                                    <ul class="product-tags">
                                                        <!-- <li><a href="#">Smart Watch</a></li> -->
                                                    </ul>
                                                    <h5 class="product-title"><a href="{{ url('admin-dashboard/villas/'.$v->slug) }}">{{ $v->name }}</a></h5>
                                                    <!-- <div class="product-price text-primary h5"><small class="text-muted del fs-13px">$350</small> $324</div> -->
                                                </div>
                                            </div>
                                        </div><!-- .col -->
                                        @endforeach
                                      
                                    </div>
                                </div>

@endsection