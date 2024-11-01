<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="resource\css\navbarIndex.css">
    <link rel="stylesheet" href="resource\css\login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navLogin" >
        <h3 class="brand">E Jurnal PKL SMEKTA</h3>
        <a href="index.php">Ke Beranda</a>
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

                    <div class="container-link" >
                        <label for=""><input type="checkbox">Tampilkan sandi</label>
                        <a class="link-lupasandi" href="">Lupa Sandi?</a>
                    </div>

                    <div class="coverBtn" >
                        <a class="btnLogin" href="">Masuk</a>
                    </div>
                    
                </form>
                <div class="blackDisplay-login" ></div>
            </div>
        </div>
    </section>
</body>
</html>