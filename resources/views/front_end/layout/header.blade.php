<div class="top">
 <div class="container">
  <div class="row">
            
   <div class="col-md-6 left-side">
    <ul>
     <li class="phone-text">111-222-3333</li>
     <li class="email-text">contact@arefindev.com</li>
    </ul>
   </div>
           
   <div class="col-md-6 right-side">
    <ul class="right">
      
     @if($pageheading->cartstatus ==0)
       <li class="menu"><a href="">{{ $pageheading->cartheading }}</a></li>
      @endif
					
      @if($pageheading->checkoutstatus ==0)
       <li class="menu"><a href="">{{ $pageheading->checkoutheading }}</a></li>
      @endif
					
      @if($pageheading->singupstatus ==0)
       <li class="menu"><a href="">{{ $pageheading->singupheading }}</a></li>
      @endif
					
      @if($pageheading->singstatus ==0)
       <li class="menu"><a href="">{{ $pageheading->singheading }}</a></li>
      @endif
					
      </ul>
     </div>
    </div>
   </div>
  </div>


  <div class="navbar-area" id="stickymenu">

   <div class="mobile-nav">
    <a href="{{ route('home') }}" class="logo">
     <img src="{{ asset('front_end') }}/uploads/logo.png" alt="">
    </a>
   </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
     <div class="container">
      <nav class="navbar navbar-expand-md navbar-light">
       
       <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ asset('front_end') }}/uploads/logo.png" alt="">
      </a>

      <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
       <ul class="navbar-nav ml-auto">
        <li class="nav-item">
         <a href="{{ route('home') }}" class="nav-link">Home</a>
        </li>

        @if($global_page->status ==0)
         <li class="nav-item">
          <a href="{{ route('about') }}" class="nav-link">
          {{ $global_page->heading }}</a>
         </li>
        @endif

       @if($pageheading->roomstatus ==0)
        <li class="nav-item">
         <a href="javascript:void;" class="nav-link dropdown-toggle"> {{ $pageheading->roomheading }}</a>
          <ul class="dropdown-menu">
           @foreach ($room_data as $item)
            <li class="nav-item">
             <a href="{{ route('single_room',$item->id) }}" class="nav-link">{{ $item->name }}</a>
            </li>
           @endforeach
           </ul>
         </li>
        @endif

        @if($pageheading->photostatus ==0 || $pageheading->videostatus ==0)

          <li class="nav-item">
           <a href="javascript:void;" class="nav-link dropdown-toggle">Gallery</a>
            <ul class="dropdown-menu">

             @if($pageheading->photostatus ==0)
              <li class="nav-item">
               <a href="{{ route('photo') }}" class="nav-link">
                {{ $pageheading->photoheading }}</a>
              </li>
             @endif

             @if($pageheading->videostatus ==0)
              <li class="nav-item">
               <a href="{{ route('video') }}" class="nav-link">{{ $pageheading->videoheading }}</a>
              </li>
             @endif
						
			</ul>
          </li>

        @endif

        <li class="nav-item">
         <a href="{{ route('post') }}" class="nav-link">Blog</a>
        </li>

        @if($contact_page->status==0)
         <li class="nav-item">
          <a href="{{ route('contect') }}" class="nav-link">{{ $contact_page->heading }}</a>
         </li>
        @endif

       </ul>
      </div>
     </nav>
    </div>
   </div>
  </div>
