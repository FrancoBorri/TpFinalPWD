<?php
declare(strict_types=1);

namespace Models;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use App\Models\Notice;

class NoticeTest extends TestCase
{

    public static function NoticeProvider(): array
    {
        return [
            [
                new Notice(
                    id: 0,
                    title: "Notice Test",
                    author: "Franco Borri",
                    content: "prove notice",
                    image: "image prove",
                    created_at: "now",
                    updated_at: "",
                    is_active: 1
                )
            ]
        ];
    }

    #[DataProvider('NoticeProvider')]
    public function testSerialize(Notice $notice): void
    {
        $serialized = $notice->serializar();
        $this->assertEquals(0, $notice->getId(), "id incorrect");
        $this->assertEquals("Franco Borri", $serialized['author'], "author incorrect");
        $this->assertIsArray($serialized, 'unexpected type');
        $this->assertCount(8, $serialized, 'unexpected amount');
    }


}