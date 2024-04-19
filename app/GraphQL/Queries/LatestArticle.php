<?php declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Article;

final readonly class LatestArticle
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $arr = Article::all()->last()->toArray();
//        dd($arr);
        return $arr;
    }
}
