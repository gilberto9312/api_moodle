<?php 
        public function parametrosWsUser()

        {
            $params = array(
            	//token  segun el servicio que crees en el moodle
            'wstoken' => 'b78b2fb3f260f30f6bb79398878a9eba',
            	//nombre de la funcion a usar segun la documentacion
            'wsfunction' => 'core_user_create_users',
            	//formato enviar 
            'moodlewsrestformat' => 'json'
        );
            return $params;
        }

        public function parametrosWsRol()

        {
                $params2 = array(
                	//token  segun el servicio que crees en el moodle
                'wstoken' => 'b78b2fb3f260f30f6bb79398878a9eba',
                	//nombre de la funcion a usar segun la documentacion
                'wsfunction' => 'core_role_assign_roles',
                	//formato enviar 
                'moodlewsrestformat' => 'json'
            );

        return $params2;
        }

        public function parametrosCreateCategory()

        {
                $params = array(
                	//token  segun el servicio que crees en el moodle
                'wstoken' => '242a84cfddbeeb7fbacdd42e45f43536',
                	//nombre de la funcion a usar segun la documentacion
                'wsfunction' => 'core_course_create_categories',
                	//formato enviar 
                'moodlewsrestformat' => 'json'
            );

        return $params;
        }        

        public function parametrosCreateCourse()

        {
                $params = array(
                	//token  segun el servicio que crees en el moodle
                'wstoken' => '242a84cfddbeeb7fbacdd42e45f43536',
                	//nombre de la funcion a usar segun la documentacion
                'wsfunction' => 'core_course_create_courses',
                	//formato enviar 
                'moodlewsrestformat' => 'json'
            );

        return $params;
        }  



?>