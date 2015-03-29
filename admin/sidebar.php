<?php
	$current_page = basename($_SERVER['PHP_SELF']);
	switch ($current_page) {

    case "prequest.php":
        $pr_class = "class='active'";
        break;
    case "items.php":
        $items_class = "class='active'";
        break;
	case "employees.php":
        $emp_class = "class='active'";
        break;
    default:
        $db_class = "class='active'";
}
?>
<div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li <?php echo $db_class; ?>>
                            <a href="index.php"><i class="icon-chevron-right"></i> Dashboard</a>
                        </li>
                        <li <?php echo $pr_class; ?>>
                            <a href="prequest.php"><i class="icon-th-list"></i> Purchase Requests</a>
                        </li>
                        <li <?php echo $items_class; ?>>
                            <a href="items.php"><i class="icon-shopping-cart"></i> Items</a>
                        </li>
                        <li <?php echo $emp_class; ?>>
                            <a href="employees.php"><i class="icon-user"></i> Employees</a>
                        </li>
						
                    </ul>
                </div>