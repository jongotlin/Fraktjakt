<?php

namespace JGI\Fraktjakt\Model;


class Parcel
{
    /**
     * @var float
     */
    private $weight = 0.0;

    /**
     * @var float
     */
    private $length = 0.0;

    /**
     * @var float
     */
    private $width = 0.0;

    /**
     * @var float
     */
    private $height = 0.0;

    /**
     * @var Address|null
     */
    private $addressTo;

    /**
     * @var Address|null
     */
    private $addressFrom;
}
