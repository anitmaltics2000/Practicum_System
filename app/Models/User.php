<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
>>>>>>> c42d8e3aec03eabb8be7f0cbebe206ea0257ae49
    ];
=======
    protected $fillable = [
        'name',
        'email',
        'password',
        'student_id',
        'phone',
        'address',
        'date_of_birth',
        'major',
        'year_of_study',
        'role',
    ];
=======
>>>>>>> c42d8e3aec03eabb8be7f0cbebe206ea0257ae49
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
        ];
    }
=======
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'date_of_birth' => 'date',
        ];
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function practicumPlacements()
    {
        return $this->hasMany(PracticumPlacement::class, 'student_id');
    }
=======
        ];
    }
>>>>>>> c42d8e3aec03eabb8be7f0cbebe206ea0257ae49
}
