<?php


namespace App\Model\Kernel;


interface KernelEventInterface
{
    /**
     * Permet le chargement d'élement
     * dans le Kernel.
     */
    public function load(): void;
}