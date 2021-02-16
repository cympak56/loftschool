<?php

namespace App\Model;

use Base\AbstractModel;

class User extends AbstractModel
{
	protected $table = 'users';
	protected $primaryKey = 'user_id';
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'role'
    ];
    
    public function getName(): string
    {
        return $this->name;
    }
    
    public static function getByEmail(string $email): ?self
    {
        return self::query()->where('email', '=', $email)->first();
    }
	
	public function getId()
    {
        return $this->id;
    }
	
	public static function getById(int $id)
    {
        return self::query()->find($id);
    }
	
    public static function getPasswordHash(string $password)
    {
        return sha1(',.lskfjl' . $password);
    }
    
    public function fileExists($file)
    {
        return (!empty($file) && file_exists('../images/' . $file)) ? true : false;
    }
    
    public function getList()
    {
        return self::query()->orderBy('user_id', 'DESC')->get();
    }
    
    public function admin($id)
    {
        return ($this->role == 'admin') ? true : false;
    }
    
    public static function getDelete(int $user_id)
    {
        return self::destroy($user_id);
    }
}