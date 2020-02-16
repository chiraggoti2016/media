  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- Uncomment below if you prefer to use a text logo -->
         <img class="fixed-logo" src="/theme/assets/wp-content/uploads/2019/02/white-lgoo.png" width=""  alt="Allo Telecom" />
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="{{ route('locale.setlocale', $lang_code) }}" data-toggle="{{ $lang_name }}">{{ strtoupper($lang_code) }}</a></li>
          <li><a href="" >+1-844-872-8269</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
