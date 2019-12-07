<?php
use Cake\Core\Configure;

Configure::write('App.objects', [
    'Posts'      => false,
    'Authors'    => false,
    'Medias'     => false,
    'Products'   => true,
    'Users'      => true,
    'PriceTiers' => true,
    'Campaigns'  => true,
    'Orders'     => true,
    'Commits'    => true
]);
