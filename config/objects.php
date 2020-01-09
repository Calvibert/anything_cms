<?php
use Cake\Core\Configure;

Configure::write('App.objects', [
    'Posts'      => true,
    'Authors'    => false,
    'Medias'     => false,
    'Products'   => true,
    'Users'      => true,
    'Prices'     => true,
    'Campaigns'  => true,
    'Orders'     => true,
    'Commits'    => true
]);
