<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {

	public function __construct() {
		parent::__construct();	
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('numero_letras');
		$this->load->library('ci_qr_code');
		$this->load->model('Clientes_model');
		$this->load->model('Productos_model');
		$this->load->model('Ventas_model');
		$this->load->model('Ventaproductos_model');
	}


	public function registra_ventaproducto() {
		//Si no esta logueado lo redirigmos al formulario de login
		if(!$this->session->userdata('logged_user')) {
			redirect ('login');
		}

		if($this->input->post()) {

			$this->form_validation->set_error_delimiters('<div class="mensaje-error">','</div>');
			if($this->form_validation->run() === FALSE) {
				
				//cargando los Clientes registrados
				$datos['listadoClientes'] = $this->Clientes_model->listar();

				//cargando los Productos registrados
				$datos['listadoProductos'] = $this->Productos_model->listar();

				$datos['titulo'] = 'Registro de Venta de Productos ';
				$datos['contenido'] = 'registra_ventaproducto_view';
				$datos['ubicacion'] = 'Ventas';
				$datos['id_usuario_session'] = $this->session->userdata('id_usuario');
				$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');
				if($this->session->userdata('id_tipousuario') == 1)
					$this->load->view('plantillas/plantilla_admin', $datos);
				else 
					$this->load->view('plantillas/plantilla_user', $datos);
			}
			else {
				$data = array(
			        'id'      => $this->input->post('id_producto'),
			        'qty'     => $this->input->post('cantidad_ventaproducto'),
			        'price'   => $this->input->post('precio_producto'),
			        'name'    => $this->input->post('nombre_ventaproducto')
				);

				//Llamando a la funcion insert del carrito de compras
				$this->cart->insert($data);
				redirect('registra_venta');//rediriendo
			}
		} 
		else {

			//cargando los Clientes registrados
			$datos['listadoClientes'] = $this->Clientes_model->listar();

			//cargando los Productos registrados
			$datos['listadoProductos'] = $this->Productos_model->listar();

			$datos['titulo'] = 'Registro de Venta de Productos ';
			$datos['contenido'] = 'registra_ventaproducto_view';
			$datos['ubicacion'] = 'Ventas';
			$datos['id_usuario_session'] = $this->session->userdata('id_usuario');
			$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');
			if($this->session->userdata('id_tipousuario') == 1)
				$this->load->view('plantillas/plantilla_admin', $datos);
			else 
				$this->load->view('plantillas/plantilla_user', $datos);
		}
	}

	public function registra_clienteventa() {
		//Si no esta logueado lo redirigmos al formulario de login
		if(!$this->session->userdata('logged_user')) {
			redirect ('login');
		}

		if($this->input->post()) {
			
			$this->form_validation->set_rules('nit_cliente', 'NIT o CI', 'trim|required|numeric|callback_verificar_nitcliente');
 			$this->form_validation->set_rules('nombre_cliente', 'Nombre(s) y Apellido(s)', 'trim|required|alpha_numeric_spaces');
 			$this->form_validation->set_rules('direccion_cliente', 'Dirección', 'trim|required|alpha_numeric_spaces');
 			$this->form_validation->set_rules('telefono_cliente', 'Teléfono', 'trim|required|numeric');

 			/*$this->form_validation->set_error_delimiters('<div class="mensaje-error">','</div>');*/

 			if($this->form_validation->run() == FALSE) {
	 			
	        	
	        	$data = array(
	        		'res'       		=> "error",
	                'nit_cliente'       => form_error('nit_cliente'),
	                'nombre_cliente'    => form_error('nombre_cliente'),
	                'direccion_cliente' => form_error('direccion_cliente'),
	                'telefono_cliente'  => form_error('telefono_cliente')
	            );
	            echo json_encode($data);		            
	        }
            else {
                //aquí ya puedes procesar los datos de tu formulario
				
				$id_cliente = $this->Clientes_model->agregar();
                
                $data = array(
                    'res'       			=> "success",
                    'nit_cliente'       	=> $this->input->post("nit_cliente"),
                    'id_cliente'       		=> $id_cliente,
                    'nombre_cliente'       	=> $this->input->post("nombre_cliente"),
                    'direccion_cliente'		=> $this->input->post("direccion_cliente"),
                    'telefono_cliente'		=> $this->input->post("telefono_cliente")
                );

                echo json_encode($data);	                
            }
		}
		else {
			//cargando los Clientes registrados
			$datos['listadoClientes'] = $this->Clientes_model->listar();

			$datos['titulo'] = 'Venta de Productos ';
			$datos['contenido'] = 'registra_venta_view';
			$datos['ubicacion'] = 'Ventas <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Registro de Venta';
			$datos['id_usuario_session'] = $this->session->userdata('id_usuario');
			$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');
			$datos['fecha'] = date('d/m/Y');
			if($this->session->userdata('id_tipousuario') == 1)
				$this->load->view('plantillas/plantilla_admin', $datos);
			else 
				$this->load->view('plantillas/plantilla_user', $datos);
		}
	}

	public function registra_venta() {
		//Si no esta logueado lo redirigmos al formulario de login
		if(!$this->session->userdata('logged_user')) {
			redirect ('login');
		}

		if($this->input->post()) {
			//Si se presiono el boton Guardar Venta
			if($this->input->post("btn_guardar_venta")) {
				$this->form_validation->set_error_delimiters('<div class="mensaje-error">','</div>');
				if($this->form_validation->run() === FALSE) {
					//cargando los Clientes registrados
					$datos['listadoClientes'] = $this->Clientes_model->listar();

					$datos['titulo'] = 'Venta de Productos ';
					$datos['contenido'] = 'registra_venta_view';
					$datos['ubicacion'] = 'Ventas <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Registro de Venta';
					$datos['id_usuario_session'] = $this->session->userdata('id_usuario');
					$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');
					if($this->session->userdata('id_tipousuario') == 1)
						$this->load->view('plantillas/plantilla_admin', $datos);
					else 
						$this->load->view('plantillas/plantilla_user', $datos);
				}				
				else {
					//Almacenando en variables los datos obtenidos por post necesario para registrar la venta
					$importe_total = $this->input->post("importe_total");
					$id_usuario = $this->session->userdata('id_usuario');
					$id_cliente = $this->input->post("id_cliente");
					//Llamando a la funcion agregar del modelo Ventas, ademas obteniendo la id de la venta
					$id_venta = $this->Ventas_model->agregar($importe_total,$id_usuario,$id_cliente);

					//Almacenando en variables array los datos obtenidos por post necesario para registrar cada producto vendido
					$id_producto = $this->input->post("id_producto");
					$precio = $this->input->post("precio");
					$cantidad = $this->input->post("cantidad");
					$importe = $this->input->post('importe');

					$data = array();//inicializando la variable data como array

					//Operador for para recorrer todos los valores que son recibidos como array
					for ($i=0; $i < sizeof($id_producto); $i++) { 
						//agrupando los valores recibidos dentro de un array multidimensional
						$data[] = array(
			                'id_producto' => $id_producto[$i],
				            'id_venta' => $id_venta,
				            'precio_ventaproducto' => $precio[$i],
				            'cantidad_ventaproducto' => $cantidad[$i],
				            'importe_ventaproducto' => $importe[$i]
			            );		       
					}

					//Llamando a la funcion agregar del modelo ventaproductos
					$this->Ventaproductos_model->agregar($data);
					//almacenamos en una variable session el id_venta
					$this->session->set_tempdata('id_venta', $id_venta, 900);
					redirect('finaliza_venta');//redirigiendo
				}
			}
			/*elseif($this->input->post("btn_vaciar_carrito")) {
				$this->cart->destroy();//llamando a la funcion destroy para eliminar todos los valores almacenados en el carrito
				//cargando los Clientes registrados
				$datos['listadoClientes'] = $this->Clientes_model->listar();

				$datos['titulo'] = 'Venta de Productos ';
				$datos['contenido'] = 'registra_venta_view';
				$datos['ubicacion'] = 'Ventas <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Registro de Venta';
				$datos['id_usuario_session'] = $this->session->userdata('id_usuario');
				$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');
				if($this->session->userdata('id_tipousuario') == 1)
					$this->load->view('plantillas/plantilla_admin', $datos);
				else 
					$this->load->view('plantillas/plantilla_user', $datos);
			}*/
			else {//Se presiono el boton Actualiza
				//Almacenando en variables los datos obtenidos por post para actualizar el carrito
				$rows = $this->input->post('rowid');
		        $cantidad = $this->input->post('cantidad');

		        $data = array();//inicializando la variable data como array
		        
		        //Operador for para recorrer todos los valores que son recibidos como array
		        for ($i = 0; $i < sizeof($rows); $i++) {
		            $data[] = array(
		                'rowid' => $rows[$i],
		                'qty' => $cantidad[$i]
		            );
	        	}

	        	//Llamando a la funcion update del carrito de compras
	 			$this->cart->update($data);
				//cargando los Clientes registrados
				$datos['listadoClientes'] = $this->Clientes_model->listar();

				$datos['titulo'] = 'Venta de Productos ';
				$datos['contenido'] = 'registra_venta_view';
				$datos['ubicacion'] = 'Ventas <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Registro de Venta';
				$datos['id_usuario_session'] = $this->session->userdata('id_usuario');
				$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');
				if($this->session->userdata('id_tipousuario') == 1)
					$this->load->view('plantillas/plantilla_admin', $datos);
				else 
					$this->load->view('plantillas/plantilla_user', $datos);
			}
		}
		else {
			//cargando los Clientes registrados
			$datos['listadoClientes'] = $this->Clientes_model->listar();

			$datos['titulo'] = 'Venta de Productos ';
			$datos['contenido'] = 'registra_venta_view';
			$datos['ubicacion'] = 'Ventas <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Registro de Venta';
			$datos['id_usuario_session'] = $this->session->userdata('id_usuario');
			$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');
			if($this->session->userdata('id_tipousuario') == 1)
				$this->load->view('plantillas/plantilla_admin', $datos);
			else 
				$this->load->view('plantillas/plantilla_user', $datos);
		}
	}

	public function elimina_ventaproducto($rowid) {
		//Si no esta logueado lo redirigmos al formulario de login
		if(!$this->session->userdata('logged_user')) {
			redirect ('login');
		}
		//para eliminar un producto en especifico lo que hacemos es conseguir su id
        //y actualizarlo poniendo qty que es la cantidad a 0
        $data = array(
            'rowid' => $rowid,
            'qty' => 0
        );
        //después simplemente utilizamos la función update de la librería cart
        //para actualizar el carrito pasando el array a actualizar
        $this->cart->update($data);
        
        $this->session->set_flashdata('productoEliminado', 'El producto fue eliminado correctamente');
        redirect('registra_venta');//redirigiendo
	}

	public function elimina_venta() {
		//Si no esta logueado lo redirigmos al formulario de login
		if(!$this->session->userdata('logged_user')) {
			redirect ('login');
		}
		$this->cart->destroy();//llamando a la funcion destroy para eliminar todos los valores almacenados en el carrito
		$this->session->set_flashdata('destruido', 'El carrito fue eliminado correctamente');
		redirect('registra_venta');//redirigiendo
	}

	public function finaliza_venta() {
		//Si no esta logueado lo redirigmos al formulario de login
		if(!$this->session->userdata('logged_user')) {
			redirect ('login');
		}
		//llamando a la funcion destroy para eliminar todos los valores almacenados en el carrito
		$this->cart->destroy();
		//recuperando mediante variables session el valor de id_venta
		$id_venta = $this->session->tempdata('id_venta');

		//cargando los productos vendidos
		$datos['listadoProductos'] = $this->Ventaproductos_model->listar($id_venta);

		//cargandos los datos generales de la venta
		$datos['datosVenta'] = $this->Ventas_model->datos_por_id($id_venta);

		/***Componentes Necesarios para crear el codigo qr***/
		$this->config->load('qr_code');
		$qr_code_config = array(); 
		$qr_code_config['cacheable'] 	= $this->config->item('cacheable');
		$qr_code_config['cachedir'] 	= $this->config->item('cachedir');
		$qr_code_config['imagedir'] 	= $this->config->item('imagedir');
		$qr_code_config['errorlog'] 	= $this->config->item('errorlog');
		$qr_code_config['ciqrcodelib'] 	= $this->config->item('ciqrcodelib');
		$qr_code_config['quality'] 		= $this->config->item('quality');
		$qr_code_config['size'] 		= $this->config->item('size');
		$qr_code_config['black'] 		= $this->config->item('black');
		$qr_code_config['white'] 		= $this->config->item('white');

		$this->ci_qr_code->initialize($qr_code_config);

		$image_name = 'qr_code_test.png';
        
        $params['data'] = 'NIT|' . 'NRO-FACTURA|' . 'NRO-AUTORIZACION|' . $datos['datosVenta'][0]->fecha_venta . '|' . number_format($datos['datosVenta'][0]->importetotal_venta, 2, ',', '') .'|' . 'CODIGO-CONTROL|' . $datos['datosVenta'][0]->nit_cliente;
        
        $params['savename'] = FCPATH.$qr_code_config['imagedir'].$image_name;
        $this->ci_qr_code->generate($params); 
        $datos['qr_code_image_url'] = base_url().$qr_code_config['imagedir'].$image_name;
        /***------------------------------------------------***/

		$datos['titulo'] = 'Finalizar Venta ';
		$datos['contenido'] = 'finaliza_venta_view';
		$datos['ubicacion'] = 'Ventas <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Finalizar Venta';
		$datos['id_usuario_session'] = $this->session->userdata('id_usuario');
		$datos['nick_usuario_session'] = $this->session->userdata('nick_usuario');
		if($this->session->userdata('id_tipousuario') == 1)
			$this->load->view('plantillas/plantilla_admin', $datos);
		else 
			$this->load->view('plantillas/plantilla_user', $datos);
	}	

	public function ticket_pdf($id_venta) {

        // Se carga la libreria fpdf
        $this->load->library('pdf');

        //cargando los productos vendidos
		$datos['listadoProductos'] = $this->Ventaproductos_model->listar($id_venta);

		//cargandos los datos generales de la venta
		$datos['datosVenta'] = $this->Ventas_model->datos_por_id($id_venta);

        // Creacion del PDF

        /*
         * Se crea un objeto de la clase Pdf, recuerda que la clase Pdf
         * heredó todos las variables y métodos de fpdf
         */
        $this->pdf = new Pdf();
        // Agregamos una página
        $this->pdf->AddPage('P',array(75,250));
        // Define el alias para el número de página que se imprimirá en el pie
        $this->pdf->AliasNbPages();

        /* Se define el titulo, márgenes izquierdo, derecho y
         * el color de relleno predeterminado
         */
        $this->pdf->SetTitle("Tickets");
        $this->pdf->SetLeftMargin(5);
        $this->pdf->SetRightMargin(5);
        $this->pdf->SetFillColor(200,200,200);

        $this->pdf->SetFont('Arial','',8);

        $this->pdf->Line(5,5,70,5);
        $this->pdf->Line(5,20,70,20);
        $this->pdf->Line(5,5,5,20);
        $this->pdf->Line(70,5,70,20);
        
        $this->pdf->Cell(55,0,'FACTURA POR TERCEROS',0,0,'C');
        $this->pdf->Ln('5');
        $this->pdf->SetFont('Arial','',8);
    
        $this->pdf->Cell(65,2,'PHARMA ZERO',0,0,'C');
        $this->pdf->Ln('7');

        // Se define el formato de fuente: Arial, negritas, tamaño 10
        $this->pdf->SetFont('Arial', 'B', 10);

        $this->pdf->Cell(65,5,'Farmacia Ejemplo',0,0,'C');
        $this->pdf->Ln('5');
        $this->pdf->SetFont('Arial', '', 8);
        $this->pdf->Cell(65,5,'Calle: ejemplo',0,0,'C');
        $this->pdf->Ln('5');
        $this->pdf->Cell(65,5,'Tel: 77777777',0,0,'C');
        $this->pdf->Ln('5');
        $this->pdf->Cell(65,5,utf8_decode('POTOSÍ - BOLIVIA'),0,0,'C');
        $this->pdf->Ln('5');
        $this->pdf->Cell(65,5,'NIT: 1111111111  Factura No.: '.$id_venta,0,0,'C');
        $this->pdf->Ln('5');
        $this->pdf->Cell(65,5,utf8_decode('Autorización No.: 11111111110001'),0,0,'C');
        $this->pdf->Ln('5');
        $this->pdf->Cell(65,5,utf8_decode('Actividad Económica: VENTA DE MEDICAMENTOS'),0,0,'C');
        $this->pdf->Ln('5');
        $this->pdf->Cell(65,5,utf8_decode('Fecha Emisión: '.$datos['datosVenta'][0]->fecha_venta),0,0,'L');
        $this->pdf->Ln('5');
        $this->pdf->Cell(65,5,utf8_decode('Cliente: '.$datos['datosVenta'][0]->nombre_cliente),0,0,'L');
        $this->pdf->Ln('5');
        $this->pdf->Cell(65,5,utf8_decode('NIT/CI: '.$datos['datosVenta'][0]->nit_cliente),0,0,'L');
        $this->pdf->Ln('5');
        $this->pdf->Cell(65,5,utf8_decode('Emitido por: '.$datos['datosVenta'][0]->nombre_usuario),0,0,'L');
        $this->pdf->Ln('5');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(60,5,'E-TICKET',0,0,'C');
        $this->pdf->Ln('5');
        $this->pdf->SetFont('Arial', '', 8);

        $this->pdf->Line(5,83,70,83);
        $this->pdf->Line(5,88,70,88);

        $this->pdf->Cell(12,7,'Cantidad','TB',0,'C',0);
        $this->pdf->Cell(33,7,'Producto','TB',0,'C',0);
        $this->pdf->Cell(10,7,'Precio','TB',0,'C',0);
        $this->pdf->Cell(10,7,'Importe','TB',0,'C',0);
        $this->pdf->Ln('7');
        foreach ($datos['listadoProductos'] as $data) {
    
            // Se imprimen los datos de cada alumno
            $this->pdf->Cell(12,5,$data->cantidad_ventaproducto,'B',0,'C',0);
            $this->pdf->Cell(33,5,$data->nombre_producto,'B',0,'C',0);
            $this->pdf->Cell(10,5,number_format($data->precio_ventaproducto, 2, ',', ''),'B',0,'C',0);
            $this->pdf->Cell(10,5,number_format($data->importe_ventaproducto, 2, ',', ''),'B',0,'C',0);       
            //Se agrega un salto de linea
            $this->pdf->Ln('5');
        }
        $this->pdf->Cell(55,5,'TOTAL',0,0,'R',0);
        $this->pdf->Cell(10,5,number_format($datos['datosVenta'][0]->importetotal_venta, 2, ',', ''),0,0,'C',0);

        $this->pdf->Ln('5');
        $this->pdf->Cell(65,5,'SON: '.$this->numero_letras->ValorEnLetras($datos['datosVenta'][0]->importetotal_venta, ""),0,0,'L',0);
        $this->pdf->Ln('5');
        $this->pdf->Cell(65,5,'CODIGO DE CONTROL:',0,0,'L',0);
        $this->pdf->Ln('5');
        $this->pdf->Cell(65,5,'FECHA LIMITE EMISION:',0,0,'L',0);
        $this->pdf->Ln('5');
		$this->pdf->Image(base_url().'/tmp/qr_codes/qr_code_test.png',20);

		$this->pdf->SetFont('Arial','B',8);
        $this->pdf->Cell(65,10,'"ESTA FACTURA CONTRIBUYE AL DESARROLLO ',0,0,'C');
        $this->pdf->Ln('5');
        $this->pdf->Cell(65,10,utf8_decode('DEL PAIS. EL USO ILICITO DE ESTA SERÁ '),0,0,'C');
        $this->pdf->Ln('5');
        $this->pdf->Cell(65,10,'SANCIONADO DE ACUERDO A LEY"',0,0,'C');

        $this->pdf->SetFont('Arial','',8);
        $this->pdf->Ln('7');        
        $this->pdf->Cell(65,10,'No reembolsable',0,0,'C');
        $this->pdf->Ln('5');
        $this->pdf->Cell(65,10,'GRACIAS POR SU PREFERENCIA',0,0,'C');

        $this->pdf->SetFont('Arial','B',8);
        $this->pdf->Ln('7');
        $this->pdf->Cell(65,10,'"system PHARMA ZERO"',0,0,'C');

        //$this->pdf->Line(5,85,70,85);
        //$this->pdf->Line(5,90,70,90);
        //$this->pdf->Line(5,85,85,90);
        //$this->pdf->Line(70,85,70,90);

        /*
         * TITULOS DE COLUMNAS
         *
         * $this->pdf->Cell(Ancho, Alto,texto,borde,posición,alineación,relleno);
         */

        /*$this->pdf->Cell(15,7,'NUM','TBL',0,'C','1');
        $this->pdf->Cell(25,7,'PATERNO','TB',0,'C','1');
        $this->pdf->Cell(25,7,'MATERNO','TB',0,'C','1');
        $this->pdf->Cell(25,7,'NOMBRE','TB',0,'C','1');
        $this->pdf->Cell(40,7,'FECHA DE NACIMIENTO','TB',0,'C','1');
        $this->pdf->Cell(25,7,'GRADO','TB',0,'C','1');
        $this->pdf->Cell(25,7,'GRUPO','TBR',0,'C','1');
        $this->pdf->Ln(7);
        // La variable $x se utiliza para mostrar un número consecutivo
        $x = 1;
        foreach ($alumnos as $alumno) {
            // se imprime el numero actual y despues se incrementa el valor de $x en uno
            $this->pdf->Cell(15,5,$x++,'BL',0,'C',0);
            // Se imprimen los datos de cada alumno
            $this->pdf->Cell(25,5,$alumno->paterno,'B',0,'C',0);
            $this->pdf->Cell(25,5,$alumno->materno,'B',0,'C',0);
            $this->pdf->Cell(25,5,$alumno->nombre,'B',0,'C',0);
            $this->pdf->Cell(40,5,$alumno->fec_nac,'B',0,'C',0);
            $this->pdf->Cell(25,5,$alumno->grado,'B',0,'C',0);
            $this->pdf->Cell(25,5,$alumno->grupo,'BR',0,'C',0);
            //Se agrega un salto de linea
            $this->pdf->Ln(5);
        }*/
        /*
         * Se manda el pdf al navegador
         *
         * $this->pdf->Output(nombredelarchivo, destino);
         *
         * I = Muestra el pdf en el navegador
         * D = Envia el pdf para descarga
         *
         */
        $this->pdf->Output("ticket".$id_venta.".pdf", 'I');
    }

	public function verificar_nitcliente($nit){

		$id = $this->input->post('id_cliente');

		if($this->Clientes_model->verificar_nitcliente($nit)) {
			$this->form_validation->set_message('verificar_nitcliente', 'El NIT o CI <label class="mensaje-error_repeat">'.$nit.'</label> del cliente ya se encuentra registrado en la base de datos.');
			return FALSE;
		}
		else {
			return TRUE;
		}

	}

}
