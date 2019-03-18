<?php

					//$this->container->getParameter('wsMoodle'); es una variable de entorno
					// se puede hacer directamente colocando la url d ela siguiente manera
					//http://localhost/moodle/webservice/rest/server.php?
					
 					$baseurl = $this->container->getParameter('wsMoodle');
                        $params = $this->get('App\Controller\ws_moodle')->parametrosCreateCourse();
                        //clase standar de php, si usas php puro no es necesario el \ 
                        //sin embargo  si usas un framework como en mi caso si es necesario                        
                        $course = new \stdClass();
                        $course->fullname = "nombre del curso";
                        $course->shortname = "nombre corto no se puede repetir";
                        //uso esta variable que la defino segun lo necesite
                        //debe oir un integer relacionado a una categoria 
                        //antes de crear curso debes crear categorias y obtener ese valor para enviar aqui
                        $course->categoryid = $categoryMoodle;
                        //valores por default
                        $course->summaryformat = 1;
                        $course->format = "topics";
                        $course->showgrades = 0;
                        $course->newsitems = 0;
                        $course->maxbytes = 0;
                        $course->showreports = 0;
                        $course->groupmode = 0;
                        $course->groupmodeforce = 0;
                        $course->defaultgroupingid = 0;
                       
                        $mdlcourse = array($course);
                        $params['courses'] = $mdlcourse;
                        $url = $baseurl . http_build_query($params);
                        $arrContextOptions = array(
                            "ssl" => array(
                                "verify_peer" => false,
                                "verify_peer_name" => false,
                            ),
                        );
                        $response = json_decode(file_get_contents($url, false, stream_context_create($arrContextOptions)));dump($response); 

?>