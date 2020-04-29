<?php

namespace JGI\Fraktjakt\DocumentGenerator;

use JGI\Fraktjakt\Model\Order;
use JGI\Fraktjakt\Xml\FraktjaktDocument;

interface DocumentGeneratorInterface
{
    public function create($model): FraktjaktDocument;
    public function getRootName(): string;

}
