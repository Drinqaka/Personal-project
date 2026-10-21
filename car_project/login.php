<?php include("header.php"); ?>

<div class="login">

    <form class="form-signin" action="loginLogic.php" method="post">

        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

        <input type="text" class="form-control" placeholder="Username" name="username" required autofocus>

        <input type="password" class="form-control" placeholder="Password" name="password" required>

        <button class="btn btn-lg btn-primary w-100" type="submit" name="submit">Sign in</button>

        <small>Don't have an account? <a href="signup.php">Sign up</a></small>

        <p class="mt-5 mb-3 text-muted">Digital School &copy; 2026</p>
    </form>
</div>

<?php include("footer.php"); ?>
