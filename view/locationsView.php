<?php $title = 'Liste des locations' ?>
<?php $style = 'locations' ?>
<?php $script = '<script src="public/js/locations.js"></script>' ?>
<?php ob_start(); ?>
<div id="recherche" class="container-fluid gy-3 sy-sm-0 shadow-sm bg-light sticky-top">
    <div class="row px-sm-4 align-items-center">
        <div class="col-sm-8 d-flex align-items-center justify-content-sm-start justify-content-center">
            <div class="btn-group" role="group">
                <input type="radio" class="btn-check" name="btnradio" id="indiff-r" autocomplete="off" checked>
                <label class="btn btn-outline-dark" for="indiff-r">Indifférent</label>
                <input type="radio" class="btn-check" name="btnradio" id="maison-r" autocomplete="off">
                <label class="btn btn-outline-dark" for="maison-r">Maison</label>
                <input type="radio" class="btn-check" name="btnradio" id="appart-r" autocomplete="off">
                <label class="btn btn-outline-dark" for="appart-r">Appartement</label>
                <input type="radio" class="btn-check" name="btnradio" id="chalet-r" autocomplete="off">
                <label class="btn btn-outline-dark" for="chalet-r">Châlet</label>
            </div>
        </div>
        <div class="col-sm-4 d-flex align-items-center justify-content-sm-end justify-content-center">
            <div>
                <a id="btn-filtre" href="#modalFilters" data-bs-toggle="modal" class="btn btn-outline-dark"><i id="test" class="bi bi-sliders"></i><span>Filtres</span></a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalFilters" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Filtres</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="form-sf">
                    <div class="" style="border-bottom : 1px solid #DDD">
                        <h4 class="mb-4">Lieu</h4>
                        <div class="row">
                            <div class="col-12">
                                <input type="text" class="form-control mb-4" name="" id="">
                            </div>
                        </div>
                    </div>
                    <div class="py-4" style="border-bottom : 1px solid #DDD">
                        <h4 class="mb-4">Type de logement</h4>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-check">
                                    <input class="form-check-input bg-dark" type="checkbox" value="" id="maison-sf">
                                    <label class="form-check-label" for="maison-sf">
                                        Maison
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input bg-dark" type="checkbox" value="" id="appart-sf">
                                    <label class="form-check-label" for="appart-sf">
                                        Appartement
                                    </label>
                                </div>  
                            </div>
                            <div class="col-8">
                                <div class="form-check">
                                    <input class="form-check-input bg-dark" type="checkbox" value="" id="chalet-sf">
                                    <label class="form-check-label" for="chalet-sf">
                                        Châlet
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-4" style="border-bottom : 1px solid #DDD">
                        <h4 class="mb-4">Lits & Salles de bain</h4>
                        <div class="row">
                            <div class="col-8">
                                <span>Lits</span>
                            </div>
                            <div class="col-4">
                                <div class="d-flex align-items-center selector">
                                    <i class="bi bi-dash-circle"></i>
                                    <span>5</span>
                                    <i class="bi bi-plus-circle"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-8">
                                <span>Salles de bain</span>
                            </div>
                            <div class="col-4">
                                <div class="d-flex align-items-center selector">
                                    <i class="bi bi-dash-circle"></i>
                                    <span>2</span>
                                    <i class="bi bi-plus-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-4" style="border-bottom : 1px solid #DDD">
                        <h4 class="mb-4">Equipement</h4>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-check">
                                    <input class="form-check-input bg-dark" type="checkbox" value="" id="cuisine-equipe">
                                    <label class="form-check-label" for="cuisine-equipe">
                                        Cuisine tout équipée
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input bg-dark" type="checkbox" value="" id="wifi">
                                    <label class="form-check-label" for="wifi">
                                        Wi-Fi
                                    </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check">
                                    <input class="form-check-input bg-dark" type="checkbox" value="" id="tele">
                                    <label class="form-check-label" for="tele">
                                        Télévision
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-4" style="border-bottom : 1px solid #DDD">
                        <h4 class="mb-4">Installation</h4>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-check">
                                    <input class="form-check-input bg-dark" type="checkbox" value="" id="piscine">
                                    <label class="form-check-label" for="cuisine-equipe">
                                        Piscine
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input bg-dark" type="checkbox" value="" id="salle-de-sport">
                                    <label class="form-check-label" for="salle-de-sport">
                                        Salle de sport
                                    </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check">
                                    <input class="form-check-input bg-dark" type="checkbox" value="" id="parking">
                                    <label class="form-check-label" for="parking">
                                        Parking
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-4">
                        <h4 class="mb-4">Prix</h4>
                        <div class="row">
                            <div class="col-7">
                                <input type="range" class="form-range mb-4" name="price-range" min="25" max="1000" id="price-range">
                            </div>
                            <div class="offset-1 col-4">
                                <div>
                                    Jusqu'à <span id="price-range-value" class="badge bg-secondary"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer d-flex align-items-center justify-content-between">
                <button id="button-reset-sf" class="btn-form btn btn-dark">
                    <span id="spinner-reset-sf" class="spinner-grow hidden"></span>
                    <span id="button-reset-text-sf">Effacer</span>
                </button>
                <button id="button-sf" type="submit" class="btn-form btn btn-dark">
                    <span id="spinner-sf" class="spinner-grow hidden"></span>
                    <span id="button-text-sf">Appliquer les filtres</span>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row gy-3 mt-3 mb-3 px-sm-4" style="position: relative; z-index: 1;">
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="card">
                <img src="public/img/placeholder.jpeg">
                <div class="card-body"> 
                    <h5 class="card-title">Paris, France</h5>
                    <div class="row">
                        <div class="col-7">
                            <p class="card-text text-truncate">
                                <i class="bi bi-person-fill"></i>
                                4 personne(s) 
                            </p>
                        </div>
                        <div class="col-5">
                            <p class="card-text card-price">
                                80€ / nuit
                            </p>
                        </div>
                    </div>
                    <a href="#" class="stretched-link"></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>