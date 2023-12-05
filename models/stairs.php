<?php

require_once 'vendor/autoload.php';
require_once 'rating.php';

use Illuminate\Database\Eloquent\Model;

class Stairs extends Model
{
    protected $table = 'Stairs';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'stairs_name',
        'num_steps',
        'is_indoor',
        'building_name',
        'starting_level',
        'special_feature',
    ];

    public function __toString()
    {
        return $this->stairs_name ?? '';
    }

    public static function getAll()
    {
        return self::with('ratings')->get();
    }

    public function ratings()
    {
        return $this->hasOne(Rating::class, 'stairs_id');
    }

    public static function createItem(array $data)
    {
        if (!isset($data['id'])) {
            return self::create(
                [
                    'stairs_name' => $data['stairsName'],
                    'num_steps' => $data['numSteps'],
                    'is_indoor' => isset($data['isIndoor']) ? 1 : 0,
                    'building_name' => $data['buildingName'] ?? null,
                    'starting_level' => $data['startingLevel'],
                    'special_feature' => $data['specialFeature'] ?? null
                ]
            );
        } else {
            Stairs::updateItem($data);
        }
    }

    public static function updateItem(array $data)
    {
        $stairs = Stairs::getById($data['id']);
        $stairs->stairs_name = $data['stairsName'];
        $stairs->num_steps = $data['numSteps'];
        $stairs->is_indoor = isset($data['isIndoor']) ? 1 : 0;
        $stairs->building_name = $data['buildingName'] ?? null;
        $stairs->starting_level = $data['startingLevel'];
        $stairs->special_feature = $data['specialFeature'] ?? null;
        $stairs->save();
    }

    public static function getById(int $id)
    {
        $stairs = Stairs::find($id);
        if (!$stairs) {
            throw new Exception('Aucun enregistrement associé avec cet id n\'a été trouvé.');
        }
        return $stairs;
    }

    public static function deleteById(int $id)
    {
        $stairs = Stairs::getById($id);
        $rating = $stairs->ratings;
        if ($rating) {
            if (!$rating->delete()) {
                throw new Exception('La suppression de l\'avis associé a échoué.');
            }
        }
        if (!$stairs->delete()) {
            throw new Exception('La suppression de l\'escalier a échoué.');
        }
    }
}
