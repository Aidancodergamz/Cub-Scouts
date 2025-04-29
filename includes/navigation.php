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
            <?php if (!isset($_SESSION['loggedin'])) : ?>
                <li><a href="<?= ROOT_DIR ?>">Home</a></li>
                <li><a href="<?= ROOT_DIR ?>about">About</a></li>
                <li><a href="<?= ROOT_DIR ?>user">User</a></li>
                <li><a href="<?= ROOT_DIR ?>games">Games</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
