<nav class="navbar">
    
    <ul class="nav-links">
        <?php if (!isset($_SESSION['loggedin'])) : ?>
            <!-- For non-logged-in users -->
            <li><a href="<?= ROOT_DIR ?>">Home</a></li>
            <li><a href="<?= ROOT_DIR ?>about">About</a></li>
            <li><a href="<?= ROOT_DIR ?>user">User</a></li>
            <li><a href="<?= ROOT_DIR ?>games">Games</a></li>
        <?php endif; ?>
    </ul>
        </div>
</nav>
