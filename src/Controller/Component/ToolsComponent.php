<?php
namespace App\Controller\Component;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Controller\Component;

class ToolsComponent extends Component
{
    public function requireAdmin()
    {
        if (true) {
            return true;
        }
        throw new NotFoundException;
    }
}
