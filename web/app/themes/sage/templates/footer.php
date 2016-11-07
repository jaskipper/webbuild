<footer class="content-info main-footer">
  <?php //dynamic_sidebar('sidebar-footer'); ?>
  <nav class="navbar navbar-dark navbar-full bg-inverse">
    <div class="container">
      <div class="row">
        <div id="copyright" class="col-md-6">
          Copyright &copy; <?php echo date("Y") ?> - <a href="https://skipperinnovations.com">Skipper Innovations</a>
        </div>
        <div class="col-md-6">
            <ul class="nav navbar-nav pull-md-right footernav">
                  <li class="nav-item">
                    <a href="#" data-toggle="modal" data-target="#modal0">Support</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" data-toggle="modal" data-target="#modal1">Privacy</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" data-toggle="modal" data-target="#modal2">Terms</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" data-toggle="modal" data-target="#modal3">Disclaimer</a>
                  </li>
            </ul>
        </div>
      </div>
    </div>
  </nav>
</footer>

<?php modals(); ?>
