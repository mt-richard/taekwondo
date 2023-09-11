<?php
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     include '../../config/dbconnection.php';
//     $db = new dbconnection();


//     $fakeEvents = [];
//     $categories = ["Category 1", "Category 2", "Category 3"];
//     $venues = ["Venue 1", "Venue 2", "Venue 3", "Venue 4"];
    
//     for ($i = 0; $i < 1000; $i++) {
//         $fakeEvent = [
//             "event_category" => $categories[array_rand($categories)],
//             "title" => "Fake Event " . ($i + 1),
//             "event_desc" => "This is a fake event description for Event " . ($i + 1),
//             "event_enddate" => date('Y-m-d', strtotime('+1 week')),
//             "event_date" => date('Y-m-d', strtotime('+1 day')),
//             "venue" => $venues[array_rand($venues)],
//             "photo" => "../../upload/20230830111928_64ef09a022da1.jpg", 
//         ];
        
//         $fakeEvents[] = $fakeEvent;
//     }

//     // Insert fake data into the database
//     foreach ($fakeEvents as $fakeEvent) {
//         $result = $db->save("events", $fakeEvent);
        
//         if ($result['status'] != 'success') {
//             echo "Failed to add event: " . $result['message'] . "<br>";
//         }
//     }

//     echo "Fake data generated and inserted successfully!";
// }
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../../config/dbconnection.php';
    $db = new dbconnection();


    $fakeEvents = [];
    
    for ($i = 0; $i < 1000; $i++) {
        $fakeEvent = [
            
            "title" => "Fake News at our site is the " . ($i + 1),
            "content" => "This is a fake News description for New " . ($i + 1),
            "state" => "Normal",
            "userid" => "1",
            "photo" => "../../upload/20230830111928_64ef09a022da1.jpg", 
        ];
        
        $fakeEvents[] = $fakeEvent;
    }

    // Insert fake data into the database
    foreach ($fakeEvents as $fakeEvent) {
        $result = $db->save("news", $fakeEvent);
        
        if ($result['status'] != 'success') {
            echo "Failed to add News: " . $result['message'] . "<br>";
        }
    }

    echo "News Fake data generated and inserted successfully!";
}
?>

