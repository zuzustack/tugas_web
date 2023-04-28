<section style="place-items: center;" class="d-grid h-full bg-primary">
    <div class="card p-3 bg-secondary">
        <p><i class="fa-solid fa-laptop"></i></p>
        <h4 class="text-center mb-3">Sign In</h4>

        <form method="post">
            <?php if (isset($error)) : ?>
                <div class="bg-danger text-secondary px-1 py-1 mb-1 text-center">
                    <p><?= $error; ?></p>
                </div>
            <?php endif ?>

            <input name="username" autocomplete="off" class="form-control mb-3 m-auto" placeholder="Username" type="text">
            <input name="password" class="form-control mb-3 m-auto" placeholder="Password" type="password">

            <button type="submit" class="bg-primary btn text-white ms-auto d-inline w-100">Login</button>
        </form>
    </div>
</section>