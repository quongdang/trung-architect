<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Sign In</h3>
                </div>
                <div class="panel-body">
                    <div id="response"></div>
                    <form id="login_form">
                        <fieldset>
                            <div class="form-group"  >
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <span onClick="login()" class='btn btn-primary'>Sign in</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // remove any prompt messages
    function clearResponse(){
        $('#response').html('');
    }

    // function to make form values to json format
    $.fn.serializeObject = function(){
    
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
            if (o[this.name] !== undefined) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };

    // function to set cookie
    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    // trigger when registration form is submitted
    function login(){
    
        // get form data
        var login_form=$("#login_form");
        var form_data=JSON.stringify(login_form.serializeObject());
        clearResponse();

        // submit form data to api
        $.ajax({
            url: "../api/user/login.php",
            type : "POST",
            contentType : 'application/json',
            data : form_data,
            success : function(result) {
                // if response is a success, tell the user it was a successful sign up & empty the input boxes
                //$('#response').html("<div class='alert alert-success'>Successful sign up. Please login.</div>");
                //login_form.find('input').val('');
                if (result.jwt) {
                    // store jwt to cookie
                    setCookie("jwt", result.jwt, 1);
                    setCookie("email", form_data.email, 1);
                    window.open('index.php','_self');
                }
            },
            error: function(xhr, resp, text){
                // on error, tell the user sign up failed
                $('#response').html("<div class='alert alert-danger'>Unable to sign in. Please contact admin.</div>");
                console.log(resp);
            }
        });

        return false;
    };
</script>