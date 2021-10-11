<?php  
    
    //get method *
    function getstaff($db, $staffs){
    $sql = 'Select * from staff where id = :id';
    $stmt = $db->prepare ($sql);
    $id = (int) $staffs;
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt ->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    //delete method 
    function deletestaff($db, $staffs){
        $sql = 'delete from staff where id = :id';
        $stmt = $db ->prepare($sql);
        $id = (int)$staffs;
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
    }

    //post method
    function addstaff($db, $form_data) {
        $sql = 'Insert into staff (name, age) ';
        $sql .= 'values (:name, :age)';
        $stmt = $db->prepare ($sql);
        $stmt->bindParam(':name', $form_data['name']);
        $stmt->bindParam('age', ($form_data['age']));
        $stmt->execute();
        return $db->lastInsertID();
    }
        
//put method
    function updatestaff($db,$form_data,$staffs) {
    $sql = 'update staff set name = :name, age = :age where id = :id';
    $stmt = $db->prepare ($sql);
    $id = (int)$staffs;
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $form_data['name']);
    $stmt->bindParam(':age', $form_data['age']);
    $stmt->execute(); 
}
