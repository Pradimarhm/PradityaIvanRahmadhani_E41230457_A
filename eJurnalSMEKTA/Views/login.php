<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="resource\css\navbarIndex.css">
    <link rel="stylesheet" href="resource\css\login.css">
</head>
<body>
    <nav>
        <h3 class="brand">E Jurnal PKL SMEKTA</h3>
    </nav>
    <section class="section1" style="background-image: url(resource/image/school.jpg); background-position: center; background-repeat: no-repeat; background-size: cover; background-attachment: fixed; " >
        <div class="card-section1" >
            <div class="container">
                <div class="contentLogin" >
                    <h1 class="h1-content" >Login</h1>
                    <p>Silahkan Masukkan Username dengan nama lengkapmu dan masukan juga password yang sesuai</p>
                </div>
                
                <form class="formLogin" action="post">
                    <label for="">Username</label>
                    <input type="text" placeholder="Masukkan Username" >

                    <label for="">Password</label>
                    <input type="password" placeholder="Masukkan Password" >

                    <div class="coverBtn" >
                        <button class="btnLogin" name="login" type="submit">Login</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </section>
</body>
</html>