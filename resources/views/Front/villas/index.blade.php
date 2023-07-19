@extends('front_layout/index')
@section('front-content')
<style>
    .daterangepicker {
        left: 433px !important;
    }
</style>

<!-- <section class="nearby-sec">
        <div class="container-fluid">
            <h3>Villas</h3>
            <div class="row">
                @foreach($villas as $villa)
                <div class="col-md-3">
                    <img src="{{ asset('/villa_images/'.$villa->villafeatureimage['media_name']) }}" alt="" class="img-fluid">
                    <a href="{{ url('villas-list/villas-view') }}/{{ $villa->slug ?? '' }}">{{ $villa->name ?? ''}}</a>
                    <p>{{ $villa->address['street_name'] ?? '' }},{{ $villa->address['city'] ?? '' }},{{ $villa->address['state'] ?? '' }},{{ $villa->address['country'] ?? '' }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section> -->

<section class="banner-sec"
    style="background-image: url(https://demo2.wpopal.com/villax/wp-content/uploads/2022/11/breadcrumb-1.jpg);">
    <div class="container">
        <div class="banner-content text center">
            <h1>Villa booking</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Villa booking</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="search-bar-sec">
    <div class="container">
        <form methos="get" onsubmit="return false">
            <div class="search-form-wrapper">
                <div class="serch-input">
                    <h5>LOCATION</h5>
                    <div class="sel-wrapper">
                        <i class="fa-solid fa-location-dot"></i>
                        <!-- <select class="form-control">
                            <option>where to next ?</option>
                            <option>1</option>
                            <option>2</option>
                        </select> -->
                        <div class="dropdown">
                            <input type="checkbox" class="dropdown__switch" id="filter-switch" hidden />
                            <label for="filter-switch" class="dropdown__options-filter">
                                <ul class="dropdown__filter" role="listbox" tabindex="-1">
                                    <li class="dropdown__filter-selected" aria-selected="true">
                                        where to next?
                                    </li>
                                    <li>
                                        <ul class="dropdown__select">
                                            <li class="dropdown__select-option all" role="option">
                                                <span> All location</span>
                                            </li>

                                            @foreach($states as $state)
                                            <li class="dropdown__select-option" role="option">

                                                {{ $state['state'] ?? '' }}
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="serch-input">
                    <h5>check in</h5>
                    <div class="serch-date-wrapper">
                        <label for="startdate">
                            <i class="fa-light fa-calendar"></i>
                        </label>
                        <input type="text" name="datefilter" value="" placeholder="Add Date" id="startdate" autocomplete="off"/>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                </div>
                <div class="serch-input">
                    <h5>check out</h5>
                    <div class="serch-date-wrapper">
                        <label for="enddate">
                            <i class="fa-light fa-calendar"></i>
                        </label>
                        <input type="text" name="datefilter" value="" placeholder="Add Date" id="enddate" autocomplete="off"/>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                </div>
                <div class="serch-input guests">
                    <h5>guests</h5>
                    <div class="quantity">
                        <span class="numb">0</span>
                        <span class="minus">-</span>
                        <span class="plus">
                            +
                        </span>
                    </div>
                </div>
            </div>
            <div class="submit">
                <button type="submit" class="submit-btn"><i class="bi bi-search"></i></button>
            </div>
        </form>

    </div>

</section>


<section class="vila-list-sec">
    <div class="container">
        <div class="villa-search-bar">
        </div>
        <div class="row villa-row">
            <div class="col-lg-9 col-md-8">
                <div class="row list-row">
                    @foreach($villas as $villa)

                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="villa-box">
                            <div class="villa-img">
                                <div class="item-label">
                                    <div class="popular">
                                        Featured
                                    </div>
                                </div>
                                <a class="like-btn">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                                <?php
                                $smallestPrice = "d-none";
                                if ($villa->pricing) {
                                    $pricing = $villa->pricing;

                                    foreach ($pricing as $price) {
                                        if ($smallestPrice === null || $price->price < $smallestPrice) {
                                            $smallestPrice = $price->price;
                                        }
                                    }
                                }
                                ?>
                                <div class="item_info_price {{ $smallestPrice ?? ''}}">
                                    <label>From</label>
                                    <span class="item_info_price_new ">
                                        <span class="currency_amount" data-amount="97">
                                            <span class="currency_symbol">$</span>{{ $smallestPrice ?? ''}}
                                        </span>
                                    </span>
                                    <span class="room_info_after_price">/night</span>
                                </div>
                                <div class="gallery-slider">
                                    <div class="gallery-list">
                                        <div class="gallery-img">
                                            <img src="{{ asset('/villa_images/'.$villa->villafeatureimage['media_name']) }}"
                                            alt="">
                                        </div>
                                    </div>
                                    @foreach($villa->media as $media )
                                    <div class="gallery-list">
                                        <img src="{{ asset('/villa_images/'.$media->media_name) ?? ''}}"
                                            alt="{{ $media->media_name ?? ''}}">
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                            <div class="item-icons">
                                <!-- <span><i class="fa-solid fa-bed"></i><small>2
                                        {{$service->name ?? ''}}</small></span> -->
                                @if($Servicelists)
                                @foreach ($Servicelists as $Servicelist)
                                <?php
                                $totalAvailable = 0;
                                ?>
                                @foreach ($villa->service as $service)
                                @if ($service->service_id == $Servicelist->id)
                                @php
                                $totalAvailable = $service->value;
                                break;
                                @endphp
                                @endif
                                @endforeach
                                <span class="{{ $totalAvailable == 0 ? 'd-none' : '' }}">
                                    <i class="fa-solid fa-{{ $Servicelist->fav_icon ?? '' }}"></i>
                                    <small>
                                        {{ $totalAvailable ?? '0' }} {{ $Servicelist->name ?? '' }}
                                    </small>
                                </span>
                                @endforeach
                                @endif

                                <!-- <span><i class="fa-solid fa-ruler-combined"></i><small>9
                                        gusts</small></span> -->
                            </div>
                            <div class="item-head">
                                <div class="item-title">
                                    <a href="{{ url('villas/details') }}/{{ $villa->slug ?? '' }}">{{
                                        $villa->name ?? ''}}</a>
                                </div>
                                <div class="item-location">
                                    <span>{{ $villa->address['street_name'] ?? '' }}, {{ $villa->address['city'] ?? ''
                                        }}, {{ $villa->address['state'] ?? '' }}, {{ $villa->address['country'] ?? ''
                                        }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <!-- <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next <i
                                    class="fa-solid fa-angle-right"></i></a>
                        </li>
                    </ul>
                </nav> -->
            </div>
            <div class=" col-lg-3 col-md-4">
                <form methos="get" id="resultFilter">
                    <div class="filter-sec">
                        <div class="filter-head">
                            <h5>Filter by</h5>
                        </div>
                        <div class="range-slider-wrapper">
                            <!-- <p>price-range</p> -->
                            <div id="slider-range" class="price-filter-range" name="rangeInput"></div>
                            <div class="price-wrapper">
                                <div class="price-block min-price">
                                    <span>$</span>
                                    <input type="number" min=120 max="197" oninput="validity.valid||(value='0');"
                                        id="min_price" class="price-range-field" default-value="0" />
                                </div>
                                <span class="to">-</span>
                                <div class="price-block max-price">
                                    <span>$</span>
                                    <input type="number" min=0 max="198" oninput="validity.valid||(value='1000');"
                                        id="max_price" class="price-range-field" default-value="1000" />
                                </div>
                            </div>

                        </div>
                        <div class="divider">
                            <span></span>
                        </div>
                        <div class="property">
                            <h5>Property Type</h5>
                            <div class="check-item-wrapper">
                                @foreach($PropertyTypes as $PropertyType )
                                <div class="check-item">
                                    <label class="custom-check">
                                        <input type="checkbox" value="{{ $PropertyType->id ?? ''}}"
                                            class="PropertyType" />
                                        <span class="checkmark"></span>
                                        {{ $PropertyType->name ?? ''}}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="divider">
                            <span></span>
                        </div>
                        <div class="property">
                            <h5>destination</h5>
                            <div class="check-item-wrapper">
                                @foreach($states as $state)
                                <div class="check-item">
                                    <label class="custom-check">
                                        <input type="checkbox" value="{{ $state['state'] ?? '' }}"
                                            class="Destination" />
                                        <span class="checkmark"></span>
                                        {{ $state['state'] ?? '' }}
                                    </label>
                                </div>
                                @endforeach

                            </div>

                        </div>
                        <div class="divider">
                            <span></span>
                        </div>
                        <div class="property">
                            <h5>amenities</h5>
                            <div class="check-item-wrapper">
                                @foreach ($Amenities as $Amenitie )
                                <label class="custom-check">
                                    <input type="checkbox" value="{{ $Amenitie->id ?? '' }}" class="Amenitie" />
                                    <span class="checkmark"></span>
                                    {{ $Amenitie->name ?? '' }}
                                </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="divider">
                            <span></span>
                        </div>
                        <div class="property">
                            <h5>reviews</h5>
                            <div class="check-item-wrapper">
                                <div class="check-item">
                                    <label class="custom-check">
                                        <input type="checkbox" class="Reviews">
                                        <span class="checkmark"></span>
                                        5 Stars
                                    </label>
                                </div>
                                <div class="check-item">
                                    <label class="custom-check">
                                        <input type="checkbox" class="Reviews">
                                        <span class="checkmark"></span>
                                        4 Stars & Up
                                    </label>
                                </div>
                                <div class="check-item">
                                    <label class="custom-check">
                                        <input type="checkbox" class="Reviews">
                                        <span class="checkmark"></span>
                                        3 Stars & Up
                                    </label>
                                </div>
                                <div class="check-item">
                                    <label class="custom-check">
                                        <input type="checkbox" class="Reviews">
                                        <span class="checkmark"></span>
                                        2 Stars & Up
                                    </label>
                                </div>
                                <div class="check-item">
                                    <label class="custom-check">
                                        <input type="checkbox" class="Reviews">
                                        <span class="checkmark"></span>
                                        1 Stars & Up
                                    </label>
                                </div>
                                <div class="check-item">
                                    <label class="custom-check">
                                        <input type="checkbox" class="Reviews">
                                        <span class="checkmark"></span>
                                        5 Stars
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>

</section>

<script>
    
$(document).ready(function(){
    function searchFilter(){
        var minPrice = $('#min_price').val();
        var maxPrice = $('#max_price').val();
        var whereToNext = $('.dropdown__filter-selected').text().replace(/\s+/g, " ").trim();
        var Guest = $('.numb').text();
        var checkInDate = $('#startdate').val();
        // console.log(checkInDate);
        var checkOutDate = $('#enddate').val();
        // console.log(checkOutDate);
        var PropertyType = $('.PropertyType:checkbox:checked').map(function() {
            return $(this).val();
        }).get();
        var Destination = $('.Destination:checkbox:checked').map(function() {
            return $(this).val();
        }).get();
        var Amenities = $('.Amenitie:checkbox:checked').map(function() {
            return $(this).val();
        }).get();
        var Reviews = $('.Reviews:checkbox:checked').map(function() {
            return $(this).val();
        }).get();

        var url = '{{ url('') }}/villas/search-result?' +
        'minPrice=' + encodeURIComponent(minPrice) +
        '&maxPrice=' + encodeURIComponent(maxPrice) +
        '&PropertyType=' + encodeURIComponent(JSON.stringify(PropertyType)) +
        '&Destination=' + encodeURIComponent(JSON.stringify(Destination)) +
        '&Amenities=' + encodeURIComponent(JSON.stringify(Amenities)) +
        '&Reviews=' + encodeURIComponent(JSON.stringify(Reviews)) +
        '&whereToNext=' + encodeURIComponent(whereToNext) +
        '&Guest=' + encodeURIComponent(Guest) +
        '&checkInDate=' + encodeURIComponent(checkInDate) +
        '&checkOutDate=' + encodeURIComponent(checkOutDate);

        // console.log(url);
        window.location.href = url;
    }

    $('#resultFilter,.price-filter-range,.submit-btn')
    .on('change click', searchFilter);
});

</script>
@endsection