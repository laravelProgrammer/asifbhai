@extends('web-site.layouts.app')

@section('extra-css-files')

    <link rel="stylesheet" type="text/css" href="website-assets/styles/courses.css">
    <link rel="stylesheet" type="text/css" href="website-assets/styles/courses_responsive.css">

@endsection

   @section('main-content')
    <!-- Home -->

    <div class="home">
        <div class="breadcrumbs_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="{{route('/')}}">Home</a></li>
                                <li>Teachers</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>          
    </div>

    <!-- Courses -->

    <div class="courses">
        <div class="container">
            <div class="row">

                <!-- Courses Main Content -->
                <div class="col-lg-8">
                    <div class="courses_search_container">
                        <form action="#" id="courses_search_form" class="courses_search_form d-flex flex-row align-items-center justify-content-start">
                            <input type="search" class="courses_search_input" placeholder="Search Courses" required="required">
                            <select id="courses_search_select" class="courses_search_select courses_search_input">
                                <option>All Categories</option>
                                <option>Category</option>
                                <option>Category</option>
                                <option>Category</option>
                            </select>
                            <button action="submit" class="courses_search_button ml-auto">search now</button>
                        </form>
                    </div>
                    <div class="courses_container">
                        <div class="row courses_row">
                            
                            <!-- Course -->
                            @foreach($teachers as $teacher)
                            <a href="{{route('find-teacher',$teacher->id)}}">
                                <div class="col-lg-6 course_col">
                                    <div class="course">
                                        <div class="course_image">
                                            @if(empty($teacher->avatar))
                                            <img src="{{asset('website-assets/default/default.jpg')}}" alt="">
                                            @else
                                            <img src="{{asset('users/'.$teacher->avatar)}}" alt="">
                                            @endif
                                        </div>
                                        <div class="course_body">
                                            <h3 class="course_title"><a href="course.html">{{$teacher->name}}</a></h3>
                                            <div class="course_teacher">{{$teacher->email}}</div>
                                            <div class="course_text">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipi elitsed do eiusmod tempor</p>
                                            </div>
                                        </div>
                                        <div class="course_footer">
                                            <div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
                                                <div class="course_info">
                                                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                                    <span>20 Student</span>
                                                </div>
                                                <div class="course_info">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <span>5 Ratings</span>
                                                </div>
                                                <div class="course_price ml-auto">$130</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach


                           

                        </div>
                        <div class="row pagination_row">
                            <div class="col">
                                <div class="pagination_container d-flex flex-row align-items-center justify-content-start">
                                    
                                       {{$teachers->links()}}
                                  
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Courses Sidebar -->
                <div class="col-lg-4">
                    <div class="sidebar">

                        <!-- Categories -->
                        <div class="sidebar_section">
                            <div class="sidebar_section_title">Categories</div>
                            <div class="sidebar_categories">
                                <ul>
                                    <li><a href="#">Art & Design</a></li>
                                    <li><a href="#">Business</a></li>
                                    <li><a href="#">IT & Software</a></li>
                                    <li><a href="#">Languages</a></li>
                                    <li><a href="#">Programming</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Latest Course -->
                        <div class="sidebar_section">
                            <div class="sidebar_section_title">Latest Courses</div>
                            <div class="sidebar_latest">

                                <!-- Latest Course -->
                                <div class="latest d-flex flex-row align-items-start justify-content-start">
                                    <div class="latest_image"><div><img src="website-assets/images/latest_1.jpg" alt=""></div></div>
                                    <div class="latest_content">
                                        <div class="latest_title"><a href="course.html">How to Design a Logo a Beginners Course</a></div>
                                        <div class="latest_price">Free</div>
                                    </div>
                                </div>

                                <!-- Latest Course -->
                                <div class="latest d-flex flex-row align-items-start justify-content-start">
                                    <div class="latest_image"><div><img src="website-assets/images/latest_2.jpg" alt=""></div></div>
                                    <div class="latest_content">
                                        <div class="latest_title"><a href="course.html">Photography for Beginners Masterclass</a></div>
                                        <div class="latest_price">$170</div>
                                    </div>
                                </div>

                                <!-- Latest Course -->
                                <div class="latest d-flex flex-row align-items-start justify-content-start">
                                    <div class="latest_image"><div><img src="website-assets/images/latest_3.jpg" alt=""></div></div>
                                    <div class="latest_content">
                                        <div class="latest_title"><a href="course.html">The Secrets of Body Language</a></div>
                                        <div class="latest_price">$220</div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Gallery -->
                        <div class="sidebar_section">
                            <div class="sidebar_section_title">Instagram</div>
                            <div class="sidebar_gallery">
                                <ul class="gallery_items d-flex flex-row align-items-start justify-content-between flex-wrap">
                                    <li class="gallery_item">
                                        <div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
                                        <a class="colorbox" href="images/gallery_1_large.jpg">
                                            <img src="website-assets/images/gallery_1.jpg" alt="">
                                        </a>
                                    </li>
                                    <li class="gallery_item">
                                        <div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
                                        <a class="colorbox" href="images/gallery_2_large.jpg">
                                            <img src="website-assets/images/gallery_2.jpg" alt="">
                                        </a>
                                    </li>
                                    <li class="gallery_item">
                                        <div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
                                        <a class="colorbox" href="images/gallery_3_large.jpg">
                                            <img src="website-assets/images/gallery_3.jpg" alt="">
                                        </a>
                                    </li>
                                    <li class="gallery_item">
                                        <div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
                                        <a class="colorbox" href="images/gallery_4_large.jpg">
                                            <img src="website-assets/images/gallery_4.jpg" alt="">
                                        </a>
                                    </li>
                                    <li class="gallery_item">
                                        <div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
                                        <a class="colorbox" href="images/gallery_5_large.jpg">
                                            <img src="website-assets/images/gallery_5.jpg" alt="">
                                        </a>
                                    </li>
                                    <li class="gallery_item">
                                        <div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
                                        <a class="colorbox" href="images/gallery_6_large.jpg">
                                            <img src="website-assets/images/gallery_6.jpg" alt="">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Tags -->
                        <div class="sidebar_section">
                            <div class="sidebar_section_title">Tags</div>
                            <div class="sidebar_tags">
                                <ul class="tags_list">
                                    <li><a href="#">creative</a></li>
                                    <li><a href="#">unique</a></li>
                                    <li><a href="#">photography</a></li>
                                    <li><a href="#">ideas</a></li>
                                    <li><a href="#">wordpress</a></li>
                                    <li><a href="#">startup</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Banner -->
                        <div class="sidebar_section">
                            <div class="sidebar_banner d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="sidebar_banner_background" style="background-image:url(website-assets/images/banner_1.jpg)"></div>
                                <div class="sidebar_banner_overlay"></div>
                                <div class="sidebar_banner_content">
                                    <div class="banner_title">Free Book</div>
                                    <div class="banner_button"><a href="#">download now</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('extra-js-files')
    <script src="website-assets/plugins/colorbox/jquery.colorbox-min.js"></script>
    <script src="website-assets/js/courses.js"></script>
    @endsection

   @endsection