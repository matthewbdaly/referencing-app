<?php

declare(strict_types=1);

namespace App\Http\Integrations\SemanticScholarAcademicGraph\Traits;

use App\ReferenceType;

trait MapsPublicationTypes
{
    private function mapPublicationTypeToReferenceType(?string $publicationType): ?ReferenceType
    {
        return match ($publicationType) {
            'JournalArticle'      => ReferenceType::JournalArticle,
            'ConferencePaper'     => ReferenceType::ConferencePaper,
            'BlogPost'            => ReferenceType::BlogPost,
            'EncyclopediaArticle' => ReferenceType::EncyclopediaArticle,
            'WebPage'             => ReferenceType::WebPage,
            default               => null,
        };
    }
}
