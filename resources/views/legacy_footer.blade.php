
    <!--<script src="/bootstrapfourthreeone/js/jquery.js"></script>
	<script src="/pmway/public_html/bootstrapfourthreeone/js/bootstrap.js"></script>

	<script src="/pmway/public_html/bootstrapfourthreeone/js/popper.min.js"></script>
	<script src="/pmway/public_html/bootstrapfourthreeone/js/jquery-ui.js"></script>-->

    <script src="/bootstrapfouroneone/jquery/jquery.js"></script>
    <script src="/bootstrapfouroneone/js/bootstrap.js"></script>

    <script src="/bootstrapfouroneone/js/popper.min.js"></script>
    <script src="/bootstrapfouroneone/jqueryui/jquery-ui.js"></script>

     <!--  Create style for the honeypot -->
  <style>
		.hide-robot{
			display:none;
		}
		</style>

  <!-- honeypot style end -->

    <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <table style="width: 100%">
                        <tr>
                            <td>
                                <h5 class="modal-title text-sm-left" id="contactModalTitle">
									<a href="#">Login</a>
								</h5>
                            </td>
                            <!--<td><h5 class="modal-title text-sm-right align-bottom"><a href="/register" role="button"><small>Register</small></a></h5></td><td><button class="close" data-dismiss="modal"><span>&times;</span></button></td>-->
                        </tr>
                    </table>
                </div>
                <div class="modal-body">
                    <form action="/login/create" method="post" role="form" style="display: block; ">
                        <div class="form-group">
                            <input type="text" name="email" id="email" tabindex="1" class="form-control bg-light border border-primary rounded" placeholder="Email" autofocus required>
                        </div>
                        <div class="form-group">
                            <p style="text-align:left">
                                <font color="navy">
									<input type="password" name="password" id="login-password" tabindex="2"
										class="form-control bg-light border border-primary rounded"
										placeholder="Password" required>
								</font>
                            </p>
                        </div>
                        <div class="form-group text-center">
                            <p style="text-align:left">
                                <font color="navy">
									<label>
										<input type="checkbox" name="remember_me" id="remember"> Remember Me </label>
								</font>
                            </p>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <p style="text-align:left">
                                        <font color="navy">
											<input type="submit" name="login-submit" id="login-submit" tabindex="4"
												class="form-control text-white btn btn-login bg-primary border border-primary rounded"
												value="Log In">
										</font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="text-center">
                                        <p style="text-align:left">
                                            <font color="navy">
												<a href="/password/forgot" tabindex="5" class="forgot-password">Forgot
													Password?</a>
											</font>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <p style="text-align:left">
                        <font color="navy">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
						</font>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="contactModalRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <table style="width: 100%">
                        <tr>
                            <td>
                                <h5 class="modal-title text-sm-left" id="contactModalTitle">
									<a href="#">Register</a>
								</h5>
                            </td>
                            <!--<td><h5 class="modal-title text-sm-right align-bottom"><a href="/login" role="button"><small>Login</small></a></h5></td><td><button class="close" data-dismiss="modal"><span>&times;</span></button></td>-->
                        </tr>
                    </table>
                </div>
                <div class="modal-body">
                    <form method="post" action="/signup/create" id="formSignup">
                        <div class="form-group">
                            <p style="text-align:left">
                                <label for="inputName">
                                    <font color="navy">Name</font>
                                </label>
                                <input id="inputName" name="name" placeholder="Name" autofocus value="" required class="form-control" />
                            </p>
                        </div>
                        <div class="form-group">
                            <p style="text-align:left">
                                <font color="navy">
									<label for="inputEmail">Email address</label>
									<input id="inputEmail" name="email" placeholder="email address"
								<!--	 value="" required type="email" class="form-control" />  -->
								</font>
                            </p>
                        </div>
                        <div class="form-group">
                            <p style="text-align:left">
                                <font color="navy">
									<label for="inputPassword">Password</label>
									<input type="password" id="inputPassword" name="password" placeholder="Password"
										required class="form-control" />
								</font>
                            </p>
                        </div>
                         <!-- Create fields for the honeypot -->
      <div class="form-group">
  <input name="firstname" type="text" id="firstname" class="hide-robot">
           </div>
    <!-- honeypot fields end -->
                        <p style="text-align:left">
                            <font color="navy">
								<button type="submit" class="btn btn-primary">Sign up</button>
							</font>
                        </p>
                    </form>
                </div>
                <div class="modal-footer">
                    <p style="text-align:left">
                        <font color="navy">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
						</font>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("a#login").on("click", function(e) {
            e.preventDefault();
            $('#contactModal').modal('show');
        });
    </script>
    <script>
        $("a#register").on("click", function(e) {
            e.preventDefault();
            $('#contactModalRegister').modal('show');
        });
    </script>

   </div>  <!-----NB sticky-footer---->


    <div class="container text-center">
        <!--<p>This may not be needed</p>-->
    </div>
</div>
<footer id="sticky-footer" class="py-4 bg-dark text-white-50">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-6">

                <p style="text-align:center" class="text-white">Project &amp; Process Management
				<span lang="en-za">Best Practice</span>

            <br>at <!--<a href="/cmmi" title="Where are you at?  Click here for PMWay's 1 minute self assessment challenge.  We dare you to take the pin test now!" >-->CM Level 2<!--</a>--> and above</p>
					<p align="center"><a href="/gamestats">
					<!--<img alt="Up Stat or Down Stat" class="img-fluid" src="{{ asset('storage/images/devopsimagemedium.png') }}" title="How are your game stats?">-->
					<img alt="Up Stat or Down Stat" class="img-fluid" src="{{ asset('storage/images/devopsimagemedium.png') }}" onmouseover="this.src="{{ asset('storage/images/devops2.gif') }}"" onmouseout="this.src="{{ asset('storage/images/devopsimagemedium.png') }}"" title="How are your game stats?  Click here for more"></a></p>




				 <p style="text-align:center" class="text-white">underpinned by ITIL</p>

            </div>
            <div class="col-md-3"></div>
            <div class="col-md-3 text-right small align-self-end text-white">2009 PMWay<br><small>People Process Technology Governance Execution</small></div>
        </div>
    </div>

</footer>





</body>
</html>
