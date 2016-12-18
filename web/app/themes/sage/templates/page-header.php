<?php use Roots\Sage\Titles; ?>
<?php use Skipper\SkipTitles; ?>

<div class="page-header">
  <div class="titleinfo"><?php echo SkipTitles\subTitle() ?></div>
  <h1 style="font-size: <?php SkipTitles\h1FontSize() ?>px;"><?= Titles\title(); ?></h1>
  <a class="btn btn-success hvr-grow" data-scroll="" href="#mycontent" rel="m_PageScroll2id"><?php SkipTitles\buttonText(); ?><i class="fa fa-hand-o-down" style="font-weight: bold; margin-left: 5px;" aria-hidden="true"></i></a><span class="skiplinks"><?php SkipTitles\categoryNavLinks(); ?></span>
</div>
