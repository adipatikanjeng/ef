<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Hash;
use Cmgmyr\Messenger\Traits\Messagable;

/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
*/
class User extends Authenticatable
{
    use Notifiable;
    use Messagable;
    protected $fillable = ['name', 'email', 'password', 'remember_token', 'surname', 'nickname', 'phone_number', 'avatar', 'grade', 'school', 'address'];


    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }


    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function students()
    {
        return $this->belongsToMany(\App\User::class, 'classes', 'teacher_user_id', 'student_user_id');
    }

    public function teachers()
    {
        return $this->belongsToMany(\App\User::class, 'classes', 'teacher_user_id', 'student_user_id');
    }


    public function isAdmin()
    {
        return $this->role()->where('role_id', 2)->first();
    }

    public function isStudent()
    {
        return $this->role()->where('role_id', 4)->first();
    }

    public function lessons()
    {
        return $this->belongsToMany('App\Lesson', 'lesson_student');
    }

}
