@extends('layouts.admin')
<title>Dashboard</title>
@section('content')
<div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Lower Libas Alumni Association</h3>
                            </p>
                        </div>
                   
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Welcome to Our Alumni Community</h4>
                        </div>
                        <div class="card-body">
                        <p>We are delighted to have you as part of our alumni network. Explore, connect, and stay engaged with fellow alumni.</p>
       
                        </div>
                    </div>
                </section>

                <section id="content-types">
        <div class="row">
           
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <img class="card-img-top img-fluid" src="{{ asset('assets2/images/samples/origami.jpg')}}" alt="Card image cap"
                            style="height: 20rem" />
                        <div class="card-body">
                            <h4 class="card-title">Top Image Cap</h4>
                            <p class="card-text">
                                Jelly-o sesame snaps cheesecake topping. Cupcake fruitcake macaroon donut
                                pastry gummies tiramisu chocolate bar muffin. Dessert bonbon caramels brownie chocolate
                                bar
                                chocolate tart dragée.
                            </p>
                            <p class="card-text">
                                Cupcake fruitcake macaroon donut pastry gummies tiramisu chocolate bar muffin.
                            </p>
                            <button class="btn btn-primary block">Update now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title">Bottom Image Cap</h4>
                            <p class="card-text">
                                Jelly-o sesame snaps cheesecake topping. Cupcake fruitcake macaroon donut
                                pastry gummies tiramisu chocolate bar muffin. Dessert bonbon caramels brownie chocolate
                                bar
                                chocolate tart dragée.
                            </p>
                            <p class="card-text">
                                Cupcake fruitcake macaroon donut pastry gummies tiramisu chocolate bar
                                muffin.
                            </p>
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                        <img class="card-img-bottom img-fluid" src="{{ asset('assets2/images/samples/water.jpg')}}"
                            alt="Card image cap" style="height: 20rem; object-fit: cover;">
                    </div>
                </div>
            </div>
    <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <img class="card-img-top img-fluid" src="{{ asset('assets2/images/samples/origami.jpg')}}" alt="Card image cap"
                            style="height: 20rem" />
                        <div class="card-body">
                            <h4 class="card-title">Top Image Cap</h4>
                            <p class="card-text">
                                Jelly-o sesame snaps cheesecake topping. Cupcake fruitcake macaroon donut
                                pastry gummies tiramisu chocolate bar muffin. Dessert bonbon caramels brownie chocolate
                                bar
                                chocolate tart dragée.
                            </p>
                            <p class="card-text">
                                Cupcake fruitcake macaroon donut pastry gummies tiramisu chocolate bar muffin.
                            </p>
                            <button class="btn btn-primary block">Update now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title">Bottom Image Cap</h4>
                            <p class="card-text">
                                Jelly-o sesame snaps cheesecake topping. Cupcake fruitcake macaroon donut
                                pastry gummies tiramisu chocolate bar muffin. Dessert bonbon caramels brownie chocolate
                                bar
                                chocolate tart dragée.
                            </p>
                            <p class="card-text">
                                Cupcake fruitcake macaroon donut pastry gummies tiramisu chocolate bar
                                muffin.
                            </p>
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                        <img class="card-img-bottom img-fluid" src="{{ asset('assets2/images/samples/water.jpg')}}"
                            alt="Card image cap" style="height: 20rem; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </section>


            </div>

@endsection