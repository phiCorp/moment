<?php

use Maya\Support\Moment;

function now($timezone = null)
{
    return new Moment('now', $timezone);
}
