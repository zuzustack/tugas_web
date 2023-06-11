<section style="place-items: center;" class="d-grid h-full bg-primary">
    <div class="card p-3 bg-secondary">
        <h4 class="text-center mb-3" id="title-auth">Sign In</h4>

        <div class="d-flex">
            <div class="auth show" id="login-page">
                <form method="post" target="/?login-action">
                    <?php if (isset($error)) : ?>
                        <div class="bg-danger text-secondary px-1 py-1 mb-1 text-center">
                            <p><?= $error; ?></p>
                        </div>
                    <?php endif ?>

                    <?php if (isset($success)) : ?>
                        <div class="bg-success text-secondary px-1 py-1 mb-1 text-center">
                            <p><?= $success; ?></p>
                        </div>
                    <?php endif ?>
                    
                    <input required name="username" autocomplete="off" class="form-control mb-3 m-auto" placeholder="Username" type="text">
                    <input required name="password" class="form-control mb-3 m-auto" placeholder="Password" type="password">
                    
                    <button type="submit" class="bg-primary btn text-white ms-auto d-inline w-100">Sign In</button>
                </form>            
            </div>

            <div class="auth hide" id="signup-page">
                <form method="post" action="/?users-create">
                    <?php if (isset($error)) : ?>
                        <div class="bg-danger text-secondary px-1 py-1 mb-1 text-center">
                            <p><?= $error; ?></p>
                        </div>
                    <?php endif ?>
                    <input required name="name" autocomplete="off" class="form-control mb-3 m-auto" placeholder="Name" type="text">
                    <input required name="username" autocomplete="off" class="form-control mb-3 m-auto" placeholder="Username" type="text">
                    <input required name="password" class="form-control mb-3 m-auto" placeholder="Password" type="password">
                    
                    <button type="submit" class="bg-primary btn text-white ms-auto d-inline w-100">Sign Up</button>
                </form>            
            </div>
        </div>

        <p class="text-center mt-3 sign-up" id="btn-signup">Sign Up</p>
    </div>
</section>