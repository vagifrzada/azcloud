<?php

// This config is for syncing product flavors.
// Left side categories are from flavors.json file (From console team)
// Right side categories are created locally for this app.
// So, if new category added from console team, and in order sync with our app
// you need create category in this app and map the SLUG of the category here to the
// key of the category in flavors.json

return [
    'categories' => [
        'vm'     => 'compute',
        'volume' => 'storage',
        'lb'     => 'network',
    ],
];