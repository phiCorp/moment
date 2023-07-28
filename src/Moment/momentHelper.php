<?php

use MOment\Moment;

function now($timezone = null)
{
    return new Moment('now', $timezone);
}
