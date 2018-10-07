<?php

    require("../service/SavingInteface.php");
    require("../service/SavingInterfaceImpl.php");

    $savingInterface = new SavingInterfaceImpl();

    echo( "Saving new data... " );

    echo("<br>");

    $savingInterface->save("A123", 11, 12);

    echo( "Retrieving data..." );

    echo("<br>");

    $readData = $savingInterface->read("A123");

    echo( "Got data: ".$readData );

    echo("<br>");

    echo( "Deleting data..." );

    $savingInterface->empty();

