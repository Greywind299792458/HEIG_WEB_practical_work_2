<?php

require_once 'vendor/autoload.php';

use Illuminate\Database\Eloquent\Model;

class Stairs extends Model
{
    protected $table = 'stairs';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id',
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

    public function accidents()
    {
        return $this->hasMany(Accident::class, 'stairs_id');
    }

    public static function createStairs(array $data)
    {
        if (empty($data['id'])) {
            return self::create([
                'stairs_name' => $data['stairsName'],
                'num_steps' => $data['numSteps'],
                'is_indoor' => $data['isIndoor'] ? 1 : 0,
                'building_name' => $data['buildingName'] ?? null,
                'starting_level' => $data['startingLevel'],
                'special_feature' => $data['specialFeature'] ?? null
            ]);
        } else {
            Stairs::updateStairs($data);
        }
    }

    public static function updateStairs(array $data)
    {
        $stairs = Stairs::find($data['id']);
        if (!$stairs) {
            throw new Exception('Aucun enregistrement associé avec cet id n\'a été trouvé.');
        }
        $stairs->stairs_name = $data['stairsName'];
        $stairs->num_steps = $data['numSteps'];
        $stairs->is_indoor = $data['isIndoor'] ? 1 : 0;
        $stairs->building_name = $data['buildingName'] ?? null;
        $stairs->starting_level = $data['startingLevel'];
        $stairs->special_feature = $data['specialFeature'] ?? null;
        $stairs->save();
    }

    public static function getStairsById(int $id)
    {
        $stairs = Stairs::find($id);
        if (!$stairs) {
            throw new Exception('Aucun enregistrement associé avec cet id n\'a été trouvé.');
        }
        return $stairs;
    }

    public static function deleteStairs(int $id)
    {
        $stairs = Stairs::find($id);
        if (!$stairs) {
            throw new Exception('Aucun enregistrement associé avec cet id n\'a été trouvé.');
        }
        if (!$stairs->delete()) {
            throw new Exception('La suppression de l\'escalier a échoué.');
        }
    }
}
