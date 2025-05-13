<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
    

    


    <style>


        html,
    body {
      height: 100%;
    }


    body {
      display: flex;
      align-items: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
    }


    .form-signin {
      width: 100%;
      max-width: 330px;
      padding: 15px;
      margin: auto;
    }


    .form-signin .checkbox {
      font-weight: 400;
    }


    .form-signin .form-floating:focus-within {
      z-index: 2;
    }


    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }


    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }
    .form-floating{
        margin: 10px;
    }
    </style>
    </head>
    <body class="text-center">
        <main class="form-signin">
            <form action="register.php" method="post">
                <img src="data:image/jpeg;base64,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" class="mb-4" width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">Register</h1>

                <div class="form-floating">
                    <input type="text" class="form-control" id="floating-input" placeholder="Emri" name="emri">
                    <label for="floatingInput">Emri</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floating-input" placeholder="Username" name="username">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control" id="floating-input" placeholder="Email" name="email">
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floating-input" placeholder="Password" name="password">
                    <label for="floatingInput">Password</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floating-input" placeholder="Confirm Password" name="Confirm Password">
                    <label for="floatingInput">Confirm Password</label>
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember me"> Remember me
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary " type="submit" name="submit">Sign Up</button>
                <span>Already have an account: </span> <a href="login.php">Sign In</a>

            </form>

        </main>
    </body>
</html>