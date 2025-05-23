<!-- log.php - login page code -->
<?php 
    session_start();
    include('include/head.php');
?>
<div class="log">
    <section class="vh-100">
        <div class="container py-5 h-100 me-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card box_log" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 col-sm-4">
                                <img src="./assets/images/login/log.png" alt="login form"
                                    style="border-radius: 1rem 0 0 1rem;" class="log_img" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form method="post" action="./php/auth.php">

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-heartbeat fa-2x me-3" style="color: #8d1f1f;"></i>
                                            <span class="h1 fw-bold mb-0">Login</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your
                                            account</h5>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="email" id="form2Example17" class="form-control form-control-md"
                                                placeholder="Email" name="email"/>
                                            <label class="form-label" for="form2Example17">Email address</label>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="password" id="form2Example27"
                                                class="form-control form-control-md" name="pass" />
                                            <label class="form-label" for="form2Example27">Password</label>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button data-mdb-button-init data-mdb-ripple-init
                                                class="btn  btn-md btn-block" type="submit"
                                                style="background-color: rgb(30, 82, 30); color: white; border: 2px sloid darkgreen;" name="login">Login</button>
                                        </div>

                                        <p class="mb-2 pb-lg-2" style="color: #393f81;">Don't have an account? <a
                                                href="./reg.php" style="color: #393f81;">Register here</a></p>
                                        <a href="#!" class="small text-muted">Terms of use.</a>
                                        <a href="#!" class="small text-muted">Privacy policy</a>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

<?php
    include('include/foot.php');
?>