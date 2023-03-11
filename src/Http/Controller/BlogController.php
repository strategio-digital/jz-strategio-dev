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

class BlogController extends Controller
{
    
    public function __construct(
        protected ApiModel $apiModel,
        protected Response $response,
        protected Request  $request
    )
    {
        parent::__construct($response, $request);
    }
    
    public function detail(string $slug): void
    {
        $data = $this->apiModel->call('POST', 'article/show-one', [
            'slug' => $slug,
            'suppressLabels' => true,
            'suppressFiles' => false,
            'suppressParagraphs' => false,
            'suppressParagraphFiles' => false,
            'suppressPrevNext' => true,
            'suppressPrevNextFiles' => true,
            'prevNextByLabel' => null
        ]);
        
        $this->getResponse()->render(Path::viewDir() . '/controller/blog-detail.latte', [
            'data' => $data,
            'about' => new AboutModel(),
            'contact' => new ContactModel()
        ]);
    }
}