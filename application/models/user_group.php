<?php

Class User_group extends Eloquent
{
    public function user()
    {
        $this->belongs_to('user', 'group');
    }
}
?>
