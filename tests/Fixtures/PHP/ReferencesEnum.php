<?php declare(strict_types=1);

/**
 * @license Apache 2.0
 */

namespace OpenApi\Tests\Fixtures\PHP;

use OpenApi\Annotations as OA;
use OpenApi\Attributes\Items;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;

#[Schema()]
class ReferencesEnum
{
    #[Property(title: 'statusEnum', description: 'Status enum', type: 'string', enum: StatusEnum::class, nullable: false)]
    public string $statusEnum;

    #[Property(title: 'statusEnumMixed', description: 'Status enum mixed', type: 'string', enum: [StatusEnum::DRAFT, StatusEnum::ARCHIVED, 'OTHER'], nullable: false)]
    public string $statusEnumMixed;

    /**
     * @OA\Property(title="statusEnumBacked",
     *     description="Status enum backed",
     *     type="int",
     *     enum="\OpenApi\Tests\Fixtures\PHP\StatusEnumBacked",
     *     nullable="false"
     * )
     */
    public int $statusEnumBacked;

    #[Property(title: 'statusEnumBackedMixed', description: 'Status enum backed mixed', type: 'int', enum: [StatusEnumBacked::DRAFT, StatusEnumBacked::ARCHIVED, 9], nullable: false)]
    public int $statusEnumBackedMixed;

    #[Property(title: 'statusEnumIntegerBacked', description: 'Status enum integer backed', type: 'int', enum: StatusEnumIntegerBacked::class, nullable: true)]
    public ?int $statusEnumIntegerBacked;

    /**
     * @OA\Property(title="statusEnumStringBacked",
     *     description="Status enum string backed",
     *     type="string",
     *     enum="\OpenApi\Tests\Fixtures\PHP\StatusEnumStringBacked",
     *     nullable="true"
     * )
     */
    public ?string $statusEnumStringBacked;

    #[Property(title: 'statusEnumStringBackedMixed', description: 'Status enum string backed mixed', type: 'string', enum: [StatusEnumStringBacked::DRAFT, StatusEnumStringBacked::ARCHIVED, 'other'], nullable: true)]
    public ?string $statusEnumStringBackedMixed;

    /** @var list<string> StatusEnumStringBacked array */
    #[Property(
        title: 'statusEnums',
        description: 'StatusEnumStringBacked array',
        type: 'array',
        items: new Items(title: 'itemsStatusEnumStringBacked', type: 'string', enum: StatusEnumStringBacked::class)
    )]
    public array $statusEnums;

    /** @var list<string> StatusEnumStringBacked array */
    #[Property(
        title: 'statusEnumsMixed',
        description: 'StatusEnumStringBacked array mixed',
        type: 'array',
        items: new Items(title: 'itemsStatusEnumStringBackedMixed', type: 'string', enum: [StatusEnumStringBacked::DRAFT, StatusEnumStringBacked::ARCHIVED, 'other'])
    )]
    public array $statusEnumsMixed;
}
