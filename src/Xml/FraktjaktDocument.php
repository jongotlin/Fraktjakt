<?php

namespace JGI\Fraktjakt\Xml;

class FraktjaktDocument extends \DOMDocument
{
    public function __construct()
    {
        parent::__construct('1.0', 'utf-8');
    }
}
