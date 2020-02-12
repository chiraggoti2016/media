                <nav class="navbar navbar-default navbar-fixed-top fullwidth fixed-menu" >
                    <div class="top-bar">
                        <div class="container">
                            <div class="type-list col-sm-4">
                                <ul class="top_bar">
                                    <li>
                                        <a href="/theme/assets/index.html">Residentiel</a>
                                    </li> | 
                                                        
                                                    
                                            
                                    <li>
                                        <a href="/theme/assets/affaires/index.html">Affaires</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="type-list col-md-offset-3 col-sm-5 pull-right">
                                <ul class="top_bar">
                                    <li>
                                        <a href="/theme/assets/tel:5147223236">(514) 722-3236</a>
                                    </li>
                                    <li>
                                        <a href="/theme/assets/tel:8555614405">Sans frais : (855) 561-4405</a>
                                    </li>
                                    <li class="menu_lang">
                                        <div class="wpml-ls-statics-footer wpml-ls wpml-ls-legacy-list-horizontal">
                                            <ul>
                                                <li class="wpml-ls-slot-footer wpml-ls-item wpml-ls-item-en wpml-ls-first-item wpml-ls-last-item wpml-ls-item-legacy-list-horizontal">
                                                    <a href="/theme/assets/en/index.html" class="wpml-ls-link">
                                                        <img class="wpml-ls-flag" src="/theme/assets/wp-content/plugins/sitepress-multilingual-cms/res/flags/en.png" alt="en" title="English">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div id="logo" class="col-sm-5">
                                <a class="logo" href="/theme/assets/index.html">
                                    <img class="fixed-logo" src="/theme/assets/wp-content/uploads/2019/02/white-lgoo.png" width=""  alt="Allo Telecom" />
                                    <img class="nav-logo" src="/theme/assets/wp-content/uploads/2019/02/black_logo.png" width=""  alt="Allo Telecom" />
                                </a>
                            </div>
                            <div class="navbar-header page-scroll col-sm-6">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <div class="mobile-cart"></div>
                            </div>
                            <div id="main-menu" class="collapse navbar-collapse  navbar-right col-sm-7">
                                <ul id="menu-main-menu" class="nav navbar-nav">
                                    @foreach(config('plantypes.list') as $plantype) 
                                      <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-456 current_page_item menu-item-3220">
                                          <a title="{{ ucwords(str_replace('_',' ',$plantype)) }}" href="{{ route('plan', $plantype) }}">{{ ucwords(str_replace('_',' ',$plantype)) }}</a>
                                      </li>
                                    @endforeach
                                </ul>
                                <a class="modal-menu-item menu-item" data-toggle="modal" data-target="#popup-modal">Contact</a>
                                <!-- WooCommerce Cart -->
                                <!-- END WooCommerce Cart -->
                            </div>
                        </div>
                    </nav>

