<?

namespace App\enums;

use App\Models\Brand;
use App\Models\Car;

enum Commentable: string {
    
    case CAR = Car::class;
    case BRAND = Brand::class;

    public static function toArray(): array
    {
        return ['car', 'brand'];
    }

    public static function fromString(string $type) {
        return match(mb_strtolower($type)) {
            'car' => self::CAR->value,
            'brand' => self::BRAND->value,
            default => null
        };
    }

}