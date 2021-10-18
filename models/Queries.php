<?php

 class Queries{

     public static function getQueries(){
         $db = Db::getConnection();

         $queriesList = array();

         $result = $db->query("SELECT id_query, email, name, surname, regist_date
                                        FROM queries; 
                             ");

         $result->setFetchMode(PDO::FETCH_ASSOC);

         $i = 0;
         while($row=$result->fetch()){
             $queriesList[$i]['id_query'] = $row['id_query'];
             $queriesList[$i]['email'] = $row['email'];
             $queriesList[$i]['name'] = $row['name'];
             $queriesList[$i]['surname'] = $row['surname'];
             $queriesList[$i]['regist_date'] = $row['regist_date'];

             $i++;
         }

         return $queriesList;
     }

     public static function getCountQueries()
     {
         $db = Db::getConnection();

         $result = $db->query("SELECT count(*) as kek
                                        FROM queries");

         $result->setFetchMode(PDO::FETCH_ASSOC);
         $row = $result->fetch();

         return $row['kek'];
     }

     public static function deleteQuery($id){
         $db = Db::getConnection();

         $sql = "DELETE FROM queries
                 WHERE id_query = '$id'";

         $result = $db->prepare($sql);

         return $result->execute();
     }

     public static function transferQuery($id, $ac_type){
         $db = Db::getConnection();

         $result = $db->query("SELECT email, name, surname, ac_password FROM queries WHERE id_query = '$id';");

         $result->setFetchMode(PDO::FETCH_ASSOC);

         $row = $result->fetch() ;
         $email = $row["email"];
         $pas = $row["ac_password"];
         $name = $row["name"];
         $surname = $row["surname"];

         $sql = "INSERT INTO accounts(email, name, surname, ac_password, ac_type)
                values('$email', '$name', '$surname','$pas', '$ac_type');";

         $result = $db->query($sql);

         $sql = "DELETE FROM queries WHERE id_query = '$id'";

         $result = $db->query($sql);

         if ($db->query($sql) === TRUE) {
             return true;
         } else {
             return false;
         }
     }

 }