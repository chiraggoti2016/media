@extends('layouts.default')

@section('title','Home')

@section('poster')
  @include('home.slider')
@stop

@section('content')
  <div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid small-iconbox vc_custom_1548355828634 vc_row-has-fill">
    <div class="wpb_column vc_column_container vc_col-sm-12">
      <div class="vc_column-inner vc_custom_1475853057895">
        <div class="wpb_wrapper">
          <div id="expertisesection" class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1544131862840 vc_column-gap-10">
              @php $options = config('plantypes.options') @endphp
              @foreach($plans as $plan)
                @php $price = splitAmount(getPrice($plan)); @endphp
                <div class="wpb_column vc_column_container vc_col-sm-3 vc_col-has-fill">
                  <div class="vc_column-inner vc_custom_1544131467824">
                    <div class="wpb_wrapper">
                      <div class="key-icon-box icon-default icon-top  kd-animated zoomIn expertisesec" style="background-color: none;" >
                        <a href="{{ route('plan', $plan->type) }}" target="_self" title="">
                          <p class="text-center" style="color: #000000;">@if (view()->exists('svg.' . strtolower(str_replace('_','-',$plan->type)))) 
                            @include('svg.' . strtolower(str_replace('_','-',$plan->type)))
                          @endif</p>
                          @php $type_array = ['internet' => 'INTERNET' ,'tv' => 'TV','home_phone' => 'PHONE','home_security' => 'SECURITY']; @endphp
                          <h4 class="service-heading" style="color: #000000;">{{$type_array[$plan->type]}}</h4>
                        </a>
                      </div>
                      <div class="vc_empty_space"   style="height: 32px" >
                        <span class="vc_empty_space_inner"></span>
                      </div>
                      <a  href="{{ route('plan', $plan->type) }}" target="_self" title="Forfaits internet" class="tt_button    " >
                        <span class=" iconita"></span>
                        <span class="prim_text">Détails</span>
                      </a>
                    </div>
                  </div>
                </div>
              @endforeach  
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="vc_row-full-width vc_clearfix"></div>
  <div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid counter__section vc_custom_1549783141325 vc_row-has-fill">
      <div class="counter__single wpb_column vc_column_container vc_col-sm-12">
          <div class="vc_column-inner">
              <div class="wpb_wrapper">
                  <div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1548860449373">
                      <div class="wpb_column vc_column_container vc_col-sm-12">
                          <div class="vc_column-inner">
                              <div class="wpb_wrapper">
                                  <div class="wpb_text_column wpb_content_element " >
                                      <div class="wpb_wrapper">
                                          <h2 class="service-heading" style="text-align: center;">Avis récents sur Google</h2>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="vc_row wpb_row vc_inner vc_row-fluid">
                      <div class="wpb_column vc_column_container vc_col-sm-1/5">
                          <div class="vc_column-inner">
                              <div class="wpb_wrapper">
                                  <div class="key-reviews kd-animated fadeInLeft homepage_google_review"  data-animation-delay=200>
                                      <div class="rw_header">
                                          <div class="rw-authorimg"></div>
                                          <div class="rw-author-details">
                                              <h4 >Babacar Diop</h4>
                                              <p style="color: #ffffff;"></p>
                                          </div>
                                      </div>
                                      <div class="rw_message" >Excellent service internet, excellent service a la clientèle.</div>
                                      <div class="rw_rating">
                                          <span class="fa fa-star" style="color: #dd8501;"></span>
                                          <span class="fa fa-star" style="color: #dd8501;"></span>
                                          <span class="fa fa-star" style="color: #dd8501;"></span>
                                          <span class="fa fa-star" style="color: #dd8501;"></span>
                                          <span class="fa fa-star" style="color: #dd8501;"></span>
                                          <p class="rw-title" ></p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="wpb_column vc_column_container vc_col-sm-1/5">
                          <div class="vc_column-inner">
                              <div class="wpb_wrapper">
                                  <div class="key-reviews kd-animated fadeInLeft homepage_google_review"  data-animation-delay=200>
                                      <div class="rw_header">
                                          <div class="rw-authorimg"></div>
                                          <div class="rw-author-details">
                                              <h4 >Mildred Michaud</h4>
                                              <p style="color: #ffffff;"></p>
                                          </div>
                                      </div>
                                      <div class="rw_message" >Excellent service avec Allo Telecom depuis 2 ans. très satisfaite surtout pour le service après vente. merci.</div>
                                      <div class="rw_rating">
                                          <span class="fa fa-star" style="color: #dd8501;"></span>
                                          <span class="fa fa-star" style="color: #dd8501;"></span>
                                          <span class="fa fa-star" style="color: #dd8501;"></span>
                                          <span class="fa fa-star" style="color: #dd8501;"></span>
                                          <span class="fa fa-star" style="color: #dd8501;"></span>
                                          <p class="rw-title" ></p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="wpb_column vc_column_container vc_col-sm-1/5">
                          <div class="vc_column-inner">
                              <div class="wpb_wrapper">
                                  <div class="key-reviews kd-animated fadeInLeft homepage_google_review"  data-animation-delay=200>
                                      <div class="rw_header">
                                          <div class="rw-authorimg"></div>
                                          <div class="rw-author-details">
                                              <h4 >Mathieu Langlois</h4>
                                              <p style="color: #ffffff;"></p>
                                          </div>
                                      </div>
                                      <div class="rw_message" >Excellent service fiable et rapide les numéro 1 selon moi je recommande .</div>
                                      <div class="rw_rating">
                                          <span class="fa fa-star" style="color: #dd8501;"></span>
                                          <span class="fa fa-star" style="color: #dd8501;"></span>
                                          <span class="fa fa-star" style="color: #dd8501;"></span>
                                          <span class="fa fa-star" style="color: #dd8501;"></span>
                                          <span class="fa fa-star" style="color: #dd8501;"></span>
                                          <p class="rw-title" style="color: #0130b8;"></p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="wpb_column vc_column_container vc_col-sm-1/5">
                          <div class="vc_column-inner">
                              <div class="wpb_wrapper">
                                  <div class="key-reviews kd-animated fadeInLeft homepage_google_review"  data-animation-delay=200>
                                      <div class="rw_header">
                                          <div class="rw-authorimg"></div>
                                          <div class="rw-author-details">
                                              <h4 >Julie Leclerc</h4>
                                              <p style="color: #ffffff;"></p>
                                          </div>
                                      </div>
                                      <div class="rw_message" >Heureux d'avoir choisi cette compagnie.le service est impeccable,et le prix toujours le même depuis plus de 2 ans.</div>
                                      <div class="rw_rating">
                                          <span class="fa fa-star" style="color: #dd8501;"></span>
                                          <span class="fa fa-star" style="color: #dd8501;"></span>
                                          <span class="fa fa-star" style="color: #dd8501;"></span>
                                          <span class="fa fa-star" style="color: #dd8501;"></span>
                                          <span class="fa fa-star" style="color: #dd8501;"></span>
                                          <p class="rw-title" style="color: #0130b8;"></p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="wpb_column vc_column_container vc_col-sm-1/5">
                          <div class="vc_column-inner">
                              <div class="wpb_wrapper">
                                  <div class="key-reviews kd-animated fadeInLeft homepage_google_review"  data-animation-delay=200>
                                      <div class="rw_header">
                                          <div class="rw-authorimg"></div>
                                          <div class="rw-author-details">
                                              <h4 >Boyer Jacques</h4>
                                              <p style="color: #ffffff;"></p>
                                          </div>
                                      </div>
                                      <div class="rw_message" >J'ai le service Internet et téléphone avec ce fournisseur Allo Telecom, depuis 2015, jamais eu de problèmes,ils ont jamais augmenté le prix,mieux que ça ils ont augmenté ma vitesse sans frais. Et les filles au service à la clientèle sont super sympas.Bravo</div>
                                      <div class="rw_rating">
                                          <span class="fa fa-star" style="color: #dd8501;"></span>
                                          <span class="fa fa-star" style="color: #dd8501;"></span>
                                          <span class="fa fa-star" style="color: #dd8501;"></span>
                                          <span class="fa fa-star" style="color: #dd8501;"></span>
                                          <span class="fa fa-star" style="color: #dd8501;"></span>
                                          <p class="rw-title" style="color: #0130b8;"></p>
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
  <div class="vc_row-full-width vc_clearfix"></div>
  <div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid counter__section vc_custom_1550879742197 vc_row-has-fill">
      <div class="counter__single wpb_column vc_column_container vc_col-sm-12">
          <div class="vc_column-inner">
              <div class="wpb_wrapper">
                  <div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1548860449373">
                      <div class="wpb_column vc_column_container vc_col-sm-12">
                          <div class="vc_column-inner">
                              <div class="wpb_wrapper">
                                  <div class="wpb_text_column wpb_content_element " >
                                      <div class="wpb_wrapper">
                                          <h3 class="service-heading" style="text-align: center; color: #fff; border-bottom: 1px solid #666; padding-bottom: 40px; width: 80%; margin: 0 auto;">ALLO EN CHIFFRES</h3>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="vc_row wpb_row vc_inner vc_row-fluid">
                      <div class="border_right wpb_column vc_column_container vc_col-sm-3">
                          <div class="vc_column-inner">
                              <div class="wpb_wrapper">
                                  <script type="text/javascript">
                                      jQuery(document).ready(function() {
                                          jQuery(function($) {
                                              $(".kd-counterelem-5e3d9047de750").appear(function() {
                                                  $(this).countTo();
                                              });
                                          });
                                      });
                                  </script>
                                  <div class="kd_counter  kd-animated fadeInLeft" data-animation-delay=200>
                                      <div class="kd_counter_content">
                                          <div class="kd_counter_icon">
                                              <div class="kd-counter-icon">
                                                  <i class="fa fa-thumbs-o-up fa"></i>
                                              </div>
                                          </div>
                                          <h4 class="kd_counter_number">
                                              <span class="kd_number_string kd-counterelem-5e3d9047de750"  data-from="0" data-to="21" data-refresh-interval="50">0</span>
                                              <span class="kd_counter_units" >ANNÉES EN AFFAIRE</span>
                                          </h4>
                                          <div class="kd_counter_text" ></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="border_right wpb_column vc_column_container vc_col-sm-3">
                          <div class="vc_column-inner">
                              <div class="wpb_wrapper">
                                  <script type="text/javascript">
                                      jQuery(document).ready(function() {
                                          jQuery(function($) {
                                              $(".kd-counterelem-5e3d9047df65f").appear(function() {
                                                  $(this).countTo();
                                              });
                                          });
                                      });
                                  </script>
                                  <div class="kd_counter  kd-animated fadeInUp" data-animation-delay=200>
                                      <div class="kd_counter_content">
                                          <div class="kd_counter_icon">
                                              <div class="kd-counter-icon">
                                                  <i class="fa fa-users fa"></i>
                                              </div>
                                          </div>
                                          <h4 class="kd_counter_number">
                                              <span class="kd_number_string kd-counterelem-5e3d9047df65f"  data-from="0" data-to="+27000" data-refresh-interval="50">0</span>
                                              <span class="kd_counter_units" >CLIENTS SATISFAITS</span>
                                          </h4>
                                          <div class="kd_counter_text" ></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="border_right wpb_column vc_column_container vc_col-sm-3">
                          <div class="vc_column-inner">
                              <div class="wpb_wrapper">
                                  <script type="text/javascript">
                                      jQuery(document).ready(function() {
                                          jQuery(function($) {
                                              $(".kd-counterelem-5e3d9047e34b3").appear(function() {
                                                  $(this).countTo();
                                              });
                                          });
                                      });
                                  </script>
                                  <div class="kd_counter  kd-animated fadeInUp" data-animation-delay=200>
                                      <div class="kd_counter_content">
                                          <div class="kd_counter_icon">
                                              <div class="kd-counter-icon">
                                                  <i class="fa fa-globe fa"></i>
                                              </div>
                                          </div>
                                          <h4 class="kd_counter_number">
                                              <span class="kd_number_string kd-counterelem-5e3d9047e34b3"  data-from="0" data-to="4" data-refresh-interval="50">0</span>
                                              <span class="kd_counter_units" >PROVINCES</span>
                                          </h4>
                                          <div class="kd_counter_text" ></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="wpb_column vc_column_container vc_col-sm-3">
                          <div class="vc_column-inner">
                              <div class="wpb_wrapper">
                                  <script type="text/javascript">
                                      jQuery(document).ready(function() {
                                          jQuery(function($) {
                                              $(".kd-counterelem-5e3d9047e3cb3").appear(function() {
                                                  $(this).countTo();
                                              });
                                          });
                                      });
                                  </script>
                                  <div class="kd_counter  kd-animated fadeInLeft" data-animation-delay=200>
                                      <div class="kd_counter_content">
                                          <div class="kd_counter_icon">
                                              <div class="kd-counter-icon">
                                                  <i class="fa fa-user-plus fa"></i>
                                              </div>
                                          </div>
                                          <h4 class="kd_counter_number">
                                              <span class="kd_number_string kd-counterelem-5e3d9047e3cb3"  data-from="0" data-to="98" data-refresh-interval="50">0</span>
                                              <span class="kd_counter_units" >TAUX DE SATISFACTION</span>
                                          </h4>
                                          <div class="kd_counter_text" ></div>
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
  <div class="vc_row-full-width vc_clearfix"></div>
  <div id="charts" data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_custom_1549372711816 vc_row-has-fill">
      <div class="wpb_column vc_column_container vc_col-sm-6">
          <div class="vc_column-inner">
              <div class="wpb_wrapper">
                  <div  class="wpb_single_image wpb_content_element vc_align_left  vc_custom_1548862130790">
                      <figure class="wpb_wrapper vc_figure">
                          <div class="vc_single_image-wrapper   vc_box_border_grey">
                              <img width="634" height="349" src="/theme/assets/wp-content/uploads/2019/01/villes-disponibles.jpg" class="vc_single_image-img attachment-full" alt="" srcset="http://allotelecom.ca/wp-content/uploads/2019/01/villes-disponibles.jpg 634w, http://allotelecom.ca/wp-content/uploads/2019/01/villes-disponibles-300x165.jpg 300w" sizes="(max-width: 634px) 100vw, 634px" />
                          </div>
                      </figure>
                  </div>
              </div>
          </div>
      </div>
      <div class="wpb_column vc_column_container vc_col-sm-5">
          <div class="vc_column-inner">
              <div class="wpb_wrapper">
                  <h4 style="color: #aaaaaa;text-align: left" class="vc_custom_heading chart_heading wpb_animate_when_almost_visible wpb_fadeInDown fadeInDown" >95%</h4>
                  <div class="wpb_text_column wpb_content_element  wpb_animate_when_almost_visible wpb_fadeInDown fadeInDown" >
                      <div class="wpb_wrapper">
                          <p>Allo Telecom, fournisseur internet, est disponible dans la plupart des villes Du Quebec.Nous sommes disponibles à Montréal, Quebec,Sherbrooke, Gatineau,Longueuil, Laval,Chicoutimi,et presque partout au Quebec.</p>
                      </div>
                  </div>
                  <h4 style="color: #aaaaaa;text-align: left" class="vc_custom_heading chart_heading wpb_animate_when_almost_visible wpb_fadeInDown fadeInDown" >85%</h4>
                  <div class="wpb_text_column wpb_content_element  wpb_animate_when_almost_visible wpb_fadeInDown fadeInDown" >
                      <div class="wpb_wrapper">
                          <p>Allo Telecom, fournisseur internet, est aussi disponible dans la plupart des villes en Ontario (Toronto,Ottawa,Windsor,et d&rsquo;autres villes.</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="vc_row-full-width vc_clearfix"></div>
  <div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_custom_1552513929476 vc_row-has-fill">
      <div class="wpb_column vc_column_container vc_col-sm-12">
          <div class="vc_column-inner">
              <div class="wpb_wrapper">
                  <div class="wpb_text_column wpb_content_element  wpb_animate_when_almost_visible wpb_fadeInLeft fadeInLeft" >
                      <div class="wpb_wrapper">
                          <h3 class="service-heading" style="color: #ffffff; text-align: center;">Contactez-nous</h3>
                      </div>
                  </div>
                  <div class="vc_row wpb_row vc_inner vc_row-fluid">
                      <div class="wpb_column vc_column_container vc_col-sm-12">
                          <div class="vc_column-inner">
                              <div class="wpb_wrapper">
                                  <div class="wpb_text_column wpb_content_element  wpb_animate_when_almost_visible wpb_fadeInLeft fadeInLeft" >
                                      <div class="wpb_wrapper">
                                          <p style="color: #ffffff; text-align: center;">Changer de fournisseur Internet est plus facile que vous ne le pensez.</p>
                                          <p style="color: #ffffff; text-align: center;">Commencez à économiser maintenant!</p>
                                      </div>
                                  </div>
                                  <div role="form" class="wpcf7" id="wpcf7-f3273-p456-o1" lang="en-CA" dir="ltr">
                                      <div class="screen-reader-response"></div>
                                      <form action="http://allotelecom.ca/#wpcf7-f3273-p456-o1" method="post" class="wpcf7-form" novalidate="novalidate">
                                          <div style="display: none;">
                                              <input type="hidden" name="_wpcf7" value="3273" />
                                              <input type="hidden" name="_wpcf7_version" value="5.1.3" />
                                              <input type="hidden" name="_wpcf7_locale" value="en_CA" />
                                              <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f3273-p456-o1" />
                                              <input type="hidden" name="_wpcf7_container_post" value="456" />
                                          </div>
                                          <div class="col-sm-3">
                                              <span class="wpcf7-form-control-wrap text-42">
                                                  <input type="text" name="text-42" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Nom" />
                                              </span>
                                          </div>
                                          <div class="col-sm-3">
                                              <span class="wpcf7-form-control-wrap email-625">
                                                  <input type="email" name="email-625" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Courriel" />
                                              </span>
                                          </div>
                                          <div class="col-sm-3">
                                              <span class="wpcf7-form-control-wrap tel-286">
                                                  <input type="tel" name="tel-286" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel" aria-required="true" aria-invalid="false" placeholder="Téléphone" />
                                              </span>
                                          </div>
                                          <div class="col-sm-3">
                                              <span class="wpcf7-form-control-wrap menu-707">
                                                  <textarea name="menu-707" cols="10" rows="2" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Message"></textarea>
                                              </span>
                                          </div>
                                          <div class="col-sm-12" style="margin-top: 30px;">
                                              <input type="submit" value="Envoyer" class="wpcf7-form-control wpcf7-submit" />
                                          </div>
                                          <div class="wpcf7-response-output wpcf7-display-none"></div>
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
  <div class="vc_row-full-width vc_clearfix"></div>
  <div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid small-iconbox vc_custom_1548357049229 vc_row-has-fill">
      <div class="wpb_column vc_column_container vc_col-sm-12">
          <div class="vc_column-inner vc_custom_1475853057895">
              <div class="wpb_wrapper">
                  <div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1475852312576">
                      <div class="wpb_column vc_column_container vc_col-sm-4 vc_col-has-fill">
                          <div class="vc_column-inner vc_custom_1475853091335">
                              <div class="wpb_wrapper">
                                  <div  class="wpb_single_image wpb_content_element vc_align_center  wpb_animate_when_almost_visible wpb_fadeIn fadeIn">
                                      <figure class="wpb_wrapper vc_figure">
                                          <div class="vc_single_image-wrapper   vc_box_border_grey">
                                              <img width="60" height="60" src="/theme/assets/wp-content/uploads/2019/01/startup-mail1-1.png" class="vc_single_image-img attachment-medium" alt="" />
                                          </div>
                                      </figure>
                                  </div>
                                  <h4 style="font-size: 18px;color: #333333;text-align: center;font-family:Open Sans;font-weight:600;font-style:normal" class="vc_custom_heading wpb_animate_when_almost_visible wpb_fadeIn fadeIn" >Nos Bureaux</h4>
                                  <div class="wpb_text_column wpb_content_element  wpb_animate_when_almost_visible wpb_fadeIn fadeIn" >
                                      <div class="wpb_wrapper">
                                          <p style="text-align: center;">6400 Boulevard Taschereau, Suite 225</p>
                                          <p style="text-align: center;">Brossard, J4W 3J2</p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="wpb_column vc_column_container vc_col-sm-4 vc_col-has-fill">
                          <div class="vc_column-inner vc_custom_1475853286062">
                              <div class="wpb_wrapper">
                                  <div  class="wpb_single_image wpb_content_element vc_align_center  wpb_animate_when_almost_visible wpb_fadeIn fadeIn">
                                      <figure class="wpb_wrapper vc_figure">
                                          <div class="vc_single_image-wrapper   vc_box_border_grey">
                                              <img width="60" height="60" src="/theme/assets/wp-content/uploads/2019/01/startup-mail1-1.png" class="vc_single_image-img attachment-medium" alt="" />
                                          </div>
                                      </figure>
                                  </div>
                                  <h4 style="font-size: 18px;color: #333333;text-align: center;font-family:Open Sans;font-weight:600;font-style:normal" class="vc_custom_heading wpb_animate_when_almost_visible wpb_fadeIn fadeIn" >Courriel</h4>
                                  <div class="wpb_text_column wpb_content_element  wpb_animate_when_almost_visible wpb_fadeIn fadeIn" >
                                      <div class="wpb_wrapper">
                                          <p style="text-align: center;">
                                              <a style="color: #666;" href="/theme/assets/mailto:sac@allotelecom.ca">sac@allotelecom.ca</a>
                                          </p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="wpb_column vc_column_container vc_col-sm-4">
                          <div class="vc_column-inner vc_custom_1544530708106">
                              <div class="wpb_wrapper">
                                  <div  class="wpb_single_image wpb_content_element vc_align_center  wpb_animate_when_almost_visible wpb_fadeIn fadeIn">
                                      <figure class="wpb_wrapper vc_figure">
                                          <div class="vc_single_image-wrapper   vc_box_border_grey">
                                              <img width="60" height="60" src="/theme/assets/wp-content/uploads/2019/01/startup-phone1-1.png" class="vc_single_image-img attachment-medium" alt="" />
                                          </div>
                                      </figure>
                                  </div>
                                  <h4 style="font-size: 18px;color: #333333;text-align: center;font-family:Open Sans;font-weight:600;font-style:normal" class="vc_custom_heading wpb_animate_when_almost_visible wpb_fadeIn fadeIn" >Téléphone</h4>
                                  <div class="wpb_text_column wpb_content_element  wpb_animate_when_almost_visible wpb_fadeIn fadeIn" >
                                      <div class="wpb_wrapper">
                                          <p style="text-align: center;">
                                              <a style="color: #666;" href="/theme/assets/tel:5147223236">(514) 722-3236</a>
                                          </p>
                                          <p style="text-align: center;">Sans frais   
                                                                  
                                                              
                                                      
                                              <a href="/theme/assets/tel:8445614405">(855) 561-4405</a>
                                          </p>
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
  <div class="vc_row-full-width vc_clearfix"></div>
@stop

@push('js')
@endpush