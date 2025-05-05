<nav class="navbar">
    <div class="navbar-container">
        <div class="logo">
            <a href="<?= ROOT_DIR ?>">Obanshire Cub Scouts</a>
        </div>

        <div class="hamburger" id="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>

        <ul class="nav-links" id="navLinks">
            <?php if (!isset($_SESSION['loggedin'])): ?>
                <!-- Not logged in -->
                <li><a href="<?= ROOT_DIR ?>">Home</a></li>
                <li><a href="<?= ROOT_DIR ?>about">About</a></li>
                <li><a href="<?= ROOT_DIR ?>gallery">Gallery</a></li>
                <li><a href="<?= ROOT_DIR ?>contact">Contact</a></li>
                <li><a href="<?= ROOT_DIR ?>sign_in">Sign In</a></li>
                <li><a href="<?= ROOT_DIR ?>register">Register</a></li>

            <?php else: ?>
                <!-- Logged in users -->
                <li><a href="<?= ROOT_DIR ?>">Dashboard</a></li>
                
                <?php if ($_SESSION['user_type'] === 'admin'): ?>
                    <li><a href="<?= ROOT_DIR ?>admin/users">Manage Users</a></li>
                    <li><a href="<?= ROOT_DIR ?>admin/settings">Site Settings</a></li>

                <?php elseif ($_SESSION['user_type'] === 'parent'): ?>
                    <li><a href="<?= ROOT_DIR ?>parent/schedule">My Child's Schedule</a></li>
                    <li><a href="<?= ROOT_DIR ?>parent/messages">Messages</a></li>

                <?php elseif ($_SESSION['user_type'] === 'scout'): ?>
                    <li><a href="<?= ROOT_DIR ?>scout/activities">Activities</a></li>
                    <li><a href="<?= ROOT_DIR ?>scout/badges">My Badges</a></li>
                <?php endif; ?>

                <!-- Common links for all logged-in users -->
                <li><a href="<?= ROOT_DIR ?>profile">Profile</a></li>
                <li><a href="<?= ROOT_DIR ?>handlers/logout.php">Logout</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
