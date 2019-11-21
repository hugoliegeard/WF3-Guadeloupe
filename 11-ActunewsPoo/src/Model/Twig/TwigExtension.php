<?php


namespace App\Model\Twig;


use App\Model\Container\Container;
use App\Model\Kernel\KernelEventInterface;
use Twig\Environment;

class TwigExtension implements KernelEventInterface
{

    private $container;

    public function __construct()
    {
        # Récupération du Container
        $this->container = Container::getInstance();
    }

    /**
     * Permet le chargement d'élement
     * dans le Kernel.
     */
    public function load(): void
    {
        /** @var Environment $twig */
        $twig = $this->container->get('twig');
        $twig->addGlobal('categories', (new \App\Model\Category())->findAll());
    }
}
