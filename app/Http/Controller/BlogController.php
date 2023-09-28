<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */
declare(strict_types=1);

namespace App\Http\Controller;

use App\Http\Client\ContentioClient;
use App\Model\About;
use App\Model\Contacts;
use Saas\Helper\Path;
use Saas\Http\Controller\Base\Controller;
use Saas\Http\Resolver\LinkResolver;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    public function index(int $page, ContentioClient $client, Request $request, LinkResolver $resolver): Response
    {
        if ($page < 1 || $resolver->link('blog') . '/1' === $request->getPathInfo()) {
            return $this->redirect('blog');
        }
        
        $data = $client->call('POST', 'article/show-all', [
            'currentPage' => $page,
            'itemsPerPage' => 12,
            'desc' => true,
            'labels' => ['jz-strategio-blog'],
            'suppressLabels' => true,
            'suppressFiles' => false,
            'suppressParagraphs' => true,
            'suppressParagraphFiles' => true,
        ]);
        
        if ($data instanceof JsonResponse) {
            return $data;
        }
        
        return $this->render(Path::viewDir() . '/controller/blog-summary.latte', [
            'data' => $data,
            'about' => new About(),
            'contact' => new Contacts()
        ]);
    }
    
    public function detail(string $slug, ContentioClient $client): Response
    {
        $data = $client->call('POST', 'article/show-one', [
            'slug' => $slug,
            'labels' => ['jz-strategio-blog'],
            'suppressLabels' => true,
            'suppressFiles' => false,
            'suppressParagraphs' => false,
            'suppressParagraphFiles' => false,
            'suppressPrevNext' => false,
            'suppressPrevNextFiles' => false,
            'prevNextByLabel' => 'jz-strategio-blog',
        ]);
        
        if ($data instanceof JsonResponse) {
            return $data;
        }
        
        return $this->render(Path::viewDir() . '/controller/blog-detail.latte', [
            'data' => $data,
            'about' => new About(),
            'contact' => new Contacts()
        ]);
    }
}