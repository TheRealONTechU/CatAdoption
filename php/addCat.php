<?php
// Initialize the session
session_start();

$querys = array("name","age","sex","description","spray_neuter","shelter_name","shelter_id","petPointId","image","FIVTested","FLVTested","FVRCPDate","rabiesDate","medicalNotes","behaviorNotes","outcome","intakeDate","fosterPlacementDate","location","primaryBreed","secondaryBreed","size","colourPrimary","colourSecondary","colourPattern","microchipNumber","microchipIssuer","recordOwner","intakeType","jurisdiction","transferReason","fosterLocation","pdfLocation");
$qv = array();

// Include config file
 require_once "../config.php";

//declare all variables that need to be populated for the cat information
$date = $name = $age = $sex = $description = $sn = $shelterName = $shelterId = $petPointId = $image = $FIVTested = $FLVTested = $FVRCPDate = $rabiesDate = $medicalNotes = $behaviourNotes = $outcome = $intakeDate = $fosterPlacementDate = $location = $primaryBreed = $secondaryBreed = $size = $colourPrimary = $colourSecondary = $colourPattern = $microchipNumber = $microchipIssuer = $recordOwner = $intakeType = $jurisdiction = $transferReason = $fosterLocation = $pdfLocation = null;
$errorMessage = false;

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

   for($i=0; i<count(querys); i++) {
      if(empty(trim($_POST[querys[i]]))) {
         $errorMessage = true;
         break;
      } else {
         array_push($qv, trim($_POST[querys[i]])));
      }
   }

   if($errorMessage) {
      echo "You need more entries!"; 
   } else {
      $strqy = "";
      for($i=0; i<count(qv); i++) {
         $strqy = $strqy + qv[i] + ", ";
      }
      $sql = "INSERT INTO CATS name, age, sex, description, spray_neuter, shelter_name, shelter_id, petPointId, image, FIVTested, FLVTested, FVRCPDate, rabiesDate, medicalNotes, behaviorNotes, outcome, intakeDate, fosterPlacementDate, location, primaryBreed, secondaryBreed, size, colourPrimary, colourSecondary, colourPattern, microchipNumber, microchipIssuer, recordOwner, intakeType, jurisdiction, transferReason, fosterLocation, pdfLocation, VALUES $strqy";

      echo strqy;
   }

   header("Location: ../html/CatDocumentUpload.html");
}



    
?>