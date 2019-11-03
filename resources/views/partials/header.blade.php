  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- Uncomment below if you prefer to use a text logo -->
         <h1><a href="#main">Med<span>I</span>a</a></h1>
        <!-- <a href="#intro" class="scrollto"><img src="/assets/img/logo.png" alt="" title=""></a> -->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <!-- <li class="menu-active"><a href="#intro">Internet</a></li> -->
          @foreach($plan_types as $plantype) 
            <li><a href="#{{strtolower($plantype)}}">{{ ucwords($plantype) }}</a></li>
          @endforeach
          <li><a href="#whyus">Why Us</a></li>
          <li><a href="#support">Support</a></li>
          <li class="buy-tickets"><a href="#buy-tickets">Shop Online</a></li>
          <li><a href="{{ route('locale.setlocale', $lang_code) }}" data-toggle="{{ $lang_name }}">{{ strtoupper($lang_code) }}</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
