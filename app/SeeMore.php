<?php

namespace App;

trait SeeMore
{
    public int $initialAmountToLoad = 3;

    public int $additionalToLoad = 5;

    public bool $showSeeMore = true;

    public function seeMore(): void
    {
        $this->initialAmountToLoad += $this->additionalToLoad;
    }

    public function loadAllLeft(): void
    {
        $this->initialAmountToLoad = $this->getTotalCount();
        $this->showSeeMore = false;
    }

    protected function getTotalCount(){}
}
