<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Indomaret</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url("https://ajaib-wp-s3-artifact.s3.ap-southeast-1.amazonaws.com/img/2023/06/02195142/Indomaret.webp");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            backdrop-filter: blur(5px);
            background-color: rgba(255, 255, 255, 0.7);
            height: 100vh;
            margin: 0;
        }
        .dropdown-center {
            text-align: center;
            backdrop-filter: blur(5px);
            background-color: rgba(255, 255, 255, 0.7);
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            height: 475px;
        }
        .logo {
            max-width: 400px;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="dropdown-center">
    <img class="logo" src="https://assets.indomaret.co.id/images/indomaret/meta/meta_home_07122021105655.jpg" alt="Indomaret Logo"><br><br><br><br>
    <form onsubmit="return validateForm()">
        <div class="mb-3 text-start">
            <label for="exampleInputPassword1" class="form-label" style="font-weight: 700; color: black;">INSERT PASSWORD HERE</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div><br>
        <button type="submit" class="btn btn-success px-5">Log In</button>
    </form>
</div>
    <script>
        function validateForm() {
            var password = document.getElementById('exampleInputPassword1').value;
            if (password === '') {
                alert('Please Insert The Password First.');
                return false;
            }
            return true;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
