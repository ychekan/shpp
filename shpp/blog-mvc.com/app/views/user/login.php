<div class="row">
    <div class="col-md-12 center login-header">
        <h2>Welcome to Admin Panel</h2>
    </div>
    <!--/span-->
</div><!--/row-->
<div class="row">
    <div class="well col-md-5 center login-box">
        <div class="alert alert-info">
            Please enter your e-mail and password
        </div>
        <form class="form-horizontal" action="Form/identificationUser" method="post">
            <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                <input type="email" id="e-mail" name="e-mail" class="form-control" placeholder="e-mail"/>
            </div>
            <div class="clearfix"></div>
            <br/>
            <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                <input type="password" name="password" id="pass" class="form-control"
                       onchange="formValidatePass(this.value)" placeholder="password"/>
            </div>
            <p class="center col-md-5">
                <button type="submit" name="authorise" class="btn btn-primary">Login</button>
            </p>
            <p class="center col-md-5">
                <button type="submit" name="guest" class="btn btn-danger btn-xxs">I'm a guest</button>
            </p>
        </form>
    </div>
    <!--/span-->
</div><!--/row-->

<script type="text/javascript" src="controllers/js/form.js"></script>
