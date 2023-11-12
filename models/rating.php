<?php

require_once 'vendor/autoload.php';

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'Ratings';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'stairs_id',
        'rating',
        'review',
        'is_favorite',
    ];

    public static function createRating(array $data)
    {
        $stairs = Stairs::find($data['stairs_id']);
        if (!$stairs) {
            throw new Exception('Aucun escalier associé avec cet id n\'a été trouvé.');
        }
        if (empty($data['id'])) {
            return self::create([
                'stairs_id' => $data['stairs_id'],
                'rating' => $data['rating'],
                'review' => $data['review'] ?? null,
                'is_favorite' => $data['is_favorite'] ? 1 : 0
            ]);
        } else {
            Rating::updateRating($data);
        }
    }

    public static function updateRating(array $data)
    {
        $rating = Rating::find($data['id']);
        if (!$rating) {
            throw new Exception('Aucun enregistrement associé avec cet id n\'a été trouvé.');
        }
        $rating->stairs_id = $data['stairs_id'];
        $rating->rating = $data['rating'];
        $rating->review = $data['review'] ?? null;
        $rating->is_favorite = $data['is_favorite'] ? 1 : 0;
        $rating->save();
    }

    public static function getRatingById(int $id)
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
