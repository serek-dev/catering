<?php

use Gateway\Service\System;

return [
    System::class => fn(): System => new System()
];
