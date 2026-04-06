<?php

declare(strict_types=1);

namespace App;

enum ReferenceType: string
{
    case BlogPost = "Blog post";
    case ConferencePaper = "Conference paper";
    case EncyclopediaArticle = "Encyclopedia article";
    case JournalArticle = "Journal article";
    case WebPage = "Web page";
}
