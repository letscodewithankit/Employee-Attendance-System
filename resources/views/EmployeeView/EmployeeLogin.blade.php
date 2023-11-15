<! DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title> Bootstrap 4 Login Form Example
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    body {
        background: #28a745 !important;
        font-family: 'Muli', sans-serif;
    }
    h1 {
        color: #fff;
        padding-bottom: 2rem;
        font-weight: bold;
    }
    a {
        color: #333;
    }
    a:hover {
        color: #E8D426;
        text-decoration: none;
    }
    .form-control:focus {
        color: #000;
        background-color: #fff;
        border: 2px solid #E8D426;
        outline: 0;
        box-shadow: none;
    }
    .btn {
        background: #28a745;
        border: #E8D426;
    }
    .btn:hover {
        background: #28a745;
        border: #E8D426;
    }
</style>
<body>
<div class="pt-5">
    <h1 class="text-center"> Employee Login </h1>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="card card-body">
                    <form id="submitForm" action="{{route('employee_validate')}}" method="post" data-parsley-validate="" data-parsley-errors-messages-disabled="true" novalidate="" _lpchecked="1">
                        @csrf
                        <input type="hidden" name="_csrf" value="7635eb83-1f95-4b32-8788-abec2724a9a4">
                        <div class="form-group required">
                            <lSabel for="username"> Enter your ID </lSabel>
                            <input type="text" class="form-control text-lowercase" id="username" required="" name="id" value="">
                        </div>
                        <div class="form-group required">
                            <label class="d-flex flex-row align-items-center" for="password"> Enter your Password
                                <a class="ml-auto border-link small-xl" href="#"> Forget Password? </a> </label>
                            <input type="password" class="form-control" required="" id="password" name="password" value="">
                        </div>
                        <div class="form-group mt-4 mb-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="remember-me" name="remember-me" data-parsley-multiple="remember-me">
                                <label clss="custom-control-label" for="remember-me"> Remember me? </label>
                            </div>
                        </div>
                        <div class="form-group pt-1">
                            <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                        </div>
                    </form>
                    <p class="small-xl pt-3 text-center">
                        <span class="text-muted"> Not a member? </span>
                        <a href="#"> Sign up </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
