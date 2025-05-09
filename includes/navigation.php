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
            <?php if (!isset($_SESSION['user_type'])): ?>
                <!-- Not logged in -->
                <li><a href="<?= ROOT_DIR ?>">Home</a></li>
                <li><a href="<?= ROOT_DIR ?>about">About</a></li>
                <li><a href="<?= ROOT_DIR ?>gallery">Gallery</a></li>
                <li><a href="<?= ROOT_DIR ?>contact">Contact</a></li>
                <li><a href="<?= ROOT_DIR ?>sign_in">Sign In</a></li>
                <li><a href="<?= ROOT_DIR ?>register">Register</a></li>

            <?php else: ?>
                
                <?php if ($_SESSION['user_type'] === 'admin'): ?>
                    <li><a href="<?= ROOT_DIR ?>admin_dash">Admin Dash</a></li>
                    <li><a href="<?= ROOT_DIR ?>gallery">Gallery</a></li>
                    <li><a href="<?= ROOT_DIR ?>admin/users">Manage Users</a></li>
                    <li><a href="<?= ROOT_DIR ?>admin/settings">Site Settings</a></li>

                <?php elseif ($_SESSION['user_type'] === 'parent'): ?>
                    <li><a href="<?= ROOT_DIR ?>parent_dash">Parent Dash</a></li>
                    <li><a href="<?= ROOT_DIR ?>gallery">Gallery</a></li>
                    <li><a href="<?= ROOT_DIR ?>parent/messages">Messages</a></li>

                <?php elseif ($_SESSION['user_type'] === 'scout'): ?>
                    <li><a href="<?= ROOT_DIR ?>scout_dash">Scout Dash</a></li>
                    <li><a href="<?= ROOT_DIR ?>games">Games</a></li>
                    <li><a href="<?= ROOT_DIR ?>gallery">Gallery</a></li>
                    <li><a href="<?= ROOT_DIR ?>badges">My Badges</a></li>
                <?php endif; ?>

                <!-- Common links for all logged-in users -->
                <li><a href="<?= ROOT_DIR ?>handlers/logout.php">Logout</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
