<?php

use Moment\Moment;

function now($timezone = null)
{
    return new Moment('now', $timezone);
}
