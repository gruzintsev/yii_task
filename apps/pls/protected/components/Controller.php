<?php

use App\Components\Feed\FeedInterface;
use App\Components\Feed\FeedService;
use Yiisoft\Di\Container;
use Yiisoft\Di\ContainerConfig;

/**
 * @class      Controller
 *
 * This is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 *
 * @author     Developer
 * @copyright  PLS 3rd Learning, Inc. All rights reserved.
 */
class Controller extends CController {

	/**
	 * @var string the default layout for the controller view.
	 */
	public $layout = 'column1';

	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu = [];

	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}.
	 */
	public $breadcrumbs = [];

    public Container $container;

    public function __construct($id, $module = null)
    {
        parent::__construct($id, $module);

        $config = ContainerConfig::create()
            ->withDefinitions([
                FeedInterface::class => FeedService::class,
            ]);

        $this->container = new Container($config);
    }

}