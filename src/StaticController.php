<?php
namespace Puppy\StaticRoute;

use Puppy\Controller\AppController;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class StaticController
 * associate the current route with a template file and displays it.
 *
 * @package StaticRoute
 * @author Raphaël Lefebvre <raphael@raphaellefebvre.be>
 */
class StaticController
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var TemplateRouter
     */
    private $templateRouter;

    /**
     * @var AppController
     */
    private $appController;

    /**
     * constructor
     *
     * @param Request $request
     * @param TemplateRouter $templateRouter
     * @param AppController $appController
     */
    public function __construct(Request $request, TemplateRouter $templateRouter, AppController $appController)
    {
        $this->setRequest($request);
        $this->setTemplateRouter($templateRouter);
        $this->setAppController($appController);
    }

    /**
     * renders the template associated with the current route.
     *
     * @param array $vars
     * @return mixed
     */
    public function render(array $vars = array())
    {
        $templateFile = $this->getTemplateRouter()->findTemplateFile($this->getRequest());
        if ($templateFile) {
            return $this->getAppController()->render($templateFile, $vars);
        }
        return $this->getAppController()->error404();
    }

    /**
     * redirects to the same same uri.
     *
     * @param array $flashes
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirect(array $flashes = array())
    {
        foreach($flashes as $type => $message){
            $this->getAppController()->flash()->add($type, $message);
        }
        return $this->getAppController()->redirect($this->getRequest()->getRequestUri());
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        return $this->render();
    }

    /**
     * Getter of $request
     *
     * @return Request
     */
    private function getRequest()
    {
        return $this->request;
    }

    /**
     * Setter of $request
     *
     * @param Request $request
     */
    private function setRequest(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Getter of $templateRouter
     *
     * @return TemplateRouter
     */
    private function getTemplateRouter()
    {
        return $this->templateRouter;
    }

    /**
     * Setter of $templateRouter
     *
     * @param TemplateRouter $templateRouter
     */
    private function setTemplateRouter(TemplateRouter $templateRouter)
    {
        $this->templateRouter = $templateRouter;
    }

    /**
     * Getter of $appController
     *
     * @return AppController
     */
    private function getAppController()
    {
        return $this->appController;
    }

    /**
     * Setter of $appController
     *
     * @param AppController $appController
     */
    private function setAppController(AppController $appController)
    {
        $this->appController = $appController;
    }
}
