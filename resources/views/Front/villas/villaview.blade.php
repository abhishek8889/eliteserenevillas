@extends('front_layout/index')
@section('front-content')
<section class="breadcrumb-sec">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Villa booking</a></li>
              <li class="breadcrumb-item active" aria-current="page">Villa Maika</li>
            </ol>
          </nav>
    </section>
    <section class="gallery-slider-sec">
        <div class="top-btn">
                <a href="#" class="view-gallery-btn">
                    <span>View Gallery</span>
                    <span><i class="fa-brands fa-instagram"></i></span>
                </a>
            
        </div>
        <div class="gallery-content">
            @foreach($villas['media'] as $media)
            <div class="gallery">
                <img src="{{url('villa_images/'.$media->media_name)}}" alt="" class="img-fluid">
            </div>
         @endforeach
        </div>

    </section>
    <section class="villa-maika-sec">
        <div class="container-fluid">
            <div class="villa-maika-content">
                <div class="row">
                    <div class="col-md-8 villa-lft ">
                        <div class="villa ">
                            <h2>{{ $villas->name ?? '' }}</h2>
                       <div class="share">
                        <span>
                            <a href="#"><i class="fa-regular fa-heart"></i></a>
                            <span> Add to wishlist</span>
                        </span>
                        <span class="share-option">
                        <a href="#"><i class="fa-solid fa-share-nodes"></i></a>
                        <span>Share</span>
                        <div class="show-links">
                            <div><i class="fa-brands fa-facebook"></i></div>
                              <div><i class="fa-brands fa-twitter"></i></div>
                              <div><i class="fa-brands fa-pinterest"></i></div>
                              <div><i class="fa-brands fa-linkedin"></i></div>
                          </div>
                        </span>
                       
                       </div>
                        </div>
                        <div class="address">
                            <span>{{ $villas->address['street_name'] ?? '' }},{{ $villas->address['city'] ?? '' }},{{ $villas->address['state'] ?? '' }},{{ $villas->address['country'] ?? '' }}</span>
                        </div>
                        <div class="items border-btm">
                            @foreach($villas['service'] as $service)
                            <div class="item">
                                <i class="fa-solid fa-bed"></i>
                                <span>{{ $service->value ?? '' }} {{ $service->service['name'] ?? ''}}</span>
                            </div>
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
                        
                        <p>
                        {{ $villas->description ?? '' }}
                        </p>
                        <button onclick="myFunction()" id="myBtn">view more</button>
                          </div>
                          <div class="location border-btm">
                            <h3>Location</h3>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15249822.21961233!2d82.75252935!3d21.068622799999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1688631260120!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                                <div class="col-md-4">
                                    <span>@if(in_array($aminity['id'],$amintiesss)) <i class="fa-solid fa-circle-check"></i>@else  <i class="fa-sharp fa-solid fa-circle-xmark"></i>@endif </span>
                                    <span>{{ $aminity->name ?? '' }}{{ $aminity->id  }}</span>
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
                             <div class="pay">
                                <h4> Payment Conditions </h4>
                                <p>The down payment to secure this home is 20%</p>
                                <p>The final balance is due 60 days prior to arrival</p>
                                <p>The balance is due at the time of booking, if your reservation is within 60 days of arrival</p>
                                <p>   We accept all major credit/debit cards, bank transfer, check or cash</p>   
                                
                             </div>
                             <div class="pay">
                                <h4>  House rules  </h4>
                                <p>Pets are permitted on request</p>
                                <p>  Smoking allowed only outside of house</p>
                                <p> Surface area of house: 300 square meters (3,230 square feet)</p>
                                <p> Baby cot available</p>   
                                <p>  High chair available on request</p>
                             </div>
                          </div>
                        <div class="calender border-btm">
                            <h3>Calendar & Prices</h3>
                        </div>
                        <div class="reviews">
                            <h3>Reviews</h3>
                            <div class="review-box">
                                <div class="profile">
                                    <img src="https://secure.gravatar.com/avatar/d4c74594d841139328695756648b6bd6?s=50&d=mm&r=g" alt="">
                                </div>
                                <div class="review-content">
                                    <div class="review-head">
                                        <div class="user-name">
                                            <div class="star">
                                                <span>&#9733</span>
                                                <span>&#9733</span>
                                                <span>&#9733</span>
                                                <span>&#9733</span>
                                                <span>&#9733</span>
                                            </div>
                                            <div class="name-info">
                                                <h5>Patrick M. Newman </h5><span>-November 16, 2022</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review-content">
                                        <p>     My son loved this Jacket for his Senior Prom… He got sooo many compliments! He is slim build 5’11 and 150lbs … I ordered a large … it was a little big … but it was fine!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="review-box">
                                <div class="profile">
                                    <img src="https://secure.gravatar.com/avatar/d4c74594d841139328695756648b6bd6?s=50&d=mm&r=g" alt="">
                                </div>
                                <div class="review-content">
                                    <div class="review-head">
                                        <div class="user-name">
                                            <div class="star">
                                                <span>&#9733</span>
                                                <span>&#9733</span>
                                                <span>&#9733</span>
                                                <span>&#9733</span>
                                                <span>&#9733</span>
                                            </div>
                                            <div class="name-info">
                                                <h5>Elicia </h5><span>-November 16, 2022</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review-content">
                                        <p>This is exactly what i was looking for, thank you so much for these tutorials</p>
                                    </div>
                                </div>
                            </div>
                            <div class="review-box">
                                <div class="profile">
                                    <img src="https://secure.gravatar.com/avatar/d4c74594d841139328695756648b6bd6?s=50&d=mm&r=g" alt="">
                                </div>
                                <div class="review-content">
                                    <div class="review-head">
                                        <div class="user-name">
                                            <div class="star">
                                                <span>&#9733</span>
                                                <span>&#9733</span>
                                                <span>&#9733</span>
                                                <span>&#9733</span>
                                                <span>&#9733</span>
                                            </div>
                                            <div class="name-info">
                                                <h5>Jonh Tery </h5><span>-November 16, 2022</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review-content">
                                        <p>It would be great to try this theme for my businesses</p>
                                    </div>
                                </div>
                            </div>
                            <div class="review-box">
                                <div class="profile">
                                    <img src="https://secure.gravatar.com/avatar/d4c74594d841139328695756648b6bd6?s=50&d=mm&r=g" alt="">
                                </div>
                                <div class="review-content">
                                    <div class="review-head">
                                        <div class="user-name">
                                            <div class="star">
                                                <span>&#9733</span>
                                                <span>&#9733</span>
                                                <span>&#9733</span>
                                                <span>&#9733</span>
                                                <span>&#9733</span>
                                            </div>
                                            <div class="name-info">
                                                <h5>Lee Han </h5><span>-November 16, 2022</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review-content">
                                        <p> What a nice article. It keeps me reading more and more!</p>
                                    </div>
                                </div>
                            </div>
                           <div class="comment-box">
                            <a href="#">Older comment</a>
                           </div>
                        </div>
                        <div class="add-review">
                            <h3>Add a Review </h3>
                            <p>Your email address will not be published.Required fields are marked<span class="Required">*</span></p>
                          <div class="add-block">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" name="" id="" placeholder="Your Name *">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="" id="" placeholder="Email Address *">
                                </div>
                                <div class="col-md-4">
                                    <h5>Rating</h5>
                                    <div class="star">
                                        <span>&#9733</span>
                                        <span>&#9733</span>
                                        <span>&#9733</span>
                                        <span>&#9733</span>
                                        <span>&#9733</span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <textarea name="" id="" cols="30" rows="5" placeholder="comment"></textarea>
                                </div>                        
                            </div>
                            <div class="confirm-box">
                                <input type="checkbox" name="" id="">
                                <label>Save my name, email, and website in this browser for the next time I comment.</label>
                            </div>
                            <button class="submit-btn">
                                <span>SUBMIT</span>
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="booking-sec fixed-booking">
                             <div class="from">
                                <span>From</span><span>$134.00</span><span>/night</span>
                             </div>
                             <div class="checkin">
                                <div>
                                    <p>CHECK IN</p>
                                 </div>
                                 <div class="title">
                                     <input type="text" placeholder="Arrival Date" onfocus="(this.type='date')"> 
                                 </div>
                             </div>
                             <div class="checkin">
                                <div>
                                    <p>CHECK OUT</p>
                                 </div>
                                 <div class="title">
                                     <input type="text" placeholder="Departure Date" onfocus="(this.type='date')"> 
                                 </div>
                             </div>                  
                             <div class="checkin">
                                <div>
                                    <p>GUESTS</p>
                                 </div>
                                 <div class="title">
                                   <span>Please,Select Date First</span>
                                 </div>
                             </div>   
                             <div class="extr-services">
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
                                            Lorem ipsum dolor sit amet, utinam munere antiopam vel ad. Qui eros iusto te. Nec ad feugiat honestatis. Quo illum detraxit an. Ius eius quodsi molestiae at, nostrum definitiones his cu. Discere referrentur mea id, an pri novum possim deterruisset. Eum oratio reprehendunt cu. Nec te quem assum postea.
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
                                                Lorem ipsum dolor sit amet, utinam munere antiopam vel ad. Qui eros iusto te. Nec ad feugiat honestatis. Quo illum detraxit an. Ius eius quodsi molestiae at, nostrum definitiones his cu. Discere referrentur mea id, an pri novum possim deterruisset. Eum oratio reprehendunt cu. Nec te quem assum postea.
                                            </div>
                                           </div>
                                    </div>
                                </div>
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
        </div>
    </section>
    <section class="nearby-sec">
        <div class="container-fluid">
            <h3>Slimillar Villa nearby</h3>
            <div class="row">
                <div class="col-md-3">
                    <img src="https://demo2.wpopal.com/villax/wp-content/uploads/2022/11/villa4-675x490.jpg" alt="" class="img-fluid">
                    <a href="#">Villa Luma</a>
                    <p>Gassin, French Riviera, France</p>
                </div>
                <div class="col-md-3">
                    <img src="https://demo2.wpopal.com/villax/wp-content/uploads/2022/11/villa5-675x490.jpg" alt="" class="img-fluid">
                    <a href="#">Villa Josephine</a>
                    <p>Gassin, French Riviera, France</p>
                </div>
                <div class="col-md-3">
                    <img src="https://demo2.wpopal.com/villax/wp-content/uploads/2022/11/villa6-675x490.jpg" alt="" class="img-fluid">
                    <a href="#">Villa Milaya</a>
                    <p>Gassin, French Riviera, France</p>
                </div>
                <div class="col-md-3">
                    <img src="https://demo2.wpopal.com/villax/wp-content/uploads/2022/11/villa7-675x490.jpg" alt="" class="img-fluid">
                    <a href="#">Villa du Canon</a>
                    <p>Gassin, French Riviera, France</p>
                </div>
            </div>
        </div>
    </section>
    @endsection