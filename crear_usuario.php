<?php
                    
                    //$this->container->getParameter('wsMoodle'); es una variable de entorno
                    // se puede hacer directamente colocando la url d ela siguiente manera
                    //http://localhost/moodle/webservice/rest/server.php?
                    

                    $baseurl = $this->container->getParameter('wsMoodle');
                        $params = $this->get('App\Controller\ws_moodle')->parametrosWsUser();
                        //clase standar de php, si usas php puro no es necesario el \ 
                        //sin embargo  si usas un framework como en mi caso si es necesario
                        $user1 = new \stdClass();
                        $user1->username = $postulacion->getUsernamemoodle();
                        $user1->password = $postulacion->getPasswordmoodle();
                        $user1->firstname = $postulacion->getIdPostulante()->getNombres();
                        $user1->lastname = $postulacion->getIdPostulante()->getApellidos();
                        $user1->email = $postulacion->getIdPostulante()->getEmailInstitucional();
                        $user1->auth = 'manual';
                        $user1->idnumber = $postulacion->getIdPostulante()->getId();
                        $user1->lang = 'en';
                        $user1->timezone = 'America/Guayaquil';
                        $user1->mailformat = 0;
                        $user1->description = 'Usuario Creado desde Plataforma Certificacion';
                        $user1->city = $postulacion->getIdPostulante()->getCanton()->getNombre();
                        $user1->country = 'EC';


                        $users = array($user1);
                        $params['users'] = $users;
                        $url = $baseurl . http_build_query($params);
                        $arrContextOptions = array(
                            "ssl" => array(
                                "verify_peer" => false,
                                "verify_peer_name" => false,
                            ),
                        );
                        $response = json_decode(file_get_contents($url, false, stream_context_create($arrContextOptions)));
                        //en esta parte es necesario agregarle rol del estudiante al usuario ne mi caso son solo estudiantes
                        //pero varia el contextid segun el roleid
                        $insertedId = $response[0]->id;
                        $params2 = $this->get('App\Controller\WstokenController')->parametrosWsRol();
                        $assignment = array('roleid' => '5', 'userid' => $insertedId, 'contextid' => 2);
                        $assignments = array($assignment);
                        $params2['assignments'] = $assignments;
                        $url2 = $baseurl . http_build_query($params2);
                        $response2 = json_decode(file_get_contents($url2, false, stream_context_create($arrContextOptions)));
                        
            
?>