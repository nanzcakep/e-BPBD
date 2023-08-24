<!doctype html>
<html lang="en">
    
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- CSS -->
     
        <link rel="stylesheet" href="<?= base_url('public/assets/css/style.css') ?>">
        <link rel="stylesheet" href="<?= base_url('public/assets/css/responsive.css') ?>">
       
        
        <!-- Title -->
        <link rel="icon" href="<?= base_url('public/assets/img/logo.png') ?>" type="image/x-icon">
        <title>Register - BPBD Kota Batu</title>
    </head>

    <body>
        <!-- Section Login -->
        <section class="min-vh-100" id="register" style="background-color: #4d5358;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">

                        <div class="card shadow-lg" style="border-radius: 1rem;">
                            <div class="card-body p-5">
                                
                                <!-- Title -->
                                <h3 class="mb-4 text-center title-css">REGISTER</h3>
                                <?php if ($this->session->flashdata('success_message')) : ?>
                                    <div class="alert alert-success">
                                        <?= $this->session->flashdata('success_message') ?>
                                    </div>
                                <?php endif; ?>   
                                <?php if ($this->session->flashdata('error_message')) : ?>
                                <div class="alert alert-danger">
                                    <?= $this->session->flashdata('error_message') ?>
                                </div>
                                <?php endif; ?>           
                                <?php echo form_open('auth/register'); ?>
                                    <!-- Username Form -->
                                    <div class="mb-3">
                                        <label class="form-label" for="username">username</label>
                                        <input type="text" id="username" name="username" class="form-control form-control-css" />
                                    </div>

                                    <!-- Password Form -->
                                    <div class="mb-4">
                                        <label class="form-label" for="email">email</label>
                                        <input type="email" id="email" name="email" class="form-control form-control-css" />
                                    </div>
            
                                    <!-- Password Form -->
                                    <div class="mb-4">
                                        <label class="form-label" for="password">password</label>
                                        <input type="password" id="password" name="password" class="form-control form-control-css" />
                                    </div>
                                    
                                    <!-- Button Login -->
                                    <div class="text-center">
                                        <button class="btn-register-css" type="submit">Register</button>
                                    </div>
                                </form>
                                <div class="text-center mt-5 ">
                                    <a href="<?= base_url('login') ?>">Login</a>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </section>        
        
        <!-- Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

</html>