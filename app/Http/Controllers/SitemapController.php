<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Industry;
use App\Models\Blogs;

class SitemapController extends Controller
{
    protected function xmlResponse(string $xml)
    {
        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }

    public function index()
    {
        $todayTime = now()->toAtomString();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";

        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        // 1. HOMEPAGE
        $loc = url('/');

        $xml .= '<url>';

        $xml .= '<loc>'
            . htmlspecialchars($loc, ENT_XML1, 'UTF-8')
            . '</loc>';

        $xml .= '<lastmod>'
            . htmlspecialchars($todayTime, ENT_XML1, 'UTF-8')
            . '</lastmod>';

        $xml .= '<priority>1.00</priority>';

        $xml .= '</url>' . "\n";


        // 2. ALL PRODUCTS
        $products = Product::where('is_delete', '0')
            ->whereNotNull('prod_url')
            ->where('prod_url', '!=', '')
            ->get();

        foreach ($products as $product)
        {
            $loc = route('products.show', [
                'prod_url' => $product->prod_url
            ]);

            $lastmod = optional($product->updated_at)->toAtomString();

            $xml .= '<url>';

            $xml .= '<loc>'
                . htmlspecialchars($loc, ENT_XML1, 'UTF-8')
                . '</loc>';

            if ($lastmod)
            {
                $xml .= '<lastmod>'
                    . htmlspecialchars($lastmod, ENT_XML1, 'UTF-8')
                    . '</lastmod>';
            }

            $xml .= '<priority>0.80</priority>';

            $xml .= '</url>' . "\n";
        }


        // 3. ALL INDUSTRIES
        $industries = Industry::where('is_delete', '0')
            ->whereNotNull('ind_url')
            ->where('ind_url', '!=', '')
            ->get();

        foreach ($industries as $industry)
        {
            $loc = route('industries.show', [
                'ind_url' => $industry->ind_url
            ]);

            $lastmod = optional($industry->updated_at)->toAtomString();

            $xml .= '<url>';

            $xml .= '<loc>'
                . htmlspecialchars($loc, ENT_XML1, 'UTF-8')
                . '</loc>';

            if ($lastmod)
            {
                $xml .= '<lastmod>'
                    . htmlspecialchars($lastmod, ENT_XML1, 'UTF-8')
                    . '</lastmod>';
            }

            $xml .= '<priority>0.60</priority>';

            $xml .= '</url>' . "\n";
        }


        // 4. ALL STATIC PAGES
        $staticRoutes = [
            'about-us.show',
            'contact',
            'faq',
            'blog',
        ];

        foreach ($staticRoutes as $routeName)
        {
            $loc = route($routeName);

            $xml .= '<url>';

            $xml .= '<loc>'
                . htmlspecialchars($loc, ENT_XML1, 'UTF-8')
                . '</loc>';

            $xml .= '<lastmod>'
                . htmlspecialchars($todayTime, ENT_XML1, 'UTF-8')
                . '</lastmod>';

            $xml .= '<priority>0.60</priority>';

            $xml .= '</url>' . "\n";
        }


        // 5. ALL BLOGS
        $blogs = Blogs::where('status', 1)
            ->whereNull('deleted_at')
            ->get();

        foreach ($blogs as $blog)
        {
            if (empty($blog->url))
            {
                continue;
            }

            $loc = route('blogdetail', [
                'url' => $blog->url
            ]);

            $lastmod = optional($blog->updated_at)->toAtomString();

            $xml .= '<url>';

            $xml .= '<loc>'
                . htmlspecialchars($loc, ENT_XML1, 'UTF-8')
                . '</loc>';

            if ($lastmod)
            {
                $xml .= '<lastmod>'
                    . htmlspecialchars($lastmod, ENT_XML1, 'UTF-8')
                    . '</lastmod>';
            }

            $xml .= '<priority>0.60</priority>';

            $xml .= '</url>' . "\n";
        }

        $xml .= '</urlset>';

        return $this->xmlResponse($xml);
    }
}