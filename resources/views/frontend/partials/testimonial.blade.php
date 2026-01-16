<section class="testimonial-section" id="testimonials-section">
    <div class="container">
       <div class="row">
          <div class="col-lg-5">
             <div class="section-header">
                <h2 class="section-title wow fadeInLeft" data-wow-delay=".3s">My Client's Stories</h2>
                <p class="wow fadeInLeft" data-wow-delay=".4s">An idea of the many services I have on offer</p>
             </div>
          </div>
          @php
              $testimonies = App\Models\Testinomial::all();
          @endphp
          <div class="col-lg-7 col-xl-6 offset-xl-1">
             <div class="testimonials-widget wow fadeInRight" data-wow-delay=".5s">
                <div class="owl-carousel testimonial-carousel">
                  @unless (count($testimonies) < 1)
                    @foreach ($testimonies as $testimony)
                        <div class="testimonial-item">
                           <div class="top-area d-flex flex-wrap justify-content-between">
                              <div class="logo-box">
                                 <h4 class="name"> {{ $testimony->name }} </h4>
                                 <span class="designation">{{ $testimony->occupation }}</span>
                              </div>
                              <div class="image-box">
                                 <img src="{{asset($testimony->photo)}}" alt="" />
                              </div>
                           </div>
                           <div class="icon-box">
                              <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path
                                    d="M0.105431 2.18998C0.0301532 0.988687 1.02531 -0.00647222 2.2266 0.0688056L19.4961 1.15097C21.2148 1.25867 22.0029 3.34358 20.7852 4.56127L4.5979 20.7486C3.3802 21.9663 1.2953 21.1781 1.1876 19.4594L0.105431 2.18998Z"
                                    fill="url(#paint0_linear_263_588)" />
                                 <defs>
                                    <linearGradient id="paint0_linear_263_588" x1="-0.0363755" y1="-0.0729998"
                                       x2="35.3333" y2="-0.0729991" gradientUnits="userSpaceOnUse">
                                       <stop offset="1" stop-color="var(--tj-theme-primary)" />
                                       <stop offset="1" stop-color="#140C1C" stop-opacity="0" />
                                    </linearGradient>
                                 </defs>
                              </svg>
                              <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path
                                    d="M0.105431 2.18998C0.0301532 0.988687 1.02531 -0.00647222 2.2266 0.0688056L19.4961 1.15097C21.2148 1.25867 22.0029 3.34358 20.7852 4.56127L4.5979 20.7486C3.3802 21.9663 1.2953 21.1781 1.1876 19.4594L0.105431 2.18998Z"
                                    fill="url(#paint0_linear_263_589)" />
                                 <defs>
                                    <linearGradient id="paint0_linear_263_589" x1="-0.0363755" y1="-0.0729998"
                                       x2="35.3333" y2="-0.0729991" gradientUnits="userSpaceOnUse">
                                       <stop offset="1" stop-color="var(--tj-theme-primary)" />
                                       <stop offset="1" stop-color="#140C1C" stop-opacity="0" />
                                    </linearGradient>
                                 </defs>
                              </svg>
                           </div>
                           <p class="quote">“{{ $testimony->testimony }}</p>

                        </div>
                    @endforeach
                  @else
                     <p>No Testimony found!! 😌😌</p>
                  @endunless


                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
