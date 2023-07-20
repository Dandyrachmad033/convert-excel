<?php

namespace App\Controllers;
use App\Models\dbd;

class delete extends BaseController
{
    public function remove()
    {
        $db = new dbd();
        $db->truncate();
        return redirect()->route('Upload');
    }
}
