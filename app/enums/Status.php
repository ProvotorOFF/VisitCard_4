<?

namespace App\enums;

enum Status: int {
    
    case DRAFT = 0;
    case ACTIVE = 1;
    case MODERATE = 2;

    public function getName() {
        return match($this) {
            self::DRAFT => 'Черновик',
            self::ACTIVE => 'Активный',
            self::MODERATE => 'На модерации'
        };
    }

    public static function getAllWithKeys(): array
    {
        $all = [];
        foreach (self::cases() as $status) {
            $all[$status->value] = $status->getName();
        }
        return $all;
    }

}