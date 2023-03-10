@extends('user.master')

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-8 offset-2">
                <h1 class="text-center">In<span
                        class="fs-3 text-danger border border-2 border-start-0 border-danger p-1 ">troduction</span> ð</h1>
                <p class="mt-5 text-center" style="letter-spacing: 2px;line-height:28px;">áá»á½ááºáá±á¬áºáááº Code Lab á áááºáá¼á¬á¸áá±á¬ A
                    to Z programming training course batch-1 áá½ááºáááºáá±á¬ááºáá²á·áá±á¬ áá»á±á¬ááºá¸áá¬á¸áááºáá±á¬ááºáá¼ááºáá«áááºáá¤projectáá­á¯
                    áááááá¯áá¾ááº áá­á¯áááºáá¬á áááááºáá±á· áá½ááºááááºáá±á¸áá¬á¸áá¼á®á¸ áá®áááºáá¬á áááááºáá±á· áá½ááºáá±á¸áá¬á¸áá¼á®á¸áá®á¸áá²á·áááºáá¤project áááº
                    áá»á½ááºá¯ááºáá²á· laraveláá¼áá·áº ááááá¯á¶á¸áá±á¸áá¬á¸áá±á¬ projectáá¼ááºáááºá</p>
            </div>
        </div>

        <div class="row my-5 d-flex align-items-center">
            <div class="section-title">
                <h2 class="my-5 fs-1 fw-semibold">C<span class="fs-3 text-danger ">ourse</span></h2>
            </div>
            <div class="col-5">
                <img src="{{ asset('img/Screenshot (7).png') }}" class="w-100 rounded-3" alt="">
            </div>
            <div class="col-6 offset-1">

                <p class=" text-start" style="letter-spacing: 2px;line-height:28px">
                    Course Tabs áá½ááº Admin áááºáá¼ááºá¸áá¾áááºáá¬á¸áá±á¬ course áá»á¬á¸áá­á¯áá±á¬áºáá¼áá¬á¸áááºá áááºáááºá¡áá¼ááºá¸ áá½ááºáá¾á­áá±á¬
                    categoryáá»á¬á¸áá­á¯áá¾á­ááºá áááºá¸category áá¼áá·áºáááºáá­á¯ááºáá±á¬ course áá»á¬á¸áá­á¯âáá½á±á¸áá¯ááºáá¼áá·áºáá¾á¯áá­á¯ááºáááºá
                </p>
            </div>
        </div>

        <div class="row my-5">
            <div class="section-title text-center">
                <h2 class="my-5 fs-1 fw-semibold">C<span class="fs-3 text-danger ">ourse Detail</span></h2>
            </div>

            <div class="col-12 text-center">
                <p class="mt-5 text-start mt-5 mb-4" style="letter-spacing: 2px;line-height:28px">
                    Course áá²á· á¡áá±á¸áá­ááºáá­á¯ course details áá½ááº áá±á¬áºáá¼áá¬á¸áááºááááºá¸á course áá­á¯ register áá¯ááºáá¼ááºá¸ á like
                    áá±á¸áá¼ááºá¸ á comment áá±á¸áá¼ááºá¸ áá»á¬á¸áá¼á¯áá¯ááºáá­á¯ááºáááºááá­áá­ register áá¯ááºáá¬á¸áá±á¬ course áá»á¬á¸áá­á¯ áá¬áááºá¡áá±á«áº
                    áá±á¬áá·áºáá½ááºáá¾á­áá±á¬ cart icon á áá¼áá·áºáá­á¯ááºáááºá
                </p>
                <p class="px-4 my-5 py-2 rounded-4 text-white" style="background-color: rgb(255, 91, 91)"><small
                        class="fw-semibold fs-4">Noteâ</small> Useráááºáá±á¬ááºáááº course áááºáá¯áá­á¯áááºáá«áá¬ register
                    áá¯ááºáá½áá·áºáá¾á­áááºá</p>
            </div>

            <div class="col-12">
                <div class="row justify-content-around">
                    <div class="col-5"><img src="{{ asset('img/Screenshot (8).png') }}"
                            class="w-100 rounded-3 img-thumbnail" alt=""></div>
                    <div class="col-5"><img src="{{ asset('img/Screenshot (9).png') }}"
                            class="w-100 rounded-3 img-thumbnail" alt=""></div>
                </div>
            </div>

        </div>

        <div class="row my-5 d-flex align-items-center">
            <div class="section-title  my-5">
                <h2 class="my-5 fs-1 fw-semibold">P<span class="fs-3 text-danger ">rofile</span></h2>
            </div>

            <div class="col-5">
                áá­áá­ profile áá¼ááºáááºáá¼ááºá¸ á password áá¼á±á¬ááºá¸áá²áá¼ááºá¸ áá»á¬á¸áá­á¯ áá¬áááºá¡áá±á«áºáá±á¬áá·áºáá¯á¶á¸ ááááºáá¾á­áá±á¬ iconáá­á¯áá¾á­ááºá
                áá¼á¯áá¼ááºáá¼á±á¬ááºá¸áá²áá¼ááºá¸áá»á¬á¸áá¼á¯áá­á¯ááºáááºá

                <p class="px-4 py-2 rounded-4 text-white" style="background-color: #ff5b5b;margin-top: 100px;">Noteâ áá­áá­
                    profile áá¼á¯áá¼ááºáá¼á±á¬ááºá¸áá²áá¼ááºá¸áá»á¬á¸áá¼á¯áááºá¡áá½ááº password á¡á¬á¸ á¡áááºáá¼á¯áá±á¸áááºáá­á¯á¡ááºáááºá</p>
            </div>

            <div class="col-6 offset-1">
                <img src="{{ asset('img/Screenshot (10).png') }}" class="w-100 rounded-3 img-thumbnail" alt="">
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2">
                <div class="section-title text-center">
                    <h2 class="my-5 fs-1 fw-semibold">A<span class="fs-3 text-danger ">dmin Side</span></h2>
                </div>

                <div class="my-5">
                    <p>Home Page áá½ááº course áááºáá¯áá»ááºá¸áá®á¸á á¡áá»ááºá¡áááºáá»á¬á¸áá­á¯ á¡áá±á¸áá­ááºáá±á¬áºáá¼áá¬á¸áááºá Like á¡áá±á¡áá½ááº á comment
                        á¡áá±á¡áá½ááº á áááºá¸á áááºáá±á¬ááºáá±áá¬ áá»á±á¬ááºá¸áá¬á¸á¡áá±á¡áá½ááº á category á¡áááº á áááºá¸áá®á¸áá¬á¸ááá·áºá¡áá»á­ááº
                        ááááºáá­á¯á·áá­á¯á¡áá±á¸áá­ááº áá¼áá·áºáá¾á¯áá­á¯ááºáááºá
                    </p>
                </div>

                <div class="my-5">
                    <p>Category Page áá½ááº categoryáá»á¬á¸áá­á¯ áááºáá®áá¼ááºá¸ á áá¼á¯áá¼ááºáá¼á±á¬ááºá¸áá²áá¼ááºá¸ á áá»ááºáá¼ááºá¸
                        áá»á¬á¸áá¼á¯áá¯ááºáá­á¯ááºáááºáCourses page áááºáááºá¸ category pageáá¾áá·áº á¡áá¬á¸áá°áááº áá¼ááºáááºásearch box áá½ááº course
                        name á¡á¬á¸áá­á¯ááºááá·áºá áá­áá­áá¾á¬áá½á±áá­á¯áá±á¬ course á¡á¬á¸á¡áá»á­ááºáá¯ááºáááºáá¬áá½á¬áá¾á¬áá½á±áá­á¯ááºáááºá
                    </p>
                </div>

                <div class="my-5">
                    <p>Requests Page áá½ááº register áá¯ááºáá¬á¸áá±á¬ userá á¡áá»ááºá¡áááºáá»á¬á¸ á register áá¯ááºáá¬á¸áá±á¬ course áá¾áá·áº
                        register áá¯ááºáá¬á¸áá±á¬á¡áá»á­ááºáá­á¯á·áá­á¯ áá±á¬áºáá¼áá¬á¸áááºááá­á¯á·á¡áá¼ááº user áááºá¡áá¼ááºá¸áá¾ register request áá»á¬á¸áá­á¯
                        á¡áááºáá¼á¯áá¼ááºá¸ á áá¼ááºá¸áááºáá¼ááºá¸áá»á¬á¸áá¼á¯áá¯ááºáá­á¯ááºáááºáAdmin áááº á¡áááºáá¼á¯áá­á¯ááºáá»á¾ááºáá¼ááºáá± á áá¼ááºá¸áááºáááºáá¼ááºáá± user emailáá²áá­á¯á· message áá­á¯á·áá±á¸áááºáá¼ááºáááºá
                    </p>
                </div>

                <div class="my-5">
                    <p>Lists Page áá½ááº Admin List á user List áá¾áá·áº student List áá»á¬á¸áá­á¯áá±á¬áºáá¼áá¬á¸áááºáUser á¡á¬á¸ Admin áá­á¯á·
                        áá¼á±á¬ááºá¸áá²áá¼ááºá¸ á Admin áá¾ user áá­á¯á·áá¼á±á¬ááºá¸áá²áá¼ááºá¸áá»á¬á¸ áá¯ááºáá±á¬ááºáá­á¯ááºáááºá Contacts page áá½ááº user
                        áá»á¬á¸áá¡áá¼á¶áá±á¸áá»ááºáá»á¬á¸áá­á¯ áá±á¬áºáá¼áá¬á¸áááºá
                    </p>
                </div>


            </div>
        </div>

    </div>
@endsection

@section('footer')
    <div class="container-fluid p-5 mt-5  bg-black" style="border-top-left-radius: 80px;">
        <div class="row">
            <div class="col-xl-4 mb-5 col-12 d-flex justify-content-center">
                <div>
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('img/codeLab.jpg') }}" width="60px" class="rounded-circle" alt="">
                        <h2 class="headline text-white ms-3">Code Lab</h2>
                    </div>
                    <div class="mt-4 ms-4 headline">
                        <i class="fa-brands fa-twitter me-4" style="color: #ffffff;font-size: 25px;"></i>
                        <i class="fa-brands fa-github me-4" style="color: #ffffff;font-size: 25px;"></i>
                        <i class="fa-brands fa-youtube me-4" style="color: #ffffff;font-size: 25px;"></i>
                        <i class="fa-brands fa-telegram me-4" style="color: #ffffff;font-size: 25px;"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-6 mb-4 d-flex justify-content-center">
                <div>
                    <h6 class="text-white mb-4 headline">Product</h6>
                    <div class="text-white headline" style="line-height: 30px;">
                        <div>Database</div>
                        <div>Auth</div>
                        <div>Storage</div>
                        <div>Functions</div>
                        <div>Pricing</div>
                        <div>Beta</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-6 mb-5 d-flex justify-content-center">
                <div>
                    <h6 class="text-white mb-4 headline">Resources</h6>
                    <div class="text-white headline" style="line-height: 30px;">
                        <div>Database</div>
                        <div>Auth</div>
                        <div>Storage</div>
                        <div>Functions</div>
                        <div>Pricing</div>
                        <div>Beta</div>
                        <div>Privacy Policy</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-6 d-flex justify-content-center">
                <div class="headline">
                    <h6 class="text-white mb-4 headline">Developers</h6>
                    <div class="text-white headline" style="line-height: 30px;">
                        <div>Documentation</div>
                        <div>API Refrence</div>
                        <div>Guides</div>

                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-6 d-flex justify-content-center">
                <div>
                    <h6 class="text-white mb-4 headline">Company</h6>
                    <div class="text-white headline" style="line-height: 30px;">
                        <div>Blog</div>
                        <div>Open Source</div>
                        <div>Careers</div>
                        <div>Human.txt</div>
                        <div>Lawyears.txt</div>
                        <div>Security.txt</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptFile')
    <script>
        const navBarTag = document.getElementById("Navbar1234");

        window.onwheel = (e) => {
            if (e.deltaY >= 0) {
                // Scrolling Down with mouse
                navBarTag.classList.remove("addtopForNavbar");
            } else {
                // Scrolling Up with mouse
                navBarTag.classList.add("addtopForNavbar");
            }
        };
    </script>
@endsection
