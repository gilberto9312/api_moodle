<?php

//$this->container->getParameter('wsMoodle'); es una variable de entorno
// se puede hacer directamente colocando la url d ela siguiente manera
//http://localhost/moodle/webservice/rest/server.php?

 $baseurl = $this->container->getParameter('wsMoodle');
            
            $params = $this->get('App\Controller\ws_moodle')->parametrosCreateCategory();    
            $category = new \stdClass();
            $category->name = "nombre de la categoria";
            $category->parent=0;
            $category->descriptionformat=1;

            $categories= array($category);
            $params['categories'] = $categories;            
            $url = $baseurl . http_build_query($params);
            
                       $arrContextOptions = array(
                            "ssl" => array(
                                "verify_peer" => false,
                                "verify_peer_name" => false,
                            ),
                        );

            $response = json_decode(file_get_contents($url, false, stream_context_create($arrContextOptions)));

?>