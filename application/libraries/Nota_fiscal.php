<?php

/**
 * Classe de emissão de nota fiscal utilizando o gateway do e-notas
 * http://enotasgw.com.br
 *
 * @version 0.0.1
 * @author Gustavo Paiva <gustavorpaiva/gmail.com>
 *
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nota_fiscal {

	public function __construct() {

		$CI =& get_instance();
		$CI->load->config('nfe');

		$this->server = $CI->config->item('nf-server');
		$this->token = $CI->config->item('company-id');
		$this->env = $CI->config->item('env');

	}

	public function generate_nf($nf) {

		$data = array();
		$this->data['env'] = $this->env;

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $this->server . $this->token . '/nfes');

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);

		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($nf));

		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 

		$body = curl_exec($ch);
		$result = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		//as três linhas abaixo imprimem as informações retornadas pela API, aqui o seu sistema deverá 
		//interpretar e lidar com o retorno
		print("STATUS: ".$result."\n");
		print("BODY: ".$body."\n\n");
		print("");

		curl_close($ch);
	}

}