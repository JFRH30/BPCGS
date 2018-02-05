<nav id="sidebar">
    <!-- Sidebar Header -->
    <div class="sidebar-header">
        <h3>Collapsible Sidebar</div>
        <strong>BS</strong>
    </div>

    <!-- Sidebar Links -->
    <ul class="list-unstyled components">
        <li class="active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                <i class="fa fa-home"></i>
                Home
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-briefcase"></i>
                About
            </a>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                <i class="fa fa-copy"></i>
                Pages
            </a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li><a href="#">Page 1</a></li>
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-link"></i>
                Portfolio
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-phone"></i>
                Contact
            </a>
        </li>
    </ul>
</nav>