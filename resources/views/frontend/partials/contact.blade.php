<section class="contact-section" id="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-7 order-2 order-md-1">
                <div class="contact-form-box wow fadeInLeft" data-wow-delay=".3s">
                    <div class="section-header">
                        <h2 class="section-title">Let's work together!</h2>
                        <p>Contact me</p>
                    </div>

                    <div class="tj-contact-form">
                        <form method="POST" action="{{ route('store.contact.message') }}">
                            @csrf
                            <div class="row gx-3">
                                <div class="col-sm-6">
                                    <div class="form_group">
                                        <input type="text" name="fname" id="conName" placeholder="First name" autocomplete="off" required />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form_group">
                                        <input type="text" name="lname" id="conLName" placeholder="Last name" autocomplete="off" required />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form_group">
                                        <input type="email" name="email" id="conEmail" placeholder="Email address" autocomplete="off" required />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form_group">
                                        <input type="tel" name="phone" id="conPhone" placeholder="Phone number" autocomplete="off" required />
                                    </div>
                                </div>

                                @php
                                    $services = App\Models\Service::all();
                                @endphp

                                <div class="col-12">
                                    <div class="form_group">
                                        <label style="color: #fff; margin-bottom: 10px; font-weight: 500;">Select Services (choose one or more):</label>
                                        <div style="max-height: 200px; overflow-y: auto; border: 1px solid #333; padding: 15px; border-radius: 5px; background: rgba(255,255,255,0.05);">
                                            @foreach ($services as $service)
                                                <div style="margin-bottom: 8px;">
                                                    <label style="display: flex; align-items: center; cursor: pointer; color: #fff;">
                                                        <input type="checkbox" name="services[]" value="{{ $service->id }}" style="margin-right: 10px; width: 18px; height: 18px; cursor: pointer;">
                                                        <span>{{ Str::title($service->service_title) }}</span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form_group">
                                        <textarea name="description" id="conMessage" placeholder="Description" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form_btn">
                                        <button type="submit" class="btn tj-btn-primary">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @php
                $siteSettings = App\Models\SiteSettings::findOrFail(1);
            @endphp

            <div class="col-lg-5 offset-lg-1 col-md-5 d-flex flex-wrap align-items-center order-1 order-md-2">
                <div class="contact-info-list">
                    <p>Note that you do not need to select a service from the list in the contact form if you do not want to.  As I am an Agile Expert, to keep things sweet and simple, just reach out to me via the form with a short requirements message and I will respond to you within 48 hours.  <br><br>Even the User Story format below is perfect: </p>
                    <p>
    <span class="handwriting" style="font-size: 1.4em; font-style: italic; color: #2c5aa0; display: block; margin: 15px 0; line-height: 1.6;">
        As a &lt; type of user &gt;, I want &lt; some goal &gt; so that &lt; some reason &gt;. 😊
    </span>
                    </p>

{{--                    <ul class="ul-reset">--}}
{{--                        <li class="d-flex flex-wrap align-items-center position-relative wow fadeInRight" data-wow-delay=".4s">--}}
{{--                            <div class="icon-box">--}}
{{--                                <i class="flaticon-phone-call"></i>--}}
{{--                            </div>--}}
{{--                            <div class="text-box">--}}
{{--                                <p>Phone</p>--}}
{{--                                <a href="tel:{{$siteSettings->phone}}">{{$siteSettings->phone}}</a>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="d-flex flex-wrap align-items-center position-relative wow fadeInRight" data-wow-delay=".5s">--}}
{{--                            <div class="icon-box">--}}
{{--                                <i class="flaticon-mail-inbox-app"></i>--}}
{{--                            </div>--}}
{{--                            <div class="text-box">--}}
{{--                                <p>Email</p>--}}
{{--                                <a href="mailto:{{$siteSettings->email}}">{{$siteSettings->email}}</a>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="d-flex flex-wrap align-items-center position-relative wow fadeInRight" data-wow-delay=".6s">--}}
{{--                            <div class="icon-box">--}}
{{--                                <i class="flaticon-location"></i>--}}
{{--                            </div>--}}
{{--                            <div class="text-box">--}}
{{--                                <p>Address</p>--}}
{{--                                <a href="#">{!! Str::wordWrap($siteSettings->address, 24, '<br />') !!}</a>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
                </div>
            </div>
        </div>
    </div>
</section>