   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <!-- Brand Logo -->
        <a href="{{ route('admin.home') }}" class="brand-link" align="center" style="text-decoration:none;">
            <span class="brand-text font-weight-light">Admin Panel</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ (!empty(Auth::guard('admin')->user()->photo))?url('upload/profile/'.Auth::guard('admin')->user()->photo):url('upload/no_image.png') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{ route('admin.profile') }}" class="d-block" style="text-decoration:none;">{{ Auth::guard('admin')->user()->name }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


                    <!------User Part------->
                    @if (Auth::guard('admin')->user()->role == 'Administrator')

                    <li>
                        <a class="text-white" style="text-decoration:none;">
                            <small> Administrator </small>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-circle"></i>
                            <p>Manage User
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.view') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage User</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    @endif


                    <!--------Setting------>
                    <li>
                        <a class="text-white" style="text-decoration:none;">
                            <small> Setting </small>
                        </a>
                    </li>

                    <li class="nav-item">

                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-gear"></i>
                            <p>Web Setting
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('setting') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Genarel Setting</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('contact.add') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Contact Us</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('about.add') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>About US</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('terms.add') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Terms & Condition</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('privacy.add') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Privacy & Policy</p>
                                </a>
                            </li>

                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa fa-file"></i>
                            <p> Page SetUp
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('roomheading.add') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Room Page</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('blogheading.add') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Blog Page</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('faqheading.add') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>FAQ Page</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('photoheading.add') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Photo Page</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('videoheading.add') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Video Page</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('singup_heading.add') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>SingUp Page</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('singin_heading.add') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>SingIn Page</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('forgetpass_heading.add') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Forget Page</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('reset_heading.add') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Reset Page</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('cartheading.add') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Cart Page</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('cheakheading.add') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Chack Out Page</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!--------Setting------>
                    <li>
                        <a class="text-white" style="text-decoration:none;">
                            <small> Main </small>
                        </a>
                    </li>



                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-sliders-h"></i>
                            <p>Slider
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('slider.view') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Slider</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>Room Feature
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('feature.view') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Feature</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa-solid fa-hotel"></i>
                            <p>Hotel Part
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('amenity.view') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Amenity</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('room.view') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Hotel Room</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('available.room') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Available Room</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <!--------Website Feature------>
                    <li>
                        <a class="text-white" style="text-decoration:none;">
                            <small> Website Feature </small>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fab fa-blogger-b"></i>
                            <p>Blog Post
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('post.view') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View Post</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-image"></i>
                            <p>
                                Gallary
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('photo.view') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Photo Gallary</p>
                                </a>
                            </li>
                        <li class="nav-item">
                                <a href="{{ route('video.view') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Photo Gallary</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-question-circle" aria-hidden="true"></i>
                            <p>
                                FAQ
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('faq.view') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage FAQ</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>Testimonial
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('testimonial.view') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Testimonial</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!--------Website Feature------>
                    <li>
                        <a class="text-white" style="text-decoration:none;">
                            <small> Customer Detalis </small>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-circle"></i>
                            <p>
                                Customer
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('customer.view') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Customer List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.order') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Order Details</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-thumbs-up"></i>
                            <p>Subscriber
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('subscriber.show') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Subscriber List </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('subscriber.send_email') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Send Email</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </nav>

        </div>
  </aside>
