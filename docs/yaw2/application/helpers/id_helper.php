<?php 
 
class Id_helper 
{ 
        public function generate_id() 
        { 
                $secret = "ewghqwGHknlnklbLLLHKLhhgwd999YdyasdfnFGLU2nanf2nrnsdssddfkbsJkjdhowbepigaJHIsfvkbsidvkbeqsahfv"; 
 
                $bullshit = getmypid() . microtime();            
 
                foreach (getallheaders() as $name => $value)  
                { 
                        //echo "$name: $value\n"; 
                        $bullshit = $bullshit . $value; 
                } 
 
                $bullshit = $bullshit . $secret . rand(); 
 
                return md5($bullshit); 
        } 
} 
 
?> 
