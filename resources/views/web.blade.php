<!DOCTYPE HTML>
<html lang="en">
  
   <head>
       
       
      <!-- Display -->
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <!-- Identity -->
      <title>@yield('title','ORCA | Organisation for Research on China and Asia')</title>
      <meta name="description" content="@yield('meta_description','default description')">
      <meta name="author" content="Codings">
      <meta name="keywords" content="@yield('meta_keywords','some default keywords')">
      <meta name="twitter:card" content="summary_large_image">
      @yield('meta')
   
      
          <!-- Favicons -->
    
<link rel="apple-touch-icon" sizes="57x57" href="{{ URL::asset('images/favicon/apple-icon-57x57.png') }}">
<link rel="apple-touch-icon" sizes="60x60" href="{{ URL::asset('images/favicon/apple-icon-60x60.png') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ URL::asset('images/favicon/apple-icon-72x72.png') }}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('images/favicon/apple-icon-76x76.png') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ URL::asset('images/favicon/apple-icon-114x114.png') }}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ URL::asset('images/favicon/apple-icon-120x120.png') }}">
<link rel="apple-touch-icon" sizes="144x144" href="{{ URL::asset('images/favicon/apple-icon-144x144.png') }}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ URL::asset('images/favicon/apple-icon-152x152.png') }}') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('images/favicon/apple-icon-180x180.png') }}">
<link rel="icon" type="image/png" sizes="192x192"  href="{{ URL::asset('images/favicon/android-icon-192x192.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('images/favicon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="96x96" href="{{ URL::asset('images/favicon/favicon-96x96.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('images/favicon/favicon-16x16.png') }}">
<link rel="manifest" href="{{ URL::asset('images/favicon/manifest.json') }}">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="{{ URL::asset('images/favicon/ms-icon-144x144.png') }}">
<meta name="theme-color" content="#ffffff">

      <!-- Vendor CSS -->
      <link rel="stylesheet" href="{{ URL::asset('css/vendor/preloader.min.css') }}" />
      <link rel="stylesheet" href="{{ URL::asset('css/vendor/font-family.min.css') }}" />
      <link rel="stylesheet" href="{{ URL::asset('css/vendor/font-awesome.min.css') }}" />
      <link rel="stylesheet" href="{{ URL::asset('css/vendor/menu-engine.min.css') }}" />
      <link rel="stylesheet" href="{{ URL::asset('css/vendor/menu-grid.min.css') }}" />
      <link rel="stylesheet" href="{{ URL::asset('css/vendor/bootstrap.min.css') }}" />
      <link rel="stylesheet" href="{{ URL::asset('css/vendor/swiper.min.css') }}" />
      <link rel="stylesheet" href="{{ URL::asset('css/vendor/dynamic-slider.min.css') }}" />
      <link rel="stylesheet" href="{{ URL::asset('css/vendor/bricklayer.min.css') }}" />
      <link rel="stylesheet" href="{{ URL::asset('css/vendor/lightbox.min.css') }}" />
      <link rel="stylesheet" href="{{ URL::asset('css/vendor/aos.min.css') }}" />
      <!-- Main CSS -->
      <link rel="stylesheet" href="{{ URL::asset('css/theme.css') }}" />
      <link rel="stylesheet" href="{{ URL::asset('css/core.css') }}" />
      <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
      
      
      
   </head>
    <!-- Preloader -->
   <div id="preloader" class="preloader" data-delay="0" data-limit="3000">
      <img src="{{ URL::asset('images/ORCALogo PNG.png') }}" class="emblem" alt="Emblem" hidden="hidden" />
   </div>
   <style>
      /*  .shock-header .navbar .navbar-nav .nav-link {
      color: black !important;
      } */
      .megamenuimg {
      margin-bottom: 0rem!important;
      /* padding-bottom: 1.5rem!important; */
      border-bottom: none!important;
      border-color: var(--navbar-megamenu-title-border-color)!important;
      font-family: var(--primary-font)!important;
      /* font-size: 1.1rem!important; */
      font-weight: 500!important;
      color: #fff!important;
      /* height: 2rem; */
      /* text-transform: capitalize; */
      }
      .graycolor {
      color:#8f93a5!important;
      }
      .white {
          color:#fff!important;
      }
   </style>
   <body class="shock-body publicationbody">
      <!-- Header -->
      <header id="header" class="shock-header">
         <!-- Navbar -->
         <nav id="navbar" class="navbar navbar-expand-lg fixed-scroll hover-line-center scheme-1 primary">
            <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="{{url('https://orcasia.org')}}">
               <!-- <div class="site-title">Site Title</div> -->
               <img src="{{ URL::asset('images/ORCA Website Banner Logo PNG.png') }}" alt="ORCA" class="logo main-logo" />
               <img src="{{ URL::asset('images/ORCA Website Banner Logo PNG.png') }}" alt="ORCA" class="logo sticky-logo" />
               <img src="{{ URL::asset('images/ORCA Website Banner Logo PNG.png') }}" alt="ORCA" class="logo mobile-logo" />
               <!-- <span class="logo-after-text">SHOCK</span> -->
            </a>
            <!-- Responsive menu toggle -->
            <button class="navbar-toggler" data-bs-target="#navbar-items" data-bs-toggle="collapse" aria-expanded="false">
            <span class="navbar-toggler-icon">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
            </span>
            </button>
            <!-- Navbar links -->
            <div id="navbar-items" class="collapse navbar-collapse focus-trigger">
            <!-- Responsive search form -->
            <div class="search-bar navbar-collapse-form">
               <div class="form-area d-only-mobile d-none scheme-1">
                  <form action="{{url('search')}}" method="post" class="form-fields needs-validation" novalidate="novalidate">
                      @csrf
                     <div class="form-row row has-icon">
                        <div class="form-col mb-0 form-floating">
                           <button class="button overlay-button"><img class="overlay-image-icon"
                              src="{{ URL::asset('svg/send-outline.svg') }}" alt="Icon name" data-shock-icon="32" /></button>
                           <input id="InputSearchMobile" class="form-control focus-trigger-field" name="InputSearchMobile"
                              placeholder="Type keywords..." required="required">
                           <label for="InputSearchMobile" class="form-label">Type keywords...</label>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
            <!-- Link -->
            <ul class="navbar-nav ms-auto">
               <li class="nav-item has-megamenu hover">
                  <a class="nav-link dropdown-toggle has-icon" href="{{url('/')}}">
                  <span class="text">Home</span>
                  </a>
               </li>
               <li class="nav-item dropdown has-megamenu hover">
                  <a class="nav-link dropdown-toggle has-icon" href="#" data-bs-toggle="dropdown">
                  <span class="text">About</span><img class="image-icon dropdown-icon"
                     src="{{ URL::asset('svg/chevron-down-outline.svg') }}" alt="Icon name" data-shock-icon="32" />
                  </a>
                  <div class="dropdown-menu megamenu animate fade-down" role="menu">
                     <div class="container">
                        <div class="section-inner-expanded">
                           <div class="row">
                              <div class="col-12 col-md-6">
                                  <a href="{{url('pages/publication')}}">
                                    <div class="megamenu-item h-auto mb-0 pb-0">
                                       <h6 class="title"></h6>
                                    </div>
                                 </a>
                                 <div class="row">
                                    <div class="col-12 col-md-6">
                                       <div class="megamenu-item pt-0">
                                          <ul class="nav-list list-unstyled">
                                             <li class="nav-item">
                                                <a href="{{url('pages/about')}}" class="nav-link parent">
                                                <span class="text">About</span>
                                                </a>
                                             </li>
                                             <li class="nav-item">
                                                <a href="{{url('pages/team')}}" class="nav-link parent">
                                                <span class="text">Team</span>
                                                </a>
                                             </li>
                                             <li class="nav-item">
                                                <a href="{{url('pages/authors')}}" class="nav-link parent">
                                                <span class="text">ORCA’s Community of Scholars</span>
                                                </a>
                                             </li>
                                             <li class="nav-item">
                                                <a href="{{url('pages/onv')}}" class="nav-link parent">
                                                <span class="text">Output & Ventures</span>
                                                </a>
                                             </li>
                                             <li class="nav-item">
                                                <a href="{{url('pages/submission')}}" class="nav-link parent">
                                                <span class="text">Submission Guidelines</span>
                                                </a>
                                             </li>
                                             <li class="nav-item">
                                                <a href="{{url('pages/partners')}}" class="nav-link parent">
                                                <span class="text">Our Partners</span>
                                                </a>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                       <div class="megamenu-item pt-0">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-md-6 col-lg-6">
                                 <div class="megamenu-item has-side-image image-absolute-right">
                                    <a href="{{url('pages/team')}}" class="megamenu-image black">
                                    <img src="{{ URL::asset('images/WhatsApp Image 2023-06-19 at 11.54.21 PM.jpeg') }}" alt="Image name" class="image">
                                    
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="nav-item dropdown has-megamenu hover">
                  <a class="nav-link dropdown-toggle has-icon" href="#" data-bs-toggle="dropdown">
                  <span class="text">Publications</span><img class="image-icon dropdown-icon"
                     src="{{ URL::asset('svg/chevron-down-outline.svg') }}" alt="Icon name" data-shock-icon="32" />
                  </a>
                  <div class="dropdown-menu megamenu animate fade-down" role="menu">
                     <div class="container">
                        <div class="section-inner-expanded">
                           <div class="row">
                              <div class="col-12 col-md-6 col-lg-3">
                                 <a href="{{url('pages/publication')}}">
                                    <div class="megamenu-item h-auto mb-0 pb-0">
                                       <h6 class="title"></h6>
                                    </div>
                                 </a>
                                 <div class="row">
                                    <div class="col-12 col-md-6 col-lg-3">
                                       <div class="megamenu-item pt-0">
                                          <ul class="nav-list list-unstyled">
                                             <li class="nav-item">
                                                <a href="{{url('pages/publication')}}" class="nav-link parent">
                                                <span class="text"><strong>Overview</strong></span>
                                                </a>
                                             </li>
                                             <li class="nav-item">
                                                <a href="{{url('category/cicm')}}" class="nav-link parent">
                                                <span class="text">Conversations In Chinese Media</span>
                                                </a>
                                             </li>
                                             <li class="nav-item">
                                                <a href="{{url('category/cicm-insights')}}" class="nav-link parent">
                                                <span class="text">CiCM Insights</span>
                                                </a>
                                             </li>
                                             <li class="nav-item">
                                                <a href="{{url('category/opinion-pieces')}}" class="nav-link parent">
                                                <span class="text">Opinion Pieces</span>
                                                </a>
                                             </li>
                                             <li class="nav-item">
                                                <a href="{{url('category/expert-speak')}}" class="nav-link parent">
                                                <span class="text">Expert Speak</span>
                                                </a>
                                             </li>
                                             <li class="nav-item">
                                                <a href="{{url('category/issue-brief')}}" class="nav-link parent">
                                                <span class="text">Issue Brief</span>
                                                </a>
                                             </li>
                                             <li class="nav-item">
                                                <a href="{{url('category/backgrounders')}}" class="nav-link parent">
                                                <span class="text">Backgrounders</span>
                                                </a>
                                             </li>
                                             <li class="nav-item">
                                                <a href="{{url('category/reviewing-chinese-culture')}}" class="nav-link parent">
                                                <span class="text">Reviewing Chinese Culture </span>
                                                </a>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php $latest_articles = App\Models\Article::select('id','author_id','category','read_time','title','slug','subtitle','title_image','created_at')->whereIn('category', array('23'))->where('status', 'approved')->orderBy('created_at', 'desc')->limit(1)->get();
                                 ?>
                              @foreach($latest_articles as $article)
                              <?php $category = App\Models\Category::where('id',$article->category)->first();
                                 $author_id = unserialize($article->author_id);
                                 $author = App\Models\User::where('id', $author_id)->first()
                                 ?>
                              <div class="col-12 col-md-6 col-lg-3">
                                 <div class="megamenu-item">
                                    <!-- <a href="{{url('article/'.$article->id.'/'.$article->slug)}}" target="_blank" class="megamenu-image secondary"> -->
                                    <div class="card has-full-image vh-50 small-shadow rounded parent">
                                       <!-- Image -->
                                       <div class="image-wrapper hover-up-down">
                                          <img src="{{URL::asset('images/article/'.$article->title_image)}}" alt="Image name" class="image">
                                       </div>
                                       <!-- Body -->
                                       <div class="card-body align-v-bottom">
                                          <div class="holder">
                                             <a href="{{url('category'.$category->slug)}}" class="link">                      
                                             <span class="badge outline primary primary-hover">
                                             <span class="badge-text white-75 white-hover">{{$category->category}}</span>
                                             </span>
                                             </a>
                                             <h3 class="megamenuimg title text-style-9 white">{{$article->title}}</h3>
                                                                  <a href="#your-link" class="link">                      
                        <span class="mt-1 badge outline gray-50 secondary-hover">
                          <span class="badge-text gray white-hover">{{ $author->name }}</span>
                        </span>
                      </a>
                                             <hr class="gray-25">
                                             <!-- Metadata -->
                                             <div class="card-metadata">
                                                <!--  <div class="item">
                                                   <a href="{{url('article/'.$article->id.'/'.$article->slug)}}" class="link gray primary-hover"><i class="fa-solid fa-user icon"></i>{{$author->name}}</a>
                                                   </div> -->
                                                <div class="item">
                                                   <a href="{{url('article/'.$article->id.'/'.$article->slug)}}" class="link gray primary-hover"><i class="fa-solid fa-calendar-days icon"></i><?=date_format(date_create($article->created_at), "F j, Y")?></a>
                              
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- Overlay -->
                                       <div class="overlay black"></div>
                                       <!-- Link -->
                                       <a href="{{url('article/'.$article->id.'/'.$article->slug)}}" class="full-link"></a>
                                    </div>
                                    <!-- </a> -->
                                    <!-- <a href="{{url('article/'.$article->id.'/'.$article->slug)}}" target="_blank" class="megamenu-image secondary">
                                       <img src="{{URL::asset('images/article/'.$article->title_image)}}" alt="Image name" class="image">
                                       <span class="title">Read More</span>
                                       
                                       </a> -->
                                 </div>
                              </div>
                              @endforeach
                              <?php $latest_articles = App\Models\Article::select('id','author_id','category','read_time','title','slug','subtitle','title_image','created_at')->whereIn('category', array('26'))->where('status', 'approved')->orderBy('created_at', 'desc')->limit(1)->get();
                                 ?>
                              @foreach($latest_articles as $article)
                              <?php $category = App\Models\Category::where('id',$article->category)->first();
                                 $author_id = unserialize($article->author_id);
                                 $author = App\Models\User::where('id', $author_id)->first()
                                 ?>
                              <div class="col-12 col-md-6 col-lg-3">
                                 <div class="megamenu-item">
                                    <!-- <a href="{{url('article/'.$article->id.'/'.$article->slug)}}" target="_blank" class="megamenu-image secondary"> -->
                                    <div class="card has-full-image vh-50 small-shadow rounded parent">
                                       <!-- Image -->
                                       <div class="image-wrapper hover-up-down">
                                          <img src="{{URL::asset('images/article/'.$article->title_image)}}" alt="Image name" class="image">
                                       </div>
                                       <!-- Body -->
                                       <div class="card-body align-v-bottom">
                                          <div class="holder">
                                             <a href="{{url('category'.$category->slug)}}" class="link">                      
                                             <span class="badge outline primary primary-hover">
                                             <span class="badge-text white-75 white-hover">{{$category->category}}</span>
                                             </span>
                                             </a>
                                             <h3 class="megamenuimg title text-style-9 white">{{$article->title}}</h3>
                                                                  <a href="#your-link" class="link">                      
                        <span class="mt-1 badge outline gray-50 secondary-hover">
                          <span class="badge-text gray white-hover">{{ $author->name }}</span>
                        </span>
                      </a>
                                             <hr class="gray-25">
                                             <!-- Metadata -->
                                             <div class="card-metadata">
                                                <!--  <div class="item">
                                                   <a href="{{url('article/'.$article->id.'/'.$article->slug)}}" class="link gray primary-hover"><i class="fa-solid fa-user icon"></i>{{$author->name}}</a>
                                                   </div> -->
                                                <div class="item">
                                                   <a href="{{url('article/'.$article->id.'/'.$article->slug)}}" class="link gray primary-hover"><i class="fa-solid fa-calendar-days icon"></i><?=date_format(date_create($article->created_at), "F j, Y")?></a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- Overlay -->
                                       <div class="overlay black"></div>
                                       <!-- Link -->
                                       <a href="{{url('article/'.$article->id.'/'.$article->slug)}}" class="full-link"></a>
                                    </div>
                                    <!-- </a> -->
                                    <!-- <a href="{{url('article/'.$article->id.'/'.$article->slug)}}" target="_blank" class="megamenu-image secondary">
                                       <img src="{{URL::asset('images/article/'.$article->title_image)}}" alt="Image name" class="image">
                                       <span class="title">Read More</span>
                                       
                                       </a> -->
                                 </div>
                              </div>
                              @endforeach
                              <?php $latest_articles = App\Models\Article::select('id','author_id','category','read_time','title','slug','subtitle','title_image','created_at')->whereIn('category', array('22'))->where('status', 'approved')->orderBy('created_at', 'desc')->limit(1)->get();
                                 ?>
                              @foreach($latest_articles as $article)
                              <?php $category = App\Models\Category::where('id',$article->category)->first();
                                 $author_id = unserialize($article->author_id);
                                 $author = App\Models\User::where('id', $author_id)->first()
                                 ?>
                              <div class="col-12 col-md-6 col-lg-3">
                                 <div class="megamenu-item">
                                    <!-- <a href="{{url('article/'.$article->id.'/'.$article->slug)}}" target="_blank" class="megamenu-image secondary"> -->
                                    <div class="card has-full-image vh-50 small-shadow rounded parent">
                                       <!-- Image -->
                                       <div class="image-wrapper hover-up-down">
                                          <img src="{{URL::asset('images/article/'.$article->title_image)}}" alt="Image name" class="image">
                                       </div>
                                       <!-- Body -->
                                       <div class="card-body align-v-bottom">
                                          <div class="holder">
                                             <a href="{{url('category'.$category->slug)}}" class="link">                      
                                             <span class="badge outline primary primary-hover">
                                             <span class="badge-text white-75 white-hover">{{$category->category}}</span>
                                             </span>
                                             </a>
                                             <h3 class="megamenuimg title text-style-9 white">{{$article->title}}</h3>
                                                                  <a href="#your-link" class="link">                      
                        <span class="mt-1 badge outline gray-50 secondary-hover">
                          <span class="badge-text gray white-hover">{{ $author->name }}</span>
                        </span>
                      </a>
                                             <hr class="gray-25">
                                             <!-- Metadata -->
                                             <div class="card-metadata">
                                                <!--  <div class="item">
                                                   <a href="{{url('article/'.$article->id.'/'.$article->slug)}}" class="link gray primary-hover"><i class="fa-solid fa-user icon"></i>{{$author->name}}</a>
                                                   </div> -->
                                                <div class="item">
                                                   <a href="{{url('article/'.$article->id.'/'.$article->slug)}}" class="link gray primary-hover"><i class="fa-solid fa-calendar-days icon"></i><?=date_format(date_create($article->created_at), "F j, Y")?></a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- Overlay -->
                                       <div class="overlay black"></div>
                                       <!-- Link -->
                                       <a href="{{url('article/'.$article->id.'/'.$article->slug)}}" class="full-link"></a>
                                    </div>
                                    <!-- </a> -->
                                    <!-- <a href="{{url('article/'.$article->id.'/'.$article->slug)}}" target="_blank" class="megamenu-image secondary">
                                       <img src="{{URL::asset('images/article/'.$article->title_image)}}" alt="Image name" class="image">
                                       <span class="title">Read More</span>
                                       
                                       </a> -->
                                 </div>
                              </div>
                              @endforeach
                           </div>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="nav-item dropdown has-megamenu hover">
                  <a class="nav-link dropdown-toggle has-icon" href="#" data-bs-toggle="dropdown">
                  <span class="text">Projects</span><img class="image-icon dropdown-icon"
                     src="{{ URL::asset('svg/chevron-down-outline.svg') }}" alt="Icon name" data-shock-icon="32" />
                  </a>
                  <div class="dropdown-menu megamenu animate fade-down" role="menu">
                  <div class="container">
                  <div class="section-inner-expanded">
                     <div class="horizontal-tab scheme-1 primary">
                        <!-- Tab navigation -->
                        <ul id="elements-tab" class="nav nav-tabs js-tabs-event" role="tablist">
                           <li class="nav-item" role="presentation">
                              <button id="elements-1-tab" class="title nav-link active" aria-selected="true"
                                 aria-controls="elements-1" data-bs-target="#elements-1" data-bs-toggle="tab" role="tab">
                              Special Issues
                              </button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button id="elements-2-tab" class="title nav-link" aria-selected="false"
                                 aria-controls="elements-2" data-bs-target="#elements-2" data-bs-toggle="tab" role="tab">
                              Dashboards
                              </button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button id="elements-3-tab" class="title nav-link" aria-selected="false"
                                 aria-controls="elements-3" data-bs-target="#elements-3" data-bs-toggle="tab" role="tab">
                              Central Committee
                              </button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button id="elements-4-tab" class="title nav-link" aria-selected="false"
                                 aria-controls="elements-4" data-bs-target="#elements-4" data-bs-toggle="tab" role="tab">
                              Mapping China
                              </button>
                           </li>
                      <li class="nav-item" role="presentation">
                              <button id="elements-5-tab" class="title nav-link" aria-selected="false"
                                 aria-controls="elements-5" data-bs-target="#elements-5" data-bs-toggle="tab" role="tab">
                              Infographics
                              </button>
                           </li>
                        </ul>
                        <!-- Tab content -->
                        <div class="tab-content">
                            <div id="elements-1" class="tab-pane fade show active" role="tabpanel">
                              <div class="row g-3">
                                 <div class="col-12 col-md-6 col-lg-4">
                                    <div class="megamenu-item">
                                       <ul class="nav-list list-unstyled">
                                          <li class="nav-item">
                                             <a href="{{url('article/116/building-the-future-of-eu-india-strategic-partnership-between-trade-technology-security-and-china')}}" class="nav-link parent">
                                             <span class="text">ORCA-WICCI Special Issue 2023</span>
                                           
                                             </a>
                                          </li>
                                          <li class="nav-item">
                                             <a href="{{url('article/117/the-dalai-lamas-succession-strategic-realities-of-the-tibet-question')}}" class="nav-link parent">
                                             <span class="text">ORCA-ISDP Special Issue 2023</span>
                                             </a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                                 <?php $latest_articles = App\Models\Article::select('id','author_id','category','read_time','title','slug','title_image','created_at')->whereIn('category', array('27'))->where('status', 'approved')->orderBy('created_at', 'desc')->limit(2)->get();
                                    ?>
                                 @foreach($latest_articles as $article)
                                 <?php $category = App\Models\Category::where('id',$article->category)->first();
                                    $author_id = unserialize($article->author_id);
                                    $author = App\Models\User::where('id', $author_id)->first()
                                    ?>
                                 <div class="col-12 col-md-6 col-lg-4">
                                    <div class="megamenu-item">
                                       <div class="card has-full-image vh-30 small-shadow rounded parent">
                                          <!-- Image -->
                                          <div class="image-wrapper hover-up-down">
                                             <img src="{{URL::asset('images/article/'.$article->title_image)}}" alt="Image name" class="image">
                                          </div>
                                          <!-- Body -->
                                          <div class="card-body align-v-bottom">
                                             <div class="holder">
                                                <a href="{{url('category'.$category->slug)}}" class="link">                      
                                                <span class="badge outline primary primary-hover">
                                                <span class="badge-text white-75 white-hover">{{$category->category}}</span>
                                                </span>
                                                </a>
                                                <h3 class="megamenuimg title text-style-9 white">{{$article->title}}</h3>
                                                <hr class="gray-25">
                                                <!-- Metadata -->
                                                <div class="card-metadata">
                                                   <!--  <div class="item">
                                                      <a href="{{url('article/'.$article->id.'/'.$article->slug)}}" class="link gray primary-hover"><i class="fa-solid fa-user icon"></i>{{$author->name}}</a>
                                                      </div> -->
                                                   <div class="item">
                                                      <a href="{{url('article/'.$article->id.'/'.$article->slug)}}" class="link gray primary-hover"><i class="fa-solid fa-calendar-days icon"></i><?=date_format(date_create($article->created_at), "F j, Y")?></a>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- Overlay -->
                                          <div class="overlay black"></div>
                                          <!-- Link -->
                                          <a href="{{url('article/'.$article->id.'/'.$article->slug)}}" class="full-link"></a>
                                       </div>
                                    </div>
                                 </div>
                                 @endforeach
                              </div>
                            </div>
                            <div id="elements-2" class="tab-pane fade" role="tabpanel">
                           <div class="row g-3">
                              <div class="col-12 col-md-6 col-lg-3">
                                 <div class="megamenu-item">
                                    <ul class="nav-list list-unstyled">
                                       <li class="nav-item">
                                          <a href="{{url('pages/india-china-trade-dashboard')}}" class="nav-link parent">
                                             <span class="text">INDIA-CHINA TRADE DASHBOARD</span>
                                          </a>
                                          <div class="card has-full-image mt-05 vh-25 small-shadow rounded parent">
                                             <div class="bricklayer-column" bis_skin_checked="1">
                                               
                                                   <div class="text-wrapper text-center" bis_skin_checked="1"></div>
                                                   <div class="image-wrapper shadow rounded" bis_skin_checked="1">
                                                         <div class="overlay black-50" bis_skin_checked="1"></div>
                                                         <img src="{{URL::asset('images/jpg/dashboard1.png')}}" class="image" alt="India China Trade Dashboard">
                                                   </div>       
                                               <a href="{{url('pages/india-china-trade-dashboard')}}" class="full-link"></a>
                                             </div>
                                          </div>   
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="col-12 col-md-6 col-lg-3">
                                 <div class="megamenu-item">
                                    <ul class="nav-list list-unstyled">
                                       <li class="nav-item">
                                          <a href="{{url('pages/china-census-dashboard')}}" class="nav-link parent">
                                             <span class="text">CHINA CENSUS DASHBOARD</span>
                                          </a>
                                          <div class="card has-full-image mt-05 vh-25 small-shadow rounded parent">
                                             <div class="bricklayer-column" bis_skin_checked="1">
                                                
                                                   <div class="text-wrapper text-center" bis_skin_checked="1"></div>
                                                   <div class="image-wrapper shadow rounded" bis_skin_checked="1">
                                                         <div class="overlay black-50" bis_skin_checked="1"></div>
                                                         <img src="{{URL::asset('images/jpg/dashboard2.png')}}" class="image" alt="India China Trade Dashboard">
                                                   </div>       
                                                <a href="{{url('pages/china-census-dashboard')}}" class="full-link"></a>
                                             </div>
                                          </div>   
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="col-12 col-md-6 col-lg-3">
                                 <div class="megamenu-item">
                                    <ul class="nav-list list-unstyled">
                                       <li class="nav-item">
                                          <a href="{{url('pages/china-provinces-dashboard')}}" class="nav-link parent">
                                             <span class="text">CHINA'S PROVINCES DASHBOARD</span>
                                          </a>
                                          <div class="card has-full-image mt-05 vh-25 small-shadow rounded parent">
                                             <div class="bricklayer-column" bis_skin_checked="1">
                                                
                                                   <div class="text-wrapper text-center" bis_skin_checked="1"></div>
                                                   <div class="image-wrapper shadow rounded" bis_skin_checked="1">
                                                         <div class="overlay black-50" bis_skin_checked="1"></div>
                                                         <img src="{{URL::asset('images/jpg/dashboard3.png')}}" class="image" alt="India China Trade Dashboard">
                                                   </div>       
                                                <a href="{{url('pages/china-provinces-dashboard')}}" class="full-link"></a>
                                             </div>
                                          </div>   
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="col-12 col-md-6 col-lg-3">
                                 <div class="megamenu-item">
                                    <ul class="nav-list list-unstyled">
                                       <li class="nav-item">
                                          <a href="{{url('pages/china-public-diplomacy-dashboard')}}" class="nav-link parent">
                                             <span class="text">CHINA’S PUBLIC DIPLOMACY DASHBOARD</span>
                                          </a>
                                          <div class="card has-full-image mt-05 vh-25 small-shadow rounded parent">
                                             <div class="bricklayer-column" bis_skin_checked="1">
                                                
                                                   <div class="text-wrapper text-center" bis_skin_checked="1"></div>
                                                   <div class="image-wrapper shadow rounded" bis_skin_checked="1">
                                                         <div class="overlay black-50" bis_skin_checked="1"></div>
                                                         <img src="{{URL::asset('images/jpg/dashboard4.png')}}" class="image" alt="India China Trade Dashboard">
                                                   </div>       
                                                <a href="{{url('pages/china-public-diplomacy-dashboard')}}" class="full-link"></a>
                                             </div>
                                          </div>   
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                            <div id="elements-3" class="tab-pane fade" role="tabpanel">
                                          
                                             <div class="row g-3">
                                                <div class="col-12 col-md-6 col-lg-4">
                                                   <div class="megamenu-item">
                                                      <h6 class="title">19TH CENTRAL COMMITTEE</h6>
                                                      <ul class="nav-list list-unstyled">
                                                         <li class="nav-item">
                                                            <a href="{{url('pages/19cc/part1')}}" class="nav-link parent">
                                                            <span class="text">PART 1</span>
                                                            </a>
                                                         </li>
                                                         <li class="nav-item">
                                                            <a href="{{url('pages/19cc/part2')}}" class="nav-link parent">
                                                            <span class="text">PART 2</span>
                                                            </a>
                                                         </li>
                                                      </ul>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-4">
                                                   <div class="megamenu-item">
                                                      <h6 class="title">20TH CENTRAL COMMITTEE</h6>
                                                      <ul class="nav-list list-unstyled">
                                                         <li class="nav-item">
                                                            <a href="{{url('centralcommittee/20cc/the-prince-and-all-his-men-predicting-personnel-changes-in-the-20th-npc')}}" class="nav-link">
                                                            <span class="text">Predictions</span>
                                                            </a>
                                                         </li>
                                                         <li class="nav-item">
                                                            <a href="{{url('centralcommittee/20cc/implications-of-the-20th-party-congress-economics-politics-and-foreign-policy')}}" class="nav-link">
                                                            <span class="text">Implications:China</span>
                                                            </a>
                                                         </li>
                                                         <li class="nav-item">
                                                            <a href="{{url('pages/20cc/overview')}}" class="nav-link">
                                                            <span class="text">Overview</span>
                                                            </a>
                                                         </li>   
                                                         <li class="nav-item">
                                                            <a href="{{url('centralcommittee/20cc/chinas-20th-party-congress-and-implications-for-india')}}" class="nav-link">
                                                            <span class="text">Implications:India</span>
                                                            </a>
                                                         </li>
                                                         <li class="nav-item">
                                                            <a href="{{url('centralcommittee/20cc/at-a-glance-20th-national-party-congress')}}" class="nav-link">
                                                            <span class="text">At a Glance</span>
                                                            </a>
                                                         </li>
                                                      </ul>
                                                   </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-4">
                                                   <div class="image-wrapper shadow rounded" bis_skin_checked="1">
                                                      <div class="overlay black-50" bis_skin_checked="1"></div>
                                                      <img src="{{URL::asset('images/Popuppanel.jpeg')}}" class="image" alt="India China Trade Dashboard">
                                                   </div>
                                                </div>
                                             </div>
                                        
                                       </div>
                            <div id="elements-4" class="tab-pane fade" role="tabpanel">
                           <div class="row g-3">
                              <div class="row g-3">
                                 
                                 <?php $latest_articles = App\Models\Article::select('id','author_id','category','read_time','title','slug','title_image','created_at')->whereIn('category', array('34'))->where('status', 'approved')->orderBy('created_at', 'desc')->limit(2)->get();
                                    ?>
                                 @foreach($latest_articles as $article)
                                 <?php $category = App\Models\Category::where('id',$article->category)->first();
                                    $author_id = unserialize($article->author_id);
                                    $author = App\Models\User::where('id', $author_id)->first()
                                    ?>
                                 <div class="col-12 col-md-6 col-lg-6">
                                    <div class="megamenu-item">
                                       <div class="card has-full-image vh-30 small-shadow rounded parent">
                                          <!-- Image -->
                                          <div class="image-wrapper hover-up-down">
                                             <img src="{{URL::asset('images/article/'.$article->title_image)}}" alt="Image name" class="image">
                                          </div>
                                          <!-- Body -->
                                          <div class="card-body align-v-bottom">
                                             <div class="holder">
                                                <a href="{{url('category'.$category->slug)}}" class="link">                      
                                                <span class="badge outline primary primary-hover">
                                                <span class="badge-text white-75 white-hover">{{$category->category}}</span>
                                                </span>
                                                </a>
                                                <h3 class="megamenuimg title text-style-9 white">{{$article->title}}</h3>
                                                <hr class="gray-25">
                                                <!-- Metadata -->
                                                <div class="card-metadata">
                                                   <!--  <div class="item">
                                                      <a href="{{url('article/'.$article->id.'/'.$article->slug)}}" class="link gray primary-hover"><i class="fa-solid fa-user icon"></i>{{$author->name}}</a>
                                                      </div> -->
                                                   <div class="item">
                                                      <a href="{{url('article/'.$article->id.'/'.$article->slug)}}" class="link gray primary-hover"><i class="fa-solid fa-calendar-days icon"></i><?=date_format(date_create($article->created_at), "F j, Y")?></a>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- Overlay -->
                                          <div class="overlay black"></div>
                                          <!-- Link -->
                                          <a href="{{url('article/'.$article->id.'/'.$article->slug)}}" class="full-link"></a>
                                       </div>
                                    </div>
                                 </div>
                                 @endforeach
                              </div>
                           </div>
                        </div>
                            <div id="elements-5" class="tab-pane fade" role="tabpanel">
                           <div class="row g-3">
                               <div class="col-12 col-md-6 col-lg-4">
                                                   <div class="megamenu-item">
                                                      <h6 class="title">Infographics</h6>
                                                      <ul class="nav-list list-unstyled">
                                                         <li class="nav-item">
                                                            <a href="{{url('pages/infographics')}}" class="nav-link parent">
                                                            <span class="text">Explore all</span>
                                                            </a>
                                                         </li>
                                                        
                                                      </ul>
                                                   </div>
                                                </div>
                                   <?php $latest_articles = App\Models\Article::select('id','author_id','category','read_time','title','slug','subtitle','title_image','created_at')->whereIn('category', array('35'))->where('status', 'approved')->orderBy('created_at', 'desc')->limit(2)->get();
                            ?>
                            @foreach($latest_articles as $article)
                            <?php $category = App\Models\Category::where('id',$article->category)->first();
                            $author_id = unserialize($article->author_id);
                            $author = App\Models\User::where('id', $author_id)->first()
                            ?>
            <div class="col-12 col-md-6 col-lg-4">
              <div class="card has-image shadow parent">
                <!-- Image -->
                <div class="image-wrapper imageheighter hover-zoom">
                  <img src="{{URL::asset('images/article/'.$article->title_image)}}" alt="Image name" class="image" />
                </div>
                <!-- Body -->
                <div class="card-body bg-color white">
                                        
                      <span class="badge outline primary primary-hover">
                        <span class="badge-text black-75 white-hover">{{$category->category}}</span>
                      </span>
                   
                  <h3 class="title mt-1 text-style-11 black">{{$article->title}}</h3>
                  <p class="description black line-clamp-3">{{$article->subtitle}}</p>
                  <!-- Button -->
                  
                </div>
                <!-- Link -->
               <a href="{{url('infographics/'.$article->slug)}}" class="full-link"></a>
              </div>
            </div>
                @endforeach
                           </div>
                        </div>
                                       
                          
                        </div>
               </li>
               <li class="nav-item has-megamenu hover">
               <a class="nav-link dropdown-toggle has-icon" href="{{url('pages/orcafiles')}}">
               <span class="text">The ORCA Files</span>
               </a>
               </li>
                <li class="nav-item has-megamenu hover">
               <a class="nav-link dropdown-toggle has-icon" href="https://gcns.orcasia.org">
               <span class="text" style="color:#e41e25;">GCNS 2023</span>
               </a>
               </li>
               <li class="nav-item has-megamenu hover">
               <a class="nav-link dropdown-toggle has-icon" href="{{url('pages/events')}}">
               <span class="text">Events</span>
               </a>
               </li>
                <li class="nav-item has-megamenu hover">
               <a class="nav-link dropdown-toggle has-icon" href="{{url('pages/contact')}}">
               <span class="text">Contact</span>
               </a>
               </li>
            </ul>
            <ul class="navbar-nav navbar-icons">
            <!-- Cart icon -->
            <!-- Search icon -->
            <li class="search-bar nav-item d-only-desktop">
            <a href="#shock-search-bar" class="nav-link" rel="nofollow" data-bs-toggle="offcanvas"
               data-bs-target="#shock-search-bar" aria-controls="shock-search-bar">
            <i class="fa-solid fa-magnifying-glass icon"></i>
            </a>
            </li>
            </ul>
            <!-- Action -->
         <!--   <div class="navbar-action">
            <div class="nav-item">
            @if(Auth::check())
            @if(Auth::user()->hasRole('administrator'))
            <a href="{{url('yn-admin')}}" class="button small-button rounded primary-25 primary-hover hover-up-down">
            <span class="button-text primary white-hover">Dashboard</span>
            </a>
            @endif
            @if(Auth::user()->hasRole('author'))
            <a href="{{url('yn-author')}}" class="button small-button rounded primary-25 primary-hover hover-up-down">
            <span class="button-text primary white-hover">Dashboard</span>
            </a>
            @endif             
            @else
            <a href="{{url('login')}}" class="button small-button rounded primary-25 primary-hover hover-up-down">
            <span class="button-text primary white-hover">Login</span>
            </a>
            @endif
            </div>
            </div> -->
            </div>
            </div>
         </nav>
      </header>
      <!-- Main -->
      <main id="main" class="shock-main">
         @yield('content')
      </main>
      <!-- Scroll to Top -->
      <div class="side-widget to-right invert-color mix-blend-difference">
         <div class="item align-v-bottom">
            <a href="#" class="link hover-up">
            <span class="widget float-icon">
            <i class="fa-solid fa-arrow-up-long icon"></i>
            </span>
            </a>
         </div>
      </div>
      <!-- Search Bar Offcanvas -->
      <div id="shock-search-bar" class="search-bar offcanvas offcanvas-top scheme-1 primary" tabindex="-1" aria-hidden="true" aria-modal="true" role="dialog">
         <div class="offcanvas-dialog">
            <div class="offcanvas-content">
               <div class="megamenu w-100">
                  <div class="container">
                     <div class="section-inner-expanded fit-over-scrollbar">
                        <i class="fa-solid fa-xmark close-button black primary-hover" data-bs-dismiss="offcanvas" aria-label="Close"></i>
                        <div class="row g-3">
                           <!-- Search Tags -->
                           <div class="col-12 col-md-6">
                              <div class="megamenu-item">
                                 <h6 class="title">Popular searches</h6>
                                 <!-- Tag Cloud -->
                                    <?php
                                    
                                    use App\Models\Tag;
                                    
                                    $tags = Tag::all();
                                    
                                    echo '<div class="tag-cloud">';
                                    foreach ($tags as $tag) {
                                        echo '<a href="' . route('tag.show', ['slug' => $tag->slug]) . '" class="link">                      
                                                  <span class="badge outline gray-50 primary-hover">
                                                      <span class="badge-text gray white-hover">' . $tag->tag . '</span>
                                                  </span>
                                              </a>';
                                    }
                                    echo '</div>';
                                    ?>

                              </div>
                           </div>
                           <!-- Search Form -->
                           <div class="col-12 col-md-6">
                              <div class="megamenu-item">
                                 <h6 class="title"><mark class="animated-underline accent">What are you looking for?</mark></h6>
                                 <!-- Form -->
                                 <div class="form-area scheme-1">
                                    <form action="{{url('search')}}" method="post" class="form-fields needs-validation" novalidate="novalidate">
                                       @csrf 
                                       <div class="form-row row has-icon">
                                          <div class="form-col form-floating">
                                             <button type="submit" class="button overlay-button"><img class="overlay-image-icon" src="{{ URL::asset('svg/send-outline.svg') }}" alt="Icon name" data-shock-icon="32" /></button>
                                             <input type="search" name="s" class="form-control focus-trigger-field" placeholder="Type keywords..." required="required" autocomplete="off">
                                             <input type="hidden" name="url" value="{{url('search/ajax')}}">
                                             <input type="hidden" name="img_url" value="{{URL::asset('images/article')}}">
                                             <input type="hidden" name="article_url" value="{{url('article')}}">
                                             <label for="InputSearchNavbar" class="form-label">Type keywords...</label>
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Form -->
      <section class="shock-section has-overlay pt-5 pb-5 bg-image bg-fixed"  data-bg-image="{{ URL::asset('images/jpg/sub.jpeg') }}">
         <div class="container max-w-85">
            <div class="row">
               <div class="col-12 col-md-6 align-h-center align-v-center">
                  <!-- Intro -->
                  <div class="side-intro">
                     <h2 class="title white">
                        <span class="text-1 text-style-5">Subscribe now</span>
                        <span class="text-2 text-style-6 text-italic">to our <mark class="animated-underline primary">newsletter</mark> !</span>
                     </h2>
                     <div class="description white">
                        <p class="white">Get a daily dose of local and national news from China, top trends in Chinese social media and what it means for India and the region at large.</p>
                     </div>
                  </div>
               </div>
               <div class="col-12 col-md-6 align-h-center align-v-center">
                  <!-- Form -->
                  <div class="form-area scheme-2 primary">
                     <form method="post" action="{{url('add-subscriber')}}" class="form-fields needs-validation ajax-form" novalidate="novalidate">
                        @csrf
                        <div class="form-row row">
                           <div class="form-col form-floating col-12 col-md-6">
                              <input type="text" name="name" id="name" class="form-control" placeholder="Name" required="required">
                              <label for="InputFloatingName" class="form-label white">Name</label>
                              <div class="invalid-feedback">Please enter your name.</div>
                              <div class="valid-feedback">Looks good.</div>
                           </div>
                           <div class="form-col form-floating col-12 col-md-6">
                              <input type="email"  name="email" id="email" class="form-control" placeholder="name@example.com" required="required">
                              <label for="InputFloatingEmail" class="form-label white">Email</label>
                              <div class="invalid-feedback">Please enter a valid email address.</div>
                              <div class="valid-feedback">Looks good.</div>
                           </div>
                        </div>
                        <div class="form-row row">
                           <div class="form-col col-12">
                              <div class="form-check">
                                 <input type="checkbox" name="terms" id="InputCheckbox" class="form-check-input" required="required">
                                 <label class="form-label white form-check-label" for="InputCheckbox">
                                 I agree to the <a href="#your-link" class="link white primary-hover"><u>terms of use</u>.</a>
                                 </label>
                                 <div class="invalid-feedback">Please accept the terms to continue.</div>
                              </div>
                           </div>
                        </div>
                        <div class="form-row row">
                           <div class="form-col form-floating col-12">
                              <!-- Button -->
                              <button type="submit" class="button arrow-button next scheme-2 primary">
                              <span class="arrow">
                              <span class="item"></span>
                              <span class="item"></span>
                              </span>
                              <span class="line"></span>
                              <span class="text">SUBSCRIBE</span>
                              </button>
                           </div>
                        </div>
                        <!--
                           <span class="form-alert success">Your have subscribed successfully. Thanks.</span>
                           <span class="form-alert error">Your have subscribed successfully. Thanks.</span>
                           -->
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!-- Overlay -->
         <div class="overlay black-75"></div>
      </section>
      <!-- Footer -->
      <footer id="footer" class="shock-footer scheme-1 primary">
         <div class="footer-content focus-trigger">
            <div class="container">
               <div class="row g-3">
                  <div class="col-12 col-md-6 col-lg-3">
                     <div class="footer-item">
                        <!-- Brand -->
                        <a href="#" class="footer-brand">
                           <!-- <div class="site-title">Site Title</div> -->
                           <img src="{{ URL::asset('images/whiteORCA Website Banner Logo PNG.png') }}" alt="ORCA" class="logo main-logo" />
                        
                        </a>
                        <!-- Text -->
                        <div class="footer-text">
                           <p class="graycolor">Organisation for Research<br>on China and Asia</p>
                        </div>
                     </div>
                     <div class="footer-item">
                        <!-- Icon list -->
                        <div class="list-wrapper">
                           <ul class="icon-h-list">
                              <li class="item ms-0">
                                 <a href="https://orcasia.substack.com/" class="link gray primary-hover hover-rotate"><img class="substacksymbol" src="{{ URL::asset('svg/substack-logo.svg') }}"></a>
                              </li>
                             
                              <li class="item">
                                 <a href="https://twitter.com/ORCA_India" class="link gray primary-hover hover-rotate"><i class="icon fab fa-twitter"></i></a>
                              </li>
                              <li class="item">
                                 <a href="https://www.linkedin.com/company/orcasia/" class="link gray primary-hover hover-rotate"><i class="icon fab fa-linkedin-in"></i></a>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="footer-item">
                        <!-- Button -->
                        <div class="hover-up-down">
                           <a href="mailto:writetous.orca@gmail.com" class="button outline rounded gray primary-hover">
                           <i class="fa-solid fa-envelope button-icon left-icon gray white-hover"></i>
                           <span class="button-text gray white-hover">writetous.orca@gmail.com</span>
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-md-6 col-lg-3">
                     <div class="footer-item">
                        <h6 class="title">Quick Links</h6>
                        <!-- Links list -->
                        <ul class="nav-list list-unstyled">
                           <li class="nav-item">
                              <a href="/" class="nav-link">
                              <span class="text">Home</span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="{{url('pages/about')}}" class="nav-link">
                              <span class="text">About</span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="{{url('pages/publication')}}" class="nav-link">
                              <span class="text">Publications</span>
                              
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="{{url('pages/events')}}" class="nav-link">
                              <span class="text">Events</span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="{{url('pages/orcafiles')}}" class="nav-link">
                              <span class="text">ORCA Files</span>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-12 col-md-6 col-lg-6">
                     <div class="footer-item">
                        <a class="twitter-timeline" data-height="265" data-theme="dark"
                           href="https://twitter.com/ORCA_India?ref_src=twsrc%5Etfw">Tweets by ORCA_India</a>
                        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="bottom-bar">
            <div class="text">ORCA © 2023 - All rights reserved. Designed by <a href="https://kwad.in" class="link gray primary-hover"><u>Kwad</u></a>.</div>
         </div>
      </footer>
      <!-- Cursor -->
      <svg class="cursor-effect primary" width="220" height="220" viewBox="0 0 220 220">
         <defs>
            <filter id="cursor-effect-filter" x="-50%" y="-50%" width="200%" height="200%" filterUnits="objectBoundingBox">
               <feTurbulence type="fractalNoise" baseFrequency="0" numOctaves="1" result="warp"></feTurbulence>
               <feOffset dx="-30" result="warpOffset"></feOffset>
               <feDisplacementMap xChannelSelector="R" yChannelSelector="G" scale="20" in="SourceGraphic" in2="warpOffset"></feDisplacementMap>
            </filter>
         </defs>
         <circle class="cursor-effect-inner" cx="110" cy="110" r="20"></circle>
      </svg>
      <!-- Vendor JavaScript -->
      <script src="{{ URL::asset('js/vendor/jquery.min.js') }}"></script>
      <script src="{{ URL::asset('js/vendor/imagesloaded.pkgd.min.js') }}"></script>
      <script src="{{ URL::asset('js/vendor/preloader.min.js') }}"></script>
      <script src="{{ URL::asset('js/vendor/inview.min.js') }}"></script>
      <script src="{{ URL::asset('js/vendor/menu-engine.min.js') }}"></script>
      <script src="{{ URL::asset('js/vendor/menu-grid.min.js') }}"></script>
      <script src="{{ URL::asset('js/vendor/bootstrap.min.js') }}"></script>
      <script src="{{ URL::asset('js/vendor/swiper.min.js') }}"></script>
      <script src="{{ URL::asset('js/vendor/anime.min.js') }}"></script>
      <script src="{{ URL::asset('js/vendor/dynamic-slider.min.js') }}"></script>
      <script src="{{ URL::asset('js/vendor/shuffle.min.js') }}"></script>
      <script src="{{ URL::asset('js/vendor/stickybits.min.js') }}"></script>
      <script src="{{ URL::asset('js/vendor/bricklayer.min.js') }}"></script>
      <script src="{{ URL::asset('js/vendor/lightbox.min.js') }}"></script>
      <script src="{{ URL::asset('js/vendor/typed.min.js') }}"></script>
      <script src="{{ URL::asset('js/vendor/progressbar.min.js') }}"></script>
      <script src="{{ URL::asset('js/vendor/map-styles.min.js') }}"></script>
      <script src="{{ URL::asset('js/vendor/magnetic-effect.min.js') }}"></script>
      <script src="{{ URL::asset('js/vendor/gsap.min.js') }}"></script>
      <script src="{{ URL::asset('js/vendor/aos.min.js') }}"></script>
      <script src="{{ URL::asset('js/vendor/lax.min.js') }}"></script>
      <script src="{{ URL::asset('js/vendor/cursor-effect.min.js') }}"></script>
      <!-- Main JavaScript -->
      <script src="{{ URL::asset('js/main.js') }}"></script>
   </body>
</html>