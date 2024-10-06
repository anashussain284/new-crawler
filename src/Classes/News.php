<?php

namespace MyCrawler\Classes;
use Symfony\Component\DomCrawler\Crawler;

class News {

    private $urlToCrawl = "",
            $dom = "",
            $crawler,
            $headlines;

    public function __construct($url)
    {
        $this->urlToCrawl = $url;
        $this->dom = file_get_contents($this->urlToCrawl);
        $this->crawler = new Crawler($this->dom);
    }

    public function getHeadLines() {

        if ($this->crawler) {
            $this->headlines = [];

            $this->crawler->filter('h3.title a')->each(function (Crawler $node, $i) {
                $this->headlines[$i] = ['text' => $node->text(), 'link' => $node->attr('href')];
            });

            return $this->headlines;

        } else {
            return false;
        }

    }
}