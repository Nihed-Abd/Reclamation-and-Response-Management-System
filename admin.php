<?PHP
	include ("Dashbord/Controller/reclamationC.php");

	$reclamationC=new reclamationC();
	$listeReclamation=$reclamationC->afficherReclamation();
    
if(isset($_POST['submit']))
{
    $listeReclamation=$reclamationC->afficherReclamation();
}

if(isset($_POST['ajout']))
{
    header ('Location:../reclamation/add.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="admin/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="admin/darkpan-1.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="admin/darkpan-1.0.0/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Réclamation</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="logo.JPG" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">SI NIHED</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <div class="nav-item dropdown">
                    </div>
                    <a href="http://localhost/reclamation/admin.php" class="nav-item nav-link active"><i class="fa fa-table me-2"></i>Réclamations</a>
                        <a href="http://localhost/reclamation/reponseadmin.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Réponses</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                            <div class="col-sm-12 col-xl-6">
                                <h6 class="mb-4">Liste de réclamations</h6>
                                <table id="myTable" class="table table-striped" >  
                                        <thead>
                                            <th><FONT COLOR="WHITE">ID</FONT></th>
                                            <th><FONT COLOR="WHITE">Name</FONT></th>
                                            <th><FONT COLOR="WHITE">Mail</FONT></th>
                                            <th><FONT COLOR="WHITE">Type</FONT></th>
                                            <th><FONT COLOR="WHITE">Message</FONT></th>
                                            <th><FONT COLOR="WHITE">ID réc</FONT></th>
                                            <th><FONT COLOR="WHITE"></FONT></th>
                                            <th><FONT COLOR="WHITE"></FONT></th>
                                        </thead>
                                        <tbody>
                                            <?PHP
                                                foreach($listeReclamation as $reclamation){
                                            ?>
                                            <tr>
                                                <td class="align-img">
                                                    <FONT COLOR="WHITE"><?PHP echo $reclamation['id']; ?></FONT>
                                                </td>
                                                <td class="align-img">
                                                    <FONT COLOR="WHITE"><?PHP echo $reclamation['name']; ?></FONT>
                                                </td>
                                                <td class="align-img">
                                                    <FONT COLOR="WHITE"><?PHP echo $reclamation['mail']; ?></FONT>
                                                </td>
                                                <td class="align-img">
                                                    <FONT COLOR="WHITE"><?PHP echo $reclamation['type']; ?></FONT>
                                                </td>
                                                <td class="align-img">
                                                    <FONT COLOR="WHITE"><?PHP echo $reclamation['message']; ?></FONT>
                                                </td>
                                                <td class="align-img">
                                                    <FONT COLOR="WHITE"><?PHP echo $reclamation['idRec']; ?></FONT>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <form method="POST" action="../reclamation/addreponse.php">
                                                            <input type="submit" name="Repondre" value="repondre" class="btn btn-primary">
                                                            <input type="hidden" value=<?PHP echo $reclamation['id']; ?> name="id">
                                                        </form>
                                                    </div>
                                                </td>
                                                
                                            </tr>
                                            <?PHP
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="admin/darkpan-1.0.0/js/main.js"></script>
</body>

</html>