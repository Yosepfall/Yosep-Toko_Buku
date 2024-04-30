<?php include "../../layout/header.php";?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
           

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <h1>Data Buku</h1>
                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">


    <div class="row">
        <div class="col-md-12">
        <?php
include "../../config/database.php";


$keyword = isset($_GET['cari']) ? $_GET['cari'] : '';

$halaman = isset($_GET['halaman']) ? $_GET['halaman'] : 1;

$item_per_halaman = 10;

$offset = ($halaman - 1) * $item_per_halaman;

$query = "SELECT * FROM buku";
if (!empty($keyword)) {
    $query .= " WHERE judul LIKE '%$keyword%' OR penulis LIKE '%$keyword%' OR penerbit LIKE '%$keyword%' OR tahun_terbit LIKE '%$keyword%' OR stok LIKE '%$keyword%' OR harga_pokok LIKE '%$keyword%' OR harga_jual LIKE '%$keyword%' OR diskon LIKE '%$keyword%'";
}
$query .= " LIMIT $offset, $item_per_halaman";

$result = $koneksi->query($query);

$query_total = "SELECT COUNT(*) as total FROM buku";
$result_total = $koneksi->query($query_total);
$row_total = $result_total->fetch_assoc();
$total_data = $row_total['total'];

$total_halaman = ceil($total_data / $item_per_halaman);

echo "<form action='tables.php' method='GET' class='d-none d-sm-inline-block form-inline justify-content-end my-2 my-md-0 mw-100 mr-2 navbar-search'>";
echo "<div class='input-group'>";
echo "<input type='text' name='cari' class='form-control bg-light border-0 small' placeholder='Search for...' aria-label='Search' aria-describedby='basic-addon2'>";
echo "<div class='input-group-append'>";
echo "<button class='btn btn-primary' type='submit'><i class='fas fa-search fa-sm'></i></button>";
echo "</div>";
echo "</div>";
echo "</form>";

echo "<table class='table table-bordered'>";
echo "<thead>";
echo "<tr><th>No</th><th>Penulis</th><th>Penerbit</th><th>Tahun Terbit</th><th>Stok</th><th>Harga Pokok</th><th>Harga Jual</th><th>Diskon</th></tr>";
echo "</thead>";
echo "<tbody>";


$data_buku = array();

while ($row = $result->fetch_assoc()) {
    $data_buku[] = $row;

    echo "<tr>";
    echo "<td>" . $row['id_buku'] . "</td>";
    echo "<td>" . $row['penulis'] . "</td>";
    echo "<td>" . $row['penerbit'] . "</td>";
    echo "<td>" . $row['tahun_terbit'] . "</td>";
    echo "<td>" . $row['stok'] . "</td>";
    echo "<td>" . $row['harga_pokok'] . "</td>";
    echo "<td>" . $row['harga_jual'] . "</td>";
    echo "<td>" . $row['diskon'] . "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";

echo "<div class='clearfix'>";
if ($halaman < $total_halaman) {
    $maju = $halaman + 1;
    echo "<a href='tables.php?halaman=$maju' class='btn btn-primary btn-lg-col-7 float-right'>Next</a>";
}
if ($halaman > 1) {
    $mundur = $halaman - 1;
    echo "<a href='tables.php?halaman=$mundur' class='btn btn-primary btn-lg-col-7 float-right mr-2'>Previous</a>";
}
echo "</div>";
?>


</div>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

</div>
 <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

<?php include "../../layout/footer.php";?>