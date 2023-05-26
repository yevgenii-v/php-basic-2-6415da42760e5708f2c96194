<?php
/**
 * @var array $projects
 * @var string $userName
 * @var string $userPhoto
 */
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="../static/img/logo.png" alt="Логотип Завдання та проекти" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Завдання та проекти</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo $userPhoto ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $userName; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                <?php foreach ($projects as $key => $project):?>
                    <?php if ($key === array_key_first($projects)): ?>
                        <li class="nav-item">
                            <a href="/"
                               class="nav-link <?php echo (!isset($projectId)) ? 'active' : ''; ?>"
                            >
                                <i class="nav-icon fas fa-columns"></i>
                                <p>
                                    Всі
                                    <span class="badge badge-info right">
                                <?php echo array_sum(array_column($projects, 'countTasks')); ?>
                            </span>
                                </p>
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a href="/?project_id=<?php echo urlencode($project['id'])?>" class="nav-link
                        <?php
                        if (isset($projectId)):
                            echo ($project['id'] === $projectId) ? 'active' : '';
                        endif;
                        ?>">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            <?php echo htmlspecialchars($project['title']) ?>
                            <span class="badge badge-info right"><?php echo $project['countTasks']?></span>
                        </p>
                        </a>
                    </li>
                <?php endforeach; ?>
                <li class="nav-item">
                    <a href="../index.php" class="nav-link">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>
                            Додати проект
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>