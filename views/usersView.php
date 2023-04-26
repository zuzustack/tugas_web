<section class="bg-primary h-full w-full">
    <div class="d-flex">
        <div>
            <?php include_once __DIR__ . "/../partials/sidebar_login.php" ?>    
        </div>
        <div class="text-white px-3 py-2 w-100">
            <h5 class="mb-3">Users</h5>

            <button class="d-block btn-modal btn-black btn text-white mb-2 ms-auto" data-target-modal="createModal">Create</button>
            <table class="table-1 text-black bg-secondary px-1-py-1">
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Photo</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php foreach ($users as $index => $user) : ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['username'] ?></td>
                            <td><?= $user['photo'] ?></td>
                            <td>
                                <a href="/?users/<?= $user['username'] ?>" class="btn btn-outline-black text-black hover-text-white">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>


    <div id="createModal" class="modal">
        <div class="modal-dialog">
            <h6>Create</h6>
            <hr>
            <form action="/?create" method="post">
                <div>
                    <input class="form-controll" type="text" name="name">
                </div>
                <div>
                    <input class="form-controll" type="text" name="username">
                </div>
                <div>
                    <input class="form-controll" type="file" name="photo">
                </div>
                <div class="w-auto d-flex">
                    <button type="submit" class="d-block btn btn-outline-black hover-text-white ms-auto">Cancel</button>
                    <button type="submit" class="btn btn-outline-success hover-text-white">Submit</button>
                </div>
            </form>
        </div>
    </div>

</section>