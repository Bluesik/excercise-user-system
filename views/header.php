<header>
    <?php if(!$user) : ?>
        <nav>
            <ul>
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
                <li><a href="/forgot">Forgot password?</a></li>
            </ul>
        </nav>
    <?php else: ?>
        Logged in as <?= $user['username']; ?>
        <nav>
            <ul>
                <li><a href="/profile">Profile</a></li>
                <li><a href="/change-password">Change password</a></li>
                <li><a href="/logout">Logout</a></li>
            </ul>
        </nav>
    <?php endif; ?>
</header>