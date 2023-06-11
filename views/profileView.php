<section class="bg-primary h-full w-full section">
    <div class="d-flex bg-white mb-3">
        <div class="title-nav px-3 py-2">
            <h6>
                <a class="text-black d-block" href="/?dashboard">Discover</a>
            </h6>
        </div>
        <div class="me-auto d-flex">
            <a class="text-black d-block px-1 py-3" href="/?profile">Profile</a>
        </div>
    </div>
    <div class="d-flex">
        <div class="text-white w-100 main-section">
            <form action="/?users-edit" method="post" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="<?= $auth['id'] ?>">
                <div>
                    <p>Name</p>
                    <input required class="form-control mb-2" type="text" name="name" value="<?= $auth['name'] ?>">
                </div>

                <div>
                    <p>Username</p>
                    <input required class="form-control mb-2" type="text" name="username" value="<?= $auth['username'] ?>">
                </div>
                
                <div>
                    <p>Password</p>
                    <input class="form-control mb-2" type="password" name="password">
                </div>

                <div class="mb-2">
                    <p>Photo Profile</p>
                    <input data-target-preview="photo" class="form-controll photoInput" type="file" name="photo">
                </div>

                <div class="mb-2">
                    <p>Preview</p>
                    <img id="photo" width="80px" src="<?= $auth['photo'] ?>" alt="">
                </div>


                <div class="d-flex">
                    <button type="submit" class="btn btn-outline-success hover-text-white">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>