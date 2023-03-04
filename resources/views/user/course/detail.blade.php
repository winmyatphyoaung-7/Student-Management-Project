@extends('user.master')

@section('content')
    <div class="container">
        <div class="text-center my-3 d-flex align-items-center ">
            <div class="ms-5" style="margin-right: 450px">
                <a class="text-black" onclick="history.back()">
                    <i class="fa-solid fa-circle-arrow-left fa-2x"></i>
                </a>
            </div>
            <h1 class="fw-bold fs-2">Course Details</h1>
            <input type="hidden" id="getCourseLength" value="{{count($course)}}">
            <input type="hidden" id="getUserId" value="{{Auth::user()->id}}">
        </div>
        <div class="row my-5 ">
            <div class="col-5 text-center">
                <img src="{{ asset('storage/'.$data->image) }}" class="img-thumbnail w-75" alt="">
            </div>
            <div class="col-6 offset-1">
                <div class="row d-flex justify-content-around">
                    <div class="col-4">
                        <div class="">
                            <ul class="nav d-flex flex-column fw-semibold fs-6" style="line-height:50px;">
                                <li>Course Title</li>
                                <li>Course Duration</li>
                                <li>Students</li>
                                <li>Course Fees</li>
                                <li>Start Date</li>
                                <li>Likes</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-7 ">
                        <div class="">
                            <ul class="nav d-flex flex-column fs-5" style="line-height:50px;">
                                <li>{{ $data->name }}</li>
                                <li>{{ $data->duration }} Months</li>
                                <li>{{ $data->qty }} Students</li>
                                <li>{{ $data->price }} Kyats</li>
                                <li>{{ $data->start_date }}</li>
                                <li>{{count($like)}}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-between align-items-center mt-5 ">

                    <div class="col-6">
                        <a>
                            <button type="button" class="btn btn-info px-5 me-5 fs-5" id="registerBtn">Register Course</button>
                        </a>
                    </div>

                  <div class="col-5">
                    <a href="https://www.facebook.com/codelab.mm" class="text-decoration-none">
                        <i class="fa-brands fa-facebook fa-2x me-5 text-primary"></i>
                    </a>


                    <a href="https://www.messenger.com/t/100006363339656" class="text-decoration-none">
                        <i class="fa-brands fa-facebook-messenger fa-2x text-primary me-5"></i>
                    </a>


                    <a href="https://web.telegram.org/k/#@sithuyoon" class="text-decoration-none">
                        <i class="fa-brands fa-telegram fa-2x text-primary me-5"></i>
                    </a>
                  </div>

                </div>

            </div>
        </div>

        <div class="row my-5">
            <div class="my-5">
                <span class="border-bottom border-4 border-secondary fs-3 pb-2" style="font-weight: 600">About </span>
                <span class="fs-3 fw-bold">Course</span>
            </div>
            <div class="col-10 offset-1">
                <p>{{ $data->description }}</p>
            </div>
        </div>

        <div class="row my-5 d-flex  align-content-center">
            <div class="col-4">
                <form action="{{ route('course#comment') }}" method="POST">
                    @csrf

                    <div class="d-flex align-items-center">
                        <input type="hidden" name="courseId" id="courseId" value="{{ $data->id }}">
                        <input type="text" name="comment" class="form-control"
                            style="border-radius: 100px 0px 0px 100px;" placeholder="Leave Your Comment...">
                        <button type="submit" class="btn btn-dark"
                            style="border-radius: 0px 100px 100px 0px;">Comment</button>
                    </div>
                </form>
            </div>

            <div class="col-5 d-flex">
                <button class="me-3 d-flex justify-content-center align-items-center rounded-circle courseLike"
                    style="width:40px;height:40px;background-color:gainsboro;border:none;" >
                    <a ><i class="fa-solid fa-thumbs-up fs-5 text-white"></i></a>
                </button>
                <button class="d-flex justify-content-center align-items-center rounded-circle courseDislike"
                    style="width:40px;height:40px;background-color:gainsboro;border:none;">
                    <a ><i class="fa-solid fa-thumbs-down fs-5 text-white"></i></a>
                </button>
            </div>
        </div>

        <ul class="list-group mb-2">
            <li class="list-group-item active">
                <b>Comments ({{ $comment->total() }})</b>
            </li>
            @foreach ($comment as $c)
                <li class="list-group-item">
                    <div class="d-flex align-items-start">
                        <div class="me-2">
                            @if ($c->userImage == null)
                            <img src="{{ asset('img/defaultUser.jpg') }}" class=" rounded-circle" width="40px"
                            height="40px" alt="">
                            @else
                            <img src="{{ asset('storage/'.$c->userImage) }}" class=" rounded-circle" width="40px"
                            height="40px" alt="">
                            @endif
                        </div>
                        <div class="d-flex flex-column commentTag">
                            <div class="d-flex align-items-center">
                                <div class="card p-2 h-auto" style="background-color: #F0F2F5;">
                                    <h6 class="fw-bold">{{ $c->userName }}</h6>
                                    <p>{{ $c->content }}</p>
                                </div>
                                <div class="ms-3 ">
                                    <div class="dropdown">
                                        <a class="commentMoreMenu d-flex justify-content-center align-items-center text-decoration-none"
                                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            {{-- <li><a class="dropdown-item ">
                                                    <i class="fa-solid fa-pencil me-2"></i>Edit</a>
                                                <input type="hidden" class="getCommentId" value="{{ $c->id }}">
                                            </li> --}}
                                            <li><a class="dropdown-item" href="{{ route('course#delete', $c->id) }}">
                                                    <i class="fa-solid fa-trash me-2"></i>Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <small>{{ $c->created_at->diffForHumans() }}</small>
                            </div>
                        </div>

                        {{-- <input type="text" name="editComment" class="form-control d-none w-75 commentInputTag" value="{{ $c->content }}"> --}}
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="">
            {{ $comment->links() }}
        </div>
    </div>
@endsection

@section('scriptFile')
    <script src="{{ asset('js/detail.js') }}"></script>

    <script>
        $(document).ready(function() {

            $courseId = $('#courseId').val();
            $courseLength = $('#getCourseLength').val();
            $user = $('#getUserId').val();
            // console.log($courseId,$user);
            
            $('.courseLike').on("click",function(){
                $('.courseLike').addClass('bg-primary')
                $('.courseDislike').removeClass('bg-primary')
                $.ajax({
                    type: 'get',
                    url: '/user/course/like',
                    data: {
                        'status': '1',
                        'courseId' : $courseId,
                    },
                    dataType: 'json',
                    success: function(response) {
                        if(response.status == "true"){
                            $('.courseLike').attr('disabled','true');
                            localStorage.setItem("like",'1')
                            localStorage.setItem("courseId"+$courseId,1)
                            localStorage.setItem("user"+$user,1)
                            
                        }
                    }
                });
            });

            $('.courseDislike').on("click",function(){
                $('.courseLike').removeClass('bg-primary')
                $('.courseDislike').addClass('bg-primary')
                $.ajax({
                    type: 'get',
                    url: '/user/course/like',
                    data: {
                        'status': '0',
                        'courseId' : $courseId,
                    },
                    dataType: 'json',
                    success: function(response) {
                        if(response.status == "true"){
                            $('.courseLike').removeAttr('disabled','true');
                            localStorage.setItem("dislike",'0')
                            localStorage.setItem("courseId"+$courseId,0)
                            localStorage.setItem("user"+$user,1)
                        }
                    }
                })
            })

            $('#registerBtn').click(function(){
                $.ajax({
                    type: 'get',
                    url: '/user/course/register',
                    data: {
                        'courseId': $courseId,
                        'userId' : $user,
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == true) {
                            window.location.href = "/user/homePage";
                        }
                    }
                });
            })

            if(localStorage.getItem('like') == '1') {
                
                    if(localStorage.getItem('courseId'+$courseId) == 1) {
                        if(localStorage.getItem('user'+$user) == 1) {
                            $('.courseLike').addClass('bg-primary')
                            $('.courseDislike').removeClass('bg-primary')
                            $('.courseLike').attr('disabled','true');
                        }
                    }
                
            }

            if(localStorage.getItem('dislike') == '0') {
                if(localStorage.getItem('courseId'+$courseId) == 0) {
                    if(localStorage.getItem('user'+$user) == 1) {
                        $('.courseDislike').addClass('bg-primary')
                        $('.courseLike').removeClass('bg-primary')
                        $('.courseLike').removeAttr('disabled','true');
                    }

                }
            }
        });
    </script>
@endsection
