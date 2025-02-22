@extends('layouts.dashboard')

@section('title') {{ $title ?? 'Главная' }}@endsection

@section('content')
    <div class="row g-3 mb-3">
        <div class="col-xxl-6 col-xl-12">
            <div class="row g-3">
                <div class="col-12">
                    <div class="card bg-transparent-50 overflow-hidden">
                        <div class="card-header position-relative">
                            <div class="bg-holder d-none d-md-block bg-card z-1" style="background-image:url({{ asset('assets/dashboard/img/illustrations/corner-1.png') }});background-size:230px;background-position:right bottom;z-index:-1;"></div>
                            <div class="position-relative z-2">
                                <div>
                                    <h3 class="text-primary mb-1">Good Afternoon, Jonathan!</h3>
                                    <p>Here’s what happening with your store today </p>
                                </div>
                                <div class="d-flex py-3">
                                    <div class="pe-3">
                                        <p class="text-600 fs-10 fw-medium">Today's visit </p>
                                        <h4 class="text-800 mb-0">14,209</h4>
                                    </div>
                                    <div class="ps-3">
                                        <p class="text-600 fs-10">Today’s total sales </p>
                                        <h4 class="text-800 mb-0">$21,349.29 </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="mb-0 list-unstyled list-group font-sans-serif">
                                <li class="list-group-item mb-0 rounded-0 py-3 px-x1 list-group-item-warning border-x-0 border-top-0">
                                    <div class="row flex-between-center">
                                        <div class="col">
                                            <div class="d-flex">
                                                <div class="fas fa-circle mt-1 fs-11"></div>
                                                <p class="fs-10 ps-2 mb-0">
                                                    <strong>5 products</strong> didn’t publish to your Facebook page
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-auto d-flex align-items-center">
                                            <a class="fs-10 fw-medium text-warning-emphasis" href="">View products
                                                <i class="fas fa-chevron-right ms-1 fs-11"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item mb-0 rounded-0 py-3 px-x1 greetings-item text-700 border-x-0 border-top-0">
                                    <div class="row flex-between-center">
                                        <div class="col">
                                            <div class="d-flex">
                                                <div class="fas fa-circle mt-1 fs-11 text-primary"></div>
                                                <p class="fs-10 ps-2 mb-0">
                                                    <strong>7 orders</strong> have payments that need to be captured
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-auto d-flex align-items-center">
                                            <a class="fs-10 fw-medium" href="">View payments
                                                <i class="fas fa-chevron-right ms-1 fs-11"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item mb-0 rounded-0 py-3 px-x1 greetings-item text-700  border-0">
                                    <div class="row flex-between-center">
                                        <div class="col">
                                            <div class="d-flex">
                                                <div class="fas fa-circle mt-1 fs-11 text-primary"></div>
                                                <p class="fs-10 ps-2 mb-0">
                                                    <strong>50+ orders</strong> need to be fulfilled
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-auto d-flex align-items-center">
                                            <a class="fs-10 fw-medium" href="">View orders
                                                <i class="fas fa-chevron-right ms-1 fs-11"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/dashboard/vendors/chart/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendors/countup/countUp.umd.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendors/dayjs/dayjs.min.js') }}"></script>
@endsection
