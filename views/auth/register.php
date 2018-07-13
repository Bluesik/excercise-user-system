<div class="register-form">
    <form action="/register" method="POST">
        <div class="row">
            <label for="username">Username</label>
            <input type="text" name="username" required>
        </div>

        <div class="row">
            <label for="email">Email</label>
            <input type="text" name="email" required>
        </div>

        <div class="row">
            <label for="name">Name</label>
            <input type="text" name="name" required>
        </div>

        <div class="row">
            <label for="password">Password</label>
            <input type="password" name="password" required>
        </div>

        <div class="row">
            <label for="password-confirmation">Confirm password</label>
            <input type="password" name="password-confirmation" required>
        </div>

        <div class="row">
            <button type="submit">Register</button>
        <div class="row">
    </form>
</div>