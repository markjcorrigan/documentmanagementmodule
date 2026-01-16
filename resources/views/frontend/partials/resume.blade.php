<section class="resume-section" id="resume-section">
    <div class="container">
       <div class="row">
          <div class="col-md-6">
             <div class="section-header wow fadeInUp" data-wow-delay=".3s">
                <h2 class="section-title"><i class="flaticon-recommendation"></i> My Experience</h2>
             </div>

             @php
                 $experiences = App\Models\Resume::where('resume_cat', 'experience')->get();
                 $eductions = App\Models\Resume::where('resume_cat', 'education')->get();
             @endphp

             <div class="resume-widget">
               @unless (count($experiences) < 1)
                   @foreach ($experiences as $experience)
                     <div class="resume-item wow fadeInLeft" data-wow-delay=".4s">
                        <div class="time">{{ $experience->from_year }} - {{ $experience->to_year }}</div>
                        <h3 class="resume-title">{{ $experience->resume_title }}</h3>
                        <div class="institute">{{ $experience->institution }}</div>
                     </div>
                   @endforeach
               @else 
                  <p>No experience found!! 😌😌</p>
               @endunless
              
             </div>
          </div>

          <div class="col-md-6">
             <div class="section-header wow fadeInUp" data-wow-delay=".4s">
                <h2 class="section-title"><i class="flaticon-graduation-cap"></i> My Education</h2>
             </div>

             <div class="resume-widget">

               @unless (count($eductions) < 1)
                   @foreach ($eductions as $eduction)
                     <div class="resume-item wow fadeInLeft" data-wow-delay=".4s">
                        <div class="time">{{ $eduction->from_year }} - {{ $eduction->to_year }}</div>
                        <h3 class="resume-title">{{ $eduction->resume_title }}</h3>
                        <div class="institute">{{ $eduction->institution }}</div>
                     </div>
                   @endforeach
               @else 
                  <p>No experience found!! 😌😌</p>
               @endunless
               
             </div>
          </div>
       </div>
    </div>
 </section>