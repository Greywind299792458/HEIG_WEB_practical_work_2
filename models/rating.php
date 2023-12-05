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
        if (!isset($data['stairsId']) || !Stairs::find($data['stairsId'])) {
            throw new Exception('L\'escalier ciblé n\'a été trouvé.');
        }
        $rating = Rating::where('stairs_id', $data['stairsId'])->first();
        if ($rating == null) {
            // a new entry is added in the database
            if (isset($data['ratingId'])) {
                throw new Exception('l\'escalier associé à l\'avis reçu n\'a pas été trouvé.');
            } else {
                return self::create(
                    [
                        'stairs_id' => $data['stairsId'],
                        'rating' => $data['rating'],
                        'review' => $data['review'] ?? null,
                        'is_favorite' => isset($data['isFavorite']) ? 1 : 0,
                    ]
                );
            }
        } else {
            // here we update an existing entity
            $rating->stairs_id = $data['stairsId'];
            $rating->rating = $data['rating'];
            $rating->review = $data['review'] ?? null;
            $rating->is_favorite = isset($data['isFavorite']) ? 1 : 0;
            $rating->save();
        }
    }

    public static function getById(int $id)
    {
         // fetch a specific entity by its id (or throw error if not found)
        $rating = Rating::find($id);
        if (!$rating) {
            throw new Exception('Aucun enregistrement associé avec cet id n\'a été trouvé.');
        }
        return $rating;
    }

    public static function deleteItem(int $id)
    {
        // delete a specific entity by its id
        $rating = Rating::getById($id);
        if (!$rating->delete()) {
            throw new Exception('La suppression de l\'avis a échoué.');
        }
    }
}
