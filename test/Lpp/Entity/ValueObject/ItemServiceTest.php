<?php

namespace Lpp\Test\Lpp\Enitity\ValueObject;

use Lpp\Entity\ValueObject\JsonFile;
use Lpp\Entity\ValueObject\Url;
use Lpp\Factory\FileReaderFactory;
use Lpp\Service\FileReaderInterface;
use Lpp\Service\ItemService;
use PHPUnit\Framework\TestCase;

class ItemServiceTest extends TestCase
{
    /**
     * @var FileReaderInterface|Mock
     */
    private $fileReader;

    public function setUp()
    {
        $this->fileReader = $this->createMock(FileReaderInterface::class);
    }

    /**
     * @return \array[][]
     */
    public function collectionDataProvider()
    {
        return [
            [
                [
                    'brands' => [
                        [
                            'name' => 'YYY',
                            'description' => 'New winter collection',
                            'items' => [
                                [
                                    'name' => 'jacket',
                                    "url" => "http://www.example.com",
                                    "prices" => [
                                        [
                                            "description" => "Initial price",
                                            "priceInEuro" => 108,
                                            "arrival" => "2017-01-03",
                                            "due" => "2017-01-20"
                                        ],
                                        [
                                            "description" => "clearance price",
                                            "priceInEuro" => 101,
                                            "arrival" => "2017-03-01",
                                            "due" => "2017-04-01"
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
                1315475,
            ],
        ];
    }

    /**
     * @dataProvider collectionDataProvider
     * @param $collectionData
     * @param $collectionId
     * @throws \Exception
     */
    public function testGetResultForCollectionId($collectionData, $collectionId)
    {
        $this->fileReader
            ->method('getData')
            ->willReturn($collectionData);

        $itemService = new ItemService($this->fileReader);
        $brandsData = $itemService->getResultForCollectionId($collectionId);

        foreach ($brandsData as $key => $brand) {
            $this->assertEquals($collectionData['brands'][$key]['name'], $brandsData[$key]->getBrand());
            $this->assertEquals($collectionData['brands'][$key]['description'], $brandsData[$key]->getDescription());
            $this->checkItems($collectionData['brands'][$key]['items'], $brandsData[$key]->getItems());
        }
    }

    private function checkItems(array $providedItems, array $processedItems)
    {
        foreach ($providedItems as $key => $item) {
            $this->assertEquals($providedItems[$key]['name'], $processedItems[$key]->getName());
            $this->assertEquals(new Url($providedItems[$key]['url']), $processedItems[$key]->getUrl());
        }
    }
}