<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Note extends Model
    {
        use HasFactory;

        // Define the fillable fields that can be mass assigned for security
        protected $fillable = [
            'title',
            'content',
            'user_id', // Make sure user_id is fillable as we'll assign it programmatically
        ];

        /**
         * Get the user that owns the note.
         */
        public function user()
        {
            return $this->belongsTo(User::class);
        }
    }
