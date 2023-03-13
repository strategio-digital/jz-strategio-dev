<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */
declare(strict_types=1);

namespace App\Http\Controller;

use App\Model\AboutModel;
use App\Model\ApiModel;
use App\Model\ContactModel;
use Saas\Helper\Path;
use Saas\Http\Controller\Controller;
use Saas\Http\Request\Request;
use Saas\Http\Response\Response;
use Symfony\Component\Routing\Generator\UrlGenerator;

class BlogController extends Controller
{
    public function __construct(
        protected ApiModel     $apiModel,
        protected Response     $response,
        protected Request      $request,
        protected UrlGenerator $urlGenerator,
    )
    {
        parent::__construct($response, $request);
    }
    
    public function index(int $page): void
    {
        if ($page < 1 || $this->urlGenerator->generate('blog') . '/1' === $this->request->getHttpRequest()->getPathInfo()) {
            $this->response->redirect('blog');
        }
        
        $data = $this->apiModel->call('POST', 'article/show-all', [
            'currentPage' => $page,
            'itemsPerPage' => 12,
            'desc' => true,
            'labels' => ['jz-strategio-blog'],
            'suppressLabels' => true,
            'suppressFiles' => false,
            'suppressParagraphs' => true,
            'suppressParagraphFiles' => true,
        ]);
        
        $this->getResponse()->render(Path::viewDir() . '/controller/blog-summary.latte', [
            'data' => $data,
            'about' => new AboutModel(),
            'contact' => new ContactModel()
        ]);
    }
    
    public function detail(string|int $slug): void
    {
        $data = $this->apiModel->call('POST', 'article/show-one', [
            'slug' => (string)$slug,
            'labels' => ['jz-strategio-blog'],
            'suppressLabels' => true,
            'suppressFiles' => false,
            'suppressParagraphs' => false,
            'suppressParagraphFiles' => false,
            'suppressPrevNext' => false,
            'suppressPrevNextFiles' => false,
            'prevNextByLabel' => 'jz-strategio-blog',
        ]);
        
        $this->getResponse()->render(Path::viewDir() . '/controller/blog-detail.latte', [
            'data' => $data,
            'about' => new AboutModel(),
            'contact' => new ContactModel()
        ]);
    }
}