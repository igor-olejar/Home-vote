<?php

class Customfunctions 
{
    public static function emailToken()
    {
        $length = 16;
        $characters = "0123456789abcdefghijklmnopqrstuvwxyz";
        $string = "";    
        for ($p = 0; $p < $length; $p++) {
            $string .= $characters[mt_rand(0, strlen($characters)-1)];
        }
        return $string;
    }
    
    public static function resetPwd($token)
    {
        //get the user email using the token value
        $user = Token::where('value','=',$token)->first()->user()->get();
        $new_password = Hash::make($user[0]->attributes['email'] . time());
        
        //save the new password
        $usr = User::find($user[0]->attributes['id']);
        $usr->password = $new_password;
        $usr->save();
        
        //update token status
        self::updateTokenStatus($token);
        
        return array(
            'email'     =>  $user[0]->attributes['email'],
            'pwd'       =>  $new_password
        );
    }
    
    public static function vdump($stuff)
    {
        echo "<pre>";
        print_r($stuff);
        echo "</pre>";
    }
    
    public static function resetAdminPwd()
    {
        $user = User::find(1);
        $user->password = Hash::make('password');
        $user->save();
    }
    
    private static function updateTokenStatus($token)
    {
        $token = Token::where('value','=',$token)->first();
        $token->used = 1;
        $token->save();
    }
}
