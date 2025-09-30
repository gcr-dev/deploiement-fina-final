<h1>Deploy Trainer by MNS</h1>
<p>Entraînement au déploiement d'une application web PHP.</p>

<h2>Etat du déploiement</h2>
<p>Voici l'état de votre déploiement :</p>
<div class="progress mb-3" style="height: 20px;">
    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?= $progress ?>%" aria-valuenow="<?= $progress ?>" aria-valuemin="0" aria-valuemax="100"><?= $progress ?> %</div>
</div>
<hr>
<?php if($progress == 100): ?>
<div class="row">
    <div class="col-md-6 mb-3">
        <iframe width="100%" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ?si=cm78jKP2hrRhulV0&rel=0&autoplay=1&mute=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
    <div class="col-md-6 mb-3">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Déploiement terminé</h4>
            <p>Votre application est prête à être utilisée !</p>
        </div>
    </div>
</div>
    
<?php else: ?>

<?php if($dependencies_ok): ?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Dépendances installées</h4>
        <p>Tout est en ordre !</p>
    </div>
<?php else: ?>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Dépendances manquantes</h4>
        <p>Veuillez installer les dépendances nécessaires.</p>
    </div>
<?php endif; ?> 

<?php if($env_ok): ?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Fichier .env trouvé</h4>
        <p>Le fichier de configuration est présent.</p>
    </div>
<?php else: ?>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Fichier .env manquant</h4>
        <p>Veuillez créer le fichier de configuration.</p>
    </div>
<?php endif; ?>

<?php if($vars_ok): ?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Variables d'environnement trouvées</h4>
        <p>Les variables d'environnement sont correctement définies.</p>
    </div>
<?php else: ?>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Variables d'environnement manquantes</h4>
        <p>Veuillez vérifier vos variables d'environnement.</p>
    </div>
<?php endif; ?>

<?php if($db_ok): ?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Connexion à la base de données réussie</h4>
        <p>Vous êtes connecté à la base de données.</p>
    </div>
<?php else: ?>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Erreur de connexion à la base de données</h4>
        <p>Veuillez vérifier vos paramètres de connexion.</p>
    </div>
<?php endif; ?>

<?php if($readme_ok): ?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Fichier README.md trouvé</h4>
        <p>Le fichier README est présent.</p>
    </div>
<?php else: ?>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Fichier README.md manquant</h4>
        <p>Veuillez créer le fichier README.</p>
    </div>
<?php endif; ?>

<?php if($cliff_ok): ?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Fichier cliff.toml trouvé</h4>
        <p>Le fichier de configuration est présent.</p>
    </div>
<?php else: ?>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Fichier cliff.toml manquant</h4>
        <p>Veuillez créer le fichier de configuration avec commande : <code>git cliff --init</code></p>
    </div>
<?php endif; ?>

<?php if($changelog_ok): ?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Fichier CHANGELOG.md trouvé</h4>
        <p>Le fichier CHANGELOG est présent.</p>
    </div>
<?php else: ?>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Fichier CHANGELOG.md manquant</h4>
        <p>Veuillez créer le fichier CHANGELOG.</p>
    </div>
<?php endif; ?>

<?php endif; ?>