@extends('user.master')

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-8 offset-2">
                <h1 class="text-center">In<span
                        class="fs-3 text-danger border border-2 border-start-0 border-danger p-1 ">troduction</span> 🙌</h1>
                <p class="mt-5 text-center" style="letter-spacing: 2px;line-height:28px;">ကျွန်တော်သည် Code Lab ၌ သင်ကြားသော A
                    to Z programming training course batch-1 တွင်တက်ရောက်ခဲ့သော ကျောင်းသားတစ်ယောက်ဖြစ်ပါသည်။ဤprojectကို
                    ၂၀၂၂ခုနှစ် နိုဝင်ဘာလ ၂၀ရက်နေ့ တွင်စတင်ရေးသားပြီး ဒီဇင်ဘာလ ၁၈ရက်နေ့ တွင်ရေးသားပြီးစီးခဲ့သည်။ဤproject သည်
                    ကျွန်ုပ်ရဲ့ laravelဖြင့် ပထမဆုံးရေးသားသော projectဖြစ်သည်။</p>
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
                    Course Tabs တွင် Admin ဘက်ခြမ်းမှတင်ထားသော course များကိုဖော်ပြထားသည်။ ဘယ်ဘက်အခြမ်း တွင်ရှိသော
                    categoryများကိုနှိပ်၍ ၎င်းcategory ဖြင့်သက်ဆိုင်သော course များကို‌ရွေးထုတ်ကြည့်ရှုနိုင်မည်။
                </p>
            </div>
        </div>

        <div class="row my-5">
            <div class="section-title text-center">
                <h2 class="my-5 fs-1 fw-semibold">C<span class="fs-3 text-danger ">ourse Detail</span></h2>
            </div>

            <div class="col-12 text-center">
                <p class="mt-5 text-start mt-5 mb-4" style="letter-spacing: 2px;line-height:28px">
                    Course ရဲ့ အသေးစိတ်ကို course details တွင် ဖော်ပြထားသည်။၎င်း၌ course ကို register လုပ်ခြင်း ၊ like
                    ပေးခြင်း ၊ comment ပေးခြင်း များပြုလုပ်နိုင်သည်။မိမိ register လုပ်ထားသော course များကို ညာဘက်အပေါ်
                    ထောင့်တွင်ရှိသော cart icon ၌ ကြည့်နိုင်သည်။
                </p>
                <p class="px-4 my-5 py-2 rounded-4 text-white" style="background-color: rgb(255, 91, 91)"><small
                        class="fw-semibold fs-4">Note❗</small> Userတစ်ယောက်သည် course တစ်ခုကိုတစ်ခါသာ register
                    လုပ်ခွင့်ရှိသည်။</p>
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
                မိမိ profile ပြင်ဆင်ခြင်း ၊ password ပြောင်းလဲခြင်း များကို ညာဘက်အပေါ်ထောင့်ဆုံး ၌တည်ရှိသော iconကိုနှိပ်၍
                ပြုပြင်ပြောင်းလဲခြင်းများပြုနိုင်သည်။

                <p class="px-4 py-2 rounded-4 text-white" style="background-color: #ff5b5b;margin-top: 100px;">Note❗ မိမိ
                    profile ပြုပြင်ပြောင်းလဲခြင်းများပြုရန်အတွက် password အား အတည်ပြုပေးရန်လိုအပ်သည်။</p>
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
                    <p>Home Page တွင် course တစ်ခုချင်းစီး၏ အချက်အလက်များကို အသေးစိတ်ဖော်ပြထားသည်။ Like အရေအတွက် ၊ comment
                        အရေအတွက် ၊ ၎င်း၌ တက်ရောက်နေသာ ကျောင်းသားအရေအတွက် ၊ category အမည် ၊ ဖန်းတီးထားသည့်အချိန်
                        စသည်တို့ကိုအသေးစိတ် ကြည့်ရှုနိုင်သည်။
                    </p>
                </div>

                <div class="my-5">
                    <p>Category Page တွင် categoryများကို ဖန်တီခြင်း ၊ ပြုပြင်ပြောင်းလဲခြင်း ၊ ဖျက်ခြင်း
                        များပြုလုပ်နိုင်သည်။Courses page သည်လည်း category pageနှင့် အလားတူပင် ဖြစ်သည်။search box တွင် course
                        name အားရိုက်ထည့်၍ မိမိရှာဖွေလိုသော course အားအချိန်ကုန်သက်သာစွာရှာဖွေနိုင်သည်။
                    </p>
                </div>

                <div class="my-5">
                    <p>Requests Page တွင် register လုပ်ထားသော user၏ အချက်အလက်များ ၊ register လုပ်ထားသော course နှင့်
                        register လုပ်ထားသောအချိန်တို့ကို ဖော်ပြထားသည်။ထို့အပြင် user ဘက်အခြမ်းမှ register request များကို
                        အတည်ပြုခြင်း ၊ ငြင်းပယ်ခြင်းများပြုလုပ်နိုင်သည်။Admin သည် အတည်ပြုလိုက်လျှင်ဖြစ်စေ ၊ ငြင်းပယ်သည်ဖြစ်စေ user emailထဲသို့ message ပို့ပေးမည်ဖြစ်သည်။
                    </p>
                </div>

                <div class="my-5">
                    <p>Lists Page တွင် Admin List ၊ user List နှင့် student List များကိုဖော်ပြထားသည်။User အား Admin သို့
                        ပြောင်းလဲခြင်း ၊ Admin မှ user သို့ပြောင်းလဲခြင်းများ လုပ်ဆောင်နိုင်သည်။ Contacts page တွင် user
                        များ၏အကြံပေးချက်များကို ဖော်ပြထားသည်။
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
