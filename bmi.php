<?php
function submit() {
    
    if(isset($_POST['arm']))  {
      $newArm = (int)$_POST['arm'];
      $newSchulter = (int)$_POST['schulter'];
      $newBrust= (int)$_POST['brustumfang'];
      $newUnter = (int)$_POST['unterbrustumfang'];
      $newTaille = (int)$_POST['taille'];
      $newBund = (int)$_POST['bundumfang'];
      $newHueft = (int)$_POST['hueftumfang'];
      $newBein = (int)$_POST['bein'];
      $newDate = time();
      $tempArray = getBmi();
      $tempArray[] = array( 'date'=>$newDate, 
                            'Arm'=>$newArm, 
                            'Schulter'=>$newSchulter, 
                            'Brustumfang'=>$newBrust, 
                            'Unterbrustumfang'=>$newUnter, 
                            'Taille'=>$newTaille, 
                            'Bundumfang'=>$newBund, 
                            'Hueftumfang'=>$newHueft, 
                            'Bein'=>$newBein);

      writeBmi($tempArray);
    }
    else{ 
        return;
      
    }
}
    

function delete() {
    
    $bmiArray = array_reverse(getBmi());

    foreach($bmiArray as $key=>$bmi) {
        if(isset($_POST['delete'.$key.''])) {
            unset($bmiArray[$key]);              
        }
    }
    writeBmi(array_reverse($bmiArray));

    }


function writeBmi($tempArray) {
    $jsonData = json_encode($tempArray, JSON_PRETTY_PRINT);
    file_put_contents('bmi.json', $jsonData);
}

function getBmi() {
    $contents = file_get_contents('bmi.json');
    return $oldBmis = json_decode($contents);
}
function getBmiRaw()
{
    return file_get_contents('bmi.json');
}
function getDivClass($key) {
    switch ($key%2) {
        case 0:
            return 'bmiEven';
        case 1:
            return 'bmiOdd';
        default:
            return 'bmi';
    }
}

function printBmi()
    {
        $rows = ["<tr>
                    <th>Datum</th>
                    <th>Arm</th>
                    <th>Schulter</th>
                    <th>Brustumfang</th>
                    <th>Unterbrustumfang</th>
                    <th>Taille</th>
                    <th>Bundumfang</th>
                    <th>Hueftumfang</th>
                    <th>Bein</th>
                    <th>Löschen</th>
           </tr>"];


    $oldBmis = array_reverse(getBmi());
    echo '<pre>';
    // var_dump($oldBmis[0]->date);
        foreach ($oldBmis as $key=>$oldBmi) {
         
                        $rowClass = getDivClass($key);
            $rows[] = "<tr class=".$rowClass.">
                <td class='date'>" . date('h:i d.m.y', $oldBmi->date) . "</td>
                <td>" . $oldBmi->Arm . "</td>
                <td>" . $oldBmi->Schulter . "</td>
                <td>" . $oldBmi->Brustumfang . "</td>
                <td>" . $oldBmi->Unterbrustumfang . "</td>
                <td>" . $oldBmi->Taille . "</td>
                <td>" . $oldBmi->Bundumfang . "</td>
                <td>" . $oldBmi->Hueftumfang . "</td>
                <td>" . $oldBmi->Bein . "</td>
                <td><form method='post' onsubmit=\"return confirm('Sicher?');\"  name='delete".$key."' action='index.php'>
                    <input type='submit' name='delete".$key."' value='löschen'>
                    </form></td>
            </tr>";
        }

        echo "<table class='printedBmi'>" . implode('', $rows) . "</table>";
    }



?>