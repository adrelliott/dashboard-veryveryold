<?php 

/**
 * This is the class from which all of the app's modle classses are extended. Pus global logic here.
 */
use LaravelBook\Ardent\Ardent;

class BaseModel extends Ardent {

     //When we call User::destroy(1); it actually only soft deletes the record
    protected $softDelete = true;

    //Ardent ensures that the $_POST values are injected into the model ready to send
    public $forceEntityHydrationFromInput = true;


    public function beforeSave()
    {
        if ( ! Session::has('owner_id'))
            return Redirect::route('logout');
        //Needs error management

        // Overwrite the 'owner_id' record with the current logged in users
        $this->attributes['owner_id'] = Session::get('owner_id');
    }



    /* Used for the API call */
    public static function prepareQuery()
    {
        // Set up defaults
        $defaults = array(
            'cols' => 'id',
            'where' => ''
            );

        // Get all the URL paramaters 
        foreach (Input::all() as $p => $val)
        {
            if (array_key_exists($p, $defaults))
            {
                $defaults[$p] = str_replace(' ', '', $val);
            }
        }

        return $defaults;
    }
    
}