<?php

namespace App\Model;

use Base\AbstractModel;

class Message extends AbstractModel
{
    protected $table = 'messages';
    protected $primaryKey = 'message_id';
    protected $fillable = [
        'message_id',
        'message',
        'image',
        'user_id'
    ];
    
    public function save(array $options = [])
    {
        $result = parent::save($options);
        return $result;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    
    public static function getById(int $message_id)
    {
        return self::query()->find($message_id);
    }
    
    public static function getList()
    {
        return self::with('user')
            ->orderBy('message_id', 'DESC')
            ->get();
    }
    
    public static function getUserList(int $user_id)
    {
        return self::query()->where('user_id', '=', $user_id)->get();
    }
    
    public static function getDelete(int $messageId)
    {
        return self::destroy($messageId);
    }
}