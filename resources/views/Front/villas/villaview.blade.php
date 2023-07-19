@extends('front_layout/index')
@section('front-content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/css/uikit.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/js/uikit-icons.min.js"></script>
<div class="loader-container">
    <div class="loader-spin ">

    </div>
</div>

<section class="breadcrumb-sec">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('villas') }}">Villas</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $villas->slug ?? '' }}</li>
        </ol>
    </nav>
</section>
<section class="gallery-slider-sec">
    <div class="top-btn">
        <a href="#" class="view-gallery-btn" id="open-gal">
            <span>View Gallery</span>
            <span><i class="fa-brands fa-instagram"></i></span>
        </a>

    </div>
    <div class="gallery-content">
        @foreach($villas['media'] as $media)
        <div class="gallery">
            <img src="{{asset('villa_images/'.$media->media_name)}}" alt="" class="img-fluid">
        </div>
        @endforeach
    </div>

</section>
<section class="villa-maika-sec">
    <div class="container">
        <div class="villa-maika-content">
            <div class="row">
                <div class="col-lg-8 col-md-12 villa-lft ">
                    <div class="row villa">
                        <div class="col-md-7">
                            <h2>{{ $villas->name ?? '' }}</h2>
                            <div class="address">
                                <span>{{ $villas->address['street_name'] ?? '' }},{{ $villas->address['city'] ?? ''
                                    }},{{
                                    $villas->address['state'] ?? '' }},{{ $villas->address['country'] ?? '' }}</span>
                            </div>
                        </div>
                        <div class="col-md-5 text-right pt-3">
                            <div class="share">
                                <!-- <span>
                                    <a href="#"><i class="fa-regular fa-heart"></i></a>
                                    <span> Add to wishlist</span>
                                </span> -->
                                <span class="share-option">
                                    <a href="#"><i class="fa-solid fa-share-nodes"></i></a>
                                    <span>Share</span>
                                    <div class="show-links">
                                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                        <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="items border-btm">
                        @foreach($villas['service'] as $service)

                        @if($service->value == "" || $service->value == null)
                        @else
                        <div class="item">
                            <i class="{{ $service->service['fav_icon'] ?? ''  }}"></i>
                            <span>{{ $service->value ?? '' }} {{ $service->service['name'] ?? ''}}</span>
                        </div>
                        @endif
                        @endforeach

                        <div class="item star">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span>4.63/5 </span>
                        </div>
                    </div>
                    <div class="disc border-btm">
                        <h3>Description</h3>
                        <div class="des-p">
                            <p>
                                <?php
                          echo $villas->description;  ?>
                            </p>
                            <button onclick="myFunction()" id="myBtn" class="view-more">view more
                                <i class="fa-solid fa-angle-down"></i></button>
                        </div>
                    </div>
                    <div class="location border-btm">
                        <h3>Location</h3>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d483877.31313053766!2d-74.25819279999998!3d40.705311!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sin!4v1688631260120!5m2!1sen!2sin"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div>
                    <div class="amenities border-btm">
                        <h3>Amenities</h3>
                        <div class="row">
                            <?php $amintiesss = array(); ?>
                            @foreach($villas['amenities'] as $amenities)
                            <?php  $amintiesss[] = $amenities['amenitie_id'];
                              ?>
                            @endforeach
                            @foreach($aminties as $aminity)
                            <div
                                class=" col-xl-4 col-lg-6 col-md-6 amen-col <?php if(in_array($aminity['id'],$amintiesss)){ echo 'active'; } ?> ">
                                <div
                                    class="amen-wrap <?php if(in_array($aminity['id'],$amintiesss)){ echo 'active'; } ?> ">
                                    <span>@if(in_array($aminity['id'],$amintiesss)) <i class="bi bi-check-circle"></i>
                                        @else <i class="bi bi-x-circle"></i>@endif </span>
                                    <span>{{ $aminity->name ?? '' }}{{ $aminity->id }}</span>
                                </div>
                            </div>

                            @endforeach

                        </div>
                    </div>
                    <div class="condition border-btm">
                        <h3>Conditions of reservation </h3>
                        <div class="check row">
                            <div class="col-md-6 in">
                                <span>Check-in</span>
                                <span>5:00PM</span>
                            </div>
                            <div class="col-md-6 out">
                                <span>Check-out</span>
                                <span>10:00AM</span>
                            </div>
                        </div>
                        @foreach($villas->customedata as $customedata)
                        <div class="pay">
                            <h4>
                                <?php echo $customedata['title']; ?>
                            </h4>
                            <?php echo $customedata['description']; ?>
                        </div>
                        @endforeach
                    </div>
                    <div class="calender border-btm">
                        <h3>Calendar & Prices</h3>
                        <div id='calendar'></div>
                    </div>
                    <div class="reviews">
                        <h3>Reviews</h3>
                        <div class="review-box">
                            <div class="profile">
                                <img src="https://secure.gravatar.com/avatar/d4c74594d841139328695756648b6bd6?s=50&d=mm&r=g"
                                    alt="">
                            </div>
                            <div class="review-content">
                                <div class="review-head">
                                    <div class="user-name">
                                        <div class="star">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <div class="name-info">
                                            <h5>Patrick M. Newman </h5><span>-November 16, 2022</span>
                                        </div>
                                    </div>
                                    <div class="reply">
                                        <a href="#">REPLY</a>
                                    </div>
                                </div>
                                <div class="review-content">
                                    <p> My son loved this Jacket for his Senior Prom… He got sooo many compliments! He
                                        is slim build 5’11 and 150lbs … I ordered a large … it was a little big … but it
                                        was fine!</p>
                                </div>
                                <div class="respond-box add-block">
                                    <h3>Reply to Lee Han</h3>
                                    <a class="close-btn" href="javscript:void(0)">
                                        <i class="fa-solid fa-xmark"></i>
                                    </a>
                                    <form>
                                        <p class="comment-notes"><span id="email-notes">Your email address will not be
                                                published.</span> <span class="required-field-message">Required fields
                                                are marked <span class="required">*</span></span></p>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" placeholder="Your Name *">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="email" class="form-control" placeholder="Your Email *">
                                            </div>
                                            <div class="col-md-4" bis_skin_checked="1">
                                                <h5>Rating:</h5>
                                                <span class="comment-form-rating-stars stars">
                                                    <span class="star star-1"><i class="fa-star fas"></i></span>
                                                    <span class="star star-2"><i class="fa-star fas"></i></span>
                                                    <span class="star star-3"><i class="fa-star fas"></i></span>
                                                    <span class="star star-4"><i class="fa-star fas"></i></span>
                                                    <span class="star star-5"><i class="fa-star fas"></i></span>
                                                </span>
                                            </div>
                                            <div class="col-md-12">
                                                <textarea name="" id="" cols="45" rows="4"
                                                    placeholder="comment"></textarea>
                                            </div>
                                        </div>
                                        <div class="confirm-box">
                                            <input type="checkbox" name="" id="">
                                            <label>Save my name, email, and website in this browser for the next time I
                                                comment.</label>
                                        </div>
                                        <button class="submit-btn">
                                            <span>SUBMIT</span>
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="review-box">
                            <div class="profile">
                                <img src="https://secure.gravatar.com/avatar/d4c74594d841139328695756648b6bd6?s=50&d=mm&r=g"
                                    alt="">
                            </div>
                            <div class="review-content">
                                <div class="review-head">
                                    <div class="user-name">
                                        <div class="star">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <div class="name-info">
                                            <h5>Elicia </h5><span>-November 16, 2022</span>
                                        </div>
                                    </div>
                                    <div class="reply">
                                        <a href="#">REPLY</a>
                                    </div>
                                </div>
                                <div class="review-content">
                                    <p>This is exactly what i was looking for, thank you so much for these tutorials</p>
                                </div>
                                <div class="respond-box add-block">
                                    <h3>Reply to Lee Han</h3>
                                    <a class="close-btn" href="javscript:void(0)">
                                        <i class="fa-solid fa-xmark"></i>
                                    </a>
                                    <form>
                                        <p class="comment-notes"><span id="email-notes">Your email address will not be
                                                published.</span> <span class="required-field-message">Required fields
                                                are marked <span class="required">*</span></span></p>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" placeholder="Your Name *">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="email" class="form-control" placeholder="Your Email *">
                                            </div>
                                            <div class="col-md-4" bis_skin_checked="1">
                                                <h5>Rating:</h5>
                                                <span class="comment-form-rating-stars stars">
                                                    <span class="star star-1"><i class="fa-star fas"></i></span>
                                                    <span class="star star-2"><i class="fa-star fas"></i></span>
                                                    <span class="star star-3"><i class="fa-star fas"></i></span>
                                                    <span class="star star-4"><i class="fa-star fas"></i></span>
                                                    <span class="star star-5"><i class="fa-star fas"></i></span>
                                                </span>
                                            </div>
                                            <div class="col-md-12">
                                                <textarea name="" id="" cols="45" rows="4"
                                                    placeholder="comment"></textarea>
                                            </div>
                                        </div>
                                        <div class="confirm-box">
                                            <input type="checkbox" name="" id="">
                                            <label>Save my name, email, and website in this browser for the next time I
                                                comment.</label>
                                        </div>
                                        <button class="submit-btn">
                                            <span>SUBMIT</span>
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="review-box">
                            <div class="profile">
                                <img src="https://secure.gravatar.com/avatar/d4c74594d841139328695756648b6bd6?s=50&d=mm&r=g"
                                    alt="">
                            </div>
                            <div class="review-content">
                                <div class="review-head">
                                    <div class="user-name">
                                        <div class="star">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <div class="name-info">
                                            <h5>Jonh Tery </h5><span>-November 16, 2022</span>
                                        </div>
                                    </div>
                                    <div class="reply">
                                        <a href="#">REPLY</a>
                                    </div>
                                </div>
                                <div class="review-content">
                                    <p>It would be great to try this theme for my businesses</p>
                                </div>
                                <div class="respond-box add-block">
                                    <h3>Reply to Lee Han</h3>
                                    <a class="close-btn" href="javscript:void(0)">
                                        <i class="fa-solid fa-xmark"></i>
                                    </a>
                                    <form>
                                        <p class="comment-notes"><span id="email-notes">Your email address will not be
                                                published.</span> <span class="required-field-message">Required fields
                                                are marked <span class="required">*</span></span></p>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" placeholder="Your Name *">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="email" class="form-control" placeholder="Your Email *">
                                            </div>
                                            <div class="col-md-4" bis_skin_checked="1">
                                                <h5>Rating:</h5>
                                                <span class="comment-form-rating-stars stars">
                                                    <span class="star star-1"><i class="fa-star fas"></i></span>
                                                    <span class="star star-2"><i class="fa-star fas"></i></span>
                                                    <span class="star star-3"><i class="fa-star fas"></i></span>
                                                    <span class="star star-4"><i class="fa-star fas"></i></span>
                                                    <span class="star star-5"><i class="fa-star fas"></i></span>
                                                </span>
                                            </div>
                                            <div class="col-md-12">
                                                <textarea name="" id="" cols="45" rows="4"
                                                    placeholder="comment"></textarea>
                                            </div>
                                        </div>
                                        <div class="confirm-box">
                                            <input type="checkbox" name="" id="">
                                            <label>Save my name, email, and website in this browser for the next time I
                                                comment.</label>
                                        </div>
                                        <button class="submit-btn">
                                            <span>SUBMIT</span>
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="review-box">
                            <div class="profile">
                                <img src="https://secure.gravatar.com/avatar/d4c74594d841139328695756648b6bd6?s=50&d=mm&r=g"
                                    alt="">
                            </div>
                            <div class="review-content">
                                <div class="review-head">
                                    <div class="user-name">
                                        <div class="star">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <div class="name-info">
                                            <h5>Lee Han </h5><span>-November 16, 2022</span>
                                        </div>
                                    </div>
                                    <div class="reply">
                                        <a href="#">REPLY</a>
                                    </div>
                                </div>
                                <div class="review-content">
                                    <p> What a nice article. It keeps me reading more and more!</p>
                                </div>
                                <div class="respond-box add-block">
                                    <h3>Reply to Lee Han</h3>
                                    <a class="close-btn" href="javscript:void(0)">
                                        <i class="fa-solid fa-xmark"></i>
                                    </a>
                                    <form>
                                        <p class="comment-notes"><span id="email-notes">Your email address will not be
                                                published.</span> <span class="required-field-message">Required fields
                                                are marked <span class="required">*</span></span></p>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" placeholder="Your Name *">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="email" class="form-control" placeholder="Your Email *">
                                            </div>
                                            <div class="col-md-4" bis_skin_checked="1">
                                                <h5>Rating:</h5>
                                                <span class="comment-form-rating-stars stars">
                                                    <span class="star star-1"><i class="fa-star fas"></i></span>
                                                    <span class="star star-2"><i class="fa-star fas"></i></span>
                                                    <span class="star star-3"><i class="fa-star fas"></i></span>
                                                    <span class="star star-4"><i class="fa-star fas"></i></span>
                                                    <span class="star star-5"><i class="fa-star fas"></i></span>
                                                </span>
                                            </div>
                                            <div class="col-md-12">
                                                <textarea name="" id="" cols="45" rows="4"
                                                    placeholder="comment"></textarea>
                                            </div>
                                        </div>
                                        <div class="confirm-box">
                                            <input type="checkbox" name="" id="">
                                            <label>Save my name, email, and website in this browser for the next time I
                                                comment.</label>
                                        </div>
                                        <button class="submit-btn">
                                            <span>SUBMIT</span>
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="comment-box">
                            <a href="#">Older comment</a>
                        </div>
                    </div>
                    <div class="add-review">
                        <h3>Add a Review </h3>
                        <p>Your email address will not be published.Required fields are marked<span
                                class="Required">*</span></p>
                        <div class="add-block">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" name="" id="" placeholder="Your Name *">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="" id="" placeholder="Email Address *">
                                </div>
                                <div class="col-md-4">
                                    <h5>Rating:</h5>
                                    <span class="comment-form-rating-stars stars">
                                        <span class="star star-1"><i class="fa-star fas"></i></span>
                                        <span class="star star-2"><i class="fa-star far"></i></span>
                                        <span class="star star-3"><i class="fa-star far"></i></span>
                                        <span class="star star-4"><i class="fa-star far"></i></span>
                                        <span class="star star-5"><i class="fa-star far"></i></span>
                                    </span>
                                </div>
                                <div class="col-md-12">
                                    <textarea name="" id="" cols="30" rows="5" placeholder="comment"></textarea>
                                </div>
                            </div>
                            <div class="confirm-box">
                                <input type="checkbox" name="" id="">
                                <label>Save my name, email, and website in this browser for the next time I
                                    comment.</label>
                            </div>
                            <button class="submit-btn">
                                <span>SUBMIT</span>
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <?php 
                   
                     $smallestPrice = "d-none";
                     if ($villas->pricing) {
                         $pricing = $villas->pricing;

                         foreach ($pricing as $price) {
                             if ($smallestPrice === null || $price->price < $smallestPrice) {
                                 $smallestPrice = $price->price;
                             }
                         }
                     }
                     ?>

                <div class="col-lg-4 col-md-12">
                    <div class="booking-sec fixed-booking">
                        <div class="from {{ $smallestPrice ?? '' }}">
                            <span>From</span><span>${{ $smallestPrice ?? '' }}</span><span>/night</span>
                        </div>
                        <div class="checkin">
                            <div>
                                <p>CHECK IN</p>
                            </div>
                            <div class="title">
                                @php
                                    $arrivalDate = $_GET['checkInDate'] ?? null;
                                @endphp
                                <input type="text" class="timeInput checkinInput" name="checkin" value="{{ $arrivalDate ?? '' }}" id="checkin" placeholder="Arrival Date" />
                            </div>
                        </div>
                        <div class="checkin">
                            <div>
                                <p>CHECK OUT</p>
                            </div>
                            <div class="title">
                                @php
                                    $departureDate = $_GET['checkOutDate'] ?? null;
                                @endphp
                                <input type="text" class="timeInput checkoutInput" name="checkout" value="{{ $departureDate ?? '' }}" id="checkout"
                                    placeholder="Departure Date" />
                            </div>
                        </div>
                        <div class="checkin">
                            <div>
                                <p>GUESTS</p>
                            </div>
                            <div class="title">
                                <span id="guestspan">Please,Select Date First</span>
                                <!-- <input type="text" placeholder="Guests" class="form-control"
                                  id="guestinput" style="display:none;" > -->
                                <div class="serch-input d-none">
                                    <div class="sel-wrapper">
                                        <select class="form-control">
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>2</option>
                                            <option>2</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="extr-services">
                            <span>EXTRA SERVICES</span>
                            <div class="checkbox">
                                <div class="service-check">
                                    <div>
                                        <input type="checkbox" name="" id="">
                                        <span>service Per booking</span>
                                    </div>
                                    <div>$30.00</div>
                                    <div class="view-list">
                                        <div class="view-inner">
                                            Lorem ipsum dolor sit amet, utinam munere antiopam vel ad. Qui eros iusto
                                            te. Nec ad feugiat honestatis. Quo illum detraxit an. Ius eius quodsi
                                            molestiae at, nostrum definitiones his cu. Discere referrentur mea id, an
                                            pri novum possim deterruisset. Eum oratio reprehendunt cu. Nec te quem assum
                                            postea.
                                        </div>
                                    </div>
                                </div>
                                <div class="service-check">
                                    <div>
                                        <input type="checkbox" name="" id="">
                                        <label>
                                            service Per person
                                        </label>
                                    </div>
                                    <div>$20.00</div>
                                    <div class="view-list">
                                        <div class="view-inner">
                                            Lorem ipsum dolor sit amet, utinam munere antiopam vel ad. Qui eros iusto
                                            te. Nec ad feugiat honestatis. Quo illum detraxit an. Ius eius quodsi
                                            molestiae at, nostrum definitiones his cu. Discere referrentur mea id, an
                                            pri novum possim deterruisset. Eum oratio reprehendunt cu. Nec te quem assum
                                            postea.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                            </div>
                            <div class="bookbtn">
                                <div class="button">
                                    <span>BOOK NOW</span>
                                </div>
                            </div>
                            <div class="need-help">
                                <p> Need help booking your villa? </p>
                                <a href="tel:+84 123 44 66 88"> +84 123 44 66 88 </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</section>
<section class="nearby-sec">
    <div class="container-fluid">
        <h3>Slimillar Villa nearby</h3>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="villa-box">
                    <div class="villa-img">
                        <img src="https://demo2.wpopal.com/villax/wp-content/uploads/2022/11/villa4-675x490.jpg" alt="">
                        <a class="like-btn">
                            <i class="fa-regular fa-heart"></i>
                        </a>
                        <div class="item-icons item-ab">
                            <span class="">
                                <i class="fa-solid fa-bed"></i>
                                <small>
                                    5 Beds
                                </small>
                            </span>
                            <span class="d-none">
                                <i class="fa-solid fa-bath"></i>
                                <small>
                                    0 Bath
                                </small>
                            </span>
                            <span class="">
                                <i class="fa-solid fa-bed"></i>
                                <small>
                                    1 Guests
                                </small>
                            </span>
                        </div>
                    </div>
                    <div class="villa-text">
                        <div class="item-title">
                            <a href="#">Villa Luma</a>
                        </div>
                        <div class="item-location">
                            <span>Gassin, French Riviera, France</span>
                        </div>
                        <div class="item_info_price">
                            <label>From</label>
                            <span class="item_info_price_new"><span class="currency_amount" data-amount="151"><span
                                        class="currency_symbol">$</span>151.00</span></span>
                            <span class="room_info_after_price">/night</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="villa-box">
                    <div class="villa-img">
                        <img src="https://demo2.wpopal.com/villax/wp-content/uploads/2022/11/villa4-675x490.jpg" alt="">
                        <a class="like-btn">
                            <i class="fa-regular fa-heart"></i>
                        </a>
                        <div class="item-icons item-ab">
                            <span class="">
                                <i class="fa-solid fa-bed"></i>
                                <small>
                                    5 Beds
                                </small>
                            </span>
                            <span class="d-none">
                                <i class="fa-solid fa-bath"></i>
                                <small>
                                    0 Bath
                                </small>
                            </span>
                            <span class="">
                                <i class="fa-solid fa-bed"></i>
                                <small>
                                    1 Guests
                                </small>
                            </span>
                        </div>
                    </div>
                    <div class="villa-text">
                        <div class="item-title">
                            <a href="#">Villa Luma</a>
                        </div>
                        <div class="item-location">
                            <span>Gassin, French Riviera, France</span>
                        </div>
                        <div class="item_info_price">
                            <label>From</label>
                            <span class="item_info_price_new"><span class="currency_amount" data-amount="151"><span
                                        class="currency_symbol">$</span>151.00</span></span>
                            <span class="room_info_after_price">/night</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="villa-box">
                    <div class="villa-img">
                        <img src="https://demo2.wpopal.com/villax/wp-content/uploads/2022/11/villa4-675x490.jpg" alt="">
                        <a class="like-btn">
                            <i class="fa-regular fa-heart"></i>
                        </a>
                        <div class="item-icons item-ab">
                            <span class="">
                                <i class="fa-solid fa-bed"></i>
                                <small>
                                    5 Beds
                                </small>
                            </span>
                            <span class="d-none">
                                <i class="fa-solid fa-bath"></i>
                                <small>
                                    0 Bath
                                </small>
                            </span>
                            <span class="">
                                <i class="fa-solid fa-bed"></i>
                                <small>
                                    1 Guests
                                </small>
                            </span>
                        </div>
                    </div>
                    <div class="villa-text">
                        <div class="item-title">
                            <a href="#">Villa Luma</a>
                        </div>
                        <div class="item-location">
                            <span>Gassin, French Riviera, France</span>
                        </div>
                        <div class="item_info_price">
                            <label>From</label>
                            <span class="item_info_price_new"><span class="currency_amount" data-amount="151"><span
                                        class="currency_symbol">$</span>151.00</span></span>
                            <span class="room_info_after_price">/night</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="villa-box">
                    <div class="villa-img">
                        <img src="https://demo2.wpopal.com/villax/wp-content/uploads/2022/11/villa4-675x490.jpg" alt="">
                        <a class="like-btn">
                            <i class="fa-regular fa-heart"></i>
                        </a>
                        <div class="item-icons item-ab">
                            <span class="">
                                <i class="fa-solid fa-bed"></i>
                                <small>
                                    5 Beds
                                </small>
                            </span>
                            <span class="d-none">
                                <i class="fa-solid fa-bath"></i>
                                <small>
                                    0 Bath
                                </small>
                            </span>
                            <span class="">
                                <i class="fa-solid fa-bed"></i>
                                <small>
                                    1 Guests
                                </small>
                            </span>
                        </div>
                    </div>
                    <div class="villa-text">
                        <div class="item-title">
                            <a href="#">Villa Luma</a>
                        </div>
                        <div class="item-location">
                            <span>Gassin, French Riviera, France</span>
                        </div>
                        <div class="item_info_price">
                            <label>From</label>
                            <span class="item_info_price_new"><span class="currency_amount" data-amount="151"><span
                                        class="currency_symbol">$</span>151.00</span></span>
                            <span class="room_info_after_price">/night</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {
        setInterval(function () {
            $(".loader-container").hide().fadeOut();
        }, 1000);
        $(".reply a").click(function (e) {
            e.preventDefault()
            $(this).parents(".review-box").find(".respond-box").show()
        })
        $(".close-btn").click(function (e) {
            e.preventDefault()
            $(this).parent().hide()
        })


        UIkit.util.on('#open-gal', 'click', function (e) {
            UIkit.lightboxPanel({
                items: [
                    { source: "https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_1280.jpg" },
                    { source: "https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_1280.jpg" },
                    { source: "https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_1280.jpg" },
                ]
            }).show();
            e.preventDefault();
        });
    })
</script>


<script>
    $(document).ready(function () {

        var count = 0;
        var startDate = '';
        var endDate = '';

        function handleDateSelection(date, endDates) {
            console.log(`date : ${date} ,,,,,, end Date ${endDates}`);
            count += 1;
            // console.log(date);
            // console.log(endDates);
            if (endDates) {
                $('.bg-danger').removeClass('bg-danger');
                count = 2;
                startDate = date;
                date = endDates;
            }
            // console.log(count);
            if (count == 3) {
                count = 1;
                $('.bg-danger').removeClass('bg-danger');
                $('.checkoutInput').val('');
                $('.checkinInput').val('');
            }

            if (count == 1) {
                startDate = new Date(date);
                $('.checkinInput').val(date);
                $("td").find(`[data-date='${date}']`).addClass('bg-danger').prop('disabled', true);
            }

            if (count == 2) {
                endDate = new Date(date);
                $('.checkoutInput').val(date);
                var datesBetween = [];

                var currentDate = new Date(startDate);
                if (currentDate >= endDate) {
                    $('.bg-danger').removeClass('bg-danger');
                    count = 0;
                    $('.checkoutInput').val('');
                    $('.checkinInput').val('');
                    return false;
                }

                while (currentDate <= endDate) {
                    var formattedDate = currentDate.toISOString().slice(0, 10);
                    datesBetween.push(formattedDate);
                    currentDate.setDate(currentDate.getDate() + 1);
                }

                var d = 0;
                for (d = 0; d < datesBetween.length; d++) {
                    $("td").find(`[data-date='${datesBetween[d]}']`).addClass('bg-danger');
                }
            }
        }
        var calendar = $('#calendar').fullCalendar({
            editable: true,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month'
            },
            events: '{{ url('/villas/calendar/'.$villas->id) }}',
            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            selectable: true,
            selectHelper: true,
            select: function (start, end, allDay) {


            },
            editable: true,
            selectable: true,
            selectHelper: true,
            eventResize: function (event) {

            },

            eventDrop: function (event) {

            },

            eventClick: function (event) {
                var date1 = event.start._d;
                var date = moment(date1, "YYYY-MM-DD HH:mm").format('YYYY-MM-DD');
                var checkDate = new Date(date);

                checkDate.setHours(0, 0, 0, 0);
                var todayDate = new Date();
                todayDate.setHours(0, 0, 0, 0);

                if (todayDate.getTime() > checkDate.getTime()) {
                    return false;
                }

                handleDateSelection(date);
            },

        });

         
        // $('input[name="checkin"]').on('change', function () {
        //     console.log('wokring');
        //     $('.bg-danger').removeClass('bg-danger');
        //     var checkIn = $('.checkinInput').val();
        //     var checkOut = $('.checkoutInput').val();
        //     var date = checkIn;
        //     var checkDate = new Date(date);
        //     checkDate.setHours(0, 0, 0, 0);
        //     var todayDate = new Date();
        //     todayDate.setHours(0, 0, 0, 0);

        //     if (todayDate.getTime() > checkDate.getTime()) {
        //         return false;
        //     }
        //     if (checkIn && !checkOut) {
        //         handleDateSelection(checkIn);
        //     } else if (checkIn && checkOut) {
        //         handleDateSelection(checkIn, checkOut);
        //     }
        // });

        $("td[data-date]").click(function () {
            console.log('working');
            var date = $(this).data("date");
            var checkDate = new Date(date);
            checkDate.setHours(0, 0, 0, 0);
            var todayDate = new Date();
            todayDate.setHours(0, 0, 0, 0);

            if (todayDate.getTime() > checkDate.getTime()) {
                return false;
            }
            // console.log(date);
            handleDateSelection(date);
        });

        //  Calendar event 

     
    $(function () {
        $('input[name="checkin"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: false,
            autoApply: true,
            autoUpdateInput: false,
            minDate: moment().startOf('day')
            
        }, function (start, end, label) {
            // var years = moment().diff(start, 'years');
            var date = moment(start._d, "YYYY-MM-DD HH:mm").format('YYYY-MM-DD');
            $('#checkin').val(date);
            $(this).val(date);
            console.warn($('#checkin').val());
            handleDateSelection(date);
            // console.warn(val);
            // $('.checkinInput').val(date);
        

        });
    });
    
    $(function () {
        $('input[name="checkout"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: false,
            autoApply: true,
            autoUpdateInput: false,
            minDate: moment().startOf('day')

        }, function (start, end, label) {
            var date = moment(start._d, "YYYY-MM-DD HH:mm").format('YYYY-MM-DD');
            $(this).val(date);
            $('#checkout').val(date);
            console.warn($('#checkout').val());
            console.warn($('#checkin').val());
            var checkOut = $('#checkout').val();
            var checkIn = $('#checkin').val();
            handleDateSelection(checkIn, checkOut);
            // console.warn(val);
            // $('.checkoutInput').val(date);
            // console.warn($(this).val());
        });
    });
    var chekinval = $('#checkin').val();
    var checkoutval = $('#checkout').val();
        if(chekinval != '' && checkoutval != ''){
            var date = checkIn;
            var checkDate = new Date(date);
            checkDate.setHours(0, 0, 0, 0);
            var todayDate = new Date();
            todayDate.setHours(0, 0, 0, 0);

            if (todayDate.getTime() > checkDate.getTime()) {
                return false;
            }
            handleDateSelection(chekinval, checkoutval);
        }
    });

</script>
<script>
    // $(document).on("focusout","#checkout",function(){
    //     conosle.log("Its working");
    // });
</script>
<script>
    $('#checkout').on('change', function () {
        var checkout = $(this).val();
        var checkin = $('#checkin').val();
        //    console.log(checkout + checkin);
        if (checkout == "" || checkin == "") {
            return false;
        } else if (checkout < checkin) {
            return false;
        }
        $('#guestspan').hide();
        $('#guestinput').css('display', 'block');
    });

</script>
<script>
    
    // $(function () {
    //     $('input[name="checkin"]').daterangepicker({
    //         singleDatePicker: true,
    //         showDropdowns: false,
    //         autoApply: true,
    //         autoUpdateInput: false,
    //         minDate: moment().startOf('day')
            
    //     }, function (start, end, label) {
    //         // var years = moment().diff(start, 'years');
    //         var date = moment(start._d, "YYYY-MM-DD HH:mm").format('YYYY-MM-DD');
    //         $('#checkin').val(date);
    //         $(this).val(date);
    //         console.warn($('#checkin').val());
    //         // console.warn(val);
    //         // $('.checkinInput').val(date);
        

    //     });
    // });
    
    // $(function () {
    //     $('input[name="checkout"]').daterangepicker({
    //         singleDatePicker: true,
    //         showDropdowns: false,
    //         autoApply: true,
    //         autoUpdateInput: false,
    //         minDate: moment().startOf('day')

    //     }, function (start, end, label) {
    //         var date = moment(start._d, "YYYY-MM-DD HH:mm").format('YYYY-MM-DD');
    //         $(this).val(date);
    //         $('#checkout').val(date);
    //         console.warn($('#checkout').val());
    //         // console.warn(val);
    //         // $('.checkoutInput').val(date);
    //         // console.warn($(this).val());
    //     });
    // });
</script>
@endsection