<?php 

namespace App\Controller;
use Core\Mvc\Controller;
use Core\Database\MySQLConnector;

class MainController extends Controller {
    public function index() {

        $progress = 0;

        // On vérifie si les dépendances sont installées
        $dependencies_ok = true;
        if (!class_exists('Core\Database\MySQLConnector')) {
            $dependencies_ok = false;
        }

        // On vérifie l'existence du fichier .env
        $env_ok = true;
        if (!file_exists(__DIR__ . '/../../.env')) {
            $env_ok = false;
        }

        // On vérifie les variables d'environnement
        $vars = ['DB_HOST', 'DB_USER', 'DB_PASSWORD', 'DB_NAME'];
        $vars_ok = true;
        foreach ($vars as $var) {
            if (!isset($_ENV[$var])) {
                $vars_ok = false;
                break;
            }
        }

        // On vérifie la connexion à la base de données
        // C'est un test pour le changelog
        try {

            if(!$vars_ok) {
                throw new \Exception('Variables d\'environnement manquantes.');
            }

            $db = new MySQLConnector($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);
            $db_ok = true;
        } catch (\Exception $e) {
            $db_ok = false;
        }

        // On vérifie la présence du fichier README.md
        $readme_ok = true;
        if (!file_exists(__DIR__ . '/../../README.md')) {
            $readme_ok = false;
        }

        // On vérifie la présence du fichier cliff.toml
        $cliff_ok = true;
        if (!file_exists(__DIR__ . '/../../cliff.toml')) {
            $cliff_ok = false;
        }

        // On vérifie la présence du fichier CHANGELOG.md
        $changelog_ok = true;
        if (!file_exists(__DIR__ . '/../../CHANGELOG.md')) {
            $changelog_ok = false;
        }

        // On calcule le pourcentage de progression
        $steps = [
            'dependencies' => $dependencies_ok,
            'env' => $env_ok,
            'vars' => $vars_ok,
            'db' => $db_ok,
            'readme' => $readme_ok,
            'cliff' => $cliff_ok,
            'changelog' => $changelog_ok,
        ];
        $total_steps = count($steps);
        $completed_steps = 0;
        foreach ($steps as $step) {
            if ($step) {
                $completed_steps++;
            }
        }
        if ($total_steps > 0) {
            $progress = round(($completed_steps / $total_steps) * 100);
        }

        return $this->render('main/index.html.php', [
            'dependencies_ok' => $dependencies_ok,
            'env_ok' => $env_ok,
            'vars_ok' => $vars_ok,
            'db_ok' => $db_ok,
            'readme_ok' => $readme_ok,
            'cliff_ok' => $cliff_ok,
            'changelog_ok' => $changelog_ok,
            'progress' => $progress,
        ]);
    }   


}