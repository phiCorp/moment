<?php

namespace Moment;

use DateInterval;
use DateTime;
use DateTimeZone;

class Moment
{

    protected $datetime;

    public function __construct($datetime, $timezone = null)
    {
        $this->datetime = new DateTime($datetime, $timezone ? new DateTimeZone($timezone) : null);
    }

    public static function now($timezone = null)
    {
        return new self('now', $timezone);
    }

    public static function createFromTimestamp($timestamp, $timezone = null)
    {
        return new self('@' . $timestamp, $timezone);
    }

    public function addSeconds($seconds)
    {
        $this->datetime->add(new DateInterval("PT{$seconds}S"));
        return $this;
    }
    public function addSecond()
    {
        $this->addSeconds(1);
        return $this;
    }

    public function addMinutes($minutes)
    {
        $this->datetime->add(new DateInterval("PT{$minutes}M"));
        return $this;
    }

    public function addMinute()
    {
        $this->addMinutes(1);
        return $this;
    }

    public function addHours($hours)
    {
        $this->datetime->add(new DateInterval("PT{$hours}H"));
        return $this;
    }

    public function addHour()
    {
        $this->addHours(1);
        return $this;
    }

    public function addDays($days)
    {
        $this->datetime->add(new DateInterval("P{$days}D"));
        return $this;
    }

    public function addDay()
    {
        $this->addDays(1);
        return $this;
    }

    public function addWeeks($weeks)
    {
        $this->datetime->add(new DateInterval("P{$weeks}W"));
        return $this;
    }

    public function addWeek()
    {
        $this->addWeeks(1);
        return $this;
    }

    public function addMonths($months)
    {
        $this->datetime->add(new DateInterval("P{$months}M"));
        return $this;
    }

    public function addMonth()
    {
        $this->addMonths(1);
        return $this;
    }

    public function addYears($years)
    {
        $this->datetime->add(new DateInterval("P{$years}Y"));
        return $this;
    }

    public function addYear()
    {
        $this->addYears(1);
        return $this;
    }

    public function timezone($timezone)
    {
        $this->datetime->setTimezone(new DateTimeZone($timezone));
        return $this;
    }

    public function timestamp()
    {
        return $this->datetime->getTimestamp();
    }

    public function format($format)
    {
        return $this->datetime->format($format);
    }

    public function subSeconds($seconds)
    {
        $this->datetime->modify("-{$seconds} seconds");
        return $this;
    }
    public function subSecond()
    {
        $this->subSeconds(1);
        return $this;
    }

    public function subMinutes($minutes)
    {
        $this->datetime->modify("-{$minutes} minutes");
        return $this;
    }

    public function subMinute()
    {
        $this->subMinutes(1);
        return $this;
    }

    public function subHours($hours)
    {
        $this->datetime->modify("-{$hours} hours");
        return $this;
    }

    public function subHour()
    {
        $this->subHours(1);
        return $this;
    }

    public function subDays($days)
    {
        $this->datetime->modify("-{$days} days");
        return $this;
    }

    public function subDay()
    {
        $this->subDays(1);
        return $this;
    }

    public function subWeeks($weeks)
    {
        $this->datetime->modify("-{$weeks} weeks");
        return $this;
    }

    public function subWeek()
    {
        $this->subWeeks(1);
        return $this;
    }

    public function subMonths($months)
    {
        $this->datetime->modify("-{$months} months");
        return $this;
    }

    public function subMonth()
    {
        $this->subMonths(1);
        return $this;
    }

    public function subYears($years)
    {
        $this->datetime->modify("-{$years} years");
        return $this;
    }

    public function subYear()
    {
        $this->subYears(1);
        return $this;
    }

    public function add($interval, $value)
    {
        $this->datetime->modify("+{$value} {$interval}");
        return $this;
    }

    public function __toString()
    {
        return $this->datetime->format('Y-m-d H:i:s');
    }

    public static function yesterday($timezone = null)
    {
        return new self('yesterday', $timezone);
    }

    public static function tomorrow($timezone = null)
    {
        return new self('tomorrow', $timezone);
    }

    public static function today($timezone = null)
    {
        return new self('today', $timezone);
    }

    public function dayOfWeek()
    {
        return $this->datetime->format('N');
    }

    public function dayOfYear()
    {
        return $this->datetime->format('z') + 1;
    }
    public function year()
    {
        return (int) $this->datetime->format('Y');
    }
    public function month()
    {
        return (int) $this->datetime->format('n');
    }
    public function day()
    {
        return (int) $this->datetime->format('j');
    }
    public function hour()
    {
        return (int) $this->datetime->format('G');
    }
    public function minute()
    {
        return (int) $this->datetime->format('i');
    }
    public function second()
    {
        return (int) $this->datetime->format('s');
    }
    public function micro()
    {
        return (int) $this->datetime->format('u');
    }
    public function toArray()
    {
        return [
            'year' => (int) $this->datetime->format('Y'),
            'month' => (int) $this->datetime->format('n'),
            'day' => (int) $this->datetime->format('j'),
            'dayOfWeek' => (int) $this->datetime->format('N'),
            'dayOfYear' => (int) $this->datetime->format('z') + 1,
            'hour' => (int) $this->datetime->format('G'),
            'minute' => (int) $this->datetime->format('i'),
            'second' => (int) $this->datetime->format('s'),
            'micro' => (int) $this->datetime->format('u'),
            'timestamp' => (int) $this->datetime->format('U'),
            'formatted' => $this->datetime->format('Y-m-d H:i:s'),
            'timezone' => $this->datetime->getTimezone()->getName(),
        ];
    }
}
