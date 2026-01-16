@extends('frontend.legacy_master')
@section('title', 'ITIL Four Practices')
@section('content')

<style>
  /* Make the image fully responsive */



  .carousel-indicators {
    position: absolute;
    bottom: -35px;
  }

  .carousel-indicators li {
    width: 10px;
    height: 10px;
    border-radius: 100%;
    background-color: #040404;
  }

  .navbar {
    position: relative;
    width: 100%;
    z-index: 10;
    max-width: 100%;
  }

  /*carousel indicators */
  .carousel-indicators li,
    {
    background: #f00 none repeat scroll 0 0;
    border: 0 none;
    border-radius: 50%;
    height: 30px;
    margin: 3px;
    opacity: 0.5;
    width: 30px;
  }

  /*active slide indicator */
  .carousel-indicators .active {
    background: #fff none repeat scroll 0 0;
    border: 4px solid #040404;
  }


</style>


<div class="container" align="left">
<h3 align="left">Information Technology Infrastructure Library
  (ITIL) Four:&nbsp;Management Practices</h3>
<hr>

<div align="center">
  <button class="btn btn-primary align-center clearfix" type="button" data-toggle=
"collapse" data-target="#collapsepractices" aria-expanded="false" aria-controls=
        "collapsepractices">Click here for a quick overview of how the Practices fit in; <br>
  in order to make them work for you.<br>
  <h5 align="center"> Process Focus<br>
    <img class="img-fluid" width="150px" src="{{ asset('storage/images/unlock.svg') }}" title="a focus on processes is the only sure way to escape Capability Maturity Level 1 and below, in order to increase Productivity an Quality at CM L2 and above."> <br>
    Productivity & Quality</h5>
  <p>Practices are processes practised</p>
  </button>
  <div class="collapse" id="collapsepractices">
    <div class="container">
      <div class="card text-center">
        <h5 class="card-header" align="center"></h5>
        <div class="card-body text-center">

          <div align="left">
            <p>The 34 ITIL 4 Practices:</p>

            <p align="center"><img alt="ITIL Books" class="img-fluid" src="{{ asset('storage/images/itilfourpractices.png') }}"></p>
                                     <br>
            <h3>ITSM in the modern world: high-velocity service delivery</h3>
            <p>In business innovation and differentiation, speed to market is a key success factor. If an organization takes too long to implement a new business idea, it is likely to be done faster by someone else. Because of this, organizations have started demanding shorter time to market from their IT service providers.</p>
            <p>For service providers that have always used modern technology, this has not been a big challenge. They have adopted modern ways of scaling their resources and established appropriate practices for project and product management, testing, integration, deployment, release, delivery, and support of IT services. These practices have been documented and have triggered the development of new IT management movements and practices, such as DevOps. However, for organizations bearing a legacy of old IT architectures and IT management practices focused on control and cost efficiency, the new business demand has introduced a greater challenge.</p>
            <p>The high-velocity service delivery paradigm includes:</p>
            <ul>
              <li>focus on fast delivery of new and changed IT services to users</li>
              <li>continual analysis of feedback provided for IT services at every stage of their lifecycle</li>
              <li>agility in processing the feedback, giving rise to continual and fast improvement of IT services</li>
              <li>an end-to-end approach to the service lifecycle, from ideation, through creation and delivery, to consumption of services</li>
              <li>integration of product and service management practices</li>
              <li>digitalization of IT infrastructure and adoption of cloud computing</li>
              <li>extensive automation of the service delivery chain.</li>
            </ul>
            <p>High-velocity service delivery influences all the practices of a service provider, including general management practices, service management practices, and technical management practices. For example, an organization aiming to deliver and improve its services faster than others needs to consider:</p>
            <ul>
              <li>Agile financial management.</li>
              <li>product-based organizational structure</li>
              <li>adaptive risk management, and audit and compliance management</li>
              <li>flexible architecture management</li>
              <li>specific architecture technology solutions, such as microservices</li>
              <li>complex partner and supplier environments</li>
              <li>continual monitoring of technology innovations and experimenting</li>
              <li>human-centred design</li>
              <li>infrastructure management focused on cloud computing.</li>
            </ul>
            <p>Even if only some of the services in a provider's portfolio need high-velocity delivery, organizational changes of a significant scale are required to enable this, especially if the organization has a legacy of low-velocity services, practices, and habits. Moreover, bi-modal IT, where high-velocity service management is combined with traditional practices, introduces even more complexity and greater challenges. <b>However, for many modern organizations, high-velocity service delivery is no longer an option but a necessity, and they must improve their service management practices to respond to this challenge</b>.</p>
            <br>
            <p align="center"><img alt="" class="img-fluid" src="{{ asset('storage/images/itilfour/svs.jpg') }}" ></p>
            <p align="center"><img alt="" class="img-fluid" src="{{ asset('storage/images/itilvaluestreams.png') }}" ></p>
            <p>The ITIL service value system (SVS) includes 14 general management practices, 17 service management practices, and three technical management practices, all of which are subject to the four dimensions of service management.</p>
            <p align="center"> <img alt="" class="img-fluid" src="{{ asset('storage/images/4_dimensions_2.png') }}" ></p>
            <h3>Key message</h3>
            <p>In ITIL, a management practice is a set of organizational resources designed for performing work or accomplishing an objective. The origins of the practices are as follows:</p>
            <ul>
              <li>General management practices have been adopted and adapted for service management from general business management domains.</li>
              <li>Service management practices have been developed in service management and ITSM industries.</li>
              <li>Technical management practices have been adapted from technology management domains for service management purposes by expanding or shifting their focus from technology solutions to IT services.</li>
            </ul>
            <br>

            <h1>Phew! Sounds great!  But, how do we start to pin all of this down!?</h1>
            <p>Rest assured.  Training, Certifications and the ITIL manuals aside.<br>Everything you need to grasp, fully understand and pin down ITIL 4 in your organization can be found below.<p>
            <p align="center"><img alt="" class="img-fluid" src="{{ asset('storage/images/itilfour/gp.jpg') }}" ></p>
            <div align="center">
              <button class="btn btn-primary align-center clearfix" type="button" data-toggle=
"collapse" data-target="#collapseelephant" aria-expanded="false" aria-controls=
        "collapseelephant">How to install ITIL 4 practices<br>
              "a picture speaks a 1000 words!" </button>
              <div class="collapse" id="collapseelephant">
                <div class="container">
                  <div class="card text-center">
                    <h5 class="card-header" align="center"></h5>
                    <div class="card-body text-center">
                      <p><a href="/view-pdf/itilpracticeswheretostart.pdf" >Click here for an article from PeopleCert that points to the starting point to implement ITIL Practices within your Organization.</a></p>
                      <br>
                      <p align="center"><img alt="" class="img-fluid" src="{{ asset('storage/images/elephant_one_bite.png') }}" ></p>
                      <br>
                      <h5>Top 3 ideas:</h5>
                      <ul>
                        <li>
                          <p align="left">Suggest that value streams need to be clearly defined (this is the service portfolio focusing on optimizing the service catalogue).<br>
                            Remember that value streams have a lifecycle per the image below<br>
                            <img class="img-fluid" src="{{ asset('storage/images/serviceportfolio.jpg') }}"></p>
                        </li>
                        <li>
                          <p align="left">Then (starting where you are) take a practice from the list of 34 and bite into it to up its game as it applies to optimizing the value stream.<br>
                            Possibly a practice can be the focus of the week and form part of the Scrum Retrospective to ensure it is understood, applied and incorporated into the Scrum Team behaviour. </a><br>
                            Here is the short description "To establish and nurture the links between the organization and its stakeholders at strategic and tactical levels. It includes the identification, analysis, monitoring, and continual improvement of relationships with and between stakeholders."<br>
                            This, applied to the concept of <a href="/images/utilitywarrantyexample.jpg" >Warranty and Utility</a> is a "mindset change" needed for Scrum Team success <a href="/books/agileleadershiptoolkit.pdf" targer="_blank">per the KVI metric in this toolkit.</a></p>
                        </li>
                        <li>
                          <p align="left">Then, while sustaining the gain, focus on a next practice and take another bite into the ITIL 4 practices (in bite sized pieces).  Remember the Practices are simply Processes that you can improve through practise. </p>
						  <p><a href="/removetheredbeads" >Deming's Red Bead Experiment</a> goes a long way to clearly illustrate the causes and solutions for the "monkey trap" problem above. <br>Find this experiment on YouTube (<i>or watch a PMWay selected video from YouTube below</i>).  Deming is the father of the Capability Maturity Model (CMMi) we are using <a href="/cmmidevdash" target=_blank"><u>here</u></a> which is the output of the <a href="https://www.sei.cmu.edu/" ><u>Software Engineering Institute at Carnegie Mellon University</u></a>.</p>
<h3>Here is some more of Deming's wisdom:</h3>
<p align="center"><img class="img-fluid" src="{{ asset('storage/images/demingoneessence.jpg') }}" alt="Deming Quotes" ><br><img class="img-fluid" src="{{ asset('storage/images/demingtwoessence.jpg') }}" alt="Deming essence" ><br><img class="img-fluid" src="{{ asset('storage/images/demingthreeessence.jpg') }}" alt="Deming essence" >
            </div>
                       <div class="container" align="center">
<h5>Red Bead Experiment</h5>
<div class="flex-container">
  <div class="flex-item video-content">

<video controls poster="/images/redbeadremoved.png" width="400" height="400" >
<br><br>
 <source src="{{ asset("movies/redbeadexperiment.mp4")}}" type="video/mp4">

    Your browser does not support the video tag.
</video>
</div>
</div>
<br>

<h5>Solution:<br>If your Scrum Sprints are not producing approved value then Executives<br><b>YOU NEED TO PICK OUT / REMOVE / EAT THE RED BEADS!</b></h5>
<p align="center"><img class="img-fluid" src="{{ asset('storage/images/eat.png') }}" alt="Executive Action Team: EAT the Red Beads" ></p>
<p>I.e. install scrum (or other TPM or APM) processes (DevOps etc., processes) that allow the method to operate correctly / <br>remove noise and obstacles (exhortations etc.) that is getting in the way.<br>
and EAT (Executive Action Team) the Red Beads!</p>
<p><a href="/scrumdashboards">Click here for a 1000 foot overview of the Scrum Dashboards</a></p>
<br>
<br>
                        </li>
                      </ul>
                    </div>
                    <div class="card-footer"> </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer"> </div>
      </div>
    </div>
  </div>
</div>
<br>

<div align="center">
  <h3><a name="home"></a>The 34 practices are listed below:</h3>
  <table border="1" cellpadding="5">
    <tbody>
      <tr>
        <td width="223"><strong><a href="#gmp">General Management Practices</a></strong></td>
        <td width="393"><ol>
            <li><a href="#architecture">Architecture management</a></li>
            <li><a href="#continualimprovement">Continual improvement</a></li>
            <li><a href="#infosecman">Information security management</a></li>
            <li><a href="#knowman">Knowledge management</a></li>
            <li><a href="#measureandrep">Measurement and reporting</a></li>
            <li><a href="#orgchangeman">Organizational change management</a></li>
            <li><a href="#portfolioman">Portfolio management</a></li>
            <li><a href="#projman">Project management</a></li>
            <li><a href="#relman">Relationship management</a></li>
            <li><a href="#riskman">Risk management</a></li>
            <li><a href="#servfinman">Service financial management</a></li>
            <li><a href="#stratman">Strategy management</a></li>
            <li><a href="#supman">Supplier management</a></li>
            <li><a href="#workftalentman">Workforce and talent management</a></li>
          </ol></td>
      </tr>
      <tr>
        <td width="223"><strong><a href="#smp">Service Management Practices</a></strong></td>
        <td width="393"><ol>
            <li><a href="#availman">Availability management</a></li>
            <li><a href="#buisanal">Business analysis</a></li>
            <li><a href="#capperfman">Capacity and performance management</a></li>
            <li><a href="#changecontrol">Change enablement (Change control)</a></li>
            <li><a href="#incidentman">Incident management</a></li>
            <li><a href="#itassetman">IT asset management</a></li>
            <li><a href="#monitorevent">Monitoring and event management</a></li>
            <li><a href="#problemman">Problem management</a></li>
            <li><a href="#releaseman">Release management</a></li>
            <li><a href="#servcatman">Service catalogue management</a></li>
            <li><a href="#servconfigman">Service configuration management</a></li>
            <li><a href="#servcontman">Service continuity management</a></li>
            <li><a href="#servdesign">Service design</a></li>
            <li><a href="#servdesk">Service desk</a></li>
            <li><a href="#slaman">Service level management</a></li>
            <li><a href="#servreqman">Service request management</a></li>
            <li><a href="#servvaltest">Service validation and testing</a></li>
          </ol></td>
      </tr>
      <tr>
        <td width="223"><strong><a href="#tmp">Technical Management Practices</a></strong></td>
        <td width="393"><ol>
            <li><a href="#deployman">Deployment management</a></li>
            <li><a href="#infraplatman">Infrastructure and platform management</a></li>
            <li><a href="#softdevman">Software development and management</a></li>
          </ol></td>
      </tr>
    </tbody>
  </table>
  <br>

  <p>Let's now look at the purpose of each management practice in 2 levels below.<br>
    The first level (linked to from the above list) gives a quick purpose summary
    for each practice.<br>
    The second level (linked to from the practice name in the
    summary below) gives you more detail if you need it.<br>
 Note:  Clicking on each Practice's heat map you will open up the Practice Guide.<br><a href="/view-pdf/readersmanual.pdf" >Click here for the Practice Guides Readers Manual as a way to start your journey into ITIL 4.</a></p>
  <h2><a href="#gmp">General Management Practices</a></h2>
  <table border="1" cellpadding="5">
    <tbody>
      <tr>
        <td width="223"><strong>Practice</strong></td>
        <td width="393"><strong>Purpose</strong></td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="architecture"></a>1. Architecture management <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#architecturemd">More Detail</a></p></td>
        <td width="393" valign="top">To provide an understanding of all the different elements that make up an organization and how those elements interrelate, enabling the organization to effectively achieve its current and future objectives. It provides the principles, standards, and tools that enable an organization to manage complex change in a structured and agile way.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="continualimprovement"></a>2. Continual improvement <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#continualimprovementmd">More Detail</a></p></td>
        <td width="393" valign="top">To align the organization's practices and services with changing business needs through the ongoing identification and improvement of services, service components, practices, or any element involved in the efficient and effective management of products and services.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="infosecman"></a>3. Information security management <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#infosecmanmd">More Detail</a></p></td>
        <td width="393" valign="top">To protect the information needed by the organization to conduct its business. This includes understanding and managing risks to the confidentiality, integrity, and availability of information, as well as other aspects of information security such as authentication and non-repudiation.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="knowman"></a>4. Knowledge management <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#knowmanmd">More Detail</a></p></td>
        <td width="393" valign="top">To maintain and improve the effective, efficient, and convenient use of information and knowledge across the organization.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="measureandrep"></a>5. Measurement and reporting <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#measureandrepmd">More Detail</a></p></td>
        <td width="393" valign="top">To support good decision-making and continual improvement by decreasing the levels of uncertainty. This is achieved through the collection of relevant data on various managed objects and the valid assessment of this data in an appropriate context.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="orgchangeman"></a>6. Organizational change management <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#orgchangemanmd">More Detail</a></p></td>
        <td width="393" valign="top">To ensure that changes in an organization are smoothly and successfully implemented, and that lasting benefits are achieved by managing the human aspects of the changes.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="portfolioman"></a>7. Portfolio management <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#portfoliomanmd">More Detail</a></p></td>
        <td width="393" valign="top">To ensure that the organization has the right mix of programs, projects, products, and services to execute the organization's strategy within its funding and resource constraints.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="projman"></a>8. Project management <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#projmanmd">More Detail</a></p></td>
        <td width="393" valign="top">To ensure that all projects in the organization are successfully delivered. This is achieved by planning, delegating, monitoring, and maintaining control of all aspects of a project, and keeping the motivation of the people involved.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="relman"></a>9. Relationship management <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#relmanmd">More Detail</a></p></td>
        <td width="393" valign="top">To establish and nurture the links between the organization and its stakeholders at strategic and tactical levels. It includes the identification, analysis, monitoring, and continual improvement of relationships with and between stakeholders.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="riskman"></a>10. Risk management <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#riskmanmd">More Detail</a></p></td>
        <td width="393" valign="top">To ensure that the organization understands and effectively handles risks. Managing risk is essential to ensuring the ongoing sustainability of an organization and creating value for its customers.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="servfinman"></a>11. Service financial management <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#servfinmanmd">More Detail</a></p></td>
        <td width="393" valign="top">To support the organization's strategies and plans for service management by ensuring that the organization's financial resources and investments are being used effectively.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="stratman"></a>12. Strategy management <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#stratmanmd">More Detail</a></p></td>
        <td width="393" valign="top">To formulate the goals of the organization and adopt the courses of action and allocation of resources necessary for achieving those goals. Strategy management establishes the organization's direction, focuses effort, defines or clarifies the organization's priorities, and provides consistency or guidance in response to the environment.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="supman"></a>13. Supplier management <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#supmanmd">More Detail</a></p></td>
        <td width="393" valign="top">To ensure that the organization's suppliers and their performances are managed appropriately to support the seamless provision of quality products and services. This includes creating closer, more collaborative relationships with key suppliers to uncover and realize new value and reduce the risk of failure.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="workftalentman"></a>14. Workforce and talent management <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#workftalentmanmd">More Detail</a></p></td>
        <td width="393" valign="top">To ensure that the organization has the right people with the appropriate skills and knowledge and in the correct roles to support its business objectives through planning, recruitment, onboarding, learning and development, performance measurement, and succession planning activities.</td>
      </tr>
    </tbody>
  </table>
  <h2><a href="#smp">Service Management Practices</a></h2>
  <table border="1" cellpadding="5">
    <tbody>
      <tr>
        <td width="223" valign="top"><strong>Practice</strong></td>
        <td width="393" valign="top"><strong>Purpose</strong></td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="availman"></a>1. Availability management <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#availmanmd">More Detail</a></p></td>
        <td width="393" valign="top">To ensure that services deliver agreed levels of availability to meet the needs of customers and users.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="buisanal"></a>2. Business analysis <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#buisanalmd">More Detail</a></p></td>
        <td width="393" valign="top">To analyze a business or some element of it, define its associated needs, and recommend solutions to address these needs and/or solve a business problem, which must facilitate value creation for stakeholders.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="capperfman"></a>3. Capacity and performance management <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#capperfmanmd">More Detail</a></p></td>
        <td width="393" valign="top">To ensure that services achieve agreed and expected performance, satisfying current and future demand in a cost effective way.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="changecontrol"></a>4. Change enablement (Change control) <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#changecontrolmd">More Detail</a></p></td>
        <td width="393" valign="top">To maximize the number of successful IT changes by ensuring that risks have been properly assessed, authorizing changes to proceed, and managing the change schedule.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="incidentman"></a>5. Incident management <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#incidentmanmd">More Detail</a></p></td>
        <td width="393" valign="top">To minimize the negative impact of incidents by restoring normal service operation as quickly as possible.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="itassetman"></a>6. IT asset management <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#itassetmanmd">More Detail</a></p></td>
        <td width="393" valign="top">To plan and manage the full lifecycle of all IT assets, to help the organization maximize value; control costs; manage risks; support decision-making about purchase; re-use, and retirement of assets; and meet regulatory and contractual requirements.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="monitorevent"></a>7. Monitoring and event management <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#monitoreventmd">More Detail</a></p></td>
        <td width="393" valign="top">To systematically observe services and service components, and record and report selected changes of state identified as events, through identifying and prioritizing infrastructure, services, business processes, and information security events, and establishing the appropriate response to those events, including responding to conditions that could lead to potential faults or incidents.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="problemman"></a>8. Problem management <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#problemmanmd">More Detail</a></p></td>
        <td width="393" valign="top">To reduce the likelihood and impact of incidents by identifying actual and potential causes of incidents, and managing workarounds and known errors.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="releaseman"></a>9. Release management <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#releasemanmd">More Detail</a></p></td>
        <td width="393" valign="top">To make new and changed services and features available for use.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="servcatman"></a>10. Service catalogue management <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#servcatmanmd">More Detail</a></p></td>
        <td width="393" valign="top">To provide a single source of consistent information on all services and service offerings, and to ensure that it is available to the relevant audience.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="servconfigman"></a>11. Service configuration management <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#servconfigmanmd">More Detail</a></p></td>
        <td width="393" valign="top">To ensure that accurate and reliable information about the configuration of services, and the configuration items (CIs) that support them, is available when and where it is needed. This includes information on how CIs are configured and the relationships between them.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="servcontman"></a>12. Service continuity management <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#servcontmanmd">More Detail</a></p></td>
        <td width="393" valign="top">To ensure that the availability and performance of a service is maintained at a sufficient level in the event of a disaster. The practice provides a framework for building organizational resilience, with the capability of producing an effective response that safeguards the interests of key stakeholders and the organization's reputation, brand, and value-creating activities.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="servdesign"></a>13. Service design <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#servdesignmd">More Detail</a></p></td>
        <td width="393" valign="top">To design products and services that are fit for purpose, fit for use, and that can be delivered by the organization and its ecosystem. This includes planning and organizing people, partners and suppliers, information, communication, technology, and practices for new or changed products and services, and the interaction between the organization and its customers.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="servdesk"></a>14. Service desk <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#servdeskmd">More Detail</a></p></td>
        <td width="393" valign="top">To capture demand for incident resolution and service requests. It should also be the entry point and single point of contact for the service provider with all of its users.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="slaman"></a>15. Service level management <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#slamanmd">More Detail</a></p></td>
        <td width="393" valign="top">To set clear business-based targets for service performance, so that the delivery of a service can be properly assessed, monitored, and managed against these targets.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="servreqman"></a>16.   Service request management <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#servreqmanmd">More Detail</a></p></td>
        <td width="393" valign="top">To support the agreed quality of a service by handling all pre-defined, user-initiated service requests in an effective and user-friendly manner.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="servvaltest"></a>17. Service validation and testing <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#servvaltestmd">More Detail</a></p></td>
        <td width="393" valign="top">To ensure that new or changed products and services meet defined requirements. The definition of service value is based on input from customers, business objectives, and regulatory requirements, and is documented as part of the value chain activity of design and transition. These inputs are used to establish measurable quality and performance indicators that support the definition of assurance criteria and testing requirements.</td>
      </tr>
    </tbody>
  </table>
  <h2><a href="#tmp">Technical Management Practices</a></h2>
  <table border="1" cellpadding="5">
    <tbody>
      <tr>
        <td width="223" valign="top"><strong>Practice</strong></td>
        <td width="393" valign="top"><strong>Purpose</strong></td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="deployman"></a>1. Deployment management <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#deploymanmd">More Detail</a></p></td>
        <td width="393" valign="top">To move new or changed hardware, software, documentation, processes, or any other component to live environments. It may also be involved in deploying components to other environments for testing or staging.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="infraplatman"></a>2. Infrastructure and platform management <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#infraplanmanmd">More Detail</a></p></td>
        <td width="393" valign="top">To oversee the infrastructure and platforms used by an organization. When carried out properly, this practice enables the monitoring of technology solutions available to the organization, including the technology of external service providers.</td>
      </tr>
      <tr>
        <td width="223" valign="top"><a name="softdevman"></a>3. Software development and management <br>
          <br>
          <p><a href="#home">Home</a><br>
            <a href="#softdevmanmd">More Detail</a></p></td>
        <td width="393" valign="top">To ensure that applications meet internal and external stakeholder needs, in terms of functionality, reliability, maintainability, compliance, and auditability.</td>
      </tr>
    </tbody>
  </table>
</div>
<br>
<br>
<br>
<br>
<h2><a name="gmp"></a>General Management Practices</h2>
<h3><a name="architecturemd"></a>Architecture management</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the architecture management practice is to provide an understanding of all the different elements that make up an organization and how those elements interrelate, enabling the organization to effectively achieve its current and future objectives. It provides the principles, standards, and tools that enable an organization to manage complex change in a structured and Agile way.</p>
<p>Just as the modern organization's environment and ecosystem have become more complex, so have its challenges. <br>
  These include not only how to increase efficiency and automation, but also how to better manage the complexity of the environment and how to achieve organizational agility and resilience. Without the visibility and coordination made possible by a proper architecture management practice, an organization can become a labyrinth of third-party contracts, variant processes across different organizational silos, various products and services that have been needlessly customized for different customers, and a legacy infrastructure. The result is a complex landscape where any change becomes far more difficult to implement and introduces a much higher risk.</p>
<p>A complete architecture management practice should address all architecture domains: business, service, information, technology, and environment. For a smaller and less complex organization, the architect can develop a single integrated architecture.</p>
<h5>Architecture types:</h5>
<ul>
  <li>
    <h5>Business architecture</h5>
  </li>
</ul>
<p>The business architecture allows the organization to look at its capabilities in terms of how they align with all the detailed activities required to create value for the organization and its customers. These are then compared with the organization's strategy and a gap analysis of the target state against current capabilities is performed. Identified gaps between the baseline and target state are prioritized and these capability gaps are addressed incrementally. A 'roadmap' describes the transformation from current to future state to achieve the organization's strategy.</p>
<ul>
  <li>
    <h5>Service architecture</h5>
  </li>
</ul>
<p>Service architecture gives the organization a view of all the services it provides, including interactions between the services and service models that describe the structure (how the service components fit together) and the dynamics (activities, flow of resources, and interactions) of each service. A service model can be used as a template or blueprint for multiple services.</p>
<ul>
  <li>
    <h5>Information systems architecture, including data and applications architectures</h5>
  </li>
</ul>
<p>The information architecture describes the logical and physical data assets of the organization and the data management resources. It shows how the information resources are managed and shared for the benefit of the organization.</p>
<p>Information is a valuable asset for the organization, with actual and measurable value. Information is the basis for decision-making, so it must always be complete, accurate, and accessible to those who are authorized to access it. Information systems must therefore be designed and managed with these concepts in mind.</p>
<ul>
  <li>
    <h5>Technology architecture</h5>
  </li>
</ul>
<p>The technology architecture defines the software and hardware infrastructure needed to support the portfolio of products and services.</p>
<ul>
  <li>
    <h5>Environmental architecture</h5>
  </li>
</ul>
<p>The environmental architecture describes the external factors impacting the organization and the drivers for change, as well as all aspects, types, and levels of environmental control and their management. The environment includes developmental, technological, business, operational, organizational, political, economic, legal, regulatory, ecological, and social influences.</p>
<p>Figure 5.1 shows the contribution of architecture management to the service value chain, with the practice being involved in all value chain activities; however, it is most instrumental in the plan, improve, and design and transition value chain activities:</p>
<p><b>Plan</b> The architecture management practice is responsible for developing and maintaining a reference architecture that describes the current and target architectures for the business, information, data, application, technology, and environment perspectives. This is used as a basis for all the plan value chain activity.</p>
<p><b>Improve</b> Many opportunities for improvement are identified through review of the business, service, information, technical, and environment architectures.</p>
<p><b>Engage</b> The architecture management practice facilitates the ability to understand the organization's readiness to address new or under-served markets and a wider variety of products and services, and more quickly respond to changing circumstances. The architecture management practice is responsible for assessing the organization's capabilities in terms of how they align with all the detailed activities required to co-create value for the organization and its customers.</p>
<p><b>Design and transition</b> Once a new or changed product or service is approved to be developed, the architecture, design, and build teams will continually evaluate whether the product/service meets the investment objectives. The architecture management practice is responsible for the service architecture, which describes the structure (how the service components fit together) and the dynamics (activities, flow of resources, and interactions) of the service. A service model can be used as a template or blueprint for multiple services and is essential to the design and transition activity.</p>
<p><b>Obtain/build</b> The reference architectures (business, service, information, technical, and environmental) facilitate identification of what products, services, or service components need to be obtained or built.</p>
<p><b>Deliver and support</b> The reference architectures are used continually as part of the operation, restoration, and maintenance of products and services.</p>
<p>Figure 5.1 Heat map of the contribution of architecture management to value chain activities.</p>
<p><a href="/view-pdf/architecturemanagement.pdf" ><img class="img-fluid" src="{{ asset('storage/images/itilfour/image004.jpg') }}" alt="image004"></a></p>
<br>
<br>
<br>
<br>
<h3><a name="continualimprovementmd"></a>Continual improvement</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the continual improvement practice is to align the organization's practices and services with changing business needs through the ongoing improvement of products, services, and practices, or any element involved in the management of products and services.</p>
<p>Included in the scope of the continual improvement practice is the development of improvement-related methods and techniques and the propagation of a continual improvement culture across the organization, in alignment with the organization's overall strategy. The commitment to and practice of continual improvement must be embedded into every fibre of the organization. If it is not, there is a real risk that daily operational concerns and major project work will eclipse continual improvement efforts.</p>
<p>Key activities that are part of continual improvement practices include:</p>
<ul>
  <li>encouraging continual improvement across the organization</li>
  <li>securing time and budget for continual improvement</li>
  <li>identifying and logging improvement opportunities</li>
  <li>assessing and prioritizing improvement opportunities</li>
  <li>making business cases for improvement action</li>
  <li>planning and implementing improvements</li>
  <li>measuring and evaluating improvement results</li>
  <li>coordinating improvement activities across the organization.</li>
</ul>
<p>There are many methods, models, and techniques that can be employed for making improvements. Different types of improvement may call for different improvement methods. For example, some improvements may be best organized into a multi-phase project, while others may be more appropriate as a single quick effort.</p>
<p>The ITIL service value system (SVS) includes the continual improvement model, which can be applied to any type of improvement, from high-level organizational changes to individual services and configuration items (CIs). <br>
  The model is below:</p>
<img alt="" class="img-fluid" src="{{ asset('storage/images/itilfour/continual.jpg') }}" ><br>
<br>
<p>When assessing the current state, there are many techniques that can be employed, such as a strength, weakness, opportunity, and threat (SWOT) analysis, a balanced scorecard review, internal and external assessments and audits, or perhaps even a combination of several techniques. Organizations should develop competencies in methodologies and techniques that will meet their needs.</p>
<p>Approaches to continual improvement can be found in many places. Lean methods provide perspectives on the elimination of waste. Agile methods focus on making improvements incrementally at a cadence. DevOps methods work holistically and ensure that improvements are not only designed well, but applied effectively. Although there are a number of methods available, organizations should not try to formally commit to too many different approaches. It is a good idea to select a few key methods that are appropriate to the types of improvement the organization typically handles and to cultivate those methods. In this way, teams will have a shared understanding of how to work together on improvements to facilitate a greater amount of change at a quicker rate.</p>
<p>This does not mean, however, that the organization should not try new approaches or allow for innovation. Those in the organization with skills in alternative methods should be encouraged to apply them when it makes sense, and if this effort is successful, the alternative method may be added to the organization's repertoire.</p>
<p>Older methods may gradually be retired in favour of new ones if better results are achieved.</p>
<p>Continual improvement is everyone's responsibility. Although there may be a group of staff members who focus on this work full-time, it is critical that everyone in the organization understands that active participation in continual improvement activities is a core part of their job. To ensure that this is more than a good intention, it is wise to include contribution to continual improvement in all job descriptions and every employee's objectives, as well as in contracts with external suppliers and contractors.</p>
<p>The highest levels of the organization need to take responsibility for embedding continual improvement into the way that people think and work. Without their leadership and visible commitment to continual improvement, attitudes, behaviour, and culture will not evolve to a point where improvements are considered in everything that is done, at all levels.</p>
<p>Training and other enablement assistance should be provided to staff members to help them feel prepared to contribute to continual improvement. Although everyone should contribute in some way, there should at least be a small team dedicated full-time to leading continual improvement efforts and advocating the practice across the organization. This team can serve as coordinators, guides, and mentors, helping others in the organization to develop the skills they need and navigating any difficulties that may be encountered.</p>
<p>When third-party suppliers form part of the service landscape, they should also be part of the improvement effort. When contracting for a supplier's service, the contract should include details of how they will measure, report on, and improve their services over the life of the contract. If data will be required from suppliers to operate internal improvements, that should be specified in the contract as well. Accurate data, carefully analysed and understood, is the foundation of fact-based decision-making for improvement. The continual improvement practice should be supported by relevant data sources and data analysis to ensure that each potential improvement is sufficiently understood and prioritized.</p>
<p>To track and manage improvement ideas from identification through to final action, organizations use a database or structured document called a continual improvement register (CIR). There can be more than one CIR in an organization, as multiple CIRs can be maintained on individual, team, departmental, business unit, and organizational levels. Some organizations maintain a single master CIR, but segment how it is used and by whom at a more granular level.</p>
<p>Improvement ideas can also initially be captured in other places and through other practices, such as during project execution or software development activities. In this case, it is important to document for attention the improvement ideas that come up as part of ongoing continual improvement. As new ideas are documented, CIRs are used to constantly reprioritize improvement opportunities. The use of CIRs provides additional value because they help to make things visible. This is not limited to what is currently being done, but also to what is already complete and what has been set aside for further consideration at a later date.</p>
<p>It does not matter exactly how the information in a CIR is structured, or what the collections of improvement ideas are called in any given organization. What is important is that improvement ideas are captured, documented, assessed, prioritized, and appropriately acted upon to ensure that the organization and its services are always being improved.</p>
<p>The continual improvement practice is integral to the development and maintenance of every other practice as well as to the complete lifecycle of all services and indeed the SVS itself. That said, there are some practices that make a special contribution to continual improvement. For example, the organization's problem management practice can uncover issues that will be managed through continual improvement. The changes initiated through continual improvement may fail without the critical contributions of organizational change management. And many improvement initiatives will use project management practices to organize and manage their execution.</p>
<p>Figure 5.2 shows the contribution of continual improvement to the service value
  chain, with the practice being involved in all value chain activities:</p>
<p><b>Plan</b> The continual improvement practice is applied to planning activities, methods, and techniques to make sure they are relevant to the organization's
  current objectives and context.</p>
<p><b>Improve</b> The continual improvement practice is key to this value chain activity. It structures resources and activities, enabling improvement at all levels of the organization and the service value
  system (SVS).</p>
<p><b>Engage, design and transition, obtain/build, and deliver and support</b> Each of these value chain activities is subject to continual improvement, and the continual improvement practice is applied to all of them.</p>
<p><a>Figure 5.2 Heat map of the contribution of continual improvement to value chain activities.</a></p>
<p><a href="/view-pdf/continualimprovement.pdf" ><img class="img-fluid" src="{{ asset('storage/images/itilfour/image007.jpg') }}" ></a></p>
  <br>
  <br>
  <br>
<h3><a name="infosecmanmd"></a>Information Security Manaagement</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the information security management practice is to protect the information needed by the organization to conduct its business.
  This includes understanding and managing risks to the confidentiality, integrity, and availability of information, as well as other aspects of information security such as authentication (ensuring someone is who they claim to be) and non-repudiation (ensuring that someone can't deny that they took an action).</p>
<p>The required security is established by means of policies, processes, behaviours, risk management, and controls, which must maintain a balance between:</p>
<ul>
  <li><b>Prevention</b> Ensuring that security incidents don't occur.</li>
  <li><b>Detection</b> Rapidly and reliably detecting incidents that can't be prevented.</li>
  <li><b>Correction</b> Recovering from incidents after they are detected.</li>
</ul>
<p>It is also important to achieve a balance between protecting the organization from harm and allowing it to innovate.
  Information security controls that are too restrictive may do more harm than good, or may be circumvented by people trying to do work more easily.
  Information security controls should consider all aspects of the organization and align with its risk appetite.</p>
<p>Information security management interacts with every other practice. It creates controls that each practice must consider when planning how work will be done. It also depends on other practices to help protect information.</p>
<p>Information security management must be driven from the most senior level in the organization, based on clearly understood governance requirements and organizational policies. Most organizations have a dedicated information security team, which carries out risk assessments and defines policies, procedures, and controls. In high-velocity environments, information security is integrated as much as possible into the daily work of development and operations, shifting the reliance on control of process towards verification of preconditions such as expertise and integrity.</p>
<p>Information security is critically dependent on the behaviour of people throughout the organization. Staff who have been trained well and pay attention to information security policies and other controls can help to detect, prevent, and correct information security incidents. Poorly trained or insufficiently motivated staff can be a major vulnerability.</p>
<p>Many processes and procedures are required to support information security management. These include:</p>
<ul>
  <li>an information security incident management process</li>
  <li>a risk management process</li>
  <li>a control review and audit process</li>
  <li>an identity and access management process</li>
  <li>event management</li>
  <li>procedures for penetration testing, vulnerability scanning, etc.</li>
  <li>procedures for managing information security related changes, such as firewall configuration changes.</li>
</ul>
<p>Figure 5.3 shows the contribution of information security management to the
  service value chain, with the practice being involved in all value chain activities:</p>
<p><b>Plan</b> Information security must be considered in all planning activity and must be built into every practice and service.</p>
<p><b>Improve</b> Information security must be considered in all improvement value chain activity to ensure that vulnerabilities are not introduced when making improvements.</p>
<p><b>Engage</b> Information security requirements for new and changed services must be understood and captured. All levels of engagement, from operational to strategic, must support information security and encourage the behaviours needed. All stakeholders must contribute to information security, including customers, users, suppliers, etc.</p>
<p><b>Design and transition</b> Information security must be considered throughout this value chain activity, with effective controls being designed and transitioned into operation. The design and transition of all services must consider information security aspects as well as all other utility and warranty requirements.</p>
<p><b>Obtain/build</b> Information security must be built into all components, based on the risk analysis, policies, procedures, and controls defined by information security management. This applies whether the components are built internally or procured from suppliers.</p>
<p><b>Deliver and support</b> Detection and correction of information security incidents must be an integral part of this value chain activity.</p>
<p>Figure 5.3 Heat map of the contribution of information security management to value chain activities.</p>
<p><a href="/view-pdf/informationsecuritymanagement.pdf" ><img class="img-fluid" src="{{ asset('storage/images/itilfour/image011.jpg') }}"  alt="image011"></a></p>
<br>
<br>
<br>
<br>
<h3><a name="knowmanmd"></a>Knowledge Management</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the knowledge management practice is to maintain and improve the effective, efficient, and convenient use of information and knowledge across the organization.</p>
<p>Knowledge is one of the most valuable assets of an organization. The knowledge management practice provides a structured approach to defining, building, re-using, and sharing knowledge (i.e. information, skills, practices, solutions, and problems) in various forms. As methods of capturing and sharing knowledge move more towards digital solutions, the practice of knowledge management becomes even more valuable.</p>
<p>It is important to understand that 'knowledge' is not simply information. Knowledge is the use of information in a particular context. This needs to be understood with both the user of the knowledge and the relevant situation in mind. For example, information presented in the form of a 300-page manual is not useful for a service desk analyst who needs to find a fast solution. A better example of knowledge that is fit for purpose might be a simplified set of instructions or reference points that allow the analyst to find the relevant content quickly.</p>
<p>Knowledge management aims to ensure that stakeholders get the right information, in the proper format, at the right level, and at the correct time, according to their access level and other relevant policies. This requires a procedure for the acquisition of knowledge, including the development, capturing, and harvesting of unstructured knowledge, whether it is formal and documented or informal and tacit knowledge.</p>
<p>Figure 5.4 shows the contribution of knowledge management to the service value
  chain, with the practice being involved in all value chain activities:</p>
<p><b>Plan</b> Knowledge management helps the organization to make sound portfolio decisions and to define its strategy and other plans, and supports financial management.</p>
<p><b>Improve</b> This value chain activity is based on an understanding of the current situation and trends, supported by historical information. Knowledge management provides context for the assessment of achievements and improvement planning.</p>
<p><b>Engage</b> Relationships at all levels, from strategic to operational, are based on an understanding of the context and history of those relationships. Knowledge management helps to better understand stakeholders.</p>
<p><b>Design and transition</b> As with the obtain/build value chain activity, knowledge of the solutions and technologies available, and the re-use of information, can make this value chain activity more effective.</p>
<p><b>Obtain/build</b> The efficiency of this value chain activity can be significantly improved with sufficient knowledge of the solutions and technologies available, and through the re-use of information.</p>
<p><b> Deliver and support</b> Ongoing value chain activity in this area benefits from knowledge management through re-use of solutions in standard situations and a better understanding of the context of non-standard situations that require analysis.</p>
<p>Figure 5.4 Heat map of the contribution of knowledge management to value chain activities.</p>
<p><a href="/view-pdf/knowledgemanagement.pdf" ><img class="img-fluid" src="{{ asset('storage/images/itilfour/image017.jpg') }}"  alt="image017"></a></p>
<br>
<br>
<br>
<br>
<h3><a name="measureandrepmd"></a>Measurement and reporting</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the measurement and reporting practice is to support good decision-making and continual improvement by decreasing the levels of uncertainty. This is achieved through the collection of relevant data on various managed objects and the valid assessment of this data in an appropriate context. Managed objects include, but are not limited to, products and services, practices and value chain activities, teams and individuals, suppliers and partners, and the organization as a whole.</p>
<p>Many of these managed objects are connected, and so are their respective metrics and indicators. For example, to set clear objectives for measurement and reporting, there is a need to understand organizational goals. These can be based on a number of areas: profit, growth, competitive advantage, customer retention, operational/public service, etc. (see the focus on value guiding principle in section 4.3.1 of the ITIL 4 Foundation manual). In such cases, it is important to establish a clear relationship between high-level and subordinate goals and the objectives that relate to them.</p>
<p>For the set goals, operational critical success factors (CSFs) can be defined. Based on these CSFs, a set of related key performance indicators (KPIs) can then be agreed upon, against which success can be measured.</p>
<p><img class="img-fluid" src="{{ asset('storage/images/itilfour/image099.jpg') }}"  alt="image099"></p>
<h5>Definitions</h5>
<p><b>Critical success factor (CSF)</b> A necessary precondition for the achievement of intended results.</p>
<p><b>Key performance indicator (KPI)</b> An important metric used to evaluate the success in meeting an objective.</p>
<h5>KPIs and behaviour</h5>
<p>KPIs for individuals can work as a competitive motivator, and this will drive positive results if the KPIs are set to meet clear business goals. However, target-setting for individuals can also have a negative side, driving inappropriate or unsuitable behaviours. This typically happens if there is too much focus placed on individual KPIs. For example, service desk staff might be heavily driven to keep calls short, but this can negatively impact on customer satisfaction, and even resolution times, if issues are not properly dealt with.</p>
<p>Operational KPIs should ideally be set for teams rather than focusing too closely on individuals. This means that there can be some flexibility in the targets and behaviours allowed by the team as a whole. Individuals will, of course, still need some specific guidelines for their performance, but this should be clearly within the goals of the team and organization, and all targets should be set in the context of providing value for the organization.</p>
<h5>Reporting</h5>
<p>Data collected as metrics is usually presented in the form of reports or dashboards.</p>
<p>It is important to remember that reports are intended to support good decision making, so their content should be relevant to the recipients of the information and related to the required topic. Reports and dashboards should make it easy for the recipient to see what needs to be done and then take action. As such, a good report or dashboard should answer two main questions: how far are we from our targets and what bottlenecks prevent us from achieving better results?</p>
<p>Figure 5.5 shows the contribution of measurement and reporting to the service
  value chain, with the practice being involved in all value chain activities:</p>
<p><b>Plan</b> Measurement and reporting enables strategy and service portfolio decisions by providing details on current performance of products and services.</p>
<p><b>Improve</b> Performance is constantly monitored and evaluated to support continual improvement, alignment, and value creation.</p>
<p><b>Engage</b> Engagement with stakeholders is based on correct, up-to-date, and sufficient information provided in the form of dashboards and reports.</p>
<p><b>Design and transition</b> Measurement and reporting provides information for management decisions at every stage before going live.</p>
<p><b>Obtain/build</b> The practice ensures transparency of all development and procurement activities, enabling effective management and integration with all other value chain activities.</p>
<p><b>Deliver and support</b> Ongoing management of products and services is based on correct, up-to-date, and sufficient performance information.</p>
<p>Figure 5.5 Heat map of the contribution of measurement and reporting to value chain activities.</p>
<p><a href="/view-pdf/measurementandreporting.pdf" ><img class="img-fluid" src="{{ asset('storage/images/itilfour/image026.jpg') }}"  alt="image026"></a></p>
<br>
<br>
<br>
<br>
<h3><a name="orgchangemanmd"></a>Organizational change management</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the organizational change management practice is to ensure that changes in an organization are smoothly and successfully implemented, and that lasting benefits are achieved by managing the human aspects of the changes.</p>
<p>Improvements invariably require people to change the way they work, their behaviour, and sometimes their role. Regardless of whether the change is to a practice, the structure of the organization, related to technology, or is the introduction of a new or changed service, people are essential to the success of the change. The organizational change management practice aims to ensure that everyone affected by the change accepts and supports it. This is achieved by removing or reducing resistance to the change, eliminating or addressing adverse impacts, and providing training, awareness, and other means of ensuring a successful transition to the changed state.</p>
<p>Organizational change management contributes to every part of the service value system (SVS), wherever the cooperation, participation, and enthusiasm of the people involved are required. For an improvement initiative to be successful, no matter what the level or scope of the change is, there are certain elements that are essential to addressing the human factor. Organizational change management must ensure that the following are established and maintained throughout the change:</p>
<p><b>Clear and relevant objectives</b> To gain support, the objectives of the change must be clear and make sense to the stakeholders, based on the context of the organization. The change must be seen to be of real value.</p>
<p><b>Strong and committed leadership</b> It is critical that the change has the active support of sponsors and day-to-day leaders within the organization. A sponsor is a manager or business leader who will advocate, and can authorize, the change. Leaders should visibly support and consistently communicate their commitment to the change.</p>
<p><b>Willing and prepared participants</b> To be successful, a change needs to be made by willing participants. In part, this willingness will come from the participants being convinced of the importance of the change. In addition, the more prepared participants feel they are to make the changes asked of them through relevant training, awareness, and regular communications, the keener they will be to go forward.</p>
<p><b>Sustained improvement</b> Many changes fail because, after some time has passed, people revert to old ways of working. Organizational change management seeks to continually reinforce the value of the change through regular communication, addressing any impacts and consequences of the change, and the support of sponsors and leaders. The communication of value will be stronger when metrics are used to validate the message.</p>
<h5>Activities of organizational change management</h5>
<p>The key activities of effective organizational change management are outlined in <a href="#bookmark182">Table 5.2</a>.</p>
<p><a name="bookmark182">Table 5.2</a> Organizational change management activities</p>
<table border="1" cellpadding="5">
  <tr>
    <td><p><b>Activity</b></p></td>
    <td><p><b>Helps to deliver</b></p></td>
  </tr>
  <tr>
    <td><p>Creation of a sense of urgency</p></td>
    <td><p>Clear and relevant objectives, willing participants</p></td>
  </tr>
  <tr>
    <td><p>Stakeholder management</p></td>
    <td><p>Strong and committed participants</p></td>
  </tr>
  <tr>
    <td><p>Sponsor management</p></td>
    <td><p>Strong and committed leadership</p></td>
  </tr>
  <tr>
    <td><p>Communication</p></td>
    <td><p>Willing and prepared participants</p></td>
  </tr>
  <tr>
    <td><p>Empowerment</p></td>
    <td><p>Prepared participants</p></td>
  </tr>
  <tr>
    <td><p>Resistance management</p></td>
    <td><p>Willing participants</p></td>
  </tr>
  <tr>
    <td><p>Reinforcement</p></td>
    <td><p>Sustained improvement</p></td>
  </tr>
</table>
<br>
<p>The activities of organizational change management interact with those of many other practices, particularly continual improvement and project management. Other practices with important links to organizational change management include measurement and reporting, workforce and talent management, and relationship management.</p>
<p>The various audiences affected by the change must be identified and their characteristics defined. Not all people will respond to the same messaging or be motivated by the same drivers. It is particularly important in organizational change management to take cultural differences into consideration, whether they are based on geography, nationality, corporate history, or other factors.</p>
<p>Unlike other practices, accountability for organizational change management cannot be transferred to an external supplier. Someone within the organization itself must be accountable for organizational change management, even if the execution of some or most of the organizational change management activities is delegated to other people or groups including suppliers. External expertise may, however, be sought to supplement the organizational change management capabilities of an organization. Sometimes organizations struggle with the key skillsets needed for organizational change management and can benefit from the support and guidance of an external supplier. Even if external help is used, the overall leadership support must still come from the organization itself.</p>
<p>Figure 5.6 shows the contribution of organizational change management to the
  service value chain, with the practice being involved in all value chain activities:</p>
<p><b>Plan</b> Decisions regarding change at the portfolio level cause the initiation of organizational change management to support an approved initiative.</p>
<p><b>Improve</b> Without proper organizational change management, improvement cannot be sustained.</p>
<p><b>Engage</b> The organizational change management practice actively engages with stakeholders at all stages of a change.</p>
<p><b>Design and transition</b> Organizational change management is essential for the deployment of a new service or a significant change to an existing one.</p>
<p><b>Obtain/build</b> Organizational change management ensures engagement and cooperation within and across projects.</p>
<p><b>Deliver and support</b> Organizational change management continues during live operations and support to ensure that the change has been adopted and is sustained.</p>
<p>Figure 5.6 Heat map of the contribution of organizational change management to value chain activities.</p>
<p><a href="/view-pdf/organizationalchangemenegement.pdf" ><img class="img-fluid" src="{{ asset('storage/images/itilfour/image028.jpg') }}"  alt="image028"></a></p>
<br>
<br>
<br>
<br>
<h3><a name="portfoliomanmd"></a>Portfolio management</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the portfolio management practice is to ensure that the organization has the right mix of programmes, projects, products, and services to execute the organization's strategy within its funding and resource constraints.</p>
<p>Portfolio management is a coordinated collection of strategic decisions that together enable the most effective balance of organizational change and business as usual. Portfolio management achieves this through the following activities:</p>
<ul>
  <li>Developing and applying a systematic framework to define and deliver a portfolio of products, services, programmes, and projects in support of specific strategies and objectives.</li>
  <li>Clearly defining products and services and linking them to the achievement of agreed outcomes, thus ensuring that all activities in the service value chain are aligned with value definition and the related CSFs.</li>
  <li>Evaluating and prioritizing incoming product, service, or project proposals and other change initiatives, based on resource constraints, existing commitments, and the organization's strategy and objectives.</li>
  <li>Implementing a strategic investment appraisal and decision-making process based on an understanding of the value, costs, risks, resource constraints, inter-dependencies, and impact on existing business activities.</li>
  <li>Analysing and tracking investments based on the value of products, services, programmes, and projects to the organization and its customers.</li>
  <li>Monitoring the performance of the overall portfolio and proposing adjustments in response to any changes in organizational priorities.</li>
  <li>Reviewing the portfolios in terms of progress, outcomes, costs, risk, benefits, and strategic contribution.</li>
</ul>
<p>Portfolio management plays an important role in how resources are allocated, deployed, and managed across the organization. This facilitates the alignment of resources and capabilities with customer outcomes as part of the strategy execution within the ITIL service value
  system (SVS).</p>
<p>Portfolio management encompasses a number of different portfolios, including the following:</p>
<p><b>Product/service portfolio</b> The product/service portfolio is the complete set of products and/or services that are managed by the organization, and it represents the organization's commitments and investments across all its customers and market spaces. It also represents current contractual commitments, new product and service development, and ongoing improvement plans initiated as a result of continual improvement. The portfolio may also include third-party products and services, which are an integral part of offerings to internal and external customers.</p>
<p><b>Project portfolio</b> The project portfolio is used to manage and coordinate projects that have been authorized, ensuring objectives are met within time and cost constraints and to specification. The project portfolio also ensures that projects are not duplicated, that they stay within the agreed scope, and that resources are available for each project. It is the tool used to manage single projects as well as large-scale programmes consisting of multiple projects.</p>
<p><b>Customer portfolio</b> The customer portfolio is maintained by the organization's relationship management practice, which provides important input to the portfolio management practice. The customer portfolio is used to record all the organization's customers and is the relationship manager's view of the internal and external customers who receive products and/or services from the organization.</p>
<p>Portfolio management uses the customer portfolio to ensure that the relationship between business outcomes, customers, and services is well understood. It documents these linkages and is validated with customers through the relationship management practice.</p>
<h5>Agile portfolio management</h5>
<p>The success of programmes and projects has historically been gauged by the extent to which implementation has been completed on time and within budget, and has delivered the required outputs, outcomes, and benefits. In many cases, however, organizations have struggled to demonstrate a return on their investment from change, and there is an increasing recognition that true success is only possible if the programme or project was the 'right' initiative to implement in the first place. Agile portfolio management takes this further, with an increased focus on visualizing strategic themes and the ability to reprioritize the portfolio swiftly, increase workflow, reduce batch sizes of work, and control the length of longer-term development queues.</p>
<p>Traditional portfolio management is focused on top-down planning with work laid out over longer time periods, but Agile portfolio management takes the concept of build-measure-learn cycles used by individual Agile teams and applies it on an organization-wide basis. Teams work together, use modular design, and share findings. This results in tremendous flexibility, which shifts the focus from continuing to execute an inflexible plan to delivering value and making tangible progress according to business strategy and goals.</p>
<p>Organizations practising Agile portfolio management communicate as much as possible across the business. They share knowledge and break barriers between organizational silos.</p>
<p>Figure 5.7 shows the contribution of portfolio management to the service value
  chain, with the practice being involved in all value chain activities:</p>
<p><b>Plan</b> Portfolio management provides important information about the status of projects, products, and services currently in the pipeline or catalogue and what strategic objectives they have been designed to meet, which is essential for planning. Portfolio management also includes reviewing the portfolios in terms of progress, value creation, costs, risk, benefits, and strategic contribution.</p>
<p><b>Improve</b> Portfolio management identifies opportunities to improve efficiency and increase collaboration, eliminate duplication between projects, and identify and mitigate risks. Improvement initiatives are prioritized and if approved may be added to the relevant portfolio.</p>
<p><b>Engage</b> When opportunities or demand are identified by the organization, the decisions on how to prioritize these are made based upon the organization's strategy plus the risk assessment and resource availability.</p>
<p><b>Design and transition, obtain/build, and deliver and support</b> Portfolio management is responsible for ensuring that products and services are clearly defined and linked to the achievement of business outcomes, so that these value chain activities are aligned with value.</p>
<p>Figure 5.7 Heat map of the contribution of portfolio management to value chain activities.</p>
<p><a href="/view-pdf/portfoliomanagement.pdf" ><img class="img-fluid"  src="{{ asset('storage/images/itilfour/image029.jpg') }}"  alt="image029"></a></p>
<br>
<br>
<br>
<br>
<h3><a name="projmanmd"></a>Project management</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the project management practice is to ensure that all projects in the organization are successfully delivered. This is achieved by planning, delegating, monitoring, and maintaining control of all aspects of a project, and keeping the motivation of the people involved.</p>
<p>Projects are one of the means by which significant changes are introduced to an organization, and they can be defined as temporary structures that are created for the purpose of delivering one or more outputs (or products) according to an agreed business case. They may be a stand-alone initiative or part of a larger programme, together with other interrelated projects, for more complex pieces of transformation. However, even stand-alone projects should be considered in the context of the organization's project portfolio.</p>
<p>There are different approaches to the way in which projects are delivered, with the waterfall and Agile methods being the most common:</p>
<ul>
  <li>The waterfall method works well in environments where the requirements are known upfront (and unlikely to significantly change), and where definition of the work is more important than the speed of delivery.</li>
  <li>The Agile method works best where requirements are uncertain and likely to evolve rapidly over time (for example, as business needs and priorities change), and where speed of delivery is often prioritized over the definition of precise requirements.</li>
</ul>
<p>Successful project management is important as the organization must balance its need to:</p>
<ul>
  <li>maintain current business operations effectively and efficiently
  <li>transform those business operations to change, survive, and compete in the market place
  <li>continually improve its products and services.</li>
</ul>
<p>This balance between projects and 'business as usual' can potentially impact a number of areas, including resources (people, assets, finances), service levels, customer relationships, and productivity, and so the organization's capacity and capability must be considered as part of its project management approach.</p>
<p>Projects depend on the behaviour of people both within the project team and the wider organization. The best project plan amounts to very little if the right people are not involved at the right time. The relationship between the project and the organization also needs to be considered, as many project team members will be seconded from business operations on a full, or part-time basis.</p>
<p>Figure 5.8 shows the contribution of project management to the service value chain,
  with the practice being involved in all value chain activities:</p>
<p><b>Plan</b> Project management supports strategic and tactical planning with methods and tools.</p>
<p><b>Improve</b> Many improvement initiatives are large and complex, so project management is the relevant practice to manage them.</p>
<p><b>Engage</b> Stakeholder engagement is a key element in the successful delivery of any project. Project management provides the organization with stakeholder management tools and techniques.</p>
<p><b>Design and transition</b> Design of a practice or service can be managed as a project or an iteration in a larger project; the same applies to some transitions.</p>
<p><b>Obtain/build</b> Obtaining new resources as well as development and integration is usually performed as a project. Various project management techniques are applicable to this activity.</p>
<p><b>Deliver and support</b> The design, transition, and handover to internal or external service consumers for operational management needs to be well planned and executed to ensure that business as usual is not compromised. The project management practice ensures this happens.</p>
<p>Figure 5.8 Heat map of the contribution of project management to value chain activities.</p>
<p><a href="/view-pdf/projectmanagement.pdf" ><img class="img-fluid" src="{{ asset('storage/images/itilfour/image031.jpg') }}"  alt="image031"></a></p><br>
<br>
<br>
<br>
<h3><a name="relmanmd"></a>Relationship management</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the relationship management practice is to establish and nurture the links between the organization and its stakeholders at strategic and tactical levels. It includes the identification, analysis, monitoring, and continual improvement of relationships with and between stakeholders.</p>
<p>The relationship management practice ensures that:</p>
<ul>
  <li>stakeholders' needs and drivers are understood, and products and services are prioritized appropriately
  <li>stakeholders' satisfaction is high and a constructive relationship between the organization and stakeholders is established and maintained
  <li>customers' priorities for new or changed products and services, in alignment with desired business outcomes, are effectively established and articulated
  <li>any stakeholders' complaints and escalations are handled well through a sympathetic (yet formal) process
  <li>products and services facilitate value creation for the service consumers as well as for the organization
  <li>the organization facilitates value creation for all stakeholders, in line with its strategy and priorities
  <li>conflicting stakeholder requirements are mediated appropriately.</li>
</ul>
<p>Service providers quite naturally focus most of their efforts on their relationships with service consumers (sponsors, customers, and users). It is a very important stakeholder group; however, organizations should ensure that they understand and manage their relationships with various stakeholders, both internal and external. The relationship management practice should apply to all relevant parties. This means that the practice contributes to all service value chain activities and multiple value streams.</p>
<p>Figure 5.9 shows the contribution of relationship management to the service value
  chain, with the practice being involved in all value chain activities:</p>
<p><b>Plan</b> Relationship management provides information on the requirements and expectations of internal and external customers. It also assists with strategic assessment and prioritization across portfolios as well as evaluating current and future market spaces, which are essential aspects of planning.</p>
<p><b>Improve</b> Relationship management seeks to harmonize and synergize different organizational relationships with internal and external customers to realize targeted benefits through continual improvement.</p>
<p><b>Engage</b> Relationship management is the practice responsible for engaging with internal and external customers to understand their requirements and priorities.</p>
<p><b>Design and transition</b> Relationship management plays a key role in coordinating feedback from internal and external customers as part of design. It also ensures that inconvenience and adverse impacts to customers during transition are prevented or minimized.</p>
<p><b>Obtain/build</b> Relationship management provides the customer requirements and priorities to help select products, services or service components to be obtained or built.</p>
<p><b>Deliver and support</b> Relationship management is responsible for ensuring that a high level of customer satisfaction and a constructive relationship between the organization and its customers are established and maintained.</p>
<p>Figure 5.9 Heat map of the contribution of relationship management to value chain activities.</p>
<p><a href="/view-pdf/relationshipmanagement.pdf" ><img class="img-fluid" src="{{ asset('storage/images/itilfour/image035.jpg') }}"  alt="image035"></a></p>
<br>
<br>
<br>
<br>
<h3><a name="riskmanmd"></a>Risk management</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the risk management practice is to ensure that the organization understands and effectively handles risks. Managing risk is essential to ensuring the ongoing sustainability of an organization and creating value for its customers. Risk management is an integral part of all organizational activities and therefore central to the organization's service value
  system (SVS) (see section 2.5.3 in the ITIL Four Foundation manual for a definition of risk).</p>
<p>Risk is normally perceived as something to be avoided because of its association with threats, and although this is generally true, risk is also associated with opportunity. Failure to take opportunities can be a risk in itself. The opportunity costs of under-served market spaces and unfulfilled demand is a risk to be avoided.</p>
<p>The organization's portfolio can be mapped to an underlying portfolio of risks to be managed. When service management is effective, products and services in the service catalogue and pipeline represent opportunities to create and capture value for customers, the organization, and other stakeholders. Otherwise, those products and services can represent threats due to the possibility of failure associated with the demand patterns they attract, the commitments they require, and the costs they generate. Implementing strategy often requires changes to the product and service portfolio, which means managing associated risks.</p>
<p>Decisions about risk need to be balanced so that the potential benefits are worth more to the organization than the cost to address the risk. For example, innovation is inherently risky but could provide major benefits in improving products and services, achieving competitive advantage, and increasing agility and resilience. The ability of the organization to limit its exposure to risk will also be of relevance. The aim should be to make an accurate assessment of the risks in a given situation, and analyse the potential benefits. The risks and opportunities presented by each course of action should be defined to identify appropriate responses.</p>
<p>For risk management to be effective, risks need to be:</p>
<p><b>Identified</b> Uncertainties that would affect the achievement of objectives within the context of a particular organizational activity. These uncertainties must be considered and then described to ensure that there is common understanding.</p>
<p><b>Assessed</b> The probability, impact, and proximity of individual risks must be estimated so they can be prioritized and the overall level of risk (risk exposure) associated with the organizational activity understood.</p>
<p><b>Treated</b> Appropriate responses to risks must be planned, assigning owners and actionees, and then implemented, monitored, and controlled.</p>
<p>The following principles apply specifically to the risk management practice:</p>
<ul>
  <li><b>Risk is part of business</b> The organization should ensure that risks are appropriately managed. This does not mean that all risks are to be avoided. On the contrary, risk-taking is required to ensure long-term sustainability. However, risks need to be identified, understood, and assessed against the levels of risk the organization is willing to take (i.e. the risk appetite), and appropriately managed and monitored.</li>
  <li><b>Risk management must be consistent across the organization</b> It is vital that the risk management practice is managed holistically to achieve consistency across the whole organization. To ensure effectiveness, there should be ongoing consultation with stakeholders and appropriate flexibility for different parts of the organization. This flexibility will allow tailored risk management procedures to be developed so that organizational units and/or customer-specific circumstances are addressed.</li>
  <li><b>Risk management culture and behaviours are important</b> The appropriate culture and behaviours demonstrated by all levels of the organization's personnel are critical and must be embedded as part of the 'way we do things'. This will be demonstrated by behaviours and beliefs such as:</li>
  <ul>
    <li>understanding that effective risk management is vital for the sustainability of the organization and supports the achievement of business goals
  </ul>
  <ul>
    <li>using proactive risk management behaviours
  </ul>
  <ul>
    <li>ensuring transparency and clarity of risk management procedures, roles, responsibilities, and accountabilities
  </ul>
  <ul>
    <li>actively encouraging and following up the reporting of risks, incidents, and opportunities
  </ul>
  <ul>
    <li>ensuring remuneration structures support desired behaviours (i.e. this should not discourage the reporting of incidents nor encourage over-reporting)
  </ul>
  <ul>
    <li>actively encouraging learning and growth in maturity from the organization's experiences and the experiences of other organizations.</li>
  </ul>
</ul>
<h5>ISO 31000:2018 Risk management</h5>
<p>These guidelines provide an overall and general perspective of the purpose and principles of risk management. They are applicable at all levels in any type of organization. ISO 31000 states that 'the purpose of risk management is the creation and protection of value' and that risk management 'improves performance, encourages innovation and supports the achievement of objectives'.</p>
<p>Figure 5.10 shows the contribution of risk management to the service value chain, with the practice being involved in all value chain activities:</p>
<p><b>Plan</b> Risk management provides essential inputs to the organization's strategy and planning, with a focus on risks that can drive variability of outcomes. These include:</p>
<ul>
  <li>shifts in customer demand and priorities
  <li>legal and regulatory changes
  <li>competitors
  <li>dependencies on suppliers and partners
  <li>technological changes
  <li>conflicting stakeholder requirements.</li>
</ul>
<p><b>Improve</b> All improvement initiatives should be assessed and continually controlled by risk management. The practice establishes an important perspective for improvement prioritization, planning, and review.</p>
<p><b>Engage</b> The risk management practice helps to identify key stakeholders and optimize engagement based on such information as risk appetite and risk profiles.</p>
<p><b>Design and transition</b> Products and services should be designed to address prioritized risks. For example, they should be scalable to support changes in demand over time. For the organization, new or changed services carry varying levels of risk which should be identified and assessed before the change is approved. If approved, the risks should be managed as part of the change, including releases, deployments, and projects.</p>
<p><b>Obtain/build</b> Risk management should inform decisions about the obtaining or building of products, services, or service components.</p>
<p><b>Deliver and support</b> Risk management helps to ensure that the ongoing delivery of products and services is maintained at the agreed level and that all events are managed according to the risks that they introduce.</p>
<p>Figure 5.10 Heat map of the contribution of risk management to value chain activities.</p>
<p><a href="/view-pdf/riskmanagement.pdf" ><img class="img-fluid" src="{{ asset('storage/images/itilfour/image037.jpg') }}"  alt="image037"></a></p> <br>
<br>
<br>
<br>
<h3><a name="servfinmanmd"></a>Service financial management</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the service financial management practice is to support the organization's strategies and plans for service management by ensuring that the organization's financial resources and investments are being used effectively.</p>
<p>Service financial management supports decision-making by the governing body and management of the organization regarding where to best allocate financial resources. It provides visibility into the budgeting, costing, and accounting activities related to the products and services. To be effective in the context of the service value
  system (SVS), this practice needs to be aligned with the organization's policies and practices for portfolio management, project management, and relationship management.</p>
<p>Finance is the common language which allows the organization to communicate effectively with its stakeholders. Service financial management is responsible for managing the budgeting, costing, accounting, and charging for the activities of an organization, acting as both service provider and service consumer:</p>
<p><b>Budgeting/costing</b> This is an activity focused on predicting and controlling the income and expenditure of money within the organization. Budgeting consists of a periodic negotiation cycle to set budgets and ongoing monitoring of the current budgets. To accomplish this objective, it focuses on capturing forecasted and actual service demand. It translates this demand into anticipated operating and project costs used for setting budgets and rates to ensure adequate funding for products and services. Service-based budgeting seeks to understand the budget and establish funding models based on the full cost of providing or consuming a service.</p>
<p><b>Accounting</b> This activity enables the organization to account fully for the way its money is spent, allowing it to compare forecast vs actual costs and expenditures (particularly the ability to identify usage and costs by customer, service, and activity/cost centre). It usually involves accounting systems, including ledgers, charts of accounts, and journals.</p>
<p><b>Charging</b> This activity is required to formally invoice service consumers (usually external) for the services provided to them. It is important to note that while charging is an optional practice, all services require a funding model, because all costs need to be adequately funded by an agreed method.</p>
<h5>Evolution of financial management with new technology</h5>
<p>Financial management refers to the efficient and effective management of money in the most appropriate manner to accomplish the financial objectives of the organization. Since its inception, the financial management discipline has gone through various degrees of change, improvement, and innovation. A key component of this change has been the emergence of new technology.</p>
<p>Many technological developments have impacted upon financial management, but the three key innovations are the introduction of a greater number of digital technologies, blockchain, and IT budgets and payment models.</p>
<h5>Digital technologies</h5>
<p>Major financial institutions are now analysing and using the latest technologies such as the cloud, big data, analytics, and artificial intelligence (AI) to gain, or even just to maintain, competitive advantage in the market place. However, new financial organizations are also using these technologies and starting operations without any legacy IT, technical debt, or bureaucratic processes, which means they tend to be more Agile.</p>
<p>Big data and analytics are being used by financial organizations to gain deeper insight into, and understanding of, their customers. The amount of data being captured is phenomenal and requires scalable computing power to process the data efficiently and cost-effectively. In return, this deeper customer understanding is causing financial organizations to develop new and innovative products and services. Data is now being referred to as the 'new oil', as organizations are scrambling to capture, analyse, and exploit it.</p>
<h5>Blockchain</h5>
<p>Another evolution in financial management is happening through a specific innovation called blockchain, again enabled only through cloud-based services. Initially blockchain was developed to enable the de-centralized management of crypto-currencies, allowing transactions to be audited and verified automatically and inexpensively.</p>
<p>Blockchain technologies are used to manage public digital ledgers. These digital ledgers record transactions across many globally distributed computers. The distribution of records ensures that each record cannot be changed without the alteration of all subsequent records (also known as blocks) and without the consensus of the entire distributed ledger (also called the network).</p>
<p>Global financial institutions are researching how this blockchain technology can provide them with competitive advantage by streamlining back-office functions and reducing settlement rates for banking transactions. New financial organizations are investigating blockchain to deliver alternative banking functions at a fraction of the cost and overheads of traditional banks.</p>
<h5>IT budgets and payment models</h5>
<p>The emergence of new technology has not just affected financial organizations, but also the way that every organization manages its IT services from a financial perspective. Much of the current wave of technological evolution has been enabled by cloud computing, and this seems likely to continue for the foreseeable future. This has led to a major change in how IT services are obtained, funded, and paid for by organizations.</p>
<p>Traditionally, IT resources were obtained using upfront capital expenditure (CAPEX). However, under the cloud model, the provision of IT infrastructure, platforms, and software is provided 'as a service'. This model generally uses subscription-based or pay-as-you-use charging mechanisms which are paid for out of operational expenditure (OPEX).</p>
<p>Another area that has seen change is the organization's approach to setting and managing IT budgets. Flexible IT budgets are required to meet the costs of scaling cloud-based services in an Agile and on-demand way. Fixed IT budgets, often forecast months in advance, struggle to account for the scaling of IT resources in this way.</p>
<p>Procurement rules within organizations are also having to change. There remains a place for fixed-price IT projects and services; however, cloud-based digital services are generally sold under a variable-price model, i.e. the more you use and consume, the more you pay, and vice versa. Therefore, those organizations that have not updated their procurement rules to allow them to buy variable-priced IT resources will face a large self-made barrier preventing them from using cloud-based digital services. To be as effective as possible, organizations must update their policies and educate their staff to ensure that they can purchase IT under a variable-priced model.</p>
<p>Figure 5.11 shows the contribution of service financial management to the service
  value chain, with the practice being involved in all value chain activities:</p>
<p><b>Plan</b> Plans at all levels need funding based on information, including financial. Service financial management supports planning with budgets, reports, forecasts, and other relevant information.</p>
<p><b>Improve</b> All improvements should be prioritized with return on investment in mind. Service financial management provides tools and information for improvements evaluation and prioritization.</p>
<p><b>Engage</b> Financial considerations are important for establishing and maintaining service relationships with service consumers, suppliers, and partners. For some stakeholders (investors, sponsors) the financial aspect of the relationship is the most important. The practice supports this value chain activity by providing financial information.</p>
<p><b>Design and transition</b> Service financial management helps to keep this activity cost-effective by providing the means for financial planning and control. It also ensures transparency of costs for products and services for the service provider, accounting for design and transition expenditures.</p>
<p><b>Obtain/build</b> Obtaining resources of all types is supported by budgeting (to ensure sufficient funding) and accounting (to ensure transparency and evaluation).</p>
<p><b>Deliver and support</b> Ongoing operational costs are a significant part of the organization's expenditures. For commercial organizations, ongoing service delivery activities are also the source of income. Service financial management helps to ensure sufficient understanding of both. Charging (if applicable) supports the service provider and the service consumer in their relationships with billing and reporting.</p>
<p>Figure 5.11 Heat map of the contribution of service financial management to value chain activities.</p>
<p><a href="/view-pdf/servicefinancialmanagement.pdf" ><img class="img-fluid" src="{{ asset('storage/images/itilfour/image042.jpg') }}"  alt="image042"></a></p>
<br>
<br>
<br>
<br>
<h3><a name="stratmanmd"></a>Strategy management</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the strategy management practice is to formulate the goals of the organization and adopt the courses of action and allocation of resources necessary for achieving those goals. Strategy management establishes the organization's direction, focuses effort, defines or clarifies the organization's priorities, and provides consistency or guidance in response to the environment.</p>
<p>The starting point for strategy management is to understand the context of the organization and define the desired outcomes. The strategy of the organization establishes criteria and mechanisms that help to decide how to best prioritize resources, capabilities, and investment to achieve those outcomes, while the practice ensures that the strategy is defined, agreed, maintained, and achieved.</p>
<p>The objectives of strategy management are to:</p>
<ul>
  <li>analyse the environment in which the organization exists to identify opportunities that will benefit the organization
  <li>identify constraints that might prevent the achievement of business outcomes and define how those constraints could be removed or their effects reduced
  <li>decide and agree the organization's perspective and direction with relevant stakeholders, including its vision, mission, and principles
  <li>establish the perspective and position of the organization relative to its customers and competitors. This includes defining which services and products will be delivered to which market spaces and how to maintain competitive advantage
  <li>ensure that the strategy has been translated into tactical and operational plans for each organizational unit that is expected to deliver on the strategy
  <li>ensure the strategy is implemented through execution of the strategic plans and coordination of efforts at the strategic, tactical, and operational levels
  <li>manage changes to the strategies and related documents, ensuring that strategies keep pace with changes to internal and external environments and other relevant factors.</li>
</ul>
<p>Strategy management is often seen as the responsibility of the senior management and governing body of an organization. It enables them to set the objectives of the organization, to specify how the organization will meet those objectives, and to prioritize the investments that are required to meet them. However, in today's complex, fast-changing environment, traditional strategy practices, based on careful deliberation, extensive research, and scenario planning, are also evolving. Strategy is becoming more fluid and there is an increased focus on establishing the essential purpose and principles of an organization, which can serve as the guiding direction for all its actions, even as circumstances change. For example, a Lean strategy process can be used to balance the extremes of rigid planning and uncontrolled experimentation. The strategy provides the overall direction and alignment of the organization, serving as both a screen that innovative ideas must pass and a basis for evaluating the success of the service value
  system (SVS). It encourages employees to be creative, while ensuring that they are in harmony with the organization and pursue only valuable opportunities.</p>
<p>Strategy must enable value creation for the organization. A good business model describes the means of fulfilling an organization's objectives. The strategy of the organization should include some way to make its services and products uniquely valuable to its customers; it must therefore define the organization's approach for delivering better value. The need for a strategy is not limited to larger organizations; it is just as important for smaller ones, allowing them to have a clear perspective, positioning, and plans to ensure that they remain relevant to their customers.</p>
<p>Customers want solutions that break through performance barriers and achieve higher-quality outcomes with little or no increase in cost. Such solutions are usually made available through innovative products and services. The strategy should balance the organization's need to deliver both efficient and effective operations with innovation and future-focused activities.</p>
<p>The value of products and services from either the customer's or the organization's perspective may alter over time due to changing conditions, events, or other factors outside an organization's control. Strategy management ensures a carefully considered approach to the organization's relationships with customers, as well as both agility and resilience in dealing with the variations in value that define those relationships.</p>
<p>A high-performance strategy is one that enables an organization to consistently outperform competing alternatives over time, across business cycles, during industry disruptions, and when changes in leadership occur. It should be focused on what needs to be done across the organization to facilitate value creation.</p>
<p>Figure 5.12 shows the contribution of strategy management to the service value chain, with the practice being involved in all value chain activities.</p>
<p><b>Plan</b> Strategy management ensures that the organization’s strategy has been
  translated into tactical and operational plans for each organizational unit that is
  expected to deliver on the strategy.</p>
<p><b>Improve</b> Strategy management provides strategy and objectives to be used to prioritize and evaluate improvements.</p>
<p><b>Engage</b> When opportunities or demand are identified by the organization, the decisions about how to prioritize these are based upon the organization's strategy plus the risk assessment and resource availability.</p>
<p><b>Design and transition, obtain/build, and deliver and support</b> Strategy management ensures the strategy is implemented through execution of the strategic plans in coordination with these activities. It also provides feedback to enable the measurement and evaluation of products and services during design and transition.</p>
<p>Figure 5.12 Heat map of the contribution of strategy management to value chain activities.</p>
<p><a href="/view-pdf/strategymanagement.pdf" ><img class="img-fluid" src="{{ asset('storage/images/itilfour/image043.jpg') }}"  alt="image043"></a></p>
<br>
<br>
<br>
<br>
<h3><a name="supmanmd"></a>Supplier management</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the supplier management practice is to ensure that the organization's suppliers and their performances are managed appropriately to support the seamless provision of quality products and services. This includes creating closer, more collaborative relationships with key suppliers to uncover and realize new value and reduce the risk of failure.</p>
<p>Activities that are central to the practice include:</p>
<ul>
  <li><b>Creating a single point of visibility and control to ensure consistency</b> This should be across all products, services, service components, and procedures provided or operated by internal and external suppliers, including customers acting as suppliers.</li>
  <li><b>Maintaining a supplier strategy, policy, and contract management information</b></li>
  <li><b>Negotiating and agreeing contracts and arrangements</b> Agreements need to be aligned with business needs and service targets. Contracts with external suppliers might need to be negotiated or agreed through the legal, procurement, commercial, or contracts functions of the organization. For an internal supplier there will need to be an internal agreement.</li>
  <li><b>Managing relationships and contracts with internal and external suppliers</b> This should be done when planning, designing, building, orchestrating, transitioning, and operating products and services, working closely with procurement and performance management.</li>
  <li><b>Managing supplier performance</b> Supplier performance should be monitored to ensure that they meet the terms, conditions, and targets of their contracts and agreements, while aiming to increase the value for money obtained from suppliers and the products/services they provide.</li>
</ul>
<h5>Sourcing, supplier strategy, and relationships</h5>
<p>The supplier strategy, sometimes called the sourcing strategy, defines the organization's plan for how it will leverage the contribution of suppliers in the achievement of its overall service management strategy.</p>
<p>Some organizations may adopt a strategy that dictates the use of suppliers only in very specific and limited circumstances, while another organization may choose to make extensive use of suppliers in product and service provision. A successful sourcing strategy requires a thorough understanding of an organization's objectives, the resources required to deliver that strategy, the environmental (e.g. market) factors, and the risks associated with implementing specific approaches.</p>
<p>There are different types of supplier relationship between an organization and its suppliers that need to be considered as part of the organization's sourcing strategy. These include:</p>
<ul>
  <li><b>Insourcing</b> The products or services are developed and/or delivered internally by the organization.</li>
  <li><b>Outsourcing</b> The process of having external suppliers provide products and services that were previously provided internally. Outsourcing involves substitution, i.e. the replacement of internal capability by that of the supplier.</li>
  <li><b>Single source or partnership</b> Procurement of a product or service from one supplier. This can either be a single supplier who supplies all services directly or an external service integrator who manages the relationships with all suppliers and integrates their services on behalf of the organization. These close relationships (and the mutual interdependence they create) foster high quality, reliability, short lead times, and cooperative action.</li>
  <li><b>Multi-sourcing</b> Procurement of a product or service from more than one independent supplier. These products and services can be combined to form new services which the organization can provide to internal and external customers. As organizations place more focus on increased specialization and compartmentalization of capabilities to increase agility, multi-sourcing is increasingly a preferred option. Traditionally organizations have managed these suppliers separately across different parts of the organization, but there is a move towards developing an internal service integration capability or selecting an external service integrator.</li>
</ul>
<p>Individual suppliers can provide support services and products that independently have a relatively minor and fairly indirect role in value generation, but collectively make a much more direct and important contribution to this and the implementation of the organization's strategy.</p>
<h5>Evaluation and selection of suppliers</h5>
<p>The organization should evaluate and select suppliers based on:</p>
<ul>
  <li><b>Importance and impact</b> The value of the service to the business, provided by the supplier.</li>
  <li><b>Risk</b> The risks associated with using the service.</li>
  <li><b>Costs</b> The cost of the service and its provision.</li>
</ul>
<p>Other important factors in evaluating and selecting suppliers include the willingness or feasibility of a supplier to customize its offerings or work cooperatively in a multi-­supplier environment; the level of influence of the organization or service integrator on the supplier's performance; and the degree of dependence of one supplier on other suppliers.</p>
<h5>Activities</h5>
<p>Activities of the supplier management practice include:</p>
<ul>
  <li><b>Supplier planning</b> The purpose of this activity is to understand new or changed service requirements and review relevant enterprise documentation to develop a sourcing strategy and supplier management plan, working in conjunction with other practices such as business analysis, portfolio management, service design, and service level management.</li>
  <li><b>Evaluation of suppliers and contracts</b> The purpose of this activity is to identify, evaluate, and select suppliers for the delivery of new or changed business services.</li>
  <li><b>Supplier and contract negotiation</b> The purpose of this activity is to develop, negotiate, review, update, finalize, and award supplier contracts. The failure of negotiations will trigger a new contract, an updated contract, or a contract termination.</li>
  <li><b>Supplier categorization</b> This procedure aims to categorize suppliers on a periodic basis and after the awarding of new or updated contracts. Commonly used categories include strategic, tactical, and commodity suppliers.</li>
  <li><b>Supplier and contract management</b> The purpose of this activity is to ensure that the organization obtains value for money and the delivery of the agreed performance of the supplier against the contract and targets.</li>
  <li><b>Warranty management</b> The purpose of this activity is to manage warranty requirements or clauses and make warranty claims when a warranty issue arises, in conjunction with performance management.</li>
  <li><b>Performance management</b> This activity includes the setup and continuous tracking of operational measures that have been mutually agreed with internal and external suppliers. It focuses on the key measures, which can then be consolidated on a supplier scorecard. Monitoring will allow for the identification of systemic problems and improvement opportunities and provide a basis for reporting.</li>
  <li><b>Contract renewal and/or termination</b> This procedure aims to manage contract renewals and terminations, which are triggered by either specific or periodic reviews of supplier performance.</li>
</ul>
<h5>Service integration</h5>
<p>Service integration is responsible for coordinating or orchestrating all the suppliers involved in the development and delivery of products and services. It focuses on the end-to-end provision of service, ensuring control of all interfaces and outcomes from suppliers, and facilitating collaboration between suppliers. An organization can either perform the role of service integrator itself, or use a third-party service integrator. It is possible to develop a hybrid model, where the organization is responsible for some of the service integration function and augments that capability with that of an external service integrator. The service integration function can also be operated by a lead supplier. The service integrator is also responsible for assurance; this includes performance management and reporting, defining roles and responsibilities, maintaining relationships across all parties, and heading regular forums and steering committees to address issues, agree priorities, and make decisions.</p>
<p>Figure 5.13 shows the contribution of supplier management to the service value chain, with the practice being involved in all value chain activities.</p>
<p><b>Plan</b> Supplier management provides the organization's approved sourcing strategy and plan.</p>
<p><b>Improve</b> The practice identifies opportunities for improvement with existing suppliers, is involved in the selection of new suppliers, and provides ongoing supplier performance management.</p>
<p><b>Engage</b> Supplier management is responsible for engaging with all suppliers and for the evaluation and selection of suppliers; for negotiating and agreeing contracts and agreements; and for ongoing management of supplier relationships.</p>
<p><b>Design and transition</b> Supplier management is responsible for defining requirements for contracts and agreements related to new or changed products or services, in alignment with the organization's needs and service targets.</p>
<p><b>Obtain/build</b> Supplier management supports the procurement or obtaining of products, services, and service components from third parties.</p>
<p><b>Deliver and support</b> Supplier performance for live services is managed by this practice to ensure that suppliers meet the terms, conditions, and targets of their contracts and agreements.</p>
<p>Figure 5.13 shows the contribution of supplier management to the service value chain, with the practice being involved in all value chain activities.</p>
<p><a href="/view-pdf/suppliermanagement.pdf" ><img class="img-fluid"src="{{ asset('storage/images/itilfour/image044.jpg') }}" \ alt="image044"></a></p>
<br>
<br>
<br>
<br>
<h3><a name="workftalentmanmd"></a>Workforce and talent management</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the workforce and talent management practice is to ensure that the organization has the right people with the appropriate skills and knowledge and in the correct roles to support its business objectives. The practice covers a broad set of activities focused on successfully engaging with the organization's employees and people resources, including planning, recruitment, onboarding, learning and development, performance measurement, and succession planning.</p>
<p>Workforce and talent management plays a critical role in establishing organizational velocity by helping organizations to proactively understand and forecast future demand for services. It also ensures that the right people with the necessary competencies are available at the right time to deliver the services required.</p>
<p>Achieving this objective reduces backlogs, improves quality, avoids rework caused by defects, and reduces wait time while also closing knowledge and skills gaps. As organizations transform their practices and automation and organizational capabilities to support the digital economy and improve speed to market, having the right talent becomes critical.</p>
<p>Workforce and talent management enables organizations, leaders, and managers to focus on creating an effective and actionable people strategy, and to execute that strategy at various levels within the organization. A good strategy should support the identification of roles and associated knowledge, as well as the skills and attitudes needed to keep an organization running day to day. It should also address the emerging technologies and leadership and organizational change capabilities required to position the organization for future growth.</p>
<p>The idea of managing and developing an organization's workforce and talent is not new. However, with the increased use of third-party suppliers and the rapid adoption of automation for repeatable work, traditional roles are changing dramatically. Because of this, workforce and talent management should be the responsibility of leaders and managers at every level throughout the organization.</p>
<p><img class="img-fluid" src="{{ asset('storage/images/itilfour/image099.jpg') }}"  alt="image099"></p>
<h5>Definitions</h5>
<ul>
  <li><b>Organizational velocity</b> The speed, effectiveness, and efficiency with which an organization operates. Organizational velocity influences time to market, quality, safety, costs, and risks.</li>
  <li><b>Competencies</b> The combination of observable and measurable knowledge, skills, abilities, and attitudes that contribute to enhanced employee performance and ultimately result in organizational success.</li>
  <li><b>Skills</b> A developed proficiency or dexterity in thought, verbal communication, or physical action.</li>
  <li><b>Ability</b> The power or aptitude to perform physical or mental activities related to a profession or trade.</li>
  <li><b>Knowledge</b> The understanding of facts or information acquired by a person through experience or education; the theoretical or practical understanding of a subject.</li>
  <li><b>Attitude</b> A set of emotions, beliefs, and behaviours towards a particular object, person, thing, or event.</li>
</ul>
<h5>Workforce and talent management activities</h5>
<p>The activities of this practice cover a broad range of areas and are performed by a variety of roles for specific purposes, including:</p>
<ul>
  <li><b>Workforce planning</b> Translating the organization's strategy and objectives into desired organizational capabilities, and then into competencies and roles.</li>
  <li><b>Recruitment</b> The acquisition of new employees and contractors to fill identified gaps related to desired capabilities.</li>
  <li><b>Performance measurement</b> The delivery of regular performance measurement and assessments against established job roles based on pre-defined competencies.</li>
  <li><b>Personal development</b> An employee's use of published job roles and competency frameworks to proactively plan personal growth and advancement.</li>
  <li><b>Learning and development</b> Targeted education and experiential learning opportunities using various formal and non-formal methods.</li>
  <li><b>Mentoring and succession planning</b> Formal mentoring, engagement, and succession planning activities provided by leadership.</li>
</ul>
<br>
<p align="center"><a name="bookmark514"></a>Figure 5.14 Workforce and talent management activities.</p>
<p align="center"><img class="img-fluid" src="{{ asset('storage/images/itilfour/image052.png') }}"></p>
<br>
<br>
<p>Figure 5.15 shows the contribution of workforce and talent management to the
  service value chain, with the practice being involved in all value chain activities;
  however, it is a primary focus of plan and improve activities:</p>
<p><b>Plan</b> Workforce planning is a specific output of this value chain activity, as leadership and management evaluate their current organizational capabilities in relation to future requirements for the organization's resources, as well as the products and services defined within the service portfolio.</p>
<p><b>Improve</b> All improvements require sufficiently skilled and motivated people. The workforce and talent management practice ensures understanding and fulfilment of these requirements.</p>
<p><b>Engage</b> Workforce and talent management is closely linked to this value chain activity. It works with practices such as relationship management, service request management, and service desk to understand and forecast changing service demand requirements, and how this will impact and direct workforce planning and talent management activities.</p>
<p><b>Design and transition</b> Talent management is important to this value chain activity. Specific focus is given to knowledge, skills, and abilities related to systems and design thinking.</p>
<p><b>Obtain/build</b> Talent management focuses specifically on knowledge, skills, and abilities related to collaboration, customer focus, quality, speed, and cost management.</p>
<p><b>Deliver and support</b> Specific focus by talent management is given to knowledge, skills, and abilities related to customer service, performance management, and customer interactions and relationships.</p>
<p><a name="bookmark515"></a>Figure 5.15 Heat map of the contribution of workforce and talent management to value chain activities.</p>
<p><a href="/view-pdf/workforceandtalentmanagement.pdf" ><img class="img-fluid" src="{{ asset('storage/images/itilfour/image053.jpg') }}"></a></p>
<br>
<br>
<br>
<br>
<h2><a name="smp"></a>Service management practices</h2>
<h3><a name="availmanmd"></a>Availability management</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the availability management practice is to ensure that services deliver agreed levels of availability to meet the needs of customers and users.</p>
<p><img class="img-fluid" src="{{ asset('storage/images/itilfour/image099.jpg') }}"  alt="image099"></p>
<h5>Definition of Availability:</h5>
<p>The ability of an IT service or other configuration item to perform its agreed function when required.</p>
<h5>Availability management activities include:</h5>
<ul>
  <li>negotiating and agreeing achievable targets for availability
  <li>designing infrastructure and applications that can deliver required availability levels
  <li>ensuring that services and components are able to collect the data required to measure availability
  <li>monitoring, analysing, and reporting on availability
  <li>planning improvements to availability.</li>
</ul>
<p>In the simplest terms, the availability of a service depends on how frequently the service fails, and how quickly it recovers after a failure. These are often expressed as mean time between failures (<b>MTBF</b>) and mean time to restore service (<b>MTRS</b>):</p>
<ul>
  <li><b>MTBF</b> measures how frequently the service fails. For example, a service with a MTBF of four weeks fails, on average, 13 times each year.</li>
  <li><b>MTRS</b> measures how quickly service is restored after a failure. For example, a service with a MTRS of four hours will, on average, fully recover from failure in four hours. This does not mean that service will always be restored in four hours, as MTRS is an average over many incidents.</li>
</ul>
<p>Older services were often designed with very high MTBF, so that they would fail infrequently. More recently there has been a shift towards optimizing service design to minimize MTRS, so that services can be recovered very quickly. The most effective way to do this is to design anti-fragile solutions, which recover automatically and very quickly, with virtually no business impact. For some services, even a very short failure can be catastrophic, and for these it is more important to focus on increasing MTBF.</p>
<p>The way that availability is defined must be appropriate for each service. It is important to understand users' and customers' views on availability and to define appropriate metrics, reports, and dashboards. Many organizations calculate percentage availability based on MTBF and MTRS, but these percentage figures rarely match customers' experience, and are not appropriate for most services. Other things that should be considered include:</p>
<ul>
  <li>which vital business functions are affected by different application failures
  <li>at what point is slow performance so bad that the service is effectively unusable
  <li>when does the service need to be available, and when can the service provider carry out maintenance activities.</li>
</ul>
<h5>Measurements that work well for some services include:</h5>
<ul>
  <li><b>User outage minutes</b> Calculated by multiplying incident duration by the number of users impacted, or by adding up the number of minutes each user is affected. This works well for services that directly support user productivity; for example, an email service.</li>
  <li><b>Number of lost transactions</b> Calculated by subtracting the number of transactions from the number expected to have happened during the time period. This works well for services that support transaction-based business processes, such as manufacturing support.</li>
  <li><b>Lost business value</b> Calculated by measuring how business productivity was impacted by the failures of supporting services. This is easily understood by customers and can be useful for planning investment in improved availability. However, it can be difficult to identify which lost business value was caused by IT service failures and which had other causes.</li>
  <li><b>User satisfaction</b> Service availability is one of the most important and visible characteristics of services, and has a great influence on user satisfaction. It is important to make sure that users are satisfied with service availability in addition to meeting formally agreed availability targets.</li>
</ul>
<p>Most organizations do not have dedicated availability management staff. The activities needed are often distributed around the organization. Some organizations include availability management activities as part of risk management, while others combine it with service continuity management or with capacity and performance management. Some organizations have site reliability engineers (SREs) who manage and improve the availability of specific products or services.</p>
<p>A process is needed for the regular testing of failover and recovery mechanisms. Many organizations also have a process for calculating and reporting availability metrics; however, availability management is driven as much by culture, experience, and knowledge as by following procedures.</p>
<p>Figure 5.16 shows the contribution of availability management to the service value chain, with the practice being involved in all value chain activities:</p>
<p><b>Plan</b> Availability management must be considered in service portfolio decisions and when setting goals and direction for services and practices.</p>
<p><b>Improve</b> When planning and making improvements, availability management ensures that services are not degraded.</p>
<p><b>Engage</b> Availability requirements for new and changed services must be understood and captured.</p>
<p><b>Design and transition</b> New and changed services must be designed to meet availability targets and testing of availability controls is needed during transition.</p>
<p><b>Obtain/build</b> Availability is a consideration when building components or obtaining them from third parties.</p>
<p><b>Deliver and support</b> This activity includes measurement of availability and reacting to events which might affect the ability to meet availability targets.</p>
<p>Figure 5.16 Heat map of the contribution of availability management to value chain activities.</p>
<p><a href="/view-pdf/availabilitymanagement.pdf" ><img class="img-fluid" src="{{ asset('storage/images/itilfour/image057.jpg') }}"  alt="image057"></a></p>
<br>
<br>
<br>
<br>
<h3><a name="buisanalmd"></a>Business analysis</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the business analysis practice is to analyse a business or some element of it, define its associated needs, and recommend solutions to address these needs and/or solve a business problem, which must facilitate value creation for stakeholders. Business analysis enables an organization to communicate its needs in a meaningful way, express the rationale for change, and design and describe solutions that enable value creation in alignment with the organization's objectives.</p>
<p>Analysis and solutions should be approached in a holistic way that includes consideration of processes, organizational change, technology, information, policies, and strategic planning. The work of business analysis is performed primarily by business analysts (BAs), although others may contribute.</p>
<p>In IT, business analysis practices are frequently applied in software development projects, but they are also appropriate to higher-level architectures, services, and the organization's service value system (SVS) in general. To restrict the application of business analysis to software development alone is to run the risk of developing incomplete solutions.</p>
<h5>The key activities associated with business analysis are:</h5>
<ul>
  <li>analysing business systems, business processes, services, or architectures in the changing internal and external context
  <li>identifying and prioritizing parts of the service value
    system (SVS), and products and services that require improvement, as well as opportunities for innovation
  <li>evaluating and proposing actions that can be taken to create the desired improvement. Actions may include not only IT system changes, but also process changes, alterations to organizational structure, and staff development
  <li>documenting the business requirements for the supporting services to enable the desired improvements
  <li>recommending solutions following analysis of the gathered requirements and validating these with stakeholders.</li>
</ul>
<h5>Business requirements can be utility-focused or warranty-focused.</h5>
<p><img class="img-fluid" src="{{ asset('storage/images/itilfour/image099.jpg') }}"  alt="image099"></p>
<h5>Definitions</h5>
<p><b>Warranty requirements</b> Typically non-functional requirements captured as inputs from key stakeholders and other practices. Organizations should aim to manage a library of pre-defined warranty acceptance criteria for use in practices such as project management and software development and management.</p>
<p><b>Utility requirements</b> Functional requirements which have been defined by the customer and are unique to a specific product.</p>
<p>Business analysis should ensure the most efficient and comprehensive achievement of these activities, but not make the error of analysis without intent of subsequent action. An organization should not attempt to analyse an issue so deeply or for so long that a timely solution cannot be achieved, or try to solve every problem with a single, massive initiative that fails to facilitate value creation in enough time to be of practical use. The processes associated with this practice should guard against these mistakes.</p>
<p>The scope of work for the business analysis practice includes using and evaluating information from operations and support to build knowledge of how the services and practices are performing in the live environment. This knowledge will not only help to identify areas for improvement in the current service design, but also reveal lessons learned that will improve future designs.</p>
<p>The role of business analysis may be defined differently from organization to organization, but it is a recognized discipline with a specific set of skills. Business analysis requires not only critical thinking and evaluation, but also listening, communication, and facilitation skills, the ability to analyse and document business processes and use cases, and perform data analysis and modelling.</p>
<p>When the system or service being analysed crosses many organizational boundaries, it is important that the various business units involved adopt a partner relationship to ensure a holistic analysis and comprehensive solution proposal. If compromises are needed from one or more of these units, a collaborative, partner-like relationship will facilitate a solution that will provide value for all the parties.</p>
<p>Without the right information, business analysis cannot be successful, and to be effective, it needs access to all information related to the area under analysis. For business processes, for example, business analysts will need access to all process documentation, including process flows, procedures and work instructions, policies, and process metrics. They may need to interview not only the person responsible for the business process, but also those who participate in each part of the process to compile a clear view of the process and the related issues.</p>
<p>The technologies deployed usually include whatever system the organization uses to gather and document requirements, as well as project management systems and reporting tools for gathering and processing data and information for analysis.</p>
<p>Other technologies that can be of assistance when presenting the results of analysis are visual modelling and mapping tools and features of many of the typical office productivity suites such as spreadsheets, presentation software, and word processing.</p>
<p>As with all practices, business analysis cannot ensure successful solutions in isolation. For example, strategy management practices provide high-level guidance to business analysis, which then directs analysis and solution recommendations. In turn, the recommendations from business analysis can influence technical and other strategies. To ensure the participation of the right parties, business analysis relies on relationship management. Furthermore, the natural progression through the service value chain requires interaction between business analysis activities and those from service design, software development and management, measurement and reporting, and many others.</p>
<p>Figure 5.17 shows the contribution of business analysis to the service value chain,
  with the practice being involved in all value chain activities:</p>
<p><b>Plan</b> Business analysis contributes to strategic decision-making on what will be done and how.</p>
<p><b>Improve</b> All levels of evaluation and improvement benefit from business analysis, which is particularly applicable at strategic and tactical levels.</p>
<p><b>Engage</b> Business analysis is key to the gathering of requirements during this value chain activity.</p>
<p><b>Design and transition</b> Gathering, prioritization, and analysis of accurate requirements can help ensure that a high-quality solution is designed and progressed to operation.</p>
<p><b>Obtain/build</b> Business analysis skills are integral to the definition of an agreed solution.</p>
<p><b>Deliver and support</b> Data from the ongoing delivery of a service can be part of business analysis activities when designing changes to the service, as well as when looking for opportunities for continual improvement.<br>
</p>
<p>Figure 5.17 Heat map of the contribution of business analysis to value chain activities.</p>
<p><a href="/view-pdf/businessanalysis.pdf" ><img class="img-fluid" src="{{ asset('storage/images/itilfour/image059.jpg') }}"  alt="image059"></a></p> <br>
  <br>
  <br>
  <br>
<h3><a name="capperfmanmd"></a>Capacity and performance management</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the capacity and performance management practice is to ensure that services achieve agreed and expected performance, satisfying current and future demand in a cost-effective way.
<p><img class="img-fluid" src="{{ asset('storage/images/itilfour/image099.jpg') }}"  alt="image099"></p>
<h5>Definition: Performance</h5>
<p>A measure of what is achieved or delivered by a system, person, team, practice, or service.<br>
</p>
<p>Service performance is usually associated with the number of service actions performed in a timeframe and the time required to fulfil a service action at a given level of demand. Service performance depends on service capacity, which is defined as the maximum throughput that a configuration item (Cl) or service can deliver. Specific metrics for capacity and performance depend on the technology and business nature of the service or Cl.</p>
<p>The capacity and performance management practice usually deals with service performance and the performance of the supporting resources on which it depends, such as infrastructure, applications, and third-party services. In many organizations, the capacity and performance management practice also covers the capacity and performance of the personnel.</p>
<p>The capacity and performance management practice includes the following activities:</p>
<ul>
  <li>service performance and capacity analysis:</li>
  <ul>
    <li>research and monitoring of the current service performance
  </ul>
  <ul>
    <li>capacity and performance modelling
  </ul>
  <li>service performance and capacity planning:</li>
  <ul>
    <li>capacity requirements analysis
  </ul>
  <ul>
    <li>demand forecasting and resource planning
  </ul>
  <ul>
    <li>performance improvement planning.</li>
  </ul>
</ul>
<p>Service performance is an important aspect of the expectations and requirements of customers and users, and therefore significantly contributes to their satisfaction with the services they use and the value they perceive. Capacity and performance analysis and planning contributes to service planning and building, as well as to ongoing service delivery, evaluation, and improvement. An understanding of capacity and performance models and patterns helps to forecast demand and to deal with incidents and defects.</p>
<p>Figure 5.18 shows the contribution of capacity and performance management to
  the service value chain, with the practice being involved in all service value chain
  activities:</p>
<p><b>Plan</b> Capacity and performance management supports tactical and operational planning with information about actual demand and performance, and with modelling and forecasting tools and methods.</p>
<p><b>Improve</b> Improvements are identified and driven by performance information provided by this practice.</p>
<p><b>Engage</b> Customers' and users' expectations are managed and supported by information about performance and capacity constraints and capabilities.</p>
<p><b>Design and transition</b> Capacity and performance management is essential for product and service design: it helps to ensure that new and changed services are designed for optimum performance, capacity, and scalability.</p>
<p><b>Obtain/build</b> Capacity and performance management helps to ensure that components and services being obtained or built meet performance needs of the organization.</p>
<p><b>Deliver and support</b> Services and service components are supported and tested by performance and capacity targets, metrics and measurement, and reporting targets and tools.</p>
<p>Figure 5.18 Heat map of the contribution of capacity and performance management to value chain activities.</p>
<p><a href="/view-pdf/capacityandperformancemanagement.pdf" ><img class="img-fluid" src="{{ asset('storage/images/itilfour/image0518.jpg') }}"  alt="image0518"></a></p> <br>
<br>
<br>
<br>
<h3><a name="changecontrolmd"></a>Change enablement (Change control)</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the change enablement (change control) practice is to maximize the number of successful service and product changes by ensuring that risks have been properly assessed, authorizing changes to proceed, and managing the change schedule.<br>
<p><img class="img-fluid" src="{{ asset('storage/images/itilfour/image099.jpg') }}"  alt="image099"></p>
<h5><a>Definition: Change</h5>
<p>The addition, modification, or removal of anything that could have a direct or indirect effect on services.</p>
<p>The scope of change control is defined by each organization. It will typically include all IT infrastructure, applications, documentation, processes, supplier relationships, and anything else that might directly or indirectly impact a product or service.</p>
<p>It is important to distinguish change control from organizational change management. Organizational change management manages the people aspects of changes to ensure that improvements and organizational transformation initiatives are implemented successfully. Change control is usually focused on changes in products and services.</p>
<p>Change control must balance the need to make beneficial changes that will deliver additional value with the need to protect customers and users from the adverse effect of changes. All changes should be assessed by people who are able to understand the risks and the expected benefits; the changes must then be authorized before they are deployed. This assessment, however, should not introduce unnecessary delay.</p>
<p>The person or group who authorizes a change is known as a change authority. It is essential that the correct change authority is assigned to each type of change to ensure that change control is both efficient and effective. In high-velocity organizations, it is a common practice to decentralize change approval, making the peer review a top predictor of high performance.</p>
<p>There are three types of change that are each managed in different ways:</p>
<ul>
  <li><b>Standard changes</b> These are low-risk, pre-authorized changes that are well understood and fully documented, and can be implemented without needing additional authorization. They are often initiated as service requests, but may also be operational changes. When the procedure for a standard change is created or modified, there should be a full risk assessment and authorization as for any other change. This risk assessment does not need to be repeated each time the standard change is implemented; it only needs to be done if there is a modification to the way it is carried out.</li>
  <li><b>Normal changes</b> These are changes that need to be scheduled, assessed, and authorized following a process. Change models based on the type of change determine the roles for assessment and authorization. Some normal changes are low risk, and the change authority for these is usually someone who can make rapid decisions, often using automation to speed up the change. Other normal changes are very major and the change authority could be as high as the management board (or equivalent). Initiation of a normal change is triggered by the creation of a change request. This may be created manually, but organizations that have an automated pipeline for continuous integration and continuous deployment often automate most steps of the change control process.</li>
  <li><b>Emergency changes</b> These are changes that must be implemented as soon as possible; for example, to resolve an incident or implement a security patch. Emergency changes are not typically included in a change schedule, and the process for assessment and authorization is expedited to ensure they can be implemented quickly. As far as possible, emergency changes should be subject to the same testing, assessment, and authorization as normal changes, but it may be acceptable to defer some documentation until after the change has been implemented, and sometimes it will be necessary to implement the change with less testing due to time constraints. There may also be a separate change authority for emergency changes, typically including a small number of senior managers who understand the business risks involved.</li>
</ul>
<p>The change schedule is used to help plan changes, assist in communication, avoid conflicts, and assign resources. It can also be used after changes have been deployed to provide information needed for incident management, problem management, and improvement planning. Regardless of who the change authority is, they may need to communicate widely across the organization. Risk assessment, for instance, may require them to gather input from many people with specialist knowledge. Additionally, there is usually a need to communicate information about the change to ensure people are fully prepared before the change is deployed.</p>
<p>Figure 5.19 shows the contribution of change control to the service value chain, with
  the practice being involved in all value chain activities:</p>
<p><b>Plan</b> Changes to product and service portfolios, policies, and practices all require a certain level of control, and the change control practice is used to provide it.</p>
<p><b>Improve</b> Many improvements will require changes to be made, and these should be assessed and authorized in the same way as all other changes.</p>
<p><b>Engage</b> Customers and users may need to be consulted or informed about changes, depending on the nature of the change.</p>
<p><b>Design and transition</b> Many changes are initiated as a result of new or changed services. Change control activity is a major contributor to transition.</p>
<p><b>Obtain/build</b> Changes to components are subject to change control, whether they are built in house or obtained from suppliers.</p>
<p><b>Deliver and support</b> Changes may have an impact on delivery and support, and information about changes must be communicated to personnel who carry out this value chain activity. These people may also play a part in assessing and
  authorizing changes. </p>
<p>Figure 5.19 Heat map of the contribution of change enablement (change control) to value chain activities.</p>
<p><a href="/view-pdf/changeenablement.pdf" ><img alt="" class="img-fluid" src="{{ asset('storage/images/itilfour/image079.jpg') }}"  ></a></p>
<br>
<br>
<br>
<br>
<h3><a name="incidentmanmd"></a>Incident management</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the incident management practice is to minimize the negative impact of incidents by restoring normal service operation as quickly as possible.</p>
<p><img class="img-fluid" src="{{ asset('storage/images/itilfour/image099.jpg') }}"  alt="image099"></p>
<h5>Definition: Incident</h5>
<p>An unplanned interruption to a service or reduction in the quality of a service.</p>
<p>Incident management can have an enormous impact on customer and user satisfaction, and on how customers and users perceive the service provider. Every incident should be logged and managed to ensure that it is resolved in a time that meets the expectations of the customer and user. Target resolution times are agreed, documented, and communicated to ensure that expectations are realistic. Incidents are prioritized based on an agreed classification to ensure that incidents with the highest business impact are resolved first.</p>
<p>Organizations should design their incident management practice to provide appropriate management and resource allocation to different types of incident. Incidents with a low impact must be managed efficiently to ensure that they do not consume too many resources. Incidents with a larger impact may require more resources and more complex management. There are usually separate processes for managing major incidents, and for managing information security incidents.</p>
<p>Information about incidents should be stored in incident records in a suitable tool. Ideally, this tool should also provide links to related configuration items (CIs), changes, problems, known errors, and other knowledge to enable quick and efficient diagnosis and recovery. Modern IT service management tools can provide automated matching of incidents to other incidents, problems, or known errors, and can even provide intelligent analysis of incident data to generate recommendations for helping with future incidents.</p>
<p>It is important that people working on an incident provide good-quality updates in a timely fashion. These updates should include information about symptoms, business impact, configuration items (CIs) affected, actions completed, and actions planned. Each of these should have a timestamp and information about the people involved, so that the people involved or interested can be kept informed. There may also be a need for good collaboration tools so that people working on an incident can collaborate effectively.</p>
<p>Incidents may be diagnosed and resolved by people in many different groups, depending on the complexity of the issue or the incident type. All of these groups need to understand the incident management process, and how their contribution to this helps to manage the value, outcomes, costs, and risks of the services provided:</p>
<ul>
  <li>Some incidents will be resolved by the users themselves, using self-help. Use of specific self-help records should be captured for use in measurement and improvement activities.</li>
  <li>Some incidents will be resolved by the service desk.</li>
  <li>More complex incidents will usually be escalated to a support team for resolution. Typically, the routing is based on the incident category, which should help to identify the correct team.</li>
  <li>Incidents can be escalated to suppliers or partners, who offer support for their products and services.</li>
  <li>The most complex incidents, and all major incidents, often require a temporary team to work together to identify the resolution. This team may include representatives of many stakeholders, including the service provider, suppliers, users, etc.</li>
  <li>In some extreme cases, disaster recovery plans may be invoked to resolve an incident. Disaster recovery is described in the service continuity management practice (section 5.2.12) of the ITIL Four Foundation manual.</li>
</ul>
<p>Effective incident management often requires a high level of collaboration within and between teams. These teams may include the service desk, technical support, application support, and vendors. Collaboration can facilitate information-sharing and learning, as well as helping to solve the incident more efficiently and effectively.</p>
<h5>Tip</h5>
<p>Some organizations use a technique called swarming to help manage incidents. This involves many different stakeholders working together initially, until it becomes clear which of them is best placed to continue and which can move on to other tasks.</p>
<p>Third-party products and services that are used as components of a service require support agreements which align the obligations of the supplier with the commitments made by the service provider to customers. Incident management may require frequent interaction with these suppliers, and routine management of this aspect of supplier contracts is often part of the incident management practice. <br>
  A supplier can also act as a service desk, logging and managing all incidents and escalating them to subject matter experts or other parties as required.</p>
<p>There should be a formal process for logging and managing incidents. This process does not usually include detailed procedures for how to diagnose, investigate, and resolve incidents, but can provide techniques for making investigation and diagnosis more efficient. There may be scripts for collecting information from users during initial contact, and this may lead directly to diagnosis and resolution of simple incidents. Investigation of more complicated incidents often requires knowledge and expertise, rather than procedural steps.</p>
<p>Dealing with incidents is possible in every value chain activity, though the most visible (due to effect on users) are incidents in an operational environment.</p>
<p>Figure 5.20 shows the contribution of incident management to the service value
  chain, with the practice being applied mainly to the engage, and deliver and support
  value chain activities. Except for plan, other activities may use information about
  incidents to help set priorities:</p>
<p><b>Improve</b> Incident records are a key input to improvement activities, and are prioritized both in terms of incident frequency and severity.</p>
<p><b>Engage</b> Incidents are visible to users, and significant incidents are also visible to customers. Good incident management requires regular communication to understand the issues, set expectations, provide status updates, and agree that the issue has been resolved so the incident can be closed.</p>
<p><b>Design and transition</b> Incidents may occur in test environments, as well as during service release and deployment. The practice ensures these incidents are resolved in a timely and controlled manner.</p>
<p><b>Obtain/build</b> Incidents may occur in development environments. Incident management practice ensures these incidents are resolved in a timely and controlled manner.</p>
<p><b>Deliver and support</b> Incident management makes a significant contribution to support. This value chain activity includes resolving incidents and problems.</p>
<p>Figure 5.20 Heat map of the contribution of incident management to value chain activities.</p>
<p><a href="/view-pdf/incidentmanagement.pdf" ><img alt="" class="img-fluid" src="{{ asset('storage/images/itilfour/image086.jpg') }}"  ></a></p>
<br>
<br>
<br>
<br>
<h3><a name="itassetmanmd"></a>IT asset management</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the IT asset management practice is to plan and manage the full lifecycle of all IT assets, to help the organization:</p>
<ul>
  <li>maximize value</li>
  <li>control costs</li>
  <li>manage risks</li>
  <li>support decision-making about purchase, re-use, retirement, and disposal of assets</li>
  <li>meet regulatory and contractual requirements.</li>
</ul>
<p><img class="img-fluid" src="{{ asset('storage/images/itilfour/image099.jpg') }}"  alt="image099"></p>
<h5>Definition: IT asset</h5>
<p>Any financially valuable component that can contribute to the delivery of an IT product or service.</p>
<p>The scope of IT asset management typically includes all software, hardware, networking, cloud services, and client devices. In some cases, it may also include non-IT assets such as buildings or information where these have a financial value and are required to deliver an IT service. IT asset management can include operational technology (OT), including devices that are part of the Internet of Things. These are typically devices that were not traditionally thought of as IT assets, but that now include embedded computing capability and network connectivity.</p>
<h5>Types of asset management</h5>
<p>Asset management is a well-established practice that includes the acquisition, operation, care, and disposal of organizational assets, particularly critical infrastructure.</p>
<p>IT asset management (ITAM) is a sub-practice of asset management that is specifically aimed at managing the lifecycles and total costs of IT equipment and infrastructure.</p>
<p>Software asset management (SAM) is an aspect of IT asset management that is specifically aimed at managing the acquisition, development, release, deployment, maintenance, and eventual retirement of software assets. SAM procedures provide effective management, control, and protection of software assets.</p>
<p>Understanding the cost and value of assets is essential to also comprehending the cost and value of products and services, and is therefore an important underpinning factor in everything the service provider does. IT asset management contributes to the visibility of assets and their value, which is a key element to successful service management as well as being useful to other practices.</p>
<p>IT asset management requires accurate inventory information, which it keeps in an asset register. This information can be gathered in an audit, but it is much better to capture it as part of the processes that change the status of assets, for example, when new hardware is delivered, or when a new instance of a cloud service is requested. If IT asset management has good interfaces with other practices, including service configuration management, incident management, change control, and deployment management, then the asset status information can be maintained with less effort. Audits are still needed, but these can be less frequent, and are easier to do when there is already an accurate asset register.</p>
<p>IT asset management helps to optimize the use of valuable resources. For example, the number of spare computers an organization requires can be calculated based on service level agreement commitments, the measured performance of service requests, and demand predictions from capacity and performance management.</p>
<p>Some organizations discover a need for IT asset management after a software vendor requests an audit of licence use. This can be very stressful if the required information has not been maintained, and can lead to significant costs, both in carrying out the audit and then paying any additional licence costs that are identified. It is much cheaper and easier to simply maintain information about software licence use as part of normal IT asset management activity, and to provide this in response to any vendor requests. Software runs on hardware, so the management of software and hardware assets should be combined to ensure that all licences are properly managed. For the same reason, the management of cloud- based assets should also be included.</p>
<p>The cost of cloud services can easily get out of control if the organization does not manage these in the same way as other IT assets. Each individual use of a cloud service may be relatively cheap, but by spending in small amounts it is easy to consume much more resource than was planned, leaving the organization with a correspondingly large bill. Again, good IT asset management can help to control this.</p>
<p>The activities and requirements of IT asset management will vary for different types of asset:</p>
<ul>
  <li>Hardware assets must be labelled for clear identification. It is important to know where they are and to help protect them from theft, damage, and data leakage. They may need special handling when they are re-used or decommissioned; for example, erasure or shredding of disk drives depends on information security requirements. Hardware assets may also be subject to regulatory requirements, such as the EU Waste Electrical and Electronic Equipment Directive.</li>
  <li>Software assets must be protected from unlawful copying, which could result in unlicensed use. The organization must ensure that licence terms are adhered to and that licences are only re-used in ways that are allowed under the contract. It is important to retain verified proof of purchase and entitlement to run the software. It is very easy to lose software licences when equipment is decommissioned, so it is important that the IT asset management process recovers these licences and makes them available for re-use where appropriate.</li>
  <li>Cloud-based assets must be assigned to specific products or groups so that costs can be managed. Funding must be managed so that the organization has the flexibility to invoke new instances of cloud use when needed, and to remove instances that are not needed, without the risk of uncontrolled costs.
    Contractual arrangements must be understood and adhered to, in the same way as for software licences.</li>
  <li>Client assets must be assigned to individuals who take responsibility for their care. Processes are needed to manage lost or stolen devices, and tools may be needed to erase sensitive data from them or otherwise ensure that this data is not lost or stolen with the device.</li>
</ul>
<p>In all cases, the organization needs to ensure that the full lifecycle of each asset is managed. This includes managing asset provisioning; receiving, decommissioning, and return; hardware disposal; software re-use; leasing management; and potentially many other activities.</p>
<p>IT asset management maintains information about the assets, their costs, and related contracts. Therefore, the IT asset register is often combined (or federated) with the information stored in a configuration management system (CMS). If the two are separate then it is important that assets can be mapped between them, usually by use of a standard naming convention. It may also be necessary to combine (or federate) the IT asset register with systems used to manage other financial assets, or with systems used to manage suppliers.</p>
<p>In some organizations there is a centralized team responsible for IT asset management. This team may also be responsible for configuration management. In other organizations, each technical team may be responsible for management of the IT assets they support; for example, the storage team could manage storage assets while the networking team manages network assets. Each organization must consider its own context and culture to choose the appropriate level of centralization. However, having some central roles helps to ensure asset data quality and the development of expertise on specific aspects such as software licensing and inventory systems.</p>
<p>IT asset management typically includes the following activities:</p>
<ul>
  <li>Define, populate, and maintain the asset register in terms of structure and content, and the storage facilities for assets and related media.</li>
  <li>Control the asset lifecycle in collaboration with other practices (for example, upgrading obsolete software or onboarding new staff members with a laptop and mobile phone) and record all changes to assets (status, location, characteristics, assignment, etc.).</li>
  <li>Provide current and historical data, reports, and support to other practices about IT assets.</li>
  <li>Audit assets, related media, and conformity (particularly with regulations, and licence terms and conditions) and drive corrective and preventive improvements to deal with detected issues.</li>
</ul>
<p>Figure 5.21 shows the contribution of IT asset management to the service value
  chain, with the practice being applied mainly to the design and transition, and
  obtain/build value chain activities:</p>
<p><b>Plan</b> Most policies and guidance for IT asset management comes from the service financial management practice. Some asset management policies are driven by governance and some are driven by other practices, such as information security management. IT asset management can be considered a strategic practice that helps the organization to understand and manage cost and value.</p>
<p><b>Improve</b> This value chain activity must consider the impact on IT assets, and some improvements will directly involve IT asset management in helping to understand and manage costs.</p>
<p><b>Engage</b> There may be some demand for IT asset management from stakeholders. For example, a user may report a lost or stolen mobile phone, or a customer may require reports on the value of IT assets.</p>
<p><b>Design and transition</b> This value chain activity changes the status of IT assets, and so drives most IT asset management activity.</p>
<p><b>Obtain/build</b> IT asset management supports asset procurement to ensure that assets are traceable from the beginning of their lifecycle.</p>
<p><b>Deliver and support</b> IT asset management helps to locate IT assets, trace their movements, and control their status in the organization.</p>
<p>Figure 5.21 Heat map of the contribution of IT asset management to value chain activities.</p>

<p><a href="/view-pdf/assetmanagement.pdf" ><img class="img-fluid" src="{{ asset('storage/images/itilfour/image087.jpg') }}"  alt="image087"></a></p>
<br>
<br>
<br>
<br>
<h3><a name="monitoreventmd"></a>Monitoring and event management</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the monitoring and event management practice is to systematically observe services and service components, and record and report selected changes of state identified as events. This practice identifies and prioritizes infrastructure, services, business processes, and information security events, and establishes the appropriate response to those events, including responding to conditions that could lead to potential faults or incidents.</p>
<p><img class="img-fluid" src="{{ asset('storage/images/itilfour/image099.jpg') }}"  alt="image099"></p>
<h5>Definition: Event</h5>
<p>Any change of state that has significance for the management of a service or other configuration item (Cl). Events are typically recognized through notifications created by an IT service, Cl, or monitoring tool.</p>
<p>The monitoring and event management practice manages events throughout their lifecycle to prevent, minimize, or eliminate their negative impact on the business.</p>
<p>The monitoring part of the practice focuses on the systematic observation of services and the CIs that underpin services to detect conditions of potential significance. Monitoring should be performed in a highly automated manner, and can be done actively or passively. The event management part focuses on recording and managing those monitored changes of state that are defined by the organization as an event, determining their significance, and identifying and initiating the correct control action to manage them. Frequently the correct control action will be to initiate another practice, but sometimes it will be to take no action other than to continue monitoring the situation. Monitoring is necessary for event management to take place, but not all monitoring results in the detection of an event.</p>
<p>Not all events have the same significance or require the same response. Events are often classified as informational, warning, and exceptions. Informational events do not require action at the time they are identified, but analysing the data gathered from them at a later date may uncover desirable, proactive steps that can be beneficial to the service. Warning events allow action to be taken before any negative impact is actually experienced by the business, whereas exception events indicate that a breach to an established norm has been identified (for example, to a service level agreement). Exception events require action, even though business impact may not yet have been experienced.</p>
<p>The processes and procedures needed in the monitoring and event management practice must address these key activities and more:</p>
<ul>
  <li>identifying what services, systems, CIs, or other service components should be monitored, and establishing the monitoring strategy</li>
  <li>implementing and maintaining monitoring, leveraging both the native monitoring features of the elements being observed as well as the use of designed-for-purpose monitoring tools</li>
  <li>establishing and maintaining thresholds and other criteria for determining which changes of state will be treated as events, and choosing criteria to define each type of event (informational, warning, or exception) establishing and maintaining policies for how each type of detected event should be handled to ensure proper management</li>
  <li>implementing processes and automations required to operationalize the defined thresholds, criteria, and policies.</li>
</ul>
<p>This practice is highly interactive with other practices participating in the service value chain. For example, some events will indicate a current issue that qualifies as an incident. In this case, the correct control action will be to initiate activity in the incident management practice. Repeated events showing performance outside of desired levels may be evidence of a potential problem, which would initiate activity in the problem management practice. For some events, the correct response is to initiate a change, engaging the change control practice.</p>
<p>Although the work of this practice, once put in place, is highly automated, human intervention is still required, and is in fact essential. For the definition of monitoring strategies and specific thresholds and assessment criteria, it can help to bring in a broad range of perspectives, including infrastructure, applications, service owners, service level management, and representation from the warranty-related practices. Remember that the starting point for this practice is likely to be simple, setting the stage for a later increase in complexity, so it is important that the expectations of participants are managed.</p>
<p>Organizations and people are also critical to providing an appropriate response to monitored data and events, in alignment with policies and organizational priorities. Roles and responsibilities must be clearly defined, and each person or group must have easy, timely access to the information needed to perform their role.</p>
<p>Automation is key to successful monitoring and event management. Some service components come equipped with built-in monitoring and reporting capabilities that can be configured to meet the needs of the practice, but sometimes it is necessary to implement and configure purpose-built monitoring tools. The monitoring itself can be either active or passive. In active monitoring, tools will poll key CIs, looking at their status to generate alerts when an exception condition is identified. In passive monitoring, the Cl itself generates the operational alerts.</p>
<p>Automated tools should also be used for the correlation of events. These features may be provided by monitoring tools or other tools such as ITSM workflow systems. There can be a huge volume of data generated by this practice, but without clear policies and strategies on how to limit, filter, and use this data, it will be of no value.</p>
<p>If third parties are providing products or services in the overall service architecture, they should also supply expertise in the monitoring and reporting capabilities of their offerings. Leveraging this expertise can save time when trying to operationalize monitoring and event management strategies and workflows. If some IT functions,
  such as infrastructure management, are partially or wholly outsourced to a supplier, they may be reluctant to expose monitoring or event data related to the elements they manage. Don't ask for data that is not truly needed, but if data is required, make sure that the provision of that data is explicitly part of the contract for the supplier's services.</p>
<p>Figure 5.22 shows the contribution of monitoring and event management to the
  service value chain, with the practice being involved in all value chain activities
  except plan: </p>
<p><b>Improve</b> The monitoring and event management practice is essential to the close observation of the environment to evaluate and proactively improve its health and stability.</p>
<p><b>Engage</b> Monitoring and event management may be the source of internal engagement for action.</p>
<p><b>Design and transition</b> Monitoring data informs design decisions. Monitoring is an essential component of transition: it provides information about the transition success in all environments.</p>
<p><b>Obtain/build</b> Monitoring and event management supports development environments, ensuring their transparency and manageability.</p>
<p><b>Deliver and support</b> The practice guides how the organization manages internal support of identified events, initiating other practices as appropriate.</p>
<p>Figure 5.22 Heat map of the contribution of monitoring and event management to value chain activities.</p>
<p><a href="/view-pdf/monitoringandeventmanagement.pdf" ><img class="img-fluid" src="{{ asset('storage/images/itilfour/image091.jpg') }}"  alt="image091"></a></p> <br>
<br>
<br>
<br>
<h3><a name="problemmanmd"></a>Problem management</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the problem management practice is to reduce the likelihood and impact of incidents by identifying actual and potential causes of incidents, and managing workarounds and known errors.</p>
<p><img class="img-fluid" src="{{ asset('storage/images/itilfour/image099.jpg') }}"  alt="image099"></p>
<h5>Definitions</h5>
<p><b>Problem</b> A cause, or potential cause, of one or more incidents.</p>
<p><b>Known error</b> A problem that has been analysed but has not been resolved.</p>
<p>Figure 5.23 The phases of problem management</p>
<p><img class="img-fluid" src="{{ asset('storage/images/itilfour/image095.png') }}"  alt="image095"></p>
<p>Every service has errors, flaws, or vulnerabilities that may cause incidents. They may include errors in any of the four dimensions of service management. Many errors are identified and resolved before a service goes live. However, some remain unidentified or unresolved, and may be a risk to live services. In ITIL, these errors are called problems and they are addressed by the problem management practice.</p>
<p>Problems are related to incidents, but should be distinguished as they are managed in different ways:</p>
<ul>
  <li>Incidents have an impact on users or business processes, and must be resolved so that normal business activity can take place.</li>
  <li>Problems are the causes of incidents. They require investigation and analysis to identify the causes, develop workarounds, and recommend longer-term resolution. This reduces the number and impact of future incidents.</li>
</ul>
<p>Problem management involves three distinct phases, as shown in Figure 5.23 above.</p>
<p>Problem identification activities identify and log problems. These include:</p>
<ul>
  <li>performing trend analysis of incident records
  <li>detection of duplicate and recurring issues by users, service desk, and technical support staff
  <li>during major incident management, identifying a risk that an incident could recur
  <li>analysing information received from suppliers and partners</li>
  <li>analysing information received from internal software developers, test teams, and project teams.</li>
</ul>
<p>Other sources of information can also lead to problems being identified.</p>
<p>Problem control activities include problem analysis, and documenting workarounds and known errors.</p>
<p>Problems are prioritized for analysis based on the risk that they pose, and are managed as risks based on their potential impact and probability. It is not essential to analyse every problem; it is more valuable to make significant progress on the highest-priority problems than to investigate every minor problem that the organization is aware of.</p>
<p>Incidents typically have many interrelated causes, and the relationships between them can be complex. Problem control should consider all contributory causes, including causes that contributed to the duration and impact of incidents, as well as those that led to the incidents happening. It is important to analyse problems from the perspective of all four dimensions of service management. For example, an incident that was caused by inaccurate documentation may require not only a correction to that documentation but also training and awareness for support personnel, suppliers, and users.</p>
<p>When a problem cannot be resolved quickly, it is often useful to find and document a workaround for future incidents, based on an understanding of the problem. Workarounds are documented in problem records. This can be done at any stage; it doesn't need to wait for analysis to be complete. If a workaround has been documented early in problem control, then this should be reviewed and improved after problem analysis has been completed.</p>
<p><img class="img-fluid" src="{{ asset('storage/images/itilfour/image099.jpg') }}"  alt="image099"></p>
<h5>Definition: Workaround</h5>
<p>A solution that reduces or eliminates the impact of an incident or problem for which a full resolution is not yet available. Some workarounds reduce the likelihood of incidents.</p>
<p>An effective incident workaround can become a permanent way of dealing with some problems when resolving the problem is not viable or cost-effective. In this case, the problem remains in the known error status, and the documented workaround is applied should related incidents occur. Every documented workaround should include a clear definition of the symptoms to which it applies. In some cases, workaround application can be automated.</p>
<p>For other problems, a way to fix the error should be found. This is a part of error control. Error control activities manage known errors, which are problems where initial analysis has been completed; it usually means that faulty components have been identified. Error control also includes identification of potential permanent solutions which may result in a change request for implementation of a solution, but only if this can be justified in terms of cost, risks, and benefits.</p>
<p>Error control regularly re-assesses the status of known errors that have not been resolved, including overall impact on customers, availability and cost of permanent resolutions, and effectiveness of workarounds. The effectiveness of workarounds should be evaluated each time a workaround is used, as the workaround may be improved based on the assessment.</p>
<p>Problem management activities are very closely related to incident management. The practices need to be designed to work together within the value chain.</p>
<p>Activities from these two practices may complement each other (for example, identifying the causes of an incident is a problem management activity that may lead to incident resolution), but they may also conflict (for example, investigating the cause of an incident may delay actions needed to restore service).</p>
<p>Examples of interfaces between problem management, risk management, change control, knowledge management, and continual improvement are as follows:</p>
<ul>
  <li>Problem management activities can be organized as a specific case of risk management: they aim to identify, assess, and control risks in any of the four dimensions of service management. It is useful to adopt risk management tools and techniques for problem management.</li>
  <li>Implementation of problem resolution is often outside the scope of problem management. Problem management typically initiates resolution via change control and participates in the post-implementation review; however, approving and implementing changes is out of scope for the problem management practice.</li>
  <li>Output from the problem management practice includes information and documentation concerning workarounds and known errors. In addition, problem management may utilize information in a knowledge management system to investigate, diagnose, and resolve problems.</li>
  <li>Problem management activities can identify improvement opportunities in all four dimensions of service management. Solutions can in some cases be treated as improvement opportunities, so they are included in a continual improvement register (CIR), and continual improvement techniques are used to prioritize and manage them, sometimes as part of a product backlog.</li>
</ul>
<p>Many problem management activities rely on the knowledge and experience of staff, rather than on following detailed procedures. People responsible for diagnosing problems often need the ability to understand complex systems, and to think about how different failures might have occurred. Developing this combination of analytical and creative ability requires mentoring and time, as well as suitable training.<br>
<p>Problem management is usually focused on errors in operational environments.</p>
<p>Figure 5.24 shows the contribution of problem management to the service value
  chain, with the practice being applied mainly to the improve, and deliver and
  support value chain activities:</p>
<p><b>Improve</b> This is the main focus area for problem management. Effective problem management provides the understanding needed to reduce the number of incidents and the impact of incidents that can't be prevented.</p>
<p><b>Engage</b> Problems that have a significant impact on services will be visible to customers and users. In some cases, customers may wish to be involved in problem prioritization, and the status and plans for managing problems should be communicated. Workarounds are often presented to users via a service portal.</p>
<p><b>Design and transition</b> Problem management provides information that helps to improve testing and knowledge transfer.</p>
<p><b>Obtain/build</b> Product defects may be identified by problem management; these are then managed as part of this value chain activity.</p>
<p><b>Deliver and support</b> Problem management makes a significant contribution by preventing incident repetition and supporting timely incident resolution.</p>
<p>Figure 5.24 Heat map of the contribution of problem management to value chain activities.</p>
<p><a href="/view-pdf/problemmanagement.pdf" ><img class="img-fluid" src="{{ asset('storage/images/itilfour/image098.jpg') }}" alt="image098"></a></p>
<br>
<br>
<br>
<br>
<h3><a name="releasemanmd"></a>Release management</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the release management practice is to make new and changed services and features available for use.</p>
<p><img class="img-fluid" src="{{ asset('storage/images/itilfour/image099.jpg') }}"  alt="image099"></p>
<h5>Definition: Release</h5>
<p>A version of a service or other configuration item, or a collection of configuration items, that is made available for use.</p>
<p>A release may comprise many different infrastructure and application components that work together to deliver new or changed functionality. It may also include documentation, training (for users or IT staff), updated processes or tools, and any other components that are required. Each component of a release may be developed by the service provider or procured from a third party and integrated by the service provider.</p>
<p>Releases can range in size from the very small, involving just one minor changed feature, to the very large, involving many components that deliver a completely new service. In either case, a release plan will specify the exact combination of new and changed components to be made available, and the timing for their release.</p>
<p>A release schedule is used to document the timing for releases. This schedule should be negotiated and agreed with customers and other stakeholders. A release post-implementation review enables learning and improvement, and helps to ensure that customers are satisfied.</p>
<p>In some environments, almost all of the release management work takes place before deployment, with plans in place as to exactly which components will be deployed in a particular release. The deployment then makes the new functionality available.<br>
</p>
<table>
  <tr>
    <td><p>Figure 5.25 below shows how release management is handled in a traditional/waterfall environment. <br>
        In these environments release management and deployment may be combined and executed as a single process.</p>
      <img alt="" class="img-fluid" src="{{ asset('storage/images/itilfour/image0991.png') }}" >
      <p>Figure 5.25 above shows Release management in a traditional/waterfall environment.</p></td>
  </tr>
</table>
<table>
  <tr>
    <td><img alt="" class="img-fluid" src="{{ asset('storage/images/itilfour/image0993.png') }}" >
      <p>Figure
        5.26 above shows how release management is handled in an Agile/DevOps environment.</p></td>
  </tr>
</table>
<p>In an Agile/DevOps environment there can be significant release management activity after deployment. In these cases, software and infrastructure are typically deployed in many small increments, and release management activity enables the new functionality at a later point. This may be done as a very small change. Figure 5.26 above shows how release management is handled in such an environment.</p>
<p>Release management is often staged, with pilot releases being made available to a small number of users to ensure that everything is working correctly before the release is given to additional groups. This staged approach can work with either of the two sequences shown in Figures 5.25 and 5.26. Sometimes a release must be made available to all users at the same time, as when a major restructuring of the underlying shared data is required.</p>
<p>Staging of a release is often achieved using blue/green releases or feature flags:</p>
<ul>
  <li>Blue/green releases use two mirrored production environments. Users can be switched to an environment that has been updated with the new functionality by use of network tools that connect them to the correct environment.</li>
  <li>Feature flags enable specific features to be released to individual users or groups in a controlled way. The new functionality is deployed to the production environment without being released. A user configuration setting then releases the new functionality to individual users (or groups of users) as needed.</li>
</ul>
<p>In a DevOps environment, release management is often integrated with the continuous integration and continuous delivery toolchain. The tools of release management may be the responsibility of a dedicated person, but decisions about the release can be made by the development team. In a more traditional environment, releases are enabled by the deployment of the components. Each release is described by a release record on an ITSM tool. Release records are linked to CIs and change records to maintain information about the release.</p>
<p>Components of a release are often provided by third parties. Examples of third-party components include cloud infrastructure, software as a service components, and third-party support. It is also common to include third-party software, or open-source software, as part of application development. Release management needs to work across organizational boundaries to ensure that all components are compatible and to provide a seamless experience for users. It also needs to consider the impact of changes to third-party components, and to plan for how these will be released.</p>
<p>Figure 5.27 shows the contribution of release management to the service value
  chain, with the practice being involved in all value chain activities:</p>
<p><b>Plan</b> Policies, guidance, and timelines for releases are driven by the organizational strategy and service portfolio. The size, scope, and content of each release should be planned and managed.</p>
<p><b>Improve</b> New or changed releases may be required to deliver improvements, and these should be planned and managed in the same way as any other release.</p>
<p><b>Engage</b> The content and cadence of releases must be designed to match the needs and expectations of customers and users.</p>
<p><b>Design and transition</b> Release management ensures that new or changed services are made available to customers in a controlled way.</p>
<p><b>Obtain/build</b> Changes to components are normally included in a release, delivered in a controlled way.</p>
<p><b>Deliver and support</b> Releases may impact on delivery and support. Training, documentation, release notes, known errors, user guides, support scripts, etc. are provided by this practice to facilitate service restoration.</p>
<p>Figure 5.27 Heat map of the contribution of release management to value chain activities.</p>
<p><a href="/view-pdf/releasemanagement.pdf" ><img class="img-fluid" src="{{ asset('storage/images/itilfour/imagefivetwentyfive.jpg') }}" alt=""></a></p>
<br>
<br>
<br>
<br>
<h3><a name="servcatmanmd"></a>Service catalogue management</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the service catalogue management practice is to provide a single source of consistent information on all services and service offerings, and to ensure that it is available to the relevant audience.</p>
<p>The list of services within the service catalogue represents those which are currently available and is a subset of the total list of services tracked in the service provider's service portfolio. Service catalogue management ensures that service and product descriptions are expressed clearly for the target audience to support stakeholder engagement and service delivery. The service catalogue may take many forms such as a document, online portal, or a tool that enables the current list of services to be communicated to the audience.</p>
<h5>Service catalogue management activities</h5>
<p>The service catalogue management practice includes an ongoing set of activities related to publishing, editing, and maintaining service and product descriptions and their related offerings. It provides a view on the scope of what services are available, and on what terms. The service catalogue management practice is supported by roles such as the service owner and others responsible for managing, editing, and keeping up to date the list of available services as they are introduced, changed, or retired.</p>
<h5>Tailored views</h5>
<p>As described above, the service catalogue enables the creation of value and is used by many different practices within the service value chain. Because of this, it needs to be flexible regarding what service details and attributes it presents, based on its intended purpose. As such, organizations may wish to consider providing different views of the catalogue for different audiences.</p>
<p>The full list of services within a service catalogue may not be applicable to all customers and/or users. Likewise, the various attributes of services such as technical specifications, offerings, agreements, and costs are not applicable to all service consumer types. This means that the service catalogue should be able to provide different views and levels of detail to different stakeholders. Examples of views include:</p>
<p><b>User views</b> Provide information on service offerings that can be requested, and on provisioning details.</p>
<p><b>Customer views</b> Provide service level, financial, and service performance data.</p>
<p><b>IT to IT customer views</b> Provide technical, security, and process information for use in service delivery.</p>
<p>While multiple views of the service catalogue are possible, the creation of separate or isolated service catalogues within different technology systems should be avoided if possible as this will promote segregation, variability, and complexity.</p>
<p>For the service catalogue to be perceived as useful by the customer organization it must do more than provide a static platform for publishing information about IT services. Unless the service catalogue enables customer engagement by supporting discussions related to standard and non-standard service offerings and/or automates request and order fulfilment processes, the chances of its ongoing adoption as a useful and meaningful resource are minimal. For this reason, the views of many organizations on the service catalogue are focused on the consumable or orderable elements of service offerings. These are often called request catalogues.</p>
<p><img class="img-fluid" src="{{ asset('storage/images/itilfour/image089.jpg') }}"  alt="image089"></p>
<h5>Definition: Request catalogue</h5>
<p>A view of the service catalogue, providing details on service requests for existing and new services, which is made available for the user.</p>
<p>Figure 5.28 shows the contribution of service catalogue management to the service
  value chain, with the practice being involved in all value chain activities:</p>
<p><b>Plan</b> The service catalogue enables strategy and service portfolio investment decisions by providing details on current service scope and offerings.</p>
<p><b>Improve</b> Service catalogue descriptions and demand patterns are constantly monitored and evaluated to support continual improvement, alignment, and value creation.</p>
<p><b>Engage</b> The service catalogue enables strategic, tactical, and operational relationships with customers and users by enabling and potentially automating various aspects of practices such as relationship management, request management, and the service desk.</p>
<p><b>Design and transition</b> The service catalogue ensures both the utility and warranty aspects of services are considered and published, including the information security policy. IT service continuity levels, service level agreements, and service offerings. Additional activities include the definition and creation of service descriptions, request models, and views to be published.</p>
<p><b>Obtain/build</b> Service catalogue management supports this value chain activity by providing service catalogue views for procurement of components and services.</p>
<p><b>Deliver and support</b> The service catalogue provides context for how the service will be delivered and supported, and publishes expectations related to agreements and performance.</p>
<p>Figure 5.28 Heat map of the contribution of service catalogue management to value chain activities.</p>
<p><a href="/view-pdf/servicecataloguemanagement.pdf" ><img class="img-fluid" src="{{ asset('storage/images/itilfour/imagefivetwentyeight.jpg') }}"  alt="image105"></a></p>
<br>
<br>
<br>
<br>
<h3><a name="servconfigmanmd"></a>Service configuration management</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the service configuration management practice is to ensure that accurate and reliable information about the configuration of services, and the CIs that support them, is available when and where it is needed. This includes information on how CIs are configured and the relationships between them.</p>
<p><img class="img-fluid"src="{{ asset('storage/images/itilfour/image107.jpg') }}"  alt="image107"></p>
<h5>Definition: Configuration item</h5>
<p>Any component that needs to be managed in order to deliver an IT service.</p>
<p>Service configuration management collects and manages information about a wide variety of CIs, typically including hardware, software, networks, buildings, people, suppliers, and documentation. Services are also treated as CIs, and configuration management helps the organization to understand how the many CIs that contribute to each service work together. Figure 5.29 below is a simplified diagram showing how multiple CIs contribute to an IT service.</p>
<p>Configuration management provides information on the CIs that contribute to each service and their relationships: how they interact, relate, and depend on each other to create value for customers and users. This includes information about dependencies between services. This high-level view is often called a service map or service model, and forms part of the service architecture.</p>
<p>It is important that the effort needed to collect and maintain configuration information is balanced with the value that the information creates. Maintaining large amounts of detailed information about every component, and its relationships to other components, can be costly, and may deliver very little value. The requirements for configuration management must be based on an understanding of the organization's goals, and how configuration management contributes to value creation.</p>
<p>The value created by configuration management is indirect, but enables many other practices to work efficiently and effectively. As such, planning for configuration management should start by understanding who needs the configuration information, how it will be used, what is the best way for them to obtain it, and who can maintain and update this information. Sometimes it can be more efficient to simply collect the information when it is needed, rather than to have it collected in advance and maintained, but on other occasions it is essential to have information available in a configuration management system (CMS). The type and amount of information recorded for each type of Cl should be based on the value of that information, the cost of maintaining it, and how the information will be used.</p>
<p><img class="img-fluid" src="{{ asset('storage/images/itilfour/imagefivetwentynine.png') }}"  alt="image109"></p>
<p>Figure 5.29 Simplified service model for a typical IT service.</p>
<p><img class="img-fluid" src="{{ asset('storage/images/itilfour/image110.jpg') }}"  alt="image110"></p>
<h5>Definition: Configuration management system</h5>
<p>A set of tools, data, and information that is used to support service configuration management.</p>
<p>Configuration information should be shared in a controlled way. Some information could be sensitive; for example, it could be useful to someone trying to breach security controls, or it could include personal information about users, such as phone numbers and home addresses.</p>
<p>Configuration information can be stored and published in a single configuration management database (CMDB) for the whole organization, but it is more common for it to be distributed across several sources. In either case it is important to maintain links between configuration records, so that people can see the full set of information they need, and how the various CIs work together. Some organizations federate CMDBs to provide an integrated view. Others may maintain different types of data; for example, having separate data stores for asset management data (see section 5.2.6 of the ITIL Four Foundation manual), configuration details, service catalogue information, and high-level service models.</p>
<p>Tools that are used to log incidents, problems, and changes need access to configuration records. For example, an organization trying to identify problems with a service may need to find incidents related to a specific software version, or model of disk drive. The understanding of the need for this information helps to establish what Cl attributes should be stored for this organization; in this case software versions and disk drive models. To diagnose incidents, visibility of recent changes to the affected CIs may be needed, so relationships between CIs and changes must be maintained.</p>
<p>Many organizations use data collection tools to gather detailed configuration information from infrastructure and applications, and use this to populate a CMS. This can be effective, but can also encourage the collection of too much data without sufficient information on relationships, and how the components work together to create a service. Sometimes configuration information is used to actually create the Cl, rather than just to document it. This approach is used for 'infrastructure as a code', where information on the infrastructure is managed in a data repository and used to automatically configure the environment.</p>
<p>A large organization may have a team that is dedicated to configuration management. In other organizations this practice can be combined with change control, or there can be a team responsible for change, configuration, and release management. Some organizations apply a distributed model where functional teams take ownership of updating and maintaining the CIs within their control and oversight.</p>
<p>Configuration management typically needs processes to:</p>
<ul>
  <li>identify new CIs, and add them to the CMS</li>
  <li>update configuration data when changes are deployed</li>
  <li>verify that configuration records are correct</li>
  <li>audit applications and infrastructure to identify any that are not documented.</li>
</ul>
<p>Figure 5.30 shows the contribution of configuration management to the service
  value chain, with the practice being involved in all value chain activities:</p>
<p><b>Plan</b> Configuration management is used for planning new or changed services.</p>
<p><b>Improve</b> Configuration management, like every other aspect of service management, should be subject to measurement and continual improvement. Since the value of configuration management typically comes from how it facilitates other practices, it is important to understand what use these practices are making of configuration information, and then identify how this can be improved.</p>
<p><b>Engage</b> Some stakeholders (partners and suppliers, consumers, regulators, etc.) may require and use configuration information, or provide their configuration information to the organization.</p>
<p><b>Design and transition</b> Configuration management documents how assets work together to create a service. This information is used to support many value chain activities, and is updated as part of the transition activity.</p>
<p><b>Obtain/build</b> Configuration records may be created during this value chain activity, describing new or changed services and components. Sometimes configuration records are used to create the code or artefact that is being built.</p>
<p><b>Deliver and support</b> Information on CIs is essential to support service restoration. Configuration information is used to support activities of the incident management and problem management practices.</p>
<p>Figure 5.30 Heat map of the contribution of service configuration management to value chain activities.</p>
<p><a href="/view-pdf/serviceconfigurationmanagement.pdf" ><img class="img" src="{{ asset('storage/images/itilfour/imagefivethirty.jpg') }}"  alt=""></a></p>
<br>
<br>
<br>
<br>
<h3><a name="servcontmanmd"></a>Service continuity management</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the service continuity management practice is to ensure that the availability and performance of a service are maintained at sufficient levels in case of a disaster. The practice provides a framework for building organizational resilience with the capability of producing an effective response that safeguards the interests of key stakeholders and the organization's reputation, brand, and value-creating activities.</p>
<p>Service continuity management supports an overall business continuity management (BCM) and planning capability by ensuring that IT and services can be resumed within required and agreed business timescales following a disaster or crisis. It is triggered when a service disruption or organizational risk occurs on a scale that is greater than the organization's ability to handle it with normal response and recovery practices such as incident and major incident management. An organizational event of this magnitude is typically referred to as a disaster.</p>
<p>Each organization needs to understand what constitutes a disaster in its own context. Establishing what is meant by a disaster must be considered and defined prior to a trigger event at both an organizational and on a per-service level using a business impact analysis. The Business Continuity Institute defines a disaster as:</p>
<table cellpadding="5" align="center" width="900">
  <tr>
    <td><p><i>'...a sudden unplanned event that causes great damage or serious loss to an organization. <br>
        It results in an organization failing to provide critical business functions for some predetermined minimum period of time.'</i></p></td>
  </tr>
</table>
<p>The sources that trigger a disaster response and recovery are varied and complex, as are the number of stakeholders and the different aspects of potential organizational impact. The complex risk management conditions related to the examples in Table 5.3 make it imperative that the service continuity management practice be thoroughly thought out, designed for flexibility, and tested on a regular basis to ensure that services can be recovered at a speed necessary for business survival.</p>
<p>Table 5.3 Examples of disaster sources, stakeholders involved, and organizational impact</p>
<table border="1" cellpadding="5">
  <tr>
    <td><p><b>Disaster sources</b></p></td>
    <td><p><b>Stakeholders involved</b></p></td>
    <td><p><b>Organizational impact</b></p></td>
  </tr>
  <tr>
    <td><p>Supply chain failure</p></td>
    <td><p>Employees</p></td>
    <td><p>Lost income</p></td>
  </tr>
  <tr>
    <td><p>Terrorism</p></td>
    <td><p>Executives</p></td>
    <td><p>Damaged reputation</p></td>
  </tr>
  <tr>
    <td><p>Weather</p></td>
    <td><p>Governing body</p></td>
    <td><p>Loss of competitive advantage</p></td>
  </tr>
  <tr>
    <td><p>Cyber attack</p></td>
    <td><p>Suppliers</p></td>
    <td><p>Breach of law, health and safety</p></td>
  </tr>
  <tr>
    <td><p>Health emergency</p></td>
    <td><p>IT teams</p></td>
    <td><p>regulations</p></td>
  </tr>
  <tr>
    <td><p>Political or economic event</p></td>
    <td><p>Customers</p></td>
    <td><p>Risk to personal safety</p></td>
  </tr>
  <tr>
    <td><p>Technology failure</p></td>
    <td><p>Users</p></td>
    <td rowspan="2"><p>Immediate and long-term loss of market share</p></td>
  </tr>
  <tr>
    <td><p>Public crisis</p></td>
    <td><p>Communities</p></td>
  </tr>
</table>
<br>
<p><img class="img-fluid" src="{{ asset('storage/images/itilfour/image113.jpg') }}" alt="image113"></p>
<h5>Definitions</h5>
<p><b>Recovery time objective (RTO)</b> The maximum acceptable period of time following a service disruption that can elapse before the lack of business functionality severely impacts the organization. This represents the maximum agreed time within which a product or an activity must be resumed, or resources must be recovered.</p>
<ul>
  <li><b>Recovery point objective (RPO)</b> The point to which information used by an activity must be restored to enable the activity to operate on resumption.</li>
  <li><b>Disaster recovery plans</b> A set of clearly defined plans related to how an organization will recover from a disaster as well as return to a pre-disaster condition, considering the four dimensions of service management.</li>
  <li><b>Business impact analysis (BIA)</b> A key activity in the practice of service continuity management that identifies vital business functions (VBFs) and their dependencies. These dependencies may include suppliers, people, other business processes, and IT services. BIA defines the recovery requirements for IT services. These requirements include RTOs, RPOs, and minimum target service levels for each IT service.
    </p>
</ul>
<h5>Service continuity management versus incident management</h5>
<p>Service continuity management focuses on those events that the business considers significant enough to be treated as a disaster. Less significant events will be dealt with as part of incident management or major incident management. The distinction between disasters, major incidents, and incidents needs to be pre-defined, agreed, and documented with clear thresholds and triggers for calling the next tier of response and recovery into action without unnecessary delay and risk.</p>
<p>As organizations have become increasingly dependent on technology-enabled services, the need for high-availability solutions has become critical to organizational resilience and competitiveness. Organizations achieve high availability through a combination of business planning, technical architecture resilience, availability planning, proactive risk, and information security management, as well as through incident management and problem management.</p>
<p>Figure 5.31 shows the contribution of service continuity management to the service
  value chain, with the practice being involved in all value chain activities:</p>
<p><b>Plan</b> The organization's leadership and governing body establish an initial risk appetite for the organization with defined scope, policies, supplier strategies, and investment in recovery options. Service continuity management supports this with relevant information about the current continuity status of the organization and with tools and methods for planning and forecasting.</p>
<p><b>Improve</b> Service continuity management ensures that continuity plans, measures, and mechanisms are continually monitored and improved in line with changing internal and external circumstances.</p>
<p><b>Engage</b> Engagement with various stakeholders to provide assurance with regard to an organization's readiness for disasters is supported by this practice.</p>
<p><b>Design and transition</b> Service continuity management ensures that products and services are designed and tested according to the organization's continuity requirements.</p>
<p><b>Obtain/build</b> Service continuity management ensures that continuity is built into the organization's services and components, and that procured components and services meet the organization's continuity requirements.</p>
<p><b>Deliver and support</b> Ongoing delivery, operations, and support are performed in accordance with continuity requirements and policies.</p>
<p>Figure 5.31 Heat map of the contribution of service continuity management to value chain activities.</p>
<br>
<p><a href="/view-pdf/servicecontinuitymanagement.pdf" ><img class="img-fluid" src="{{ asset('storage/images/itilfour/imagethirtyone.jpg') }}"  alt="image112"></a></p>
<br>
<br>
<br>
<p></p>
<h3><a name="servdesignmd"></a>Service design</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the service design practice is to design products and services that are fit for purpose, fit for use, and that can be delivered by the organization and its ecosystem. This includes planning and organizing people, partners and suppliers, information, communication, technology, and practices for new or changed products and services, and the interaction between the organization and its customers.</p>
<p>If products, services, or practices are not designed properly, they will not necessarily fulfil customer needs or facilitate value creation. If they evolve without proper architecture, interfaces or controls, they are less able to deliver the overall vision and needs of the organization and its internal and external customers.</p>
<p>Even when a product or service is well designed, delivering a solution that addresses the needs of both the organization and customer in a cost-effective and resilient way can be difficult. It is therefore important to consider iterative and incremental approaches to service design, which can ensure that products and services introduced to live operation can continually adapt in alignment with the evolving needs of the organization and its customers.</p>
<p>In the absence of formalized service design, products and services can be unduly expensive to run and prone to failure, resulting in resources being wasted and the product or service not being customer-centred or designed holistically. It is unlikely that any improvement programme will ever be able to achieve what proper design could have achieved in the first place. Without service design, cost-effective products and services that deliver what customers need and expect are extremely hard to achieve.</p>
<p>Service design practice should also ensure that the customer's journey from demand through to value realization is as pleasant and frictionless as it can be, and delivers the best customer outcome possible. This is achieved by focusing on customer experience (CX) and user experience (UX).</p>
<p>Adopting and implementing a service design practice focused on CX and UX will:</p>
<ul>
  <li>result in customer-centred products and services that include stakeholders in design activities
  <li>consider the entire environment of a product or service</li>
  <li>enable projects to estimate the cost, timing, resource requirement, and risks associated with service design more accurately
  <li>result in higher volumes of successful change
  <li>make design methods easier for people to adopt and follow
  <li>enable service design assets to be shared and re-used across projects and services
  <li>increase confidence that the new or changed product or service can be delivered to specification without unexpectedly affecting other products, services, or stakeholders
  <li>ensure that new or changed products and services will be maintainable and cost-effective.</li>
</ul>
<p>It is important that a holistic, results-driven approach to all aspects of service design is adopted, and that when changing or amending any of the individual elements of a service design, all other aspects are considered. It is for this reason that the coordination aspect of service design with the whole organization's service value
  system (SVS) is essential. Designing and developing a new or changed product or service should not be done in isolation, but should consider the impact it will have on:</p>
<ul>
  <li>other products and services
  <li>all relevant parties, including customers and suppliers
  <li>the existing architectures
  <li>the required technology
  <li>the service management practices
  <li>the necessary measurements and metrics.</li>
</ul>
<p>Consideration of these factors will not only ensure that the design addresses the functional elements of the service, but also that the management and operational requirements are regarded as a fundamental part of the design, and are not added as an afterthought.</p>
<p>Service design should also be used when the change being made to the product or service is its retirement. Unless the retirement of a product/service is carefully planned, it could cause unexpected negative effects on customers or the organization that might otherwise have been avoided.</p>
<p>Not every change to a product or service will require the same level of service design activity. Every change, no matter how small, will need some degree of design work, but the scale of the activity necessary to ensure success will vary greatly from one change type to another. Organizations must define what level of design activity is required for each category of change, and ensure that everyone within the organization is clear on these criteria.</p>
<p>Service design supports products and services that:</p>
<ul>
  <li>are business- and customer-oriented, focused, and driven
  <li>are cost-effective
  <li>meet the information and physical security requirements of the organization and any external customers.
  <li>are flexible and adaptable, yet fit for purpose at the point of delivery</li>
  <li>can absorb an ever-increasing demand in the volume and speed of change</li>
  <li>meet increasing organizational and customer demands for continuous operation</li>
  <li>are managed and operated to an acceptable level of risk.
</ul>
<p>With many pressures on the organization, there can be a temptation to 'cut corners' on the coordination of practices and relevant parties for service design activities, or to ignore them completely. This should be avoided, as integration and coordination are essential to the overall quality of the products and services that are delivered.</p>
<h5>Design thinking</h5>
<p>Design thinking is a practical and human-centred approach that accelerates innovation. It is used by product and service designers as well as organizations to solve complex problems and find practical, creative solutions that meet the needs of the organization and its customers. It can be viewed as a complementary approach to Lean and Agile methodologies. Design thinking draws upon logic, imagination, intuition, and systems thinking to explore possibilities and to create desired outcomes that benefit customers.</p>
<p>Design thinking includes a series of activities:</p>
<ul>
  <li>Inspiration and empathy, through direct observation of people and how they work or interact with products and services, as well as identifying how they might interact differently with other solutions.</li>
  <li>Ideation, which combines divergent and convergent thinking. Divergent thinking is the ability to offer different, unique, or variant ideas, while convergent thinking is the ability to find the preferred solution to a given problem. Divergent thinking ensures that many possible solutions are explored, and convergent thinking narrows these down to a final preferred solution.</li>
  <li>Prototyping, where these ideas are tested early, iterated, and refined. A prototype helps to gather feedback and improve an idea. Prototypes speed up the process of innovation by allowing service designers to better understand the strengths and weaknesses of new solutions.</li>
  <li>Implementation, where the concepts are brought to life. This should be coordinated with all relevant service management practices and other parties. Agile methodology can be employed to develop and implement the solution in an iterative way.</li>
  <li>Evaluation (in conjunction with other practices, including project management and release management) measures the actual performance of product or service implementation to ensure acceptance criteria are met, and to find any opportunities for improvement.</li>
</ul>
<p>Design thinking is best applied by multi-disciplinary teams; because it balances the perspectives of customers, technology, the organization, partners, and suppliers, it is highly integrative, aligns well with the organization's service value
  system (SVS), and can be a key enabler of digital transformation.</p>
<h5>Customer and user experience</h5>
<p>The CX and UX aspects of service design are essential to ensuring products and services deliver the desired value for customers and the organization. CX design is focused on managing every aspect of the complete CX, including time, quality, cost, reliability, and effectiveness. UX looks specifically at the ease of use of the product or service and how the customer interacts with it.</p>
<h5>Lean user experience</h5>
<p>Lean user experience (Lean UX) design is a mindset, a culture, and a process that embraces Lean-Agile methods. It implements functionality in minimum viable increments, and determines success by measuring results against an outcome hypothesis. Lean UX is incredibly useful when working on projects where Agile development methods are used. The core objective is to focus on obtaining feedback as early as possible so that it can be used to make quick decisions.</p>
<p>Typical questions for Lean UX might include: Who are the customers of this product/service and what will it be used for? When is it used and under what circumstances? What will be the most important functionality? What are the biggest risks?</p>
<p>There may be more than one answer to each question, which creates a greater number of assumptions than it might be practical to handle. The team will then prioritize these assumptions by the risks they represent to the organization and its customers.</p>
<p>Risk identification, assessment, and treatment are key requirements within all design activities; therefore risk management must be included as an integrated aspect of service design. This will ensure that the risks involved in the provision of products and services and the operation of practices, technology, and measurement methods are aligned with organizational risk and impact, because risk management is embedded within all design processes and activities.</p>
<p>Figure 5.32 shows the contribution of service design to the service value chain, with
  the practice being involved in all value chain activities:</p>
<p><b>Plan</b> The service design practice includes planning and organizing the people, partners and suppliers, information, communication, technology, and practices for new or changed products and services, and the interaction between the organization and its customers.</p>
<p><b>Improve</b> Service design can be used to improve an existing service as well as to create a new service from scratch. Services can be designed as a minimum viable service, deployed, and then iterated and improved to add further value based on feedback.</p>
<p><b>Engage</b> Service design incorporates CX and UX, which are quintessential examples of engagement.</p>
<p><b>Design and transition</b> The purpose of service design is to design products and services that are easy to use, desirable, and that can be delivered by the organization.</p>
<p><b>Obtain/build</b> Service design includes the identification of products, services, and service components that need to be obtained or built for the new or changed service.<br>
</p>
<p><b>Deliver and support</b> Service design manages the user's full journey, through operation, restoration, and maintenance of the service.</p>
<p>Figure 5.32 Heat map of the contribution of service design to value chain activities.</p>
<p><a href="/view-pdf/servicedesign.pdf" ><img class="img-fluid" src="{{ asset('storage/images/itilfour/imagefivethirtytwo.jpg') }}"  alt=""></a></p>
<br>
<br>
<br>
<br>
<h3><a name="servdeskmd"></a>Service desk</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the service desk practice is to capture demand for incident resolution and service requests. It should also be the entry point and single point of contact for the service provider with all of its users.</p>
<p>Service desks provide a clear path for users to report issues, queries, and requests, and have them acknowledged, classified, owned, and actioned. How this practice is managed and delivered may vary from a physical team of people on shift work to a distributed mix of people connected virtually, or automated technology and bots. The function and value remain the same, regardless of the model.</p>
<p>With increased automation and the gradual removal of technical debt, the focus of the service desk is to provide support for 'people and business' rather than simply technical issues. Service desks are increasingly being used to get various matters arranged, explained, and coordinated, rather than just to get broken technology fixed, and the service desk has become a vital part of any service operation.</p>
<p>A key point to be understood is that, no matter how efficient the service desk and its people are, there will always be issues that need escalation and underpinning support from other teams. Support and development teams need to work in close collaboration with the service desk to present and deliver a 'joined up' approach to users and customers.</p>
<p>The service desk may not need to be highly technical, although some are. However, even if the service desk is fairly simple, it still plays a vital role in the delivery of services, and must be actively supported by its peer groups. It is also essential to understand that the service desk has a major influence on user experience and how the service provider is perceived by the users.</p>
<p>Another key aspect of a good service desk is its practical understanding of the wider business context, the business processes, and the users. Service desks add value not simply through the transactional acts of, for example, incident logging, but also by understanding and acting on the business context of this action. The service desk should be the empathetic and informed link between the service provider and its users.</p>
<p>With increased automation, Al, robotic process automation (RPA), and chatbots, service desks are moving to provide more self-service logging and resolution directly via online portals and mobile applications. The impact on service desks is reduced phone contact, less low-level work, and a greater ability to focus on excellent CX when personal contact is needed.</p>
<p>Service desks provide a variety of channels for access. These include:</p>
<ul>
  <li>phone calls, which can include specialized technology, such as interactive voice response (IVR), conference calls, voice recognition, and others
  <li>service portals and mobile applications, supported by service and request catalogues, and knowledge bases
  <li>chat, through live chat and chatbots
  <li>email for logging and updating, and for follow-up surveys and confirmations. Unstructured emails can be difficult to process, but emerging technologies based on Al and machine learning are starting to address this
  <li>walk-in service desks are becoming more prevalent in some sectors, e.g. higher education, where there are high peaks of activity that demand physical presence
  <li>text and social media messaging, which are useful for notifications in case of major incidents and for contacting specific stakeholder groups, but can also be used to allow users to request support
  <li>public and corporate social media and discussion forums for contacting the service provider and for peer-to-peer support.</li>
</ul>
<p>Some service desks have a limited support window where service cover is available (for example, 08.00-20.00, Monday-Friday). Staff are therefore expected to work in shift patterns to provide consistent support levels.</p>
<p>In some cases, the service desk is a tangible team, working in a single location. A centralized service desk requires supporting technologies, such as:</p>
<ul>
  <li>intelligent telephony systems, incorporating computer-telephony integration, IVR, and automatic call distribution
  <li>workflow systems for routing and escalation
  <li>workforce management and resource planning systems
  <li>a knowledge base
  <li>call recording and quality control
  <li>remote access tools
  <li>dashboard and monitoring tools
  <li>configuration management systems.</li>
</ul>
<p>In other cases, a virtual service desk allows agents to work from multiple locations, geographically dispersed. A virtual service desk requires more sophisticated supporting technology, involving more complex routing and escalation; these solutions are often cloud-based.</p>
<p>Service desk staff require training and competency across a number of broad technical and business areas. In particular, they need to demonstrate excellent customer service skills such as empathy, incident analysis and prioritization, effective communication, and emotional intelligence. The key skill is to be able to fully understand and diagnose a specific incident in terms of business priority, and to take appropriate action to get this resolved, using available skills, knowledge, people, and processes.</p>
<p>Figure 5.33 shows the contribution of the service desk to the service value chain, with the practice being involved in all value chain activities except plan:</p>
<p><b>Improve</b> Service desk activities are constantly monitored and evaluated to support continual improvement, alignment, and value creation. Feedback from users is collected by the service desk to support continual improvement.</p>
<p><b>Engage</b> The service desk is the main channel for tactical and operational engagement with users.</p>
<p><b>Design and transition</b> The service desk provides a channel for communicating with users about new and changed services. Service desk staff participate in release planning, testing, and early life support.</p>
<p><b>Obtain/build</b> Service desk staff can be involved in acquiring service components used to fulfil service requests and resolve incidents.<br>
</p>
<p><b>Deliver and support</b> The service desk is the coordination point for managing incidents and service requests.</p>
<p>Figure 5.33 Heat map of the contribution of the service desk to value chain activities.</p>
<p><a href="/view-pdf/servicedesk.pdf" ><img class="img-fluid" src="{{ asset('storage/images/itilfour/imagefivethirtythree.jpg') }}"  alt=""></a></p>
<br>
<br>
<br>
<br>
<h3><a name="slamanmd"></a>Service level management</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the service level management practice is to set clear business-based targets for service levels, and to ensure that delivery of services is properly assessed, monitored, and managed against these targets.</p>
<p><img class="img-fluid" src="{{ asset('storage/images/itilfour/image110.jpg') }}"  alt="image110"></p>
<h5>Definition: Service level</h5>
<p>One or more metrics that define expected or achieved service quality.</p>
<p>Service level management provides the end-to-end visibility of the organization's services. To achieve this, service level management:</p>
<ul>
  <li>establishes a shared view of the services and target service levels with customers</li>
  <li>ensures the organization meets the defined service levels through the collection, analysis, storage, and reporting of the relevant metrics for the identified services</li>
  <li>performs service reviews to ensure that the current set of services continues to meet the needs of the organization and its customers</li>
  <li>captures and reports on service issues, including performance against defined service levels.</li>
</ul>
<p>The skills and competencies for service level management include relationship management, business liaison, business analysis, and commercial/supplier management. The practice requires pragmatic focus on the whole service and not simply its constituent parts; for example, simple individual metrics (such as percentage system availability) should not be taken to represent the whole service.</p>
<p><img class="img-fluid" src="{{ asset('storage/images/itilfour/image110.jpg') }}" alt="image110"></p>
<h5>Definition: Service level agreement</h5>
<p>A documented agreement between a service provider and a customer that identifies both services required and the expected level of service.</p>
<p>Service level agreements (SLAs) have long been used as a tool to measure the performance of services from the customer's point of view, and it is important that they are agreed in the wider business context. Using SLAs may present many challenges; often they do not fully reflect the wider service performance and the user experience.</p>
<p>Some of the key requirements for successful SLAs include:</p>
<ul>
  <li>They must be related to a defined 'service' in the service catalogue; otherwise they are simply individual metrics without a purpose, that do not provide adequate visibility or reflect the service perspective.</li>
  <li>They should relate to defined outcomes and not simply operational metrics. This can be achieved with balanced bundles of metrics, such as customer satisfaction and key business outcomes.</li>
  <li>They should reflect an 'agreement', i.e. engagement and discussion between the service provider and the service consumer. It is important to involve all stakeholders, including partners, sponsors, users, and customers.</li>
  <li>They must be simply written and easy to understand and use for all parties.</li>
</ul>
<p>In many cases, using single-system-based metrics as targets can result in misalignment and a disconnect between service partners regarding the success of the service delivery and the user experience. For example, if an SLA is based only on the percentage of uptime of a service, it can be deemed to be successful by the provider, yet still miss out on significant business functionalities and outcomes which are important to the consumer. This is referred to as the 'watermelon SLA' effect.</p>
<h5>The watermelon SLA effect</h5>
<p>Traditional SLAs have been based on individual activities such as incident resolution times, system availability ('99.9'), and volume metrics (e.g. number of incidents or requests handled). Without a business context these metrics are often meaningless. For example, although a system availability of 99.6% is impressive, this still needs to align with key business requirements. The system may have an acceptable unavailability of 0.4%, but if that time falls when there is an important process happening (such as a commercial transaction, an operating theatre in use, or point-of-sale tills in use), then customer/user satisfaction will be low, regardless of whether the SLA has been met.</p>
<p>This can be problematic for the service provider if it thinks it is doing a great job (the reports are all green), when in fact its customers are dissatisfied with the service received and also frustrated that the provider doesn't notice this. This is known as the watermelon SLA effect, because like a watermelon, the SLA may appear green on the outside, but is actually red inside.</p>
<p>Service level management identifies metrics and measures that are a truthful reflection of the customer's actual experience and level of satisfaction with the whole service. These will vary across organizations and the only way to learn what these are is to find out directly from customers.</p>
<p>Service level management requires focus and effort to engage and listen to the requirements, issues, concerns, and daily needs of customers:</p>
<ul>
  <li>Engagement is needed to understand and confirm the actual ongoing needs and requirements of customers, not simply what is interpreted by the service provider or has been agreed several years before.</li>
  <li>Listening is important as a relationship-building and trust-building activity, to show customers that they are valued and understood. This helps to move the provider away from always being in 'solution mode' and to build new, more constructive partnerships.</li>
</ul>
<p>The activities of engaging and listening provide a great opportunity to build improved relationships and to focus on what really needs to be delivered. It also gives service delivery staff an experience-based understanding of the day-to-day work that is done with their technology, enabling them to deliver a more business-focused service.</p>
<p>Service level management involves collating and analysing information from a number of sources, including:</p>
<ul>
  <li><b>Customer engagement</b> This involves initial listening, discovery, and information capture on which to base metrics, measurement, and ongoing progress discussions. Consider asking customers some simple open questions such as:</li>
  <ul>
    <li>What does your work involve?</li>
    <li>How does technology help you?</li>
    <li>What are your key business times, areas, people, and activities?</li>
    <li>What differentiates a good day from a bad day for you?</li>
    <li>Which of these activities is most important to you?</li>
    <li>What are your goals, objectives, and measurements for this year?</li>
    <li>What is the best measure of your success?</li>
    <li>On what do you base your opinion and evaluation of a service or IT/technology?</li>
    <li>How can we help you more?</li>
  </ul>
  <li><b>Customer feedback</b> This is ideally gathered from a number of sources, both formal and informal, including:</li>
  <ul>
    <li><b>Surveys</b> These can be from immediate feedback such as follow-up questions to incidents, or from more reflective periodic surveys that gauge feedback on the overall service experience. Both are event-based.</li>
    <li><b>Key business-related measures</b> These are measures agreed between the service provider and its customer, based on what the customer values as important. This could be a bundle of SLA metrics or a very specific business activity such as a sales transaction, project completion, or operational function such as getting an ambulance to the site of an accident within x minutes.</li>
  </ul>
  <li><b>Operational metrics</b> These are the low-level indicators of various operational activities and may include system availability, incident response and fix times, change and request processing times, and system response times.</li>
  <li><b>Business metrics</b> These can be any business activity that is deemed useful or valuable by the customer and used as a means of gauging the success of the service. These can vary from some simple transactional binary measures such as ATM or POS terminal availability during business hours (09:00-17:00 daily) or successful completion of business activities such as passenger check-in.</li>
</ul>
<p>Once this feedback is gathered and collated for ongoing review, it can be used as input to design suitable measurement and reporting models and practices.</p>
<p>Figure 5.34 shows the contribution of service level management to the service value chain, with the practice being applied mainly to the plan and engage activities:</p>
<p><b>Plan</b> Service level management supports planning of the product and service portfolio and service offerings with information about the actual service performance and trends.</p>
<p><b>Improve</b> Service feedback from users, as well as requirements from customers, can be a driving force for service improvement.</p>
<p><b>Engage</b> Service level management ensures ongoing engagement with customers and users through feedback processing and continual service review.</p>
<p><b>Design and transition</b> The design and development of new and changed services receives input from this practice, both through interaction with customers and as part of the feedback loop in transition.</p>
<p><b>Obtain/build</b> Service level management provides objectives for components and service performance, as well as for measurement and reporting capabilities of the products and services.</p>
<p><b>Deliver and support</b> Service level management communicates service performance objectives to the operations and support teams and collects their feedback as an input for service improvement.</p>
<p>Figure 5.34 Heat map of the contribution of service level management to value chain activities.</p>
<p><a href="/view-pdf/servicelevelmanagement.pdf" ><img class="img-fluid" src="{{ asset('storage/images/itilfour/imagefivethirtyfour.jpg') }}"  alt="image124"></a></p>
<br>
<br>
<br>
<br>
<h3><a name="servreqmanmd"></a>Service request management</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the service request management practice is to support the agreed quality of a service by handling all pre-defined, user-initiated service requests in an effective and user-friendly manner.</p>
<p><img class="img-fluid" src="{{ asset('storage/images/itilfour/image125.jpg') }}"  alt="image125"></p>
<h5>Definition: Service request</h5>
<p>A request from a user or a user's authorized representative that initiates a service action which has been agreed as a normal part of service delivery.</p>
<p>Each service request may include one or more of the following:</p>
<ul>
  <li>a request for a service delivery action (for example, providing a report or replacing a toner cartridge)</li>
  <li>a request for information (for example, how to create a document or what the hours of the office are)</li>
  <li>a request for provision of a resource or service <br>
    (for example, providing a phone or laptop to a user, or providing a virtual server for a development team)</li>
  <li>a request for access to a resource or service (for example, providing access to a file or folder)</li>
  <li>feedback, compliments, and complaints (for example, complaints about a new interface or compliments to a support team).</li>
</ul>
<p>Fulfilment of service requests may include changes to services or their components; usually these are standard changes. Service requests are a normal part of service delivery and are not a failure or degradation of service, which are handled as incidents. Since service requests are pre-defined and pre-agreed as a normal part of service delivery, they can usually be formalized, with a clear, standard procedure for initiation, approval, fulfilment, and management. Some service requests have very simple workflows, such as a request for information. Others, such as the setup of a new employee, may be quite complex and require contributions from many teams and systems for fulfilment. Regardless of the complexity, the steps to fulfil the request should be well-known and proven. This allows the service provider to agree times for fulfilment and to provide clear communication of the status of the request to users.</p>
<p>Some service requests require authorization according to financial, information security, or other policies, while others may not need any. To be handled successfully, service request management should follow these guidelines:</p>
<ul>
  <li>Service requests and their fulfilment should be standardized and automated to the greatest degree possible.</li>
  <li>Policies should be established regarding what service requests will be fulfilled with limited or even no additional approvals so that fulfilment can be streamlined.</li>
  <li>The expectations of users regarding fulfilment times should be clearly set, based on what the organization can realistically deliver.</li>
  <li>Opportunities for improvement should be identified and implemented to produce faster fulfilment times and take advantage of automation.</li>
  <li>Policies and workflows should be included for the documenting and redirecting of any requests that are submitted as service requests, but which should actually be managed as incidents or changes.</li>
</ul>
<p>Some service requests can be completely fulfilled by automation from submission to closure, allowing for a complete self-service experience. Examples include client software installation or provision of virtual servers.</p>
<p>Service request management is dependent upon well-designed processes and procedures, which are operationalized through tracking and automation tools to maximize the efficiency of the practice. Different types of service request will have different fulfilment workflows, but both efficiency and maintainability will be improved if a limited number of workflow models are identified. When new service requests need to be added to the service catalogue, existing workflow models should be leveraged whenever possible.</p>
<p>Figure 5.35 shows the contribution of service request management to the service value chain, with the practice being involved in all service value chain activities except the plan activity:</p>
<p><b>Improve</b> Service request management can provide a channel for improvement initiatives, compliments, and complaints from users. It also contributes to improvement by providing trend, quality, and feedback information about fulfilment of requests.</p>
<p><b>Engage</b> Service request management includes regular communication to collect user-specific requirements, set expectations, and to provide status updates.</p>
<p><b>Design and transition</b> Standard service components may be transitioned to the live environment through service request fulfilment.</p>
<p><b>Obtain/build</b> Acquisition of pre-approved service components may be fulfilled through service requests.</p>
<p><b>Deliver and support</b> Service request management makes a significant contribution to normal service delivery. This activity of the value chain is mostly concerned with ensuring users continue to be productive, and sometimes depends heavily on fulfilment of their requests.</p>
<p>Figure 5.35 Heat map of the contribution of service request management to value chain activities.</p>
<p><a href="/view-pdf/servicerequestmanagement.pdf" ><img alt="" class="img-fluid" src="{{ asset('storage/images/itilfour/imagefivethirtyfive.jpg') }}" ></a></p>
<br>
<br>
<br>
<br>
<h3><a name="servvaltestmd"></a>Service validation and testing</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the service validation and testing practice is to ensure that new or changed products and services meet defined requirements. The definition of service value is based on input from customers, business objectives, and regulatory requirements, and is documented as part of the value chain activity of design and transition. These inputs are used to establish measurable quality and performance indicators that support the definition of assurance criteria and testing requirements.</p>
<h5>Service validation</h5>
<p>Service validation focuses on establishing deployment and release management acceptance criteria (conditions that must be met for production readiness), which are verified through testing. Acceptance criteria can be either utility-or warranty-focused, and are defined through understanding customer, regulatory, business, risk management, and security requirements.</p>
<p>The service validation activities of this practice establish, verify, and document both utility-and warranty-focused service assurance criteria and form the basis for the scope and focus of testing activities.</p>
<h5>Testing</h5>
<p>A test strategy defines an overall approach to testing. It can apply to an environment, a platform, a set of services, or an individual service. Testing should be carried out equally on both in-house developed systems and externally developed solutions. The test strategy is based on the service acceptance criteria, and should align with the requirements of appropriate stakeholders to ensure testing matches the risk appetite and is fit for purpose.</p>
<p>Typical test types include:</p>
<ul>
  <li>Utility/functional tests:</li>
  <ul>
    <li><b>Unit test</b> A test of a single system component</li>
    <li><b>System test</b> Overall testing of the system, including software and platforms</li>
    <li><b>Integration test</b> Testing a group of dependent software modules together</li>
  </ul>
</ul>
<ul>
  <li><b>Regression test</b> Testing whether previously working functions were impacted. </li>
  <li>Warranty/non-functional tests:</li>
  <ul>
    <li><b>Performance and capacity test</b> Checking speed and capacity under load</li>
    <li><b>Security test</b> Testing vulnerability, policy compliance, penetration, and denial of service risk</li>
    <li><b>Compliance test</b> Checking that legal and regulatory requirements have been met</li>
    <li><b>Operational test</b> Testing for backup, event monitoring, failover, recovery, and reporting</li>
    <li><b>Warranty requirements test</b> Checking for verification of necessary documentation, training, support model definition, and knowledge transfer</li>
    <li><b>User acceptance test</b> The test performed by users of a new or changed system to approve a release.</li>
  </ul>
</ul>
<p>Figure 5.36 shows the contribution of service validation and testing to the service value chain, with the practice being involved in all value chain activities except the plan activity:</p>
<p><b>Improve</b> Metrics of service validation and testing, such as escaped defects, test coverage, and service performance against SLAs are critical success measures required to improve CX and lower risk.</p>
<p><b>Engage</b> Involvement of some stakeholders in service validation and testing activities helps to engage them and improves visibility and adoption of the services.</p>
<p><b>Design and transition</b> Service design, knowledge management, performance management, deployment management, and release management are all tightly integrated with the service validation and testing practice.</p>
<p><b>Obtain/build</b> Service validation and testing activities are closely linked to all practices related to obtaining services from external service providers, as well as to project management and software development activities in both waterfall and Agile methods.</p>
<p><b>Deliver and support</b> Known errors are captured by service validation and testing and shared with the service desk and incident management practices to enable faster service restoration timeframes. Likewise, information regarding service disruption or escaped defects are fed back into service validation and testing to increase the effectiveness and coverage of acceptance criteria and testing activities.</p>
<p>Figure 5.36 Heat map of the contribution of service validation and
  testing to value chain activities.</p>
<p><a href="/view-pdf/servicevalidationandtesting.pdf" ><img alt="" class="img-fluid" src="{{ asset('storage/images/itilfour/imagefivethirtysix.jpg') }}" ></a></p>
<br>
<br>
<br>
<br>
<h2><a name="tmp"></a>Technical Management Practices</h2>
<h3><a name="deploymanmd"></a>Deployment management</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the deployment management practice is to move new or changed hardware, software, documentation, processes, or any other component to live environments. It may also be involved in deploying components to other environments for testing or staging.</p>
<p>Deployment management works closely with release management and change control, but is a separate practice. In some organizations the term 'provisioning' is used to describe the deployment of infrastructure, and deployment is only used to mean software deployment, but in this case the term deployment is used to mean both.</p>
<p>There are a number of distinct approaches that can be used for deployment. Many organizations use a combination of these approaches, depending on their specific services and requirements as well as the release sizes, types, and impact.</p>
<p><b>Phased deployment</b> The new or changed components are deployed to just part of the production environment at a time, for example to users in one office, or one country. This operation is repeated as many times as needed until the deployment is complete.</p>
<p><b>Continuous delivery</b> Components are integrated, tested, and deployed when they are needed, providing frequent opportunities for customer feedback loops.</p>
<p><b>Big bang deployment</b> New or changed components are deployed to all targets at the same time. This approach is sometimes needed when dependencies prevent the simultaneous use of both the old and new components. For example, there could be a database schema change that is not compatible with previous versions of some components.</p>
<p><b>Pull deployment</b> New or changed software is made available in a controlled repository, and users download the software to client devices when they choose.</p>
<p>This allows users to control the timing of updates, and can be integrated with service request management to enable users to request software only when it is needed.</p>
<p>Components that are available for deployment should be maintained in one or more secure locations to ensure that they are not modified before deployment. These locations are collectively referred to as a <b>definitive media library</b> for software and documentation, and a definitive hardware store for hardware components.</p>
<p>Tools that support deployment are many and varied. They are often integrated with configuration management tools, and can provide support for audit and change management. Most organizations have tools for deploying client software, and these may be integrated with a service portal to support a request management practice.</p>
<p>Communication around deployments is part of release management. Individual deployments are not generally of interest to users and customers until they are released.</p>
<p>If infrastructure is provided as a service, then deployment of new or changed servers, storage, or networking is typically managed by the organization, often treating the infrastructure as a code, so that the organization can automate deployment. In these environments it is possible that some deployments may be under the control of the supplier, such as the installation of firmware updates, or if they provide the operating system as well as the infrastructure they may deploy operating system patches. The IT organization must ensure that they know what deployments are planned, and which have happened, to maintain a controlled environment.</p>
<p>If application development is provided as a service, then deployment may be carried out by the external application developer, by the in-house IT department, or by a service integrator. Again, it is essential that the organization is aware of all deployments so that a controlled environment can be maintained.</p>
<p>In an environment with multiple suppliers it is important to understand the scope and boundaries of each organization's deployment activities, and how these will interact. Most organizations have a process for deployment, and this is often supported with standard tools and detailed procedures to ensure that software is deployed in a consistent way. It is common to have different processes for different environments. For example, there may be one process for the deployment of client application software, and a completely different process for the deployment of server operating system patches.</p>
<p>Figure 5.37 shows the contribution of deployment management to the service value chain, with the practice being applied mainly to the design and transition, and obtain/build value chain activities, but also to the improve activity:</p>
<p><b>Improve</b> Some improvements may require components to be deployed before they can be delivered, and these should be planned and managed in the same way as any other deployment.</p>
<p><b>Design and transition</b> Deployment management moves new and changed components to live environments, so it is a vital element of this value chain activity.</p>
<p><b>Obtain/build</b> Changes can be deployed incrementally as part of this value chain activity. This is especially common in DevOps environments using a complete automated toolchain for continuous integration, delivery, and deployment.</p>
<p>Figure 5.37 Heat map of the contribution of deployment management to value chain activities</p>
<p><a href="/view-pdf/deploymentmanagement.pdf" ><img class="img-fluid" src="{{ asset('storage/images/itilfour/imagefivethirtyseven.jpg') }}" alt="image136"></a></p>
<br>
<br>
<br>
<br>
<h3><a name="infraplanmanmd"></a>Infrastructure and platform management</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the infrastructure and platform management practice is to oversee the infrastructure and platforms used by an organization. When carried out properly, this practice enables the monitoring of technology solutions available to the organization, including the technology of external service providers.</p>
<p>IT infrastructure is the physical and/or virtual technology resources, such as servers, storage, networks, client hardware, middleware, and operating systems software, that provide the environments needed to deliver IT services. This includes any Cl a customer uses to access the service or consume a product. IT infrastructure may be managed by the service provider or by an external supplier as dedicated, shared, or cloud services. Infrastructure and platform management may also include the buildings and facilities an organization uses to run its IT infrastructure.</p>
<p>The infrastructure and platform management practice includes the provision of technology needed to support activities that create value for the organization and its stakeholders. This can include being ready to adopt new technologies such as machine learning, chatbots, artificial intelligence, mobile device management, and enterprise mobility management.</p>
<p>It is important to consider that every single organization must develop its own strategy to achieve the intended outcome with any type of infrastructure or platform. Each organization should design its own cloud management system to orchestrate all the interrelated components of infrastructure and platform with its business goals and the intended service quality and operational efficiency.</p>
<h5>Cloud service models</h5>
<p> Cloud service models include:</p>
<ul>
  <li><b>Software as a service (SaaS)</b> The consumer can use the applications running in the cloud infrastructure without having to control or even manage the underlying cloud infrastructure.</li>
  <li><b>Platform as a service (PaaS)</b> The consumer can deploy onto the cloud acquired applications created using programming languages, services, libraries, and/or tools supported by the supplier without having to control or even manage the underlying cloud infrastructure. They have control over the deployed applications and sometimes the configuration settings for the application and hosting environment.</li>
  <li><b>Infrastructure as a service (laaS)</b> The consumer can get processing, storage, and/or any other computing resources without having to control the underlying infrastructure.</li>
</ul>
<h5>Cloud service deployment models</h5>
<p>Every service model can be deployed in several ways, either independently or using a mix of the following:</p>
<ul>
  <li><b>Private cloud</b> This type of cloud may be located within the organization's premises or outside of it. It is a cloud infrastructure or platform to be used exclusively by a specific organization which, at the same time, can have one or several consumers. This cloud is normally managed and owned by an organization, a provider, or a combination of both.</li>
  <li><b>Public cloud</b> This type of cloud is located on the cloud provider premises. It is provisioned for open use and may be owned, managed, and operated by any type of organization interested in using it.</li>
  <li><b>Community cloud</b> A community cloud may be owned, managed, and operated by one or more of the stakeholders in the community, and it may exist on or off the organization's premises. This cloud deployment model consists of several cloud services that are meant to support and share a collection of cloud service customers with the same requirements and who have a relationship with one another.</li>
  <li><b>Hybrid cloud</b> This cloud infrastructure is a composition of two or more distinct cloud infrastructures (private, community, or public) that remain unique entities, but are bound together by standardized or proprietary technology that enables data and application portability.</li>
</ul>
<h5>ITIL practices and cloud computing</h5>
<p>The advent of the cloud has been one of the greatest challenges and opportunities within the IT world for decades. The promise of rapid, elastic storage and IT services available at the touch of a button is one that many organizations struggle to deliver internally, not because the benefits are not there to be had, but rather because their own ITSM processes and controls have not been adapted to support a radically different way of working.</p>
<p>The management and control of IT services is a key skill of IT departments no matter where those services are physically located, and the processes and controls offered by ITIL are readily adaptable to support the management of those cloud services.</p>
<p>A coordinated response to the management of cloud services is essential. Organizations that attempt to address only a cloud service provision as an operational issue will suffer on the tactical front, just as an organization that attempts to control cloud services on a tactical front will suffer at the strategic level. A joined-up approach covering all three levels, strategic, tactical, and operational, is required.</p>
<p>Apart from the infrastructure and platform management practice, the operation and management of cloud-based services involves many other practices. It should be noted that this is not a comprehensive list:</p>
<ul>
  <li><b>Service financial management</b> One of the adjustments that IT departments often have to make for cloud computing is to their fiscal planning, which typically uses both traditional capital expenditure (CAPEX) and operational expenditure (OPEX). With the advent of cloud computing, OPEX is preferred over CAPEX, as cloud services are often consumed as utilities and paid out of the operational budget. If cloud services are quicker and easier to access than in-house services, the costs associated with them will grow as more parts of the business use them. The IT cost model must be adjusted, and the service financial management practice can help to determine the techniques and controls required to ensure that the organization does not run out of OPEX unexpectedly.</li>
  <li><b>Supplier management</b> The focus of this practice will need to change from simply selecting suppliers and onboarding them to acting as the front end for a full-on release management process. This will ensure that areas such as IT security, data protection, and regulatory compliance are routinely assessed prior to the onboarding of a new cloud offering.</li>
  <li><b>Capacity and performance management</b> Coupled with service financial management, this practice should establish and monitor budgets, with thresholds tracked and warnings published if an upswing in demand leads to an increase in the cost of cloud services.</li>
  <li><b>Change control</b> The boundaries of this practice will have to be redefined, as cloud service providers often make changes with minimal customer involvement, and almost no customer approval. Products and services built on top of cloud services will need to make far greater use of standard changes to unlock the benefits that cloud platforms (and associated business models) provide.</li>
  <li><b>Incident management</b> The focus of this practice will change from knowing how to fix in-house issues, to knowing which service is supported by which cloud provider, and what information they will require to resolve an issue. Greater care will be needed to support impacted customers and teams.</li>
  <li><b>Deployment management</b> This practice will continue to be critical to IT departments, but the ability to safely onboard or offboard a cloud provider will become a common requirement for IT departments. Deployment management will be a key capability for successful IT organizations, to ensure new cloud capabilities are rapidly deployed and embedded within the in-house service offerings.</li>
</ul>
<p>Figure 5.38 shows the contribution of infrastructure and platform management to the service value chain, with the practice being involved in all value chain activities except the engage activity:</p>
<p><b>Plan</b> Infrastructure and platform management provides information about technology opportunities and constraints that is used for the organization's strategic and tactical planning.</p>
<p><b>Improve</b> Information about technology opportunities that can support continual improvement, and any constraints of the technologies in use, is provided by this practice.</p>
<p><b>Design and transition</b> Product and service design benefits from the information provided about technology opportunities and constraints.</p>
<p>Obtain/build Infrastructure and platform management is a critical contributor to this activity as it provides necessary information about the components to be obtained.</p>
<p><b>Deliver and support</b> At the operational level, infrastructure and platform management supports ongoing maintenance of the services and the infrastructure, including any executions of patch management, backups, etc.</p>
<p>Figure 5.38 Heat map of the contribution of infrastructure and platform management to value chain activities</p>
<p><a href="/view-pdf/infrastructureandplatformmanagement.pdf" ><img class="img-fluid" src="{{ asset('storage/images/itilfour/imagefivethirtyeight.jpg') }}" alt="image136"></a></p>
<br>
<br>
<br>
<br>
<h3><a name="softdevmanmd"></a>Software development and management</h3>
<p><a href="#home">home</a>
<p>
<h5>Key message</h5>
<p>The purpose of the software development and management practice is to ensure that applications meet internal and external stakeholder needs, in terms of functionality, reliability, maintainability, compliance, and auditability.</p>
<p>The term 'software' can be used to describe anything from a single program (or suite of programs) to larger constructs (such as an operating system, an operating environment, or a database) on which various smaller application programs, processes, or workflows can run. Therefore the term includes, but is not limited to, desktop applications, or mobile apps, embedded software (controlling machines and devices), and websites.</p>
<p>Software applications, whether developed in house or by a partner or vendor, are of critical importance in the delivery of customer value in technology-enabled business services. As a result, software development and management is a key practice in every modern IT organization, ensuring that applications are fit for purpose and use.</p>
<p>The software development and management practice encompasses activities such as:</p>
<ul>
  <li>solution architecture</li>
  <li>solution design (user interface, CX, service design, etc.)</li>
  <li>software development</li>
  <li>software testing (which can include several components, such as unit testing, integration testing, regression testing, information security testing, and user acceptance testing)</li>
  <li>management of code repositories or libraries to maintain integrity of artefacts</li>
  <li>package creation, for the effective and efficient deployment of the application</li>
  <li>version control, sharing, and ongoing management of smaller blocks of code.</li>
</ul>
<p>The two generally accepted approaches to software development are referred to as the waterfall and Agile methods (see section 5.1.8 of the ITIL Four foundation manual for more information on these methods).</p>
Software management is a wider practice, encompassing the ongoing activities of designing, testing, operating, and improving software applications so they continue to facilitate value creation. Software components can be continually evaluated using a lifecycle that tracks the component from ideation through to ongoing improvement, and eventually retirement. This lifecycle is represented in Figure 5.39.
<p>Figure 5.39 The software lifecycle.</p>
<p><img class="img-fluid" src="{{ asset('storage/images/itilfour/imagefivethirtynine.jpg') }}" alt="image136"></p>
<p>Figure 5.40 shows the contribution of software development and management to the service value chain, with the practice being involved in all value chain activities except the engage activity:</p>
<p><b>Plan</b> Software development and management provides information about opportunities and constraints related to the creation and changing of the organization's software.</p>
<p><b>Improve</b> Service improvements involving software components of the services, especially those developed in house, rely on this practice.<br>
</p>
<p><b>Design and transition</b> Software development and management allows the organization to holistically design and manage changes to products and services.</p>
<p><b>Obtain/build</b> The creation of in-house products and the configuration of products developed by partners and suppliers depend on this practice.</p>
<p><b>Deliver and support</b> Software development and management provides delivery and support teams with documentation needed to use products that facilitate the co-creation of value.</p>
<p>Figure 5.40 Heat map of the contribution of software development and
  management to value chain activities</p>
<p><a href="/view-pdf/softwaredevelopmentandmanagement.pdf" ><img class="img-fluid" src="{{ asset('storage/images/itilfour/imagefiveforty.jpg') }}" alt="image136"></a></p>


<!--BODY ENDS HERE--> 
<br>
<br>
<br>
<br>
@endsection