<?php

declare(strict_types=1);

namespace Syndesi\MongoDataStructures\Tests\Type;

use PHPUnit\Framework\TestCase;
use Syndesi\MongoDataStructures\Type\Document;

class DocumentTest extends TestCase
{
    public function testDocumentIsInitiallyEmpty(): void
    {
        $document = new Document();
        $this->assertEmpty($document->getProperties());
    }
}
