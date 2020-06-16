<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Data Control Pasien Covid-19</title>
        <link href="../resource/dist/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-secondary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">

                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login Ruangan</h3></div>
                                    <div class="card-body">
                                      <?php
                                      if(count($message)) {
                                      ?>
                                      <?php if ($message["success"] == true): ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                          <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                                          <span class="alert-inner--text"><strong>Success!</strong> Login Berhasil</span>
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                      <?php else: ?>
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                                            <span class="alert-inner--text"><strong>Warning!</strong> Kesalahan Pada Proses Login!</span>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                      <?php endif; ?>
                                      <?php
                                      }
                                      ?>
                                        <form method="post">
                                            <div class="form-group"><input class="form-control py-4" name="username" id="inputEmailAddress" type="text" placeholder="Enter email address" /></div>
                                            <div class="form-group"><input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Enter password" /></div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><button type="submit" class="btn btn-block btn-primary" href="index.html">Login</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; IT Syamrabu 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../resource/dist/js/scripts.js"></script>
    </body>
</html>
