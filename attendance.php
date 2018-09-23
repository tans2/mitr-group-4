<?php

/*
 * Backend for the attendance page.
 * 
 * @version 9/21/18
 * @author Joe Messare
 */

class Cadet{

    var $name;
    var $class;
    var $rin;
    
    function _construct( $name, $rin )
    {
        $this->name = $name;
        $this->rin = $rin;
    }

    function getName() 
    {
        echo $this->name;
    }

    function setName( $newName )
    {
        $this->name = $newName;
    }

    function getRIN()
    {
        echo $this->rin;
    }
}

class Event{
    var $name;
    var $date;
    var $type;

    function _construct( $name, $date, $type )
    {
        $this->name = $name;
        $this->date = $date;
        $this->type = $type;
    }

    function setName( $newName )
    {
        $this->name = $newName;
    }

    function getName()
    {
        echo $this->name;
    }

    function setDate( $date )
    {
        $this->date = $date;
    }

    function getDate()
    {
        echo $this->date;
    }

    function setType( $type )
    {
        if( $type == "P" )
        {
            $this->type = "PMT Event";
        }
        else
        {
            $this->type = "Non PMT Event";
        }
    }

    function getType()
    {
        echo $this->type;
    }
}


?>