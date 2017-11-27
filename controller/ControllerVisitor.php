<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 27/11/17
 * Time: 18:45
 */

//namespace controller;


class ControllerVisitor
{
    function __construct($action)
    {
        global $rep,$vues;
        $dVueErreur = array ();

        try {
            //switch des différentes actions pouvant être requises par le visiteur. Dans chaque cas, on appelle la méthode associée à l'action.
            switch ($action) {
                case NULL:
                    $this->toHomepage();
                     $this->toHomepage();
                    break;

                case "consultPublicLists":
                    $this->consultPublicLists();
                    break;

                case "createPublicList":
                    $this->createPublicList();
                    break;

                case "displayPublicList":
                    $this->displayPublicList();
                    break;

                case "deletePublicList":
                    $this->deletePublicList();
                    break;

                case "addPublicTask":
                    $this->addPublicTask();
                    break;

                case "deletePublicTask":
                    $this->deletePublicTask();
                    break;

                case "validatePublicTask":
                    $this->validatePublicTask();
                    break;

                default:
                    $dVueErreur = "Erreur d'appel php.";
                    require($rep.$vues['erreur']);
            }
        }
        catch (PDOException $e)
        {
            //si erreur BD, pas le cas ici
            $dVueErreur[] =	"Erreur BDD :".$e->getMessage();
            require ($rep.$vues['erreur']);
        }

        catch (Exception $e2)
        {
            $dVueErreur[] =	"Erreur : ".$e2->getMessage();
            require ($rep.$vues['erreur']);
        }

        exit(0);
    }
}