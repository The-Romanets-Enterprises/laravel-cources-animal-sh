@extends('layouts.dashboard')

@section('title') {{ $title ?? 'Главная' }}@endsection

@section('content')
    <div class="content">
        <div class="card mb-3">
            <div class="card-header position-relative min-vh-25 mb-7">
                <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url({{ asset('assets/dashboard/img/generic/4.jpg') }});">
                </div>
                <div class="avatar avatar-5xl avatar-profile">
                    <img class="rounded-circle img-thumbnail shadow-sm" src="{{ asset('assets/dashboard/img/team/2.jpg') }}" width="200" alt="" />
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <h4 class="mb-1">Anthony Hopkins
                            <span data-bs-toggle="tooltip" data-bs-placement="right" title="Verified">
                                <small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small>
                            </span>
                        </h4>
                        <h5 class="fs-9 fw-normal">Senior Software Engineer at Technext Limited</h5>
                        <p class="text-500">New York, USA</p>
                        <button class="btn btn-falcon-primary btn-sm px-3" type="button">Following</button>
                        <button class="btn btn-falcon-default btn-sm px-3 ms-2" type="button">Message</button>
                        <div class="border-bottom border-dashed my-4 d-lg-none"></div>
                    </div>
                    <div class="col ps-2 ps-lg-3">
                        <a class="d-flex align-items-center mb-2" href="">
                            <span class="fas fa-user-circle fs-6 me-2 text-700" data-fa-transform="grow-2"></span>
                            <div class="flex-1">
                                <h6 class="mb-0">See followers (330)</h6>
                            </div>
                        </a>
                        <a class="d-flex align-items-center mb-2" href="">
                            <img class="align-self-center me-2" src="{{ asset('assets/dashboard/img/logos/g.png') }}" alt="Generic placeholder image" width="30" />
                            <div class="flex-1">
                                <h6 class="mb-0">Google</h6>
                            </div>
                        </a>
                        <a class="d-flex align-items-center mb-2" href="">
                            <img class="align-self-center me-2" src="{{ asset('assets/dashboard/img/logos/apple.png') }}" alt="Generic placeholder image" width="30" />
                            <div class="flex-1">
                                <h6 class="mb-0">Apple</h6>
                            </div>
                        </a>
                        <a class="d-flex align-items-center mb-2" href="">
                            <img class="align-self-center me-2" src="{{ asset('assets/dashboard/img/logos/hp.png') }}" alt="Generic placeholder image" width="30" />
                            <div class="flex-1">
                                <h6 class="mb-0">Hewlett Packard</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-0">
            <div class="col-lg-8 pe-lg-2">
                <div class="card mb-3">
                    <div class="card-header bg-body-tertiary">
                        <h5 class="mb-0">Intro</h5>
                    </div>
                    <div class="card-body text-justify">
                        <p class="mb-0 text-1000">Dedicated, passionate, and accomplished Full Stack Developer with 9+ years of progressive experience working as an Independent Contractor for Google and developing and growing my educational social network that helps others learn programming, web design, game development, networking.</p>
                        <div class="collapse show" id="profile-intro">
                            <p class="mt-3 text-1000">I’ve acquired a wide depth of knowledge and expertise in using my technical skills in programming, computer science, software development, and mobile app development to developing solutions to help organizations increase productivity, and accelerate business performance. </p>
                            <p class="text-1000">It’s great that we live in an age where we can share so much with technology but I’m but I’m ready for the next phase of my career, with a healthy balance between the virtual world and a workplace where I help others face-to-face.</p>
                            <p class="text-1000 mb-0">There’s always something new to learn, especially in IT-related fields. People like working with me because I can explain technology to everyone, from staff to executives who need me to tie together the details and the big picture. I can also implement the technologies that successful projects need.</p>
                        </div>
                    </div>
                    <div class="card-footer bg-body-tertiary p-0 border-top">
                        <button class="btn btn-link d-block w-100 btn-intro-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#profile-intro" aria-expanded="true" aria-controls="profile-intro">Show
                            <span class="less">less<span class="fas fa-chevron-up ms-2 fs-11"></span></span>
                            <span class="full">full<span class="fas fa-chevron-down ms-2 fs-11"></span></span>
                        </button>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header bg-body-tertiary d-flex justify-content-between">
                        <h5 class="mb-0">Associations</h5>
                        <a class="font-sans-serif" href="">All Associations</a>
                    </div>
                    <div class="card-body fs-10 pb-0">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <div class="d-flex position-relative align-items-center mb-2">
                                    <img class="d-flex align-self-center me-2 rounded-3" src="{{ asset('assets/dashboard/img/logos/apple.png') }}" alt="" width="50" />
                                    <div class="flex-1">
                                        <h6 class="fs-9 mb-0">
                                            <a class="stretched-link" href="">Apple</a>
                                        </h6>
                                        <p class="mb-1">3243 associates</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="d-flex position-relative align-items-center mb-2">
                                    <img class="d-flex align-self-center me-2 rounded-3" src="{{ asset('assets/dashboard/img/logos/g.png') }}" alt="" width="50" />
                                    <div class="flex-1">
                                        <h6 class="fs-9 mb-0">
                                            <a class="stretched-link" href="">Google</a>
                                        </h6>
                                        <p class="mb-1">34598 associates</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="d-flex position-relative align-items-center mb-2">
                                    <img class="d-flex align-self-center me-2 rounded-3" src="{{ asset('assets/dashboard/img/logos/intel-2.png') }}" alt="" width="50" />
                                    <div class="flex-1">
                                        <h6 class="fs-9 mb-0">
                                            <a class="stretched-link" href="">Intel</a>
                                        </h6>
                                        <p class="mb-1">7652 associates</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="d-flex position-relative align-items-center mb-2">
                                    <img class="d-flex align-self-center me-2 rounded-3" src="{{ asset('assets/dashboard/img/logos/facebook.png') }}" alt="" width="50" />
                                    <div class="flex-1">
                                        <h6 class="fs-9 mb-0">
                                            <a class="stretched-link" href="">Facebook</a>
                                        </h6>
                                        <p class="mb-1">765 associates</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header bg-body-tertiary d-flex justify-content-between">
                        <h5 class="mb-0">Activity log</h5>
                        <a class="font-sans-serif" href="">All logs</a>
                    </div>
                    <div class="card-body fs-10 p-0">
                        <a class="border-bottom-0 notification rounded-0 border-x-0 border border-300" href="">
                            <div class="notification-avatar">
                                <div class="avatar avatar-xl me-3">
                                    <div class="avatar-emoji rounded-circle ">
                                        <span role="img" aria-label="Emoji">🎁</span>
                                    </div>
                                </div>
                            </div>
                            <div class="notification-body">
                                <p class="mb-1"><strong>Jennifer Kent</strong> Congratulated <strong>Anthony Hopkins</strong></p>
                                <span class="notification-time">November 13, 5:00 Am</span>
                            </div>
                        </a>

                        <a class="border-bottom-0 notification rounded-0 border-x-0 border border-300" href="">
                            <div class="notification-avatar">
                                <div class="avatar avatar-xl me-3">
                                    <div class="avatar-emoji rounded-circle ">
                                        <span role="img" aria-label="Emoji">🏷️</span>
                                    </div>
                                </div>
                            </div>
                            <div class="notification-body">
                                <p class="mb-1"><strong>California Institute of Technology</strong> tagged <strong>Anthony Hopkins</strong> in a post.</p>
                                <span class="notification-time">November 8, 5:00 PM</span>
                            </div>
                        </a>

                        <a class="border-bottom-0 notification rounded-0 border-x-0 border border-300" href="">
                            <div class="notification-avatar">
                                <div class="avatar avatar-xl me-3">
                                    <div class="avatar-emoji rounded-circle ">
                                        <span role="img" aria-label="Emoji">📋️</span>
                                    </div>
                                </div>
                            </div>
                            <div class="notification-body">
                                <p class="mb-1"><strong>Anthony Hopkins</strong> joined <strong>Victory day cultural Program</strong> with <strong>Tony Stark</strong></p>
                                <span class="notification-time">November 01, 11:30 AM</span>
                            </div>
                        </a>

                        <a class="notification border-x-0 border-bottom-0 border-300 rounded-top-0" href="">
                            <div class="notification-avatar">
                                <div class="avatar avatar-xl me-3">
                                    <div class="avatar-emoji rounded-circle">
                                        <span role="img" aria-label="Emoji">📅️</span>
                                    </div>
                                </div>
                            </div>
                            <div class="notification-body">
                                <p class="mb-1"><strong>Massachusetts Institute of Technology</strong> invited <strong>Anthony Hopkin</strong> to an event</p>
                                <span class="notification-time">October 28, 12:00 PM</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="card mb-3 mb-lg-0">
                    <div class="card-header bg-body-tertiary">
                        <h5 class="mb-0">Photos</h5>
                    </div>
                    <div class="card-body overflow-hidden">
                        <div class="row g-0">
                            <div class="col-6 p-1">
                                <a class="glightbox" href="{{ asset('assets/dashboard/img/generic/4.jpg') }}" data-gallery="gallery1" data-glightbox="data-glightbox">
                                    <img class="img-fluid rounded" src="{{ asset('assets/dashboard/img/generic/4.jpg') }}" alt="..." />
                                </a>
                            </div>
                            <div class="col-6 p-1">
                                <a class="glightbox" href="{{ asset('assets/dashboard/img/generic/5.jpg') }}" data-gallery="gallery1" data-glightbox="data-glightbox">
                                    <img class="img-fluid rounded" src="{{ asset('assets/dashboard/img/generic/5.jpg') }}" alt="..." />
                                </a>
                            </div>
                            <div class="col-4 p-1">
                                <a class="glightbox" href="{{ asset('assets/dashboard/img/gallery/4.jpg') }}" data-gallery="gallery1" data-glightbox="data-glightbox">
                                    <img class="img-fluid rounded" src="{{ asset('assets/dashboard/img/gallery/4.jpg') }}" alt="..." />
                                </a>
                            </div>
                            <div class="col-4 p-1">
                                <a class="glightbox" href="{{ asset('assets/dashboard/img/gallery/5.jpg') }}" data-gallery="gallery1" data-glightbox="data-glightbox">
                                    <img class="img-fluid rounded" src="{{ asset('assets/dashboard/img/gallery/5.jpg') }}" alt="..." />
                                </a>
                            </div>
                            <div class="col-4 p-1">
                                <a class="glightbox" href="{{ asset('assets/dashboard/img/gallery/3.jpg') }}" data-gallery="gallery1" data-glightbox="data-glightbox">
                                    <img class="img-fluid rounded" src="{{ asset('assets/dashboard/img/gallery/3.jpg') }}" alt="..." />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 ps-lg-2">
                <div class="sticky-sidebar">
                    <div class="card mb-3">
                        <div class="card-header bg-body-tertiary">
                            <h5 class="mb-0">Experience</h5>
                        </div>
                        <div class="card-body fs-10">
                            <div class="d-flex">
                                <a href="">
                                    <img class="img-fluid" src="{{ asset('assets/dashboard/img/logos/g.png') }}" alt="" width="56" />
                                </a>
                                <div class="flex-1 position-relative ps-3">
                                    <h6 class="fs-9 mb-0">Big Data Engineer
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified">
                                            <small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small>
                                        </span>
                                    </h6>
                                    <p class="mb-1">
                                        <a href="">Google</a>
                                    </p>
                                    <p class="text-1000 mb-0">Apr 2012 - Present &bull; 6 yrs 9 mos</p>
                                    <p class="text-1000 mb-0">California, USA</p>
                                    <div class="border-bottom border-dashed my-3"></div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <a href="">
                                    <img class="img-fluid" src="{{ asset('assets/dashboard/img/logos/apple.png') }}" alt="" width="56" />
                                </a>
                                <div class="flex-1 position-relative ps-3">
                                    <h6 class="fs-9 mb-0">Software Engineer
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified">
                                            <small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small>
                                        </span>
                                    </h6>
                                    <p class="mb-1">
                                        <a href="">Apple</a>
                                    </p>
                                    <p class="text-1000 mb-0">Jan 2012 - Apr 2012 &bull; 4 mos</p>
                                    <p class="text-1000 mb-0">California, USA</p>
                                    <div class="border-bottom border-dashed my-3"></div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <a href="">
                                    <img class="img-fluid" src="{{ asset('assets/dashboard/img/logos/nike.png') }}" alt="" width="56" />
                                </a>
                                <div class="flex-1 position-relative ps-3">
                                    <h6 class="fs-9 mb-0">Mobile App Developer
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified">
                                            <small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small>
                                        </span>
                                    </h6>
                                    <p class="mb-1">
                                        <a href="">Nike</a>
                                    </p>
                                    <p class="text-1000 mb-0">Jan 2011 - Apr 2012 &bull; 1 yr 4 mos</p>
                                    <p class="text-1000 mb-0">Beaverton, USA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header bg-body-tertiary">
                            <h5 class="mb-0">Education</h5>
                        </div>
                        <div class="card-body fs-10">
                            <div class="d-flex"><a href="">
                                    <div class="avatar avatar-3xl">
                                        <div class="avatar-name rounded-circle">
                                            <span>SU</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="flex-1 position-relative ps-3">
                                    <h6 class="fs-9 mb-0">
                                        <a href="">Stanford University
                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified">
                                                <small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small>
                                            </span>
                                        </a>
                                    </h6>
                                    <p class="mb-1">Computer Science and Engineering</p>
                                    <p class="text-1000 mb-0">2010 - 2014 • 4 yrs</p>
                                    <p class="text-1000 mb-0">California, USA</p>
                                    <div class="border-bottom border-dashed my-3"></div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <a href="">
                                    <img class="img-fluid" src="{{ asset('assets/dashboard/img/logos/staten.png') }}" alt="" width="56" />
                                </a>
                                <div class="flex-1 position-relative ps-3">
                                    <h6 class="fs-9 mb-0">
                                        <a href="">Staten Island Technical High School
                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified">
                                                <small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small>
                                            </span>
                                        </a>
                                    </h6>
                                    <p class="mb-1">Higher Secondary School Certificate, Science</p>
                                    <p class="text-1000 mb-0">2008 - 2010 &bull; 2 yrs</p>
                                    <p class="text-1000 mb-0">New York, USA</p>
                                    <div class="border-bottom border-dashed my-3"></div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <a href="">
                                    <img class="img-fluid" src="{{ asset('assets/dashboard/img/logos/tj-heigh-school.png') }}" alt="" width="56" />
                                </a>
                                <div class="flex-1 position-relative ps-3">
                                    <h6 class="fs-9 mb-0">
                                        <a href="">Thomas Jefferson High School for Science and Technology
                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified">
                                                <small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small>
                                            </span>
                                        </a>
                                    </h6>
                                    <p class="mb-1">Secondary School Certificate, Science</p>
                                    <p class="text-1000 mb-0">2003 - 2008 &bull; 5 yrs</p>
                                    <p class="text-1000 mb-0">Alexandria, USA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 mb-lg-0">
                        <div class="card-header bg-body-tertiary">
                            <h5 class="mb-0">Events</h5>
                        </div>
                        <div class="card-body fs-10">
                            <div class="d-flex btn-reveal-trigger">
                                <div class="calendar">
                                    <span class="calendar-month">Feb</span>
                                    <span class="calendar-day">21</span>
                                </div>
                                <div class="flex-1 position-relative ps-3">
                                    <h6 class="fs-9 mb-0">
                                        <a href="">Newmarket Nights</a>
                                    </h6>
                                    <p class="mb-1">Organized by
                                        <a href="" class="text-700">University of Oxford</a>
                                    </p>
                                    <p class="text-1000 mb-0">Time: 6:00AM</p>
                                    <p class="text-1000 mb-0">Duration: 6:00AM - 5:00PM</p>Place: Cambridge Boat Club, Cambridge
                                    <div class="border-bottom border-dashed my-3"></div>
                                </div>
                            </div>
                            <div class="d-flex btn-reveal-trigger">
                                <div class="calendar">
                                    <span class="calendar-month">Dec</span>
                                    <span class="calendar-day">31</span>
                                </div>
                                <div class="flex-1 position-relative ps-3">
                                    <h6 class="fs-9 mb-0">
                                        <a href="">31st Night Celebration</a>
                                    </h6>
                                    <p class="mb-1">Organized by
                                        <a href="" class="text-700">Chamber Music Society</a>
                                    </p>
                                    <p class="text-1000 mb-0">Time: 11:00PM</p>
                                    <p class="text-1000 mb-0">280 people interested</p>Place: Tavern on the Greend, New York
                                    <div class="border-bottom border-dashed my-3"></div>
                                </div>
                            </div>
                            <div class="d-flex btn-reveal-trigger">
                                <div class="calendar">
                                    <span class="calendar-month">Dec</span>
                                    <span class="calendar-day">16</span>
                                </div>
                                <div class="flex-1 position-relative ps-3">
                                    <h6 class="fs-9 mb-0">
                                        <a href="">Folk Festival</a>
                                    </h6>
                                    <p class="mb-1">Organized by
                                        <a href="" class="text-700">Harvard University</a>
                                    </p>
                                    <p class="text-1000 mb-0">Time: 9:00AM</p>
                                    <p class="text-1000 mb-0">Location: Cambridge Masonic Hall Association</p>Place: Porter Square, North Cambridge
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-body-tertiary p-0 border-top">
                            <a class="btn btn-link d-block w-100" href="">All Events
                                <span class="fas fa-chevron-right ms-1 fs-11"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header bg-body-tertiary">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="mb-0" id="followers">Followers
                            <span class="d-none d-sm-inline-block">(233)</span>
                        </h5>
                    </div>
                    <div class="col text-end">
                        <a class="font-sans-serif" href="">All Members</a>
                    </div>
                </div>
            </div>
            <div class="card-body bg-body-tertiary px-1 py-0">
                <div class="row g-0 text-center fs-10">
                    <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                        <div class="bg-white dark__bg-1100 p-3 h-100">
                            <a href="">
                                <img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('assets/dashboard/img/team/1.jpg') }}" alt="" width="100" />
                            </a>
                            <h6 class="mb-1">
                                <a href="">Emilia Clarke</a>
                            </h6>
                            <p class="fs-11 mb-1">
                                <a class="text-700" href="">Technext limited</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                        <div class="bg-white dark__bg-1100 p-3 h-100">
                            <a href="">
                                <img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('assets/dashboard/img/team/2.jpg') }}" alt="" width="100" />
                            </a>
                            <h6 class="mb-1">
                                <a href="">Kit Harington</a>
                            </h6>
                            <p class="fs-11 mb-1">
                                <a class="text-700" href="">Harvard Korea Society</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                        <div class="bg-white dark__bg-1100 p-3 h-100">
                            <a href="">
                                <img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('assets/dashboard/img/team/3.jpg') }}" alt="" width="100" />
                            </a>
                            <h6 class="mb-1">
                                <a href="">Sophie Turner</a>
                            </h6>
                            <p class="fs-11 mb-1">
                                <a class="text-700" href="">Graduate Student Council</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                        <div class="bg-white dark__bg-1100 p-3 h-100">
                            <a href="">
                                <img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('assets/dashboard/img/team/4.jpg') }}" alt="" width="100" />
                            </a>
                            <h6 class="mb-1">
                                <a href="">Peter Dinklage</a>
                            </h6>
                            <p class="fs-11 mb-1">
                                <a class="text-700" href="">Art Club, MIT</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                        <div class="bg-white dark__bg-1100 p-3 h-100">
                            <a href="">
                                <img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('assets/dashboard/img/team/1.jpg') }}" alt="" width="100" />
                            </a>
                            <h6 class="mb-1">
                                <a href="">Emilia Clarke</a>
                            </h6>
                            <p class="fs-11 mb-1">
                                <a class="text-700" href="">Technext limited</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                        <div class="bg-white dark__bg-1100 p-3 h-100">
                            <a href="">
                                <img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('assets/dashboard/img/team/2.jpg') }}" alt="" width="100" />
                            </a>
                            <h6 class="mb-1">
                                <a href="">Kit Harington</a>
                            </h6>
                            <p class="fs-11 mb-1">
                                <a class="text-700" href="">Harvard Korea Society</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                        <div class="bg-white dark__bg-1100 p-3 h-100">
                            <a href="">
                                <img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('assets/dashboard/img/team/3.jpg') }}" alt="" width="100" />
                            </a>
                            <h6 class="mb-1">
                                <a href="">Sophie Turner</a>
                            </h6>
                            <p class="fs-11 mb-1">
                                <a class="text-700" href="">Graduate Student Council</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                        <div class="bg-white dark__bg-1100 p-3 h-100">
                            <a href="">
                                <img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('assets/dashboard/img/team/4.jpg') }}" alt="" width="100" />
                            </a>
                            <h6 class="mb-1">
                                <a href="">Peter Dinklage</a>
                            </h6>
                            <p class="fs-11 mb-1">
                                <a class="text-700" href="">Art Club, MIT</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                        <div class="bg-white dark__bg-1100 p-3 h-100">
                            <a href="">
                                <img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('assets/dashboard/img/team/1.jpg') }}" alt="" width="100" />
                            </a>
                            <h6 class="mb-1">
                                <a href="">Emilia Clarke</a>
                            </h6>
                            <p class="fs-11 mb-1">
                                <a class="text-700" href="">Technext limited</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                        <div class="bg-white dark__bg-1100 p-3 h-100">
                            <a href="">
                                <img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('assets/dashboard/img/team/2.jpg') }}" alt="" width="100" />
                            </a>
                            <h6 class="mb-1">
                                <a href="">Kit Harington</a>
                            </h6>
                            <p class="fs-11 mb-1">
                                <a class="text-700" href="">Harvard Korea Society</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                        <div class="bg-white dark__bg-1100 p-3 h-100">
                            <a href="">
                                <img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('assets/dashboard/img/team/3.jpg') }}" alt="" width="100" />
                            </a>
                            <h6 class="mb-1">
                                <a href="">Sophie Turner</a>
                            </h6>
                            <p class="fs-11 mb-1">
                                <a class="text-700" href="">Graduate Student Council</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                        <div class="bg-white dark__bg-1100 p-3 h-100">
                            <a href="">
                                <img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('assets/dashboard/img/team/4.jpg') }}" alt="" width="100" />
                            </a>
                            <h6 class="mb-1">
                                <a href="">Peter Dinklage</a>
                            </h6>
                            <p class="fs-11 mb-1">
                                <a class="text-700" href="">Art Club, MIT</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/dashboard/vendors/glightbox/glightbox.min.js') }}"></script>
@endsection
