<?php

declare(strict_types=1);

namespace App;

enum ReferenceType: string
{
    case BlogPost = "BlogPost";
    case ConferencePaper = "ConferencePaper";
    case EncyclopediaArticle = "EncyclopediaArticle";
    case JournalArticle = "JournalArticle";
    case WebPage = "WebPage";
}
