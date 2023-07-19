@extends('front_layout/index')
@section('front-content')
<style>
    .breadcrumb-item+.breadcrumb-item::before {
        content: "> ";
    }
</style>
<section class="banner-sec"
    style="background-image: url(https://demo2.wpopal.com/villax/wp-content/uploads/2022/11/breadcrumb-1.jpg);">
    <div class="container">
        <div class="banner-content text center">
            <h1>Destinations</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Destinations</li>
                </ol>
            </nav>
        </div>
    </div>
</section>


<section class="destination-sec">
    <div class="container">
        <div class="destination-head">
            <span class="sub-h">discover</span>
            <h2>Popular destinations</h2>
        </div>
        <div class="destination-grid layout-special-yes style-special-2">
            <div class="row">
                <div class="column-item location-item">
                    <div class="item-inner">
                        <a class="title-location" href="#">
                            <div class="thumbnail-location">
                                <img decoding="async"
                                    src="https://demo2.wpopal.com/villax/wp-content/uploads/2022/11/location-12.jpg"
                                    alt="Catania">
                            </div>
                            <div class="content-location">
                                <div class="content-location-inner">
                                    <div class="location-name">Catania</div>
                                    <div class="location-count">
                                        <span>
                                            4&nbsp;Villas to rent </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="column-item location-item">
                    <div class="item-inner">
                        <a class="title-location" href="#">
                            <div class="thumbnail-location">
                                <img decoding="async"
                                    src="https://demo2.wpopal.com/villax/wp-content/uploads/2022/11/location-9.jpg"
                                    alt="Comporta">
                            </div>
                            <div class="content-location">
                                <div class="content-location-inner">
                                    <div class="location-name">Comporta</div>
                                    <div class="location-count">
                                        <span>
                                            0&nbsp;Villas to rent </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="column-item location-item">
                    <div class="item-inner">
                        <a class="title-location" href="#">
                            <div class="thumbnail-location">
                                <img decoding="async"
                                    src="https://demo2.wpopal.com/villax/wp-content/uploads/2022/11/location-3.jpg"
                                    alt="Corsica">
                            </div>
                            <div class="content-location">
                                <div class="content-location-inner">
                                    <div class="location-name">Corsica</div>
                                    <div class="location-count">
                                        <span>
                                            3&nbsp;Villas to rent </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="column-item location-item">
                    <div class="item-inner">
                        <a class="title-location" href="#">
                            <div class="thumbnail-location">
                                <img decoding="async"
                                    src="https://demo2.wpopal.com/villax/wp-content/uploads/2022/11/location-5.jpg"
                                    alt="Europe">
                            </div>
                            <div class="content-location">
                                <div class="content-location-inner">
                                    <div class="location-name">Europe</div>
                                    <div class="location-count">
                                        <span>
                                            3&nbsp;Villas to rent </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="column-item location-item">
                    <div class="item-inner">
                        <a class="title-location" href="#">
                            <div class="thumbnail-location">
                                <img decoding="async"
                                    src="https://demo2.wpopal.com/villax/wp-content/uploads/2022/11/location-7.jpg"
                                    alt="Florence">
                            </div>
                            <div class="content-location">
                                <div class="content-location-inner">
                                    <div class="location-name">Florence</div>
                                    <div class="location-count">
                                        <span>
                                            1&nbsp;Villa to rent </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="column-item location-item">
                    <div class="item-inner">
                        <a class="title-location" href="#">
                            <div class="thumbnail-location">
                                <img decoding="async"
                                    src="https://demo2.wpopal.com/villax/wp-content/uploads/2022/11/location-11.jpg"
                                    alt="Ibiza">
                            </div>
                            <div class="content-location">
                                <div class="content-location-inner">
                                    <div class="location-name">Ibiza</div>
                                    <div class="location-count">
                                        <span>
                                            1&nbsp;Villa to rent </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="column-item location-item">
                    <div class="item-inner">
                        <a class="title-location" href="#">
                            <div class="thumbnail-location">
                                <img decoding="async"
                                    src="https://demo2.wpopal.com/villax/wp-content/uploads/2022/11/location-8.jpg"
                                    alt="Palermo">
                            </div>
                            <div class="content-location">
                                <div class="content-location-inner">
                                    <div class="location-name">Palermo</div>
                                    <div class="location-count">
                                        <span>
                                            1&nbsp;Villa to rent </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="column-item location-item">
                    <div class="item-inner">
                        <a class="title-location" href="#">
                            <div class="thumbnail-location">
                                <img decoding="async"
                                    src="https://demo2.wpopal.com/villax/wp-content/uploads/2022/11/location-4.jpg"
                                    alt="Paros">
                            </div>
                            <div class="content-location">
                                <div class="content-location-inner">
                                    <div class="location-name">Paros</div>
                                    <div class="location-count">
                                        <span>
                                            2&nbsp;Villas to rent </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="column-item location-item">
                    <div class="item-inner">
                        <a class="title-location" href="#">
                            <div class="thumbnail-location">
                                <img decoding="async"
                                    src="https://demo2.wpopal.com/villax/wp-content/uploads/2022/11/location-1.jpg"
                                    alt="Provence">
                            </div>
                            <div class="content-location">
                                <div class="content-location-inner">
                                    <div class="location-name">Provence</div>
                                    <div class="location-count">
                                        <span>
                                            3&nbsp;Villas to rent </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="column-item location-item">
                    <div class="item-inner">
                        <a class="title-location" href="#">
                            <div class="thumbnail-location">
                                <img decoding="async"
                                    src="https://demo2.wpopal.com/villax/wp-content/uploads/2022/11/location-2.jpg"
                                    alt="Saint-Tropez">
                            </div>
                            <div class="content-location">
                                <div class="content-location-inner">
                                    <div class="location-name">Saint-Tropez</div>
                                    <div class="location-count">
                                        <span>
                                            5&nbsp;Villas to rent </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="country-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="country-box">
                    <h3>Europe</h3>
                    <div class="divider">
                        <span></span>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-12">
                            <div class="country-list">
                                <p>spain</p>
                                <ul>
                                    <li>
                                        <a href="#"> Ibiza</a>
                                    </li>
                                    <li>
                                        <a href="#"> Ibiza Town</a>
                                    </li>
                                    <li>
                                        <a href="#"> San Jose</a>
                                    </li>
                                    <li>
                                        <a href="#"> San Juan</a>
                                    </li>
                                    <li>
                                        <a href="#"> Santa Eularia</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="country-list">
                                <p>itly</p>
                                <ul>
                                    <li>
                                        <a href="#"> Chianti</a>
                                    </li>
                                    <li>
                                        <a href="#"> Florence</a>
                                    </li>
                                    <li>
                                        <a href="#"> Lucca &amp; Pisa</a>
                                    </li>
                                    <li>
                                        <a href="#"> Siena &amp; Montepulciano</a>
                                    </li>
                                    <li>
                                        <a href="#"> Mallorca</a>
                                    </li>
                                    <li>
                                        <a href="#"> Alcudia</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-xl-6 col-lg-12">
                            <div class="country-list">
                                <p>france</p>
                                <ul>
                                    <li>
                                        <a href="#">Cannes</a>
                                    </li>
                                    <li>
                                        <a href="#">Cap d'Antibes</a>
                                    </li>
                                    <li>
                                        <a href="#">Monaco &amp; Surroundings</a>
                                    </li>
                                    <li>
                                        <a href="#">Mougins &amp; Villages </a>
                                    </li>
                                    <li>
                                        <a href="#">St. Tropez &amp; Villages</a>
                                    </li>
                                    <li>
                                        <a href="#">Louvre</a>
                                    </li>
                                    <li>
                                        <a href="#">Trocadero</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="country-list">
                                <p>greece</p>
                                <ul>
                                    <li>
                                        <a href="#"> Mykonos</a>
                                    </li>
                                    <li>
                                        <a href="#">Agios Stefanos</a>
                                    </li>
                                    <li>
                                        <a href="#">Elia</a>
                                    </li>
                                    <li>
                                        <a href="#">Ftelia</a>
                                    </li>
                                    <li>
                                        <a href="#"> Mykonos Town</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-md-4">
                <div class="country-box">
                    <h3>Caribbean </h3>
                    <div class="divider">
                        <span></span>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-12">
                            <div class="country-list">
                                <p>South Corsica</p>
                                <ul>
                                    <li>
                                        <a href="#">Ajaccio</a>
                                    </li>
                                    <li>
                                        <a href="#">Bonifacio</a>
                                    </li>
                                    <li>
                                        <a href="#">Propriano</a>
                                    </li>
                                    <li>
                                        <a href="#">Porto-Vecchio</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="country-list">
                                <p>Southwest</p>
                                <ul>
                                    <li>
                                        <a href="#">Arcachon bay</a>
                                    </li>
                                    <li>
                                        <a href="#">Cap Ferret</a>
                                    </li>
                                    <li>
                                        <a href="#">Pyla sur Mer </a>
                                    </li>
                                    <li>
                                        <a href="#">Basque country</a>
                                    </li>
                                    <li>
                                        <a href="#">Biarritz</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-xl-6 col-lg-12">
                            <div class="country-list">
                                <p>Balearic islands</p>
                                <ul>
                                    <li>
                                        <a href="#">La Croix-Valmer</a>
                                    </li>
                                    <li>
                                        <a href="#"> Gassin</a>
                                    </li>
                                    <li>
                                        <a href="#"> Grimaud</a>
                                    </li>
                                    <li>
                                        <a href="#"> Ramatuelle</a>
                                    </li>
                                    <li>
                                        <a href="#"> Sainte-Maxime</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="country-list">
                                <p>Luberon</p>
                                <ul>
                                    <li>
                                        <a href="#"> Avignon</a>
                                    </li>
                                    <li>
                                        <a href="#"> Gordes</a>
                                    </li>
                                    <li>
                                        <a href="#"> Menerbes</a>
                                    </li>
                                    <li>
                                        <a href="#"> Oppède</a>
                                    </li>
                                    <li>
                                        <a href="#"> Bonnieux</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-md-4">
                <div class="country-box">
                    <h3>South Africa</h3>
                    <div class="divider">
                        <span></span>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-12">
                            <div class="country-list">
                                <p>Amalfi Coast</p>
                                <ul>
                                    <li>
                                        <a href="#"> Positano</a>
                                    </li>
                                    <li>
                                        <a href="#"> Puglia</a>
                                    </li>
                                    <li>
                                        <a href="#"> Salento</a>
                                    </li>
                                    <li>
                                        <a href="#"> Bari</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="country-list">
                                <p>North Corsica</p>
                                <ul>
                                    <li>
                                        <a href="#"> Sifnos</a>
                                    </li>
                                    <li>
                                        <a href="#"> Paros and Antiparos </a>
                                    </li>
                                    <li>
                                        <a href="#"> Mykonos</a>
                                    </li>
                                    <li>
                                        <a href="#"> Syros</a>
                                    </li>
                                    <li>
                                        <a href="#"> Ios</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-xl-6 col-lg-12">
                            <div class="country-list">
                                <p>Basque country</p>
                                <ul>
                                    <li>
                                        <a href="#"> Biarritz</a>
                                    </li>
                                    <li>
                                        <a href="#"> Guéthary</a>
                                    </li>
                                    <li>
                                        <a href="#"> Landes</a>
                                    </li>
                                    <li>
                                        <a href="#"> Hossegor</a>
                                    </li>
                                    <li>
                                        <a href="#"> Dordogne</a>
                                    </li>
                                    <li>
                                        <a href="#"> Île-de-Ré</a>
                                    </li>
                                    <li>
                                        <a href="#"> Bordeaux Region</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</section>
@endsection