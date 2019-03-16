<?php require APPROOT . '/views/inc/header.php'; ?>
        <div class="row" style="padding-top: 25px;">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <h3>Let us set the <span class="red">appointments</span> so you have more time to do the things you <span class="green">need </span>to.</h3>
            </div>
            <div class="col-lg-3"></div>
        </div>
        <form style="padding-top: 25px;">
            <div class="form-row">
                <div class="col-lg-4"></div>
                <div class="form-group col-lg-4">
                    <input type="email" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="col-lg-4"></div>
            </div>
            <div class="form-row">
                <div class="col-lg-4"></div>
                <div class="form-group col-lg-4">
                    <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="col-lg-4"></div>
            </div>
            <div class="row" style="padding-top: 15px;">
                <div class="col-lg-4"></div>
                <button class="col-lg-4 btn btn-primary" type="submit">Sign in</button>
                <div class="col-lg-4"></div>
            </div>
        </form>
        <div class="row" style="padding-top: 25px;">
            <div class="col-lg-4"></div>
            <div class="col-lg-4"><h5>Don't have an account?</h5></div>
            <div class="col-lg-4"></div>
        </div>
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4"><a href="register.php" class="red">Register Here.</a></div>
            <div class="col-lg-4"></div>
        </div>
        <div class="row" style="padding-top: 50px;">
            <div class="col-lg-4"></div>
            <div class="col-lg-4"><h6><a href="passwordreset.php">Forgot password?</a></h6></div>
            <div class="col-lg-4"></div>
        </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
