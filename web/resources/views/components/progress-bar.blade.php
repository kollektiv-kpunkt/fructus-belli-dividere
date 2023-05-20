<?php
$supporterCount = supporterCount();

/**
 * @param $supporterCount
 * @param int $goal
 * @return int
 */
function setGoal($supporterCount, $goal = 500 ) {
    if ($goal >= 20000) {
        return 20000;
    }
    if ($supporterCount >= $goal * 0.75) {
        return setGoal($supporterCount, $goal * 2);
    } else {
        return $goal;
    }
}

/**
 * https://stackoverflow.com/a/14903479
 * @param $number
 * @param int $denominator
 * @return float|int
 */
function floorToFraction($number, $denominator = 1)
{
    $x = $number * $denominator;
    $x = floor($x);
    $x = $x / $denominator;
    return $x;
}

$goal = setGoal($supporterCount);
$progress = floorToFraction($supporterCount / $goal * 100, 20);
$progress = $progress > 100 ? 100 : $progress;
?>

<div class="fbd-progress-bar relative pt-4" data-progress="{{$progress}}" data-goal={{$supporterCount}}>
    <div class="fbd-progress-bar__icon mb-2 opacity-0">
        <x-application-logo class="w-6" style="transform: translateX(-100%)"/>
    </div>
    <div class="fbd-progress-bar__wrapper h-6 rounded-full w-full bg-secondary flex p-1">
        <div class="fbd-progress-bar__inner w-0 h-full bg-accent rounded-full flex justify-center items-center">
            <span class="text-2xs text-white opacity-0">0%</span>
        </div>
    </div>
    <div class="fbd-progressbar__count text-end">
        <span class="text-2xs"><span class="fbd-progress-bar__number-of-people">0</span> / {{number_format($goal, 0, ".", "'");}}</span>
    </div>
</div>
