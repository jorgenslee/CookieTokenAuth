<?php

namespace Beskhue\CookieTokenAuth\Controller;

use /** @noinspection PhpUndefinedNamespaceInspection */
    App\Controller\Admin\AdminController;
use Cake\Controller\Component\AuthComponent;
use Cake\Event\Event;

/**
 * Class CookieTokenAuthController
 *
 * @package Beskhue\CookieTokenAuth\Controller
 * @property AuthComponent $Auth
 */
class CookieTokenAuthController extends AdminController
{
    public $autoRender = false;

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index']);
    }

    public function index()
    {
    }
}
