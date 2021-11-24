<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            min-height: 100vh;
            background: #ebebeb;
        }

        .input-form {
            max-width: 680px;
            margin-top: 80px;
            padding: 32px;
            background: #fff;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            -webkit-box-shadow: 0 8px 20px 0 rgba(0, 0, 0, 0.15);
            -moz-box-shadow: 0 8px 20px 0 rgba(0, 0, 0, 0.15);
            box-shadow: 0 8px 20px 0 rgba(0, 0, 0, 0.15)
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="input-form-backgroud row">
            <div class="input-form col-md-12 mx-auto">
                <h4 class="mb-3">Sign up</h4>
                <form name="register" class="validation-form" action="member_process.php?mode=register" method="post" novalidate>
                    <div class="row">
                        <div class="col-md-6 mb-3"> <label for="name">UserID</label> <input type="text" class="form-control" name="id" required>
                            <div class="invalid-feedback"> Write Your UserID. </div>
                        </div>
                        <button type="button" class="btn btn-default" onclick="checkId();">Check ID</button>
                        <script>
                            function checkId() {
                                window.open("checkId.php?id=" + document.register.id.value, "IDcheck", "left=50, top=50, width=50, height=10, scrollbars=no, resizeable=no");
                            }
                        </script>
                    </div>
                    <div class="mb-3"> <label for="nickname">Name</label> <input type="text" class="form-control" name="name" required>
                        <div class="invalid-feedback"> Write Your Name. </div>
                    </div>
                    <div class="mb-3"> <label for="pw">Password</label> <input type="password" class="form-control" name="pw1" required>
                        <div class="invalid-feedback"> Write Your Password. </div>
                    </div>
                    <div class="mb-3"> <label for="pw2">Confirm Password</label> <input type="password" class="form-control" name="pw2" required>
                        <div class="invalid-feedback"> Write Your Password Confirm. </div>
                    </div>
                    <div class="mb-3"> <label for="tel">tel</label> <input type="text" class="form-control" name="tel" placeholder="010-1234-5678" required>
                        <div class="invalid-feedback"> Write Your phone number. </div>
                    </div>
                    <div class="mb-3"> <label for="email">Email</label> <input type="email" class="form-control" name="email" placeholder="you@example.com" required>
                        <div class="invalid-feedback"> Write Your Email. </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Sign up</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('load', () => {
            const forms = document.getElementsByClassName('validation-form');
            Array.prototype.filter.call(forms, (form) => {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    </script>
</body>

</html>