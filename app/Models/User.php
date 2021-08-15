<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public const SALARY_TYPE = ['m' => 'MONTHLY', 'h' => 'HOURLY'];
    public const HOURS_IN_MONTH = 178;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'birthday',
        'department_id',
        'salary_id',
        'position_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function department():\Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function salary():\Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Salary::class);
    }

    public function position():\Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function getBirthdayAttribute($value)
    {
        return date('Y-m-d', strtotime($value));
    }

    public function getPayment(): string
    {
        return strtoupper($this->salary->period) == self::SALARY_TYPE['m']
            ? number_format($this->salary->amount, 0, '.', ' ')
            : number_format($this->salary->amount * self::HOURS_IN_MONTH, 0, '.', ' ');
    }
}
