<?php

declare(strict_types=1);
require_once __DIR__ . '/../../env.php';

use App\Config\DBconect;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use App\Models\Notice;
use App\Controllers\NoticeController;


class NoticeControllerTest extends TestCase
{

    public static function noticeProvider(): array
    {
        return [
            [
                $notice = new Notice(
                    id: 0,
                    title: "Nuevo Estreno de Película: Inception",
                    author: "John Doe",
                    content: "Película 'Inception', dirigida por Christopher Nolan",
                    image: "image prove",
                    created_at: "now",
                    updated_at: "",
                    is_active: 1
                )
            ]
        ];
    }

    #[DataProvider('noticeProvider')]
    public function testCreateNotice(Notice $notice): void
    {
        $notice_serialized = $notice->serializar();
        $result = NoticeController::create($notice_serialized);
        $this->assertEquals(1, $result, "Notice not created successfully");
    }

    #[DataProvider('noticeProvider')]
    public function testModifyNotice(Notice $notice): void
    {
        $notice_modify = $notice->serializar();
        $notice->setContent("new content update");
        $notice->setAuthor("new author update");
        $id = $this->maxItem();
        $notice_modify['id'] = $id;
        $result = NoticeController::update($notice_modify);
        $this->assertEquals(1, $result, "Notice not updated successfully");
        $findNotice = NoticeController::findOne($id);
        $this->assertEquals($notice_modify['title'], $findNotice['title']);
    }

    #[DataProvider('noticeProvider')]
    public function testDeleteNotice(Notice $notice): void
    {
        $result = NoticeController::delete($this->maxItem());
        $this->assertEquals(1, $result, "Notice not deleted successfully");
    }

    #[DataProvider('noticeProvider')]
    public function testFindNotice(Notice $notice): void
    {
        $id = $this->maxItem();
        $result = NoticeController::findOne($id);
        $this->assertIsArray($result);
        $this->assertCount(8, $result, "Notice not find successfully");
    }

    public function maxItem(): int
    {
        $sql = "SELECT MAX(id) id FROM notices";
        $idMax = DBconect::read($sql);
        return $idMax['id'];
    }
}
