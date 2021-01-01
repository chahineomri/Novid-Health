
<?php
require_once('../../../Controller/ActualiteController.php');

$actualiteController = new ActualiteController();

$actualites = $actualiteController->afficherActualite();
?>

<?php include_once '../header.php'; ?>
<section id="portfolio" class="clearfix">
    <div class="container">

        <header class="section-header">
            <h3 class="section-title">Mes Actualités</h3>
        </header>

        <div class="row">
            <div class="col-lg-12">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">App</li>
                    <li data-filter=".filter-card">Card</li>
                    <li data-filter=".filter-web">Web</li>
                </ul>
            </div>
        </div>

        <div class="row portfolio-container">
            <?php foreach ($actualites as $actualite) { ?>
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="../../Back/assets/uploads/<?php echo $actualite['image']; ?>" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4><a href="#"><?php echo  $actualite['titre']; ?></a></h4>
                            <p><?php echo $actualite['description']; ?></p>
                            <div>
                                <a href="views/assets/front/img/portfolio/app1.jpg" data-lightbox="portfolio" data-title="App 1" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</section><!-- #portfolio -->
<?php include_once '../footer.php'; ?>