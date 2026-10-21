<?php include("header.php"); ?>

<div class="signup">

    <form class="form-signin" action="register.php" method="post">

        <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>

        <input type="text" class="form-control" placeholder="Name" name="name" required autofocus>

        <input type="text" class="form-control" placeholder="Surname" name="surname" required>

        <input type="text" class="form-control" placeholder="Username" name="username" required>

        <input type="email" class="form-control" placeholder="Email" name="email" required>

        <input type="password" class="form-control" placeholder="Password" name="password" required>

        <button class="btn btn-lg btn-primary w-100" type="submit" name="submit">Sign up</button>

        <small>Already have an account? <a href="login.php">Log in</a></small>

        <p class="mt-5 mb-3 text-muted">Digital School &copy; 2026</p>
    </form>
</div>

<?php include("footer.php"); ?>
