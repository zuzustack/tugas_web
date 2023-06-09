<div class="text-white py-3 h-full sidebar">
    <div class="mb-6 text-center">
        <h5 style="font-weight: bold;">Manage</h5>
    </div>


    <div class="text-center mb-6">
        <img src="<?= $_SESSION['user']['photo'] ?? "./assets/img/guest.png" ?>" width="75px">
        <p class="mt-1 mb-3"><?= $_SESSION['user']['name'] ?></p>
        <a class="btn btn-outline-white hover-text-black text-white">Edit</a>
    </div>


    <div class="d-block px-2 mx-auto mb-6">
        <!-- <a href="/?dashboard" class="text-white d-block px-3 py-2 link <?= ($pageTitle === 'Dashboard') ? 'active' : '' ?>"><h8>Dashboard</h8></a> -->
        <a href="/?users" class="text-white d-block px-3 py-2 link <?= ($pageTitle === 'Users') ? 'active' : '' ?>"><h8>Users Management</h8></a>
        <a href="/?admin" class="text-white d-block px-3 py-2 link <?= ($pageTitle === 'Admin') ? 'active' : '' ?>"><h8>Admin Management</h8></a>
        <a href="/?songs" class="text-white d-block px-3 py-2 link <?= ($pageTitle === 'Songs') ? 'active' : '' ?>"><h8>Songs Management</h8></a>
    </div>


    <div class="text-center px-2 mt-6">
        <a href="/?logout" class="link d-block px-3 py-2 text-white">
            <h8>Logout</h8>
        </a>
    </div>
</div>