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

    public static function createItem(array $data)
    {
        if (!isset($data['ratingId']) || !Rating::find($data['ratingId'])) {
            return self::create([
                'stairs_id' => $data['stairsId'],
                'rating' => $data['rating'],
                'review' => $data['review'] ?? null,
                'is_favorite' => isset($data['isFavorite']) ? 1 : 0,
            ]);
        } else {
            Rating::updateRating($data);
        }
    }

    public static function updateItem(array $data)
    {
        $rating = Rating::getById($data['ratingId']);
        $rating->stairs_id = $data['stairsId'];
        $rating->rating = $data['rating'];
        $rating->review = $data['review'] ?? null;
        $rating->is_favorite = isset($data['isFavorite']) ? 1 : 0;
        $rating->save();
    }

    public static function getById(int $id)
    {
        $rating = Rating::find($id);
        if (!$rating) {
            throw new Exception('Aucun enregistrement associé avec cet id n\'a été trouvé.');
        }
        return $rating;
    }

    public static function deleteItem(int $id)
    {
        $rating = Rating::getById($id);
        if (!$rating->delete()) {
            throw new Exception('La suppression de l\'avis a échoué.');
        }
    }
}
