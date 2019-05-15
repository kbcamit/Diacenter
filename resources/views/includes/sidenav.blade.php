<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <router-link to="/dashboard" class="nav-link" active-class="active">
                <i class="nav-icon fa fa-dashboard"></i>
                <p>
                    Dashboard
                </p>
            </router-link>
        </li>

        <li class="nav-item">
            <router-link to="/category" class="nav-link" active-class="active">
                <i class="nav-icon fa fa-cube"></i>
                <p>
                    Category
                </p>
            </router-link>
        </li>

        <li class="nav-item">
            <router-link to="/subcategory" class="nav-link" active-class="active">
                <i class="nav-icon fa fa-cube"></i>
                <p>
                    Sub Category
                </p>
            </router-link>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-user-md"></i>
                <p>
                    Doctor
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <router-link to="/add-doctor" class="nav-link" active-class="active">
                        <i class="fa fa-user-md"></i>
                        <p>Add Doctor</p>
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/view-doctor" class="nav-link" active-class="active">
                        <i class="fa fa-user-md"></i>
                        <p>View Doctor</p>
                    </router-link>
                </li>
            </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-user-md"></i>
                <p>
                    Expense
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <router-link to="/add-expense-category" class="nav-link" active-class="active">
                        <i class="fa fa-user-md"></i>
                        <p>Add Expense Category</p>
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/view-expense-category" class="nav-link" active-class="active">
                        <i class="fa fa-user-md"></i>
                        <p>View Expense Category</p>
                    </router-link>
                </li>
            </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-file"></i>
                <p>
                    Invoice
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <router-link to="/add-expense-invoice" class="nav-link" active-class="active">
                        <i class="fa fa-dollar"></i>
                        <p>Add Expense Invoice</p>
                    </router-link>
                </li>
            </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-cogs"></i>
                <p>
                    Settings
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <router-link to="/general-settings" class="nav-link" active-class="active">
                        <i class="fa fa-cog"></i>
                        <p>General Settings</p>
                    </router-link>
                </li>
            </ul>
        </li>

    </ul>
</nav>