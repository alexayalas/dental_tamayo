<?php

@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");

class Excel extends CI_Controller {

    public function __construct() {
        parent::__construct();

        /*
         * Configuración para librerias, helpers y modelos
         */
        $library = array('session_manager');
        $helper = array('url', 'form');
        $model = array('m_sede', 'm_formulario_web', 'm_control');
        $this->load->library($library);
        $this->load->library('Classes/PHPExcel.php', 'Classes/PHPExcel/Reader/Excel2007.php');
        $this->load->helper($helper);
        $this->load->model($model);
        /*
         * Configuración personalizada
        */
        $this->_session = $this->session_manager->datos_usuario('user_data');

    }


    public function exportar_formulario_web() {
        $login = $this->session_manager->datos_usuario_logueado();

        $fi = $this->input->get('fi');
        $ff = $this->input->get('ff');

        $newFi = date("Y-m-d", strtotime($fi));
        $newFf = date("Y-m-d", strtotime($ff));

        $lista = $this->m_formulario_web->select_rango($newFi, $newFf);
        /*$lista = $this->m_formulario_web->mostrar_cuando(array('f.idorigen' => '1', 'f.oculto' => '0'), FALSE, FALSE, array("f.fecha_registro" => "desc")); */

        if(!empty($lista)){
            $x = 1;
            $i = 2;
            $this->phpexcel->getProperties()->setCreator("Arkos Noem Arenom")
                    ->setLastModifiedBy("Arkos Noem Arenom")
                    ->setTitle("Office 2007 XLSX Test Document")
                    ->setSubject("Office 2007 XLSX Test Document")
                    ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                    ->setKeywords("office 2007 openxml php")
                    ->setCategory("Test result file");

            foreach ($lista AS $items) {
                // configuramos las propiedades del documento
                // agregamos información a las celdas
                $this->phpexcel->setActiveSheetIndex(0)
                        ->setCellValue('A1', "N°")
                        ->setCellValue('B1', "Nombres y Apellidos")
                        ->setCellValue('C1', "Email")
                        ->setCellValue('D1', "Telefono")
                        ->setCellValue('E1', "Como se entero")
                        ->setCellValue('F1', "Especialidad")
                        ->setCellValue('G1', "Formulario Web")
                        ->setCellValue('H1', "URL de Origen")
                        ->setCellValue('I1', "Sede")
                        ->setCellValue('J1', "Direccion de la Sede")
                        ->setCellValue('K1', "Fecha de Registro")
                        ->setCellValue('L1', "Fecha para Cita")
                        ->setCellValue('A' . $i, $x)
                        ->setCellValue('B' . $i, $items['nombre'])
                        ->setCellValue('C' . $i, $items['email'])
                        ->setCellValue('D' . $i, $items['telefono'])
                        ->setCellValue('E' . $i, $items['referencia'])
                        ->setCellValue('F' . $i, $items['especialidad'])
                        ->setCellValue('G' . $i, $items['origen'])
                        ->setCellValue('H' . $i, $items['link_procedencia'])
                        ->setCellValue('I' . $i, $items['sede'])
                        ->setCellValue('J' . $i, $items['direccion'])
                        ->setCellValue('K' . $i, date("d-m-Y H:i", strtotime($items['fecha_registro'])))
                        ->setCellValue('L' . $i, date("d-m-Y H:i", strtotime($items['fecha_cita'])));
                $i++;
                $x++;
            }

            $estiloTituloReporte = array(
                'font' => array(
                    'name'      => 'Calibri',
                    'bold'      => true,
                    'italic'    => false,
                    'strike'    => false,
                    'size' =>12,
                    'color'     => array(
                        'rgb' => 'FFFFFF'
                    )
                ),
                'fill' => array(
                  'type'  => PHPExcel_Style_Fill::FILL_SOLID,
                  'color' => array(
                        'argb' => '000')
              ),
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_NONE
                    )
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'rotation' => 0,
                    'wrap' => TRUE
                )
            );

            $this->phpexcel->getActiveSheet()->getStyle('A1:L1')->applyFromArray($estiloTituloReporte);

            //ancho automatico para las columnas
            for($i = 'A'; $i <= 'L'; $i++){
                $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
            }

            // Renombramos la hoja de trabajo
            $this->phpexcel->getActiveSheet()->setTitle('Formularios Web');

           // redireccionamos la salida al navegador del cliente (Excel2007)
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="formulario_web_'.date("d-m-Y").'.xlsx"');
            header('Cache-Control: max-age=0');

            $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel2007');
            $objWriter->save('php://output');
        }else{
            echo "No se encontraron datos para exportar...";
        }
        
    }



    public function exportar_formulario_facebook() {
        $login = $this->session_manager->datos_usuario_logueado();

        $fi = $this->input->get('fi');
        $ff = $this->input->get('ff');

        $newFi = date("Y-m-d", strtotime($fi));
        $newFf = date("Y-m-d", strtotime($ff));

        $lista = $this->m_formulario_web->select_rango2($newFi, $newFf);
        /*$lista = $this->m_formulario_web->mostrar_cuando(array('f.idorigen' => '1', 'f.oculto' => '0'), FALSE, FALSE, array("f.fecha_registro" => "desc")); */

        if(!empty($lista)){
            $x = 1;
            $i = 2;
            $this->phpexcel->getProperties()->setCreator("Arkos Noem Arenom")
                    ->setLastModifiedBy("Arkos Noem Arenom")
                    ->setTitle("Office 2007 XLSX Test Document")
                    ->setSubject("Office 2007 XLSX Test Document")
                    ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                    ->setKeywords("office 2007 openxml php")
                    ->setCategory("Test result file");

            foreach ($lista AS $items) {
                // configuramos las propiedades del documento
                // agregamos información a las celdas
                $this->phpexcel->setActiveSheetIndex(0)
                        ->setCellValue('A1', "N°")
                        ->setCellValue('B1', "Nombres y Apellidos")
                        ->setCellValue('C1', "Email")
                        ->setCellValue('D1', "Telefono")
                        ->setCellValue('E1', "Como se entero")
                        ->setCellValue('F1', "Especialidad")
                        ->setCellValue('G1', "Formulario Web")
                        ->setCellValue('H1', "URL de Origen")
                        ->setCellValue('I1', "Sede")
                        ->setCellValue('J1', "Direccion de la Sede")
                        ->setCellValue('K1', "Fecha de Registro")
                        ->setCellValue('L1', "Fecha para Cita")
                        ->setCellValue('A' . $i, $x)
                        ->setCellValue('B' . $i, $items['nombre'])
                        ->setCellValue('C' . $i, $items['email'])
                        ->setCellValue('D' . $i, $items['telefono'])
                        ->setCellValue('E' . $i, $items['referencia'])
                        ->setCellValue('F' . $i, $items['especialidad'])
                        ->setCellValue('G' . $i, $items['origen'])
                        ->setCellValue('H' . $i, $items['link_procedencia'])
                        ->setCellValue('I' . $i, $items['sede'])
                        ->setCellValue('J' . $i, $items['direccion'])
                        ->setCellValue('K' . $i, date("d-m-Y H:i", strtotime($items['fecha_registro'])))
                        ->setCellValue('L' . $i, date("d-m-Y H:i", strtotime($items['fecha_cita'])));
                $i++;
                $x++;
            }

            $estiloTituloReporte = array(
                'font' => array(
                    'name'      => 'Calibri',
                    'bold'      => true,
                    'italic'    => false,
                    'strike'    => false,
                    'size' =>12,
                    'color'     => array(
                        'rgb' => 'FFFFFF'
                    )
                ),
                'fill' => array(
                  'type'  => PHPExcel_Style_Fill::FILL_SOLID,
                  'color' => array(
                        'argb' => '000')
              ),
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_NONE
                    )
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'rotation' => 0,
                    'wrap' => TRUE
                )
            );

            $this->phpexcel->getActiveSheet()->getStyle('A1:L1')->applyFromArray($estiloTituloReporte);

            //ancho automatico para las columnas
            for($i = 'A'; $i <= 'L'; $i++){
                $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
            }

            // Renombramos la hoja de trabajo
            $this->phpexcel->getActiveSheet()->setTitle('Formularios Facebook');

           // redireccionamos la salida al navegador del cliente (Excel2007)
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="formulario_facebook_'.date("d-m-Y").'.xlsx"');
            header('Cache-Control: max-age=0');

            $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel2007');
            $objWriter->save('php://output');
        }else{
            echo "No se encontraron datos para exportar...";
        }
        
    }


    public function exportar_streaming() {
        $login = $this->session_manager->datos_usuario_logueado();

        $fi = $this->input->get('fi');
        $ff = $this->input->get('ff');

        $newFi = date("Y-m-d", strtotime($fi));
        $newFf = date("Y-m-d", strtotime($ff));

        $lista = $this->m_control->select_rango($newFi, $newFf);

        if(!empty($lista)){
            $x = 1;
            $i = 2;
            $this->phpexcel->getProperties()->setCreator("Arkos Noem Arenom")
                    ->setLastModifiedBy("Arkos Noem Arenom")
                    ->setTitle("Office 2007 XLSX Test Document")
                    ->setSubject("Office 2007 XLSX Test Document")
                    ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                    ->setKeywords("office 2007 openxml php")
                    ->setCategory("Test result file");

            foreach ($lista AS $items) {
                $tipo = $items['tipo'] == '1' ? 'Doctor' : 'Administrativo';
                $descrip = $items['accion'] == '1' ? 'Inicio Sesion' : 'Cerro Session';
                // configuramos las propiedades del documento
                // agregamos información a las celdas
                $this->phpexcel->setActiveSheetIndex(0)
                        ->setCellValue('A1', "N°")
                        ->setCellValue('B1', "Tipo")
                        ->setCellValue('C1', "Nombres y Apellidos")
                        ->setCellValue('D1', "Correo")
                        ->setCellValue('E1', "Sede")
                        ->setCellValue('F1', "Tipo de Registro")
                        ->setCellValue('G1', "IP del Visitante")
                        ->setCellValue('H1', "Fecha de Registro")
                        ->setCellValue('A' . $i, $x)
                        ->setCellValue('B' . $i, $tipo)
                        ->setCellValue('C' . $i, $items['nombre_personal'])
                        ->setCellValue('D' . $i, $items['correo'])
                        ->setCellValue('E' . $i, $items['sede'] . ' / '. $items['direccion'])
                        ->setCellValue('F' . $i, $descrip)
                        ->setCellValue('G' . $i, $items['ip'])
                        ->setCellValue('H' . $i, date("d-m-Y H:i", strtotime($items['fecha_registro'])));
                $i++;
                $x++;
            }

            $estiloTituloReporte = array(
                'font' => array(
                    'name'      => 'Calibri',
                    'bold'      => true,
                    'italic'    => false,
                    'strike'    => false,
                    'size' =>12,
                    'color'     => array(
                        'rgb' => 'FFFFFF'
                    )
                ),
                'fill' => array(
                  'type'  => PHPExcel_Style_Fill::FILL_SOLID,
                  'color' => array(
                        'argb' => '000')
              ),
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_NONE
                    )
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'rotation' => 0,
                    'wrap' => TRUE
                )
            );

            $this->phpexcel->getActiveSheet()->getStyle('A1:H1')->applyFromArray($estiloTituloReporte);

            //ancho automatico para las columnas
            for($i = 'A'; $i <= 'H'; $i++){
                $this->phpexcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
            }

            // Renombramos la hoja de trabajo
            $this->phpexcel->getActiveSheet()->setTitle('Lista de Participantes');

           // redireccionamos la salida al navegador del cliente (Excel2007)
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="participantes_streaming_'.date("d-m-Y").'.xlsx"');
            header('Cache-Control: max-age=0');

            $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel2007');
            $objWriter->save('php://output');
        }else{
            echo "No se encontraron datos para exportar...";
        }
        
    }

}
