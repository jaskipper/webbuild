<footer class="content-info main-footer">
  <?php //dynamic_sidebar('sidebar-footer'); ?>
  <nav class="navbar navbar-dark navbar-full bg-inverse">
    <div class="container">
      <div class="row">
        <div id="copyright" class="col-md-6">
          Copyright &copy; <?php echo date("Y") ?> - <a href="https://skipperinnovations.com">Skipper Innovations</a>
        </div>
        <div class="col-md-6">
          <?php $items = getItems('footer_navigation', array()); ?>
            <ul class="nav navbar-nav pull-md-right footernav">
              <?php foreach ($items as $item): ?>
                  <li class="nav-item">
                    <a class="nav-item <?php echo implode(' ', $item->classes); ?>" href="<?php echo $item->url; ?>">
                        <?php echo $item->title; ?>
                    </a>
                  </li>
              <?php endforeach; ?>
            </ul>
        </div>
      </div>
    </div>
  </nav>
</footer>
